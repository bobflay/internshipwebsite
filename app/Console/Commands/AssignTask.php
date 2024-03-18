<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Candidate;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Models\Notification;
use App\Jobs\SendNotification;

class AssignTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assign:tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $candidates = Candidate::where('id','54')->get();
        //$candidates = Candidate::where('created_at','>=','2023-10-01 00:00:00')->where('registered',1)->get();
        $candidates = Candidate::where('email','jihad.abdallah76@gmail.com')->get();
        $task = Task::find(1121);
        foreach ($candidates as $key => $candidate) {
            try {
                    $user = User::where('email',$candidate->email)->first();
                    $devices = $user->devices;
                    $user->tasks()->create([
                        'project_id'=>$candidate->projects->first()->id,
                        'title'=>$task->title,
                        'due_date'=>$task->due_date,
                        'description'=>$task->description,
                        'state'=>$task->state,
                        'type'=>$task->type,
                        'youtube'=>$task->youtube,
                        'youtube_thumbnail'=>$task->youtube_thumbnail
                    ]);
                    foreach($devices as $device)
                    {
                        $notification = Notification::create([
                            'user_id'=>$user->id,
                            'device_id'=>$device->id,
                            'title'=>'A new video is assigned to you',
                            'message'=>$task->title,
                            'type'=>$task->type,
                            'type_id'=>$task->id
                        ]);

                        SendNotification::dispatchNow($device->device_id,$notification->title,$notification->message,$task);
                    }

            } catch (\Throwable $th) {
                var_dump($th);
            }

        }

        return Command::SUCCESS;
    }
}
