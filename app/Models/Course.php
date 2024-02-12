<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function units()
    {
        return $this->belongsToMany(Unit::class, 'unit_course')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Scope and Filter managements
    public function scopeActive($query)
    {
        return $query->where('status', TRUE);
    }

}
