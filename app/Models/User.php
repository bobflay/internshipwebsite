<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Candidate;
use App\Notifications\FcmNotification;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function candidate()
    {
        return $this->hasOne(Candidate::class,'email','email');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function batches()
    {
        return $this->belongsToMany(Batch::class);
    }

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }

    public function screenCaptures()
    {
        return $this->hasMany(ScreenCapture::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }



    public function createorUpdate($deviceData)
    {
        // Check if the device with the provided device_id already exists
        $device = $this->devices()->where('device_id', $deviceData['device_id'])->first();

        if ($device) {
            // If the device exists, update its attributes
            $device->update($deviceData);
            return $device;
        } else {
            // If the device doesn't exist, create a new one
            return $this->devices()->create($deviceData);
        }
    }

}
