<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Project;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Database\Eloquent\Builder;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->key=='XpertBot_Academy@2023')
        {
            if(request()->user){
                $candidate = Candidate::where('email' , '=', request()->user)->orWhere('phone', request()->user)->orWhere('discord_id', request()->user)->first();
                if ($candidate !== null) {
                    $candidate->makeHidden(['password']);
                    $candidate = $this->addScoreToCandidate($candidate);
                    return response()->json($candidate);
                    
                } else {
                    return response()->json(['msg' => 'Err 404']);
                }

            } else if(request()->registered==0) {
                $candidates = Candidate::where('registered', 0)->get();
                $candidates->makeHidden(['password','scholarship','registered','transaction','program','linkedin','github','created_at','updated_at','discord_id']);
            }
             else {
                $candidates = Candidate::all();
                $candidates->makeHidden(['password']);
            }
            
            foreach ($candidates as $key => $candidate) {
                $user = User::where('email',$candidate->email)->get()->first();
                if(!is_null($user))
                {
                    $answers = $user->answers;
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
        
                    $candidate->score = $score;
                    $candidate->grade = (int) $score*100/50 . "/100";
        
                    if($score>10)
                    {
                        $candidate->passed = true;
                    }else{
                        $candidate->passed = false;
                    }
        
                }else{
                    $candidate->score = 0;
                    $candidate->passed = false;
                }
            }



            return response()->json($candidates);

        } 
    }


    public function addScoreToCandidate($candidate)
    {
        $user = User::where('email',$candidate->email)->get()->first();
        if(!is_null($user))
        {
            $answers = $user->answers;
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

            $candidate->score = $score;
            $candidate->grade = (int) $score*100/50 . "/100";

            if($score>10)
            {
                $candidate->passed = true;
            }else{
                $candidate->passed = false;
            }

        }else{
            $candidate->score = 0;
            $candidate->passed = false;
        }
        return $candidate;
     
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
        // dd($request->all());
            // Validate the form data

        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email|unique:candidates',
            'password' => 'required|min:6',
            'phone' => 'required|numeric|unique:candidates'
        ]);

        if ($validator->fails()) {
            $errors = $validator->messages();
            if($errors->getMessages()['phone'])
            {
                $candidate = Candidate::where('phone',$request->phone)->first();
                if($candidate->registered==false)
                {
                    return response()->json([
                        'success' => true,
                        'data'=>$candidate->id
                    ]);
                }

            }

            return response()->json([
                'success' => false,
                'errors' => $validator->messages()
            ]);
        }

        // Save the candidate to the database
        $candidate = new Candidate;
        $candidate->name = $request->name;
        $candidate->email = $request->email;
        $candidate->password = bcrypt($request->password);
        $candidate->phone = $request->phone;
        $candidate->program = $request->program;
        $candidate->save();

        // Return the response as JSON
        return response()->json([
            'success' => true,
            'data'=>$candidate->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $default = "https://www.somewhere.com/homestar.jpg";
        $size = 250;
        $candidate = Candidate::where('phone','like','%'.$id)->first();
        if(!is_null($candidate))
        {
            $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $candidate->email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
            $candidate->image = $grav_url;
            return view('candidate',compact('candidate'));
        }else{
            return 'Not Registered';
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
        try{
            $candidate = Candidate::findOrFail($id);
            $candidate->transaction = $request->transaction;
            $candidate->save();
            return response()->json([
                'success' => true,
                'data'=>"User Updated Successfully!"
            ]);

        }catch(Exception $e)
        {
            return response()->json([
                'success' => false,
                'errors' => $e->getMessage()
            ]);

        }
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

    public function updateDiscord(Request $request)
    {

        try {
            $candidate = Candidate::where('email',$request->email)->first();
            $candidate->discord_id = $request->discord_id;
            $candidate->linkedin = $request->linkedin;
            $candidate->github = $request->github;
            $candidate->save();
            return response()->json([
                'success' => true,
                'data'=> "User Updated Successfully!"
            ]);

        } catch(Exception $e)
        {
            return response()->json([
                'success' => false,
                'errors' => $e->getMessage()
            ]);

        }
    }

    public function certificate($id)
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


    public function exportCSV()
    {
        $candidates=Candidate::where('registered',1)->get()->all();
        $fileName = 'candidates_final.csv';

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Name', 'Phone','Email');

        $callback = function() use($candidates, $columns) {
                 $file = fopen('php://output', 'w');
                 fputcsv($file, $columns);

                 foreach ($candidates as $candidate) {
                     $row['Name']  = 'XpertBot - '.$candidate->name;
                     $row['Phone']    = $candidate->phone;
                     $row['Email'] = $candidate->email;

                     fputcsv($file, array($row['Name'], $row['Phone'],$row['Email']));
                 }

                 fclose($file);
             };

             return response()->stream($callback, 200, $headers);
    }
    public function exportCSVall()
    {
        $candidates=Candidate::all();
        $fileName = 'contacts.csv';

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Name', 'Phone','Email');

        $callback = function() use($candidates, $columns) {
                 $file = fopen('php://output', 'w');
                 fputcsv($file, $columns);

                 foreach ($candidates as $candidate) {
                     $row['Name']  = 'XpertBot - '.$candidate->name;
                     $row['Phone']    = $candidate->phone;
                     $row['Email'] = $candidate->email;

                     fputcsv($file, array($row['Name'], $row['Phone'],$row['Email']));
                 }

                 fclose($file);
             };

             return response()->stream($callback, 200, $headers);
    }
}
