<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;

use Laravel\Nova\Fields\Select;

use Laravel\Nova\Http\Requests\NovaRequest;

class Project extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Project::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
    ];

    public static $group = 'Project';


    public static function indexQuery(NovaRequest $request, $query)
    {
        if(in_array($request->user()->email,['bob.fleifel@gmail.com','aliredahajj066@gmail.com']))
        {
            return $query;
        }else{
            return $query->whereHas('candidates', function ($candidateQuery) use ($request) {
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
            ID::make(__('ID'), 'id')->sortable(),
            Text::make('name'),
            Markdown::make('description'),
            Image::make('logo')->disk('public')->path('projects')->sortable()->rules('image', 'max:2048'),
            BelongsTo::make('Topic'),
            Text::make('link')->hideFromIndex(),
            BelongsToMany::make('Candidates')
            ->fields(function () {
                return [
                    Select::make('Role')->options([
                        'frontend' => 'Front-end',
                        'backend' => 'Back-end',
                        'mobile' => 'Mobile Developer',
                        'quality' => 'Quality Assurance',
                        'projectManager' => 'Project Manager'
                    ]),
                ];
            }),
            Text::make('Participants',function(){
                return $this->candidates()->count();
            }),
            HasMany::make('Tasks')

        ];
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
        return [
            new Actions\DeployProject
        ];
    }
}
