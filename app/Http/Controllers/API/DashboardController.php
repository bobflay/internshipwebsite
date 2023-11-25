<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Log;
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
        $formatted_tasks = [];


        foreach ($tasks as $key => $task) {
            $obj = [];
            $obj['id']=$task->id;
            $obj['title']=$task->title;
            $obj['type']=$task->type;
            $obj['description']=$task->description;
            $obj['youtube']=$task->youtube;
            $obj['youtube_thumbnail']=$task->youtube_thumbnail;
            $obj['due_date'] = $task->due_date->format('Y-m-d');
            $obj['state'] = $task->state;
            $obj['project'] = $task->project;
            array_push($formatted_tasks,$obj);
        }

        $response = [
            'balance'=>0,
            'jobs'=>0,
            'projects'=>$projects,
            'tasks'=>$formatted_tasks
        ];

        return response()->json($response);
    }
}
