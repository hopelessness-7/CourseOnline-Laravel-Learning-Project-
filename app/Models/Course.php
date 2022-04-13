<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;
use App\Models\User;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'title',
        'description',
        'task',
        'categorie_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function theme_courses()
    {
        return $this->hasMany(Theme_Course::class, 'course_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
