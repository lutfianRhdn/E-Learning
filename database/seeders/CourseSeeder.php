<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Course::factory(10)->create();
        
        \App\Models\Course::all()->each(function ($course) {
            $course->classes()->attach(\App\Models\Classs::all()->random(rand(1, 4))->pluck('id')->toArray());
            $course->teacher()->associate(\App\Models\User::all()->random(1)->first()->id);
            $course->save();
        });
    }
}
