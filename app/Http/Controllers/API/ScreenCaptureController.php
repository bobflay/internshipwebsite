<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ScreenCapture;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ScreenCaptureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ]);

        $user = auth()->user();

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();

        // Generate a UUID for the image filename
        $uuid = Str::uuid()->toString();

        // Combine the UUID and original filename
        $filename = $uuid . '.' . $extension;

        // Store the image file with the generated filename
        $imagePath = $image->storeAs('screen_captures', $filename);

        // Create a new screen capture
        $screenCapture = new ScreenCapture([
            'location' => $imagePath,
            'user_id' => $user->id,
        ]);

        $screenCapture->save();

        return response()->json(['message' => 'Screen capture created', 'location' => $imagePath], 201);
    }
}
