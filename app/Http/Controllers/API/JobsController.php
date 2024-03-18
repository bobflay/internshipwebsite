<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobSeeker;
use Log;
class JobsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Request $request)
    {
        $user_email = auth()->user()->email;

        $jobs = Job::with('company', 'jobSeekers')
        ->get()
        ->each(function ($job) use ($user_email) {
            Log::info($job->jobSeekers);
            
            $user_applied = $job->jobSeekers->where('email',$user_email);
            if($user_applied->isNotEmpty())
            {
                $job->applied = true;
            }else{
                $job->applied = false;
            }
            // If we don't need the jobSeekers relation anymore, we can unset it
            unset($job->jobSeekers);
        });

        return response()->json([
            'status'=>200,
            'data'=>$jobs
        ]);
    }

    public function apply(Request $request,$id)
    {
        $job = Job::find($id);
        $user = auth()->user();
        $jobSeeker = JobSeeker::where('email',$user->email)->get()->first();

        $jobSeeker->jobs()->attach($job->id);

        return response()->json([
            'status'=>200,
            'message'=>'Job applied successfully'
        ]);
    }
}
