<?php

namespace App\Nova;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;

use App\Models\Category;
use Log;
class BatchCandidateFields
{

    public function checkIfAdmin($request)
    {
        return ! in_array($request->user()->email,['bob.fleifel@gmail.com','aliredahajj066@gmail.com']);
    }

    public function __invoke($request, $relatedModel)
    {
        $categories = Category::all()->pluck('name','id');

        return [
            Text::make('category_id',function($value)use($categories){
                return $categories[$value['category_id']];
            }),
            Boolean::make('passed'),
            Boolean::make('registered'),
            Boolean::make('scholarship'),
            Text::make('comment')->canSee(function ($request) {
                return ! $this->checkIfAdmin($request);
            })
        ];
    }
}