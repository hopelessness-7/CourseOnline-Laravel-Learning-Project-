<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\User;

class Record extends Model
{
    use HasFactory;

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_id');
    }
}
