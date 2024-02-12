<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory, SoftDeletes;

    public function topics()
    {
        return $this->belongsTo(Topic::class, 'topic_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'lesson_exercises')->withTimestamps();
    }

   
}
