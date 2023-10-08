<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Candidate;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;


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
        $candidates = Candidate::where('passed',1)->get();
        $task = Task::find(375);
        foreach ($candidates as $key => $candidate) {
            try {
                $role = $candidate->projects->first()->pivot->role;
                if($role == 'mobile')
                {
                    $user = User::where('email',$candidate->email)->first();
                    $user->tasks()->create([
                        'project_id'=>$candidate->projects->first()->id,
                        'title'=>$task->title,
                        'due_date'=>$task->due_date,
                        'description'=>$task->description,
                        'state'=>$task->state
                    ]);
                }

            } catch (\Throwable $th) {
                var_dump($th);
            }

        }

        return Command::SUCCESS;
    }
}
