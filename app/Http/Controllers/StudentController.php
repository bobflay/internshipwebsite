<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::where('hide',false)->get();
        return view('students',compact('students'));
    }

    public function secondPhase()
    {
        $users = User::all();
        $result = [];
        foreach ($users as $key => $user) {
            $obj = [];
            $obj['name'] = $user->name;
            $answers = $user->answers;
            $obj['questions'] = count($answers);
            $obj['scholarship'] = is_null($user->candidate) ? '': $user->candidate->scholarship;
            $obj['category'] = is_null($user->candidate) ? '': $user->candidate->category->name;
            $obj['program'] = is_null($user->candidate) ? '': $user->candidate->program;
            $obj['discord_id'] = is_null($user->candidate) ? '': $user->candidate->discord_id;

            $score = 0;
            if(!empty($answers))
            {
                foreach ($answers as $key => $answer) {
                    if($answer->isCorrect())
                    {
                        $score = $score + 1;
                    }
                }
            }
            $obj['score'] = (int)$score*100/50;
            if($obj['questions']>0)
            {
                array_push($result,$obj);
            }
        }

        usort($result, function ($a, $b) {
            return $b['score'] - $a['score'];
        });


        return view('phase2',compact('result'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $student = Student::where('uuid',$id)->first();
        if($student->candidate_id != 0)
        {

            $student = Student::where('uuid',$id)->get()->first();
            $candidate = $student->candidate;
            $role = $candidate->projects->first()->pivot->role;
            switch ($role) {
                case 'backend':
                    $courses = "Git & Laravel";
                    $role = "Backend Development";
                    break;
                case 'frontend':
                    $courses = "Git & Vuejs";
                    $role = "Frontend Development";
                    break;
                case 'mobile':
                    $courses = "Git & Flutter";
                    $role = "Mobile Development";
                    break;
                default:
                    # code...
                    break;
            }
    
            if($candidate->email =='itanim257@gmail.com')
            {
                $role = "Full Stack Development";
                $courses = "Git, Expressjs, Vuejs & MongoDB";
            }
    
            $user = User::where('email',$candidate->email)->get()->first();
            $url = $user->tasks->first()->result;
            return view('NewCertificates',compact('student','url','role','courses'));




        }
        elseif(isset($student))
        {
            return view('certificates',compact('student'));
        }
        
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
