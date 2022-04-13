<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Theme_course extends Model
{
    use HasFactory;

    
    protected $table = 'theme_courses';

    protected $fillable = [
        'title',
        'description',
        'task',
        'course_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'theme_course_id');
    }
}
