<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exercise extends Model
{
    use HasFactory, SoftDeletes;

    public function users()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'lesson_exercises')->withTimestamps();
    }
}
