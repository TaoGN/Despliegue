<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpia la tabla antes de insertar nuevos datos
        DB::table('students')->truncate();

        DB::table('students')->insert([
            'name' => 'Alejandro',
            'phone' => '666555444',
            'age' => 33,
            'password' => '1234asdf',
            'email' => 'alejandro@prueba.com',
            'sex' => 'M'
        ]);

        DB::table('students')->insert([
            'name' => 'Juan',
            'phone' => '666666444',
            'age' => 23,
            'password' => '1234qwer',
            'email' => 'juaan@prueba.com',
            'sex' => 'M'
        ]);

        DB::table('students')->insert([
            'name' => 'Maria',
            'phone' => '662266444',
            'age' => 25,
            'password' => '1245qwer',
            'email' => 'maria@prueba.com',
            'sex' => 'F'
        ]);

        DB::table('students')->insert([
            'name' => 'Juanico',
            'phone' => '611666444',
            'age' => 24,
            'password' => '123444qwer',
            'email' => 'juanic0@prueba.com',
            'sex' => 'M'
        ]);
    }
}
