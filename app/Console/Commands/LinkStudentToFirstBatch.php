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
            $user->batches()->attach($firstBatch->id);
        }

        return Command::SUCCESS;
    }
}
