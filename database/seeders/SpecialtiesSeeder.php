<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpecialtiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $specialties = [
            ['name' => 'Urology'],
            ['name' => 'Neurology'],
            ['name' => 'Orthopedic'],
            ['name' => 'Cardiologist'],
            ['name' => 'Dentist']
        ];

        // Loop through the specialties array and create records
        foreach ($specialties as $specialty) {
            Speciality::create($specialty);
        }
    }
}
