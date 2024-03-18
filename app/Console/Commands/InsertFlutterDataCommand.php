<?php

namespace App\Console\Commands;
use App\Models\Question;
use App\Models\Choice;
use App\Models\Category;

use Illuminate\Console\Command;

class InsertFlutterDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:flutter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'insert flutter data';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        // Read JSON file
        $jsonFile = storage_path('app/dart.json');
        $jsonData = file_get_contents($jsonFile);
        $data = json_decode($jsonData, true);

        $category = Category::where('name','Mobile Development')->first();

        // Insert data into database
        foreach ($data as $item) {
            // Create question
            $question = Question::create([
                'content' => $item['question'],
                'points'=>1.0,
                'category_id'=>$category->id,
                'session'=>'S2023'
            ]);

            // Create choices
            $choices = [];
            foreach ($item['choices'] as $index => $choiceContent) {
                $choices[] = new Choice([
                    'content' => $choiceContent,
                    'correct'=> $index === $item['correctIndex'] ? true: false
                ]);
            }
            $question->choices()->saveMany($choices);

        }

        echo "Data inserted successfully!";

        return Command::SUCCESS;
    }
}
