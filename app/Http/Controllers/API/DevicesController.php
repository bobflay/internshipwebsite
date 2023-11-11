<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DevicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }


    public function store(Request $request)
    {
        $result = auth()->user()->createorUpdate($request->all());

        if ($result) {
            return response()->json([
                'code' => 200,
                'message' => 'Device registered or updated successfully'
            ]);
        } else {
            return response()->json([
                'code' => 200,
                'message' => 'Failed to register or update device'
            ]);
        }
    }

}
