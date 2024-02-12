<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class LastAccessedLesson extends Model
{
    use HasFactory, SoftDeletes;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function lessons()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }

    public function topics()
    {
        return $this->belongsTo(Topic::class, 'topic_id', 'id');
    }

    public function scopeStudentslastaccessed($query)
    {
        return $query->where('user_id', Auth::id())->latest()->skip(0)->take(3)->get();
    }
}
