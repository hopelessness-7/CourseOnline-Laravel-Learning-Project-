<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson;
use App\Models\User;

class Record extends Model
{
    use HasFactory;

    public function lesson()
    {
        return $this->belongsTo(Course::class, 'lesson_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'lesson_id',
        'status',
        'reply'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
