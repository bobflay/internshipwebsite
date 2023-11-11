<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Device;

class NotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Request $request)
    {
        $device = Device::where('device_id',$request->get('device_id'))->get()->first();
        $notifications = auth()->user()->notifications()->where('device_id',$device->id)->get();
        return response()->json([
            'status'=>200,
            'data'=>$notifications
        ]);
    }
}
