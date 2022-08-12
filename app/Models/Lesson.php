<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Theme_Course;

class Lesson extends Model
{
    use HasFactory;

    protected $table = 'lessons';

    protected $fillable = [
        'title',
        'description',
        'task',
        'theme_course_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function theme_course()
    {
        return $this->belongsTo(Theme_Course::class);
    }
}
