<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserDoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create sample users

        // $user1 = DB::table('users')->insertGetId([
        //     'nom' => 'Doe',
        //     'prenom' => 'John',
        //     'email' => 'john.doe@example.com',
        //     'tel' => 1234567890,
        //     'password' => Hash::make('password123'),
        //     'cin' => 'JDOE123456',
        //     'dateNaissance' => Carbon::create('1980', '01', '01'),
        //     'Sexe' => 'M',
        //     'address' => 'Settat',
        //     'ville_id' => 16,
        //     'status_compte' => 'A',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // ADMINN
        $user2 = DB::table('users')->insertGetId([
            'nom' => 'Smith',
            'prenom' => 'Jane',
            'email' => 'admin@doccure.com',
            'tel' => '0638112562',
            'password' => Hash::make('rootroot'),
            'cin' => 'JSMITH987654',
            'dateNaissance' => Carbon::create('1985', '05', '05'),
            'Sexe' => 'M',
            'address' => 'Fes',
            'ville_id' => 4,
            'status_compte' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //PATIENT
        $user3 = DB::table('users')->insertGetId([
            'nom' => 'labyb',
            'prenom' => 'ismail',
            'email' => 'patient@doccure.com',
            'tel' => '0634412562',
            'password' => Hash::make('rootroot'),
            'cin' => 'JSMITH987654',
            'dateNaissance' => Carbon::create('2002', '07', '01'),
            'Sexe' => 'M',
            'address' => 'Casablanca',
            'ville_id' => 1,
            'status_compte' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // DOCTOR
        $user4 = DB::table('users')->insertGetId([
            'nom' => 'Youness',
            'prenom' => 'Ahmed',
            'email' => 'youness.doctor@doccure.com',
            'tel' => '0681332302',
            'password' => Hash::make('rootroot'),
            'cin' => 'JSMITH987654',
            'dateNaissance' => Carbon::create('2002', '07', '01'),
            'Sexe' => 'M',
            'address' => 'Casablanca',
            'ville_id' => 1,
            'status_compte' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('doctors')->insert([
            'user_id' => $user4,
            'speciality_id' => 4,
            'prix' => 350,
            'about' => 'Hello, my name is Dr. Youness Ahmed, and I am a dedicated cardiologist passionate about heart health and patient care.

My Background
I earned my medical degree and specialized in cardiology through intensive training and a fellowship program.

Professional Experience
With extensive experience in both clinical and hospital settings, I have performed various cardiac procedures, including angioplasty and coronary artery bypass surgery.

Patient Care Philosophy
I take a patient-centered approach, combining personalized care with the latest evidence-based practices to ensure the best outcomes for my patients.

Research and Publications
I am actively involved in cardiovascular research, contributing to reputable medical journals and focusing on innovative treatments and preventative measures.

Community Involvement
I regularly participate in community events, seminars, and workshops to raise awareness about heart health.

Personal Interests
In my free time, I enjoy running, swimming, hiking, and staying updated on the latest developments in cardiology.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // DB::table('doctors')->insert([
        //     'user_id' => $user2,
        //     'speciality_id' => 2,
        //     'prix'=>250,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
        DB::table('patients')->insert([
            'user_id' => $user3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('admins')->insert([
            'user_id' => $user2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
