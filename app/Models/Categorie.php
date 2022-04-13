<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;


class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
