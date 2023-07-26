<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ScreenCapture;
use App\Models\Receipt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Log;
use Intervention\Image\Facades\Image;



class ReceiptController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function store(Request $request)
    {
        Log::info("function is called");
        Log::info($request->all());
        $request->validate([
            'image' => 'required|string',
        ]);

        $user = auth()->user();
        Log::info("A receipt is uploaded by ".$user->name);
    
        $base64Image = $request->input('image');
        
        // Decode the base64 image and create an Intervention Image instance
        $image = Image::make(base64_decode($base64Image));
    
        // Generate a UUID for the image filename
        $uuid = Str::uuid()->toString();
    
        // Define the storage path and filename
        $path = '/public/receipts/' . $uuid . '.jpg';
    
        // Save the image to the storage
        Storage::put($path, (string) $image->encode('jpg'));
    
        // Create a new screen capture
        $receipt = new Receipt([
            'location' => str_replace('/public/','',$path),
            'user_id' => $user->id,
        ]);
    
        $receipt->save();
    
        return response()->json(['message' => 'Receipt created', 'location' => $path], 200);
    }
}
