<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobSeeker;

class PortfolioController extends Controller
{
    public function show($slug)
    {
        $candidate = JobSeeker::where('slug',$slug)->first();
        if(!is_null($candidate))
        {
            return view('templates.simple',compact('candidate'));
        }else{
            dd("candidate is not found !");
        }
    }
}
