<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classs extends Model
{
    use HasFactory;
    protected $table ='classes';
    protected $fillable = [
        'name',
        'code',
        'id'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'courses_class', 'class_id', 'course_id');
    }
}
