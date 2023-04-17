<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobSeeker;

class PortfolioController extends Controller
{
    public function show($id)
    {
        $candidate = JobSeeker::find($id);
        return view('templates.simple',compact('candidate'));
    }
}
