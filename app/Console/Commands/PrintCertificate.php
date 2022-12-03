<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Student;
use App;
class PrintCertificate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'certificates:print';

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
        foreach($students as $student)
        {
            $url = 'https://xpertbotacademy.online/students/'.$student->uuid;
            $snappy = App::make('snappy.image');
            $snappy->generate($url, public_path($student->uuid.'.jpg'));
        }
        return 0;
    }
}
