<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Batch;
use App\Models\User;

class LinkStudentToFirstBatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'batch:link';

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
        $firstBatch = Batch::first();
        $users = User::all();

        // Get all existing users
        $users = User::all();

        // Loop through the users and link them to the first batch
        foreach ($users as $user) {
            try {
                $user->batches()->attach($firstBatch->id,[
                    'category_id'=>$user->candidate()->first()->category()->first()->id,
                    'passed'=>$user->candidate->passed,
                    'registered'=>$user->candidate->registered,
                    'scholarship'=>$user->candidate->scholarship,
                    'comment'=>$user->candidate->comment
                ]);
                //code...
            } catch (\Throwable $th) {
                var_dump($user->toArray());
            }

        }

        return Command::SUCCESS;
    }
}
