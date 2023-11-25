<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Student;

class LinkStudentToCandidate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'student:candidate';

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
        $students = Student::all();
        dd($students->first()->toArray());
        return Command::SUCCESS;
    }
}
