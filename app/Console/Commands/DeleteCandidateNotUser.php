<?php

namespace App\Console\Commands;
use App\Models\User;
use App\Models\Candidate;

use Illuminate\Console\Command;

class DeleteCandidateNotUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'candidates:delete';

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
        // Get all candidates
        $candidates = Candidate::all();

        // Loop through the candidates and check if they exist as user
        foreach ($candidates as $candidate) {
        $user = User::where('email', $candidate->email)->first();

        // If the user doesn't exist, delete the candidate
        if (!$user) {
            $candidate->delete();
        }
    }
        return Command::SUCCESS;
    }
}
