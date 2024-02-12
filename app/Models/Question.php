<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Question extends Model
{
    use HasFactory, SoftDeletes;


    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function answeredBy()
    {
        return $this->belongsTo(User::class, 'answered_by', 'id');
    }

    public function lessons()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }

    public function topics()
    {
        return $this->belongsTo(Topic::class, 'topic_id', 'id');
    }

    public function scopeAnswered($query)
    {
        return $query->where('status', TRUE)->orWhere('user_id', Auth::id());
    }
}
