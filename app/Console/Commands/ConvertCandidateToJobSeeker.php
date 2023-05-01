<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Candidate;
use App\Models\JobSeeker;

class ConvertCandidateToJobSeeker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'candidates:jobSeeker';

    /**
     * 
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
        foreach($candidates as $candidate)
        {
            $job_seeker = new JobSeeker();
            $job_seeker->name = $candidate->name;
            $job_seeker->phone_number = $candidate->phone;
            $job_seeker->email = $candidate->email;
            $job_seeker->dob = $candidate->dob;
            $job_seeker->linkedin = $candidate->linkedin;
            $job_seeker->github = $candidate->github;
            $job_seeker->major = $candidate->major;
            $job_seeker->save();


        }
        return 0;
    }
}
