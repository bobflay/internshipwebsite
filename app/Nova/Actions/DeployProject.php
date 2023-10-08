<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Log;
use Illuminate\Support\Facades\Redis;

class DeployProject extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        Log::info("inside action");
        foreach ($models as $model) {
            $projectLink = $model->link; // Change to the actual field name
    
            // Extract project name from the link
            $projectName = explode('.', $projectLink)[0];
            $projectName = str_replace('https://','',$projectName);
    
            // Construct folder path
            $folderPath = "/home/forge/{$projectName}";
    
            // Execute commands
            $commands = [
                "cd {$folderPath}",
                "git pull origin",
                "composer update",
            ];
    
            $command = implode(' ; ', $commands);
        
            Log::info($command);

            $output = [];
            $returnCode = -1;
            exec($command,$output);
            Log::info($output);
            Redis::set('db:migration', $projectName);

            
        }
    
        return Action::message('Commands executed successfully!');
    }
    

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [];
    }
}
