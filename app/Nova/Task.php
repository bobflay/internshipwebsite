<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\BelongsTo;
use App\Models\User;
use App\Models\Project;
use Laravel\Nova\Fields\Select;
use Str;
use Laravel\Nova\Http\Requests\NovaRequest;

class Task extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Task::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title'
    ];

    public static $group = 'Project';


    public static function indexQuery(NovaRequest $request, $query)
    {
        if(in_array($request->user()->email,['bob.fleifel@gmail.com','aliredahajj066@gmail.com']))
        {
            return $query;
        }else{
            return $query->whereHas('user', function ($candidateQuery) use ($request) {
                $candidateQuery->where('email', $request->user()->email);
            });
        }
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Title')->readonly(function ($request) {
                return $this->checkIfAdmin($request);
            }),

            Select::make('Type')->options([
                'task' => 'Task',
                'video' => 'Video',
            ])->displayUsingLabels(),

            Text::make('Youtube')->readonly(function ($request) {
                return $this->checkIfAdmin($request);
            }),

            Text::make('youtube_thumbnail')->readonly(function ($request) {
                return $this->checkIfAdmin($request);
            }),

            Select::make('State')->options([
                'new' => 'New',
                'active' => 'Active',
                'dev done' => 'Dev Done',
                'qA done' => 'QA Done',
                'closed' => 'Closed',
            ])->displayUsingLabels(),

            BelongsTo::make('User')
                ->searchable()
                ->sortable()->readonly(function ($request) {
                    return $this->checkIfAdmin($request);
                }),

            BelongsTo::make('Project')
                ->searchable()
                ->sortable()->readonly(function ($request) {
                    return $this->checkIfAdmin($request);
                }),

            Date::make('Due Date')->readonly(function ($request) {
                return $this->checkIfAdmin($request);
            }),

            Trix::make('Description')->readonly(function ($request) {
                return $this->checkIfAdmin($request);
            }),

            Text::make('Result')->displayUsing(function ($value) {
                // Limit the displayed length of the name to, for example, 20 characters.
                return Str::limit($value, 10);
            })->nullable(),
        ];
    }

    public function checkIfAdmin($request)
    {
        return ! in_array($request->user()->email,['bob.fleifel@gmail.com','aliredahajj066@gmail.com']);
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
