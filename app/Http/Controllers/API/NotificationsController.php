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

    public function update($id,Request $request)
    {
        $notification = Notification::find($id);
        $notification->status='sent';
        $notification->save();
        return response()->json([
            'status'=>200,
            'data'=>'done'
        ]);
    }

    public function done(Request $request)
    {
       // Retrieve the device using the provided device_id from the request
        $device = Device::where('device_id', $request->get('device_id'))->first();

        // Check if the device is found
        if ($device) {
            // Update the notifications status to 'done' for the found device and the authenticated user
            $notificationsUpdatedCount = auth()->user()->notifications()
                ->where('device_id', $device->id)
                ->update(['status' => 'sent']);

            // Return the response with the number of notifications updated
            return response()->json([
                'status' => 200,
                'data' => $notificationsUpdatedCount
            ]);
        } else {
            // Return a response indicating the device was not found
            return response()->json([
                'status' => 404,
                'message' => 'Device not found.'
            ]);
        }

    }
}
