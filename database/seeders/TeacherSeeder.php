<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->insert([
            [
                'name' => 'محمد علاء',
                'email' => 'mohamedalaa@example.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'محمد عبدالمعبود',
                'email' => 'ag1088768@gmail.com',
                'password' => bcrypt('123456')
            ]
        ]);
    }
}
