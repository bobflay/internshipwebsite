<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Candidate;
use App\Models\User;

class ConvertCandidatesToAdmins extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'candidates:admins';

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
        $candidates = Candidate::where('registered',1)->get();
        foreach ($candidates as $candidate) {
            $user = new User();
            $user->name = $candidate->name;
            $user->email = $candidate->email;
            $user->password = $candidate->password;
            $user->save();
        }

        return 0;
    }
}
