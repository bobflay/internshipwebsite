<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParametersController extends Controller
{
    

    public function index()
    {
        $data = [
            'camera'=>false
        ];
        
        return response()->json($data);
    }
}
