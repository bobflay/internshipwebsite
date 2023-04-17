<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';


    public function JobSeeker()
    {
        return $this->belongsTo(JobSeeker::class);
    }
}
