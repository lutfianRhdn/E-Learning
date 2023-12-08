<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClasssSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $study =['IF','SI','ARC','SPL'];
        $countOfClass =40;

        for ($i=0; $i < $countOfClass; $i++) { 
            \App\Models\Classs::create([
                'name' => $study[rand(0,3)].'-'.rand(1,4),
                'code' => Str::random(5),
            ]);
        }
    
    }
}
