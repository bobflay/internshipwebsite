<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Textarea;

use App\Nova\Filters\CandidateRegistered;

class Candidate extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Candidate::class;

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
        'phone'
    ];

    public static function indexQuery(NovaRequest $request, $query)
    {
        if(in_array($request->user()->email,['bob.fleifel@gmail.com','aliredahajj066@gmail.com']))
        {
            return $query;
        }else{
            return $query->where('email', $request->user()->email);
        }
    }

    public function checkIfAdmin($request)
    {
        return ! in_array($request->user()->email,['bob.fleifel@gmail.com','aliredahajj066@gmail.com']);
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
            Text::make('name')->readonly(function ($request) {
                return $this->checkIfAdmin($request);
            }),
            Text::make('email')->readonly(function ($request) {
                return $this->checkIfAdmin($request);
            }),
            Text::make('phone')->readonly(function ($request) {
                return $this->checkIfAdmin($request);
            }),
            Text::make('password')->hideFromIndex()->canSee(function ($request) {
                return ! $this->checkIfAdmin($request);
            }),
            Select::make('program')->options([
                '1' => 'Web Development',
                '2' => 'Mobile Development',
                '3' => 'Quality Assurance',
                '4' => 'Business Analyst',
                '5' => 'Graphic Design',

            ])->hideFromIndex()->readonly(function ($request) {
                return $this->checkIfAdmin($request);
            }),
            Boolean::make('scholarship')->canSee(function ($request) {
                return ! $this->checkIfAdmin($request);
            }),
            Boolean::make('registered')->canSee(function ($request) {
                return ! $this->checkIfAdmin($request);
            }),
            BelongsTo::make('category')->readonly(function ($request) {
                return $this->checkIfAdmin($request);
            }),
            Text::make('transaction')->hideFromIndex()->canSee(function ($request) {
                return ! $this->checkIfAdmin($request);
            }),
            Select::make('gender')->options([
                'male' => 'Male',
                'female' => 'Female'

            ])->hideFromIndex(),
            Text::make('Educatinal Institution','university')->hideFromIndex(),
            Text::make('Level')->hideFromIndex(),
            Text::make('Major')->hideFromIndex(),
            Date::make('Date Of Birth','dob')->hideFromIndex(),
            Text::make('discord_id'),
            Text::make('linkedin')->hideFromIndex(),
            Text::make('github')->hideFromIndex(),
            Textarea::make('comment')->canSee(function ($request) {
                return ! $this->checkIfAdmin($request);
            }),


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
        return [
            // new CandidateRegistered,
        ];
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
