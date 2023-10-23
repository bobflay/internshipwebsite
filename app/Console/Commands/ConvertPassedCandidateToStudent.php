<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Candidate;
use App\Models\Student;
use Illuminate\Support\Str;

class ConvertPassedCandidateToStudent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'candidate:graduate';

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
        $candidates  = Candidate::where('completed',true)->get();

        foreach($candidates as $candidate)
        {
            if(!is_null($candidate->projects->first()))
            {
                $uuid = Str::uuid()->toString();
                $student = new Student();
                $student->candidate_id = $candidate->id;
                $student->name = $candidate->name;
                $this->output->write("Graduating ".$student->name."\n");
                $student->uuid = $uuid;
                $student->project = $candidate->projects->first()->name;
                $student->dob = $candidate->dob;
                $student->save();
            }

        }
        
        return Command::SUCCESS;
    }
}
