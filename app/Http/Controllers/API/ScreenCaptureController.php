<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ScreenCapture;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Log;
use Intervention\Image\Facades\Image;


class ScreenCaptureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function store(Request $request)
    {
        Log::info('inside store');
        $request->validate([
            'image' => 'required|string',
        ]);
        Log::info('after validation');
        $user = auth()->user();
    
        $base64Image = $request->input('image');
        
        // Decode the base64 image and create an Intervention Image instance
        $image = Image::make(base64_decode($base64Image));
    
        // Generate a UUID for the image filename
        $uuid = Str::uuid()->toString();
    
        // Define the storage path and filename
        $path = '/public/screen_captures/' . $uuid . '.jpg';
    
        // Save the image to the storage
        Storage::put($path, (string) $image->encode('jpg'));
    
        // Create a new screen capture
        $screenCapture = new ScreenCapture([
            'location' => str_replace('/public/','',$path),
            'user_id' => $user->id,
        ]);
    
        $screenCapture->save();
    
        return response()->json(['message' => 'Screen capture created', 'location' => $path], 200);
    }
}
