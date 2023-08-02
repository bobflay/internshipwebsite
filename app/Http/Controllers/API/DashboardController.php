<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {

        $projects = auth()->user()->candidate()->first()->projects;
        $tasks = auth()->user()->tasks()->with('project')->get();

        $response = [
            'balance'=>0,
            'jobs'=>0,
            'projects'=>$projects,
            'tasks'=>$tasks
        ];

        return response()->json($response);
    }
}
