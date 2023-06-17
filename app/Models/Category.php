<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class,'program');
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
