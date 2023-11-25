<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\FcmNotification;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'device_id', 'message', 'status','title','type','type_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function send()
    {
        // Implement your notification sending logic here, using FCM, APNs, or other services.
        // Update the 'status' column to reflect the result (e.g., 'sent' or 'failed').

        // Example logic to update the status (modify this based on your notification service):
        $this->status = 'sent';
        $this->save();
    }
}
