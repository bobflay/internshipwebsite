<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'candidate_id',
    ];
    public function candidates()
    {
        return $this->belongsToMany(Candidate::class)->withPivot('role');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
