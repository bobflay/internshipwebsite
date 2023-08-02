<?php

namespace App\Nova\Lenses;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;

use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Textarea;

use Laravel\Nova\Http\Requests\LensRequest;
use Laravel\Nova\Lenses\Lens;

class PassedCandidates extends Lens
{
    /**
     * Get the query builder / paginator for the lens.
     *
     * @param  \Laravel\Nova\Http\Requests\LensRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return mixed
     */
    public static function query(LensRequest $request, $query)
    {
        return $request->withOrdering($request->withFilters(
            $query->where('passed',1)
        ));
    }

    public function checkIfAdmin($request)
    {
        return ! in_array($request->user()->email,['bob.fleifel@gmail.com','aliredahajj066@gmail.com']);
    }

    /**
     * Get the fields available to the lens.
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

            Text::make('github')->readonly(function ($request) {
                return $this->checkIfAdmin($request);
            }),

            Text::make('email')->readonly(function ($request) {
                return $this->checkIfAdmin($request);
            }),
            Text::make('phone')->readonly(function ($request) {
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
            Textarea::make('comment')->canSee(function ($request) {
                return ! $this->checkIfAdmin($request);
            }),
            Boolean::make('passed')->canSee(function ($request) {
                return ! $this->checkIfAdmin($request);
            })->sortable()
        ];
    }

    /**
     * Get the cards available on the lens.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the lens.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available on the lens.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return parent::actions($request);
    }

    /**
     * Get the URI key for the lens.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'passed-candidates';
    }
}
