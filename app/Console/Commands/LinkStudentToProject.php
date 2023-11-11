<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Candidate;
use App\Models\Project;

class LinkStudentToProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'candidate:project';

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
        $project = Project::find(56);
        $candidates = Candidate::where('created_at','>=','2023-10-01 00:00:00')->where('registered',1)->where('program',4)->get();
        foreach ($candidates as $candidate) {
            $project->candidates()->attach($candidate,['role'=>'Project Manager']);
        }

        dd($candidates->count());
        return Command::SUCCESS;
    }
}
