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

        $user1 = DB::table('users')->insertGetId([
            'nom' => 'Doe',
            'prenom' => 'John',
            'email' => 'john.doe@example.com',
            'tel' => 1234567890,
            'password' => Hash::make('password123'),
            'cin' => 'JDOE123456',
            'dateNaissance' => Carbon::create('1980', '01', '01'),
            'Sexe' => 'M',
            'address' => 'Settat',
            'ville_id' => 16,
            'status_compte' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user2 = DB::table('users')->insertGetId([
            'nom' => 'Smith',
            'prenom' => 'Jane',
            'email' => 'jane.smith@example.com',
            'tel' => 9876543210,
            'password' => Hash::make('password123'),
            'cin' => 'JSMITH987654',
            'dateNaissance' => Carbon::create('1985', '05', '05'),
            'Sexe' => 'M',
            'address' => 'Fes',
            'ville_id' => 4,
            'status_compte' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $user3 = DB::table('users')->insertGetId([
            'nom' => 'labyb',
            'prenom' => 'ismail',
            'email' => 'labyb@gmail.com',
            'tel' => 9876543210,
            'password' => Hash::make('password123'),
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
            'user_id' => $user1,
            'speciality_id' => 4,
            'prix'=>350,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('doctors')->insert([
            'user_id' => $user2,
            'speciality_id' => 2,
            'prix'=>250,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('patients')->insert([
            'user_id' => $user3,           
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
