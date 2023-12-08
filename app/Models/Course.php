<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function classes()
    {
        return $this->belongsToMany(Classs::class, 'courses_class', 'course_id', 'class_id');
    }
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
    public function students()
    {
        return $this->belongsToMany(User::class, 'courses_user', 'course_id', 'user_id');
    }
    function resources() {
        return $this->hasMany(Resource::class);
    }
}
