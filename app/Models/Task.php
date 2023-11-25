<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Log;
class Task extends Model
{
    use HasFactory;

    protected $casts = [
        'due_date' => 'date',
    ];

    protected $fillable = [
        'project_id',
        'title',
        'due_date',
        'description',
        'state',
        'type',
        'youtube',
        'youtube_thumbnail'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
