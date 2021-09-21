<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'roll_no' => 301,
            'name' => 'Aayush',
            'phone' => '1234567890'
        ]);
    }
}
