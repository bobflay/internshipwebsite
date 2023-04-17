<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;

use Laravel\Nova\Http\Requests\NovaRequest;

class JobSeeker extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\JobSeeker::class;
    public static $group = 'Jobs';

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
        'id','name','email'
    ];

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
            Text::make('Name')->sortable()->rules('required', 'max:255'),
            Text::make('Email')->sortable()->rules('required', 'email', 'max:255'),
            Text::make('Phone Number')->sortable()->rules('required', 'max:20'),
            Date::make('Date of Birth','dob')->sortable()->rules('required'),
            Image::make('Profile Picture')->disk('public')->path('job-seekers')->sortable()->rules('image', 'max:2048'),
            Text::make('LinkedIn')->sortable()->rules('url', 'max:255'),
            Text::make('GitHub')->sortable()->rules('url', 'max:255'),
            Text::make('Major')->sortable()->rules('required', 'max:255'),
            Text::make('Profession')->sortable()->rules('required', 'max:255'),
            Textarea::make('Objective')->sortable()->rules('required', 'max:255'),
            File::make('Resume','cv_link')->disk('public')->acceptedTypes('.pdf'),
            Text::make('University')->sortable()->rules('required', 'max:255'),
            Text::make('Graduation Year','graduation')->sortable()->rules('required','max:255'),
            Text::make('Country')->sortable()->rules('required', 'max:255'),
            Text::make('City')->sortable()->rules('required', 'max:255'),
            BelongsToMany::make('Jobs'),
            HasMany::make('Educations'),
            HasMany::make('Experiences')

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
        return [];
    }
}
