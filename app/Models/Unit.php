<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory, SoftDeletes;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'unit_course')->withTimestamps();
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
        // return $this->hasManyThrough(Lesson::class, Topic::class);
    }

    public function unitExercises()
    {
        return $this->hasOne(UnitExercise::class);
    }

    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Topic::class);
    }
}
