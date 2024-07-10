<?php

namespace Database\Seeders;

use App\Models\Ville;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VillesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'Casablanca'],
            ['name' => 'Rabat'],
            ['name' => 'Marrakech'],
            ['name' => 'Fes'],
            ['name' => 'Tangier'],
            ['name' => 'Agadir'],
            ['name' => 'Meknes'],
            ['name' => 'Oujda'],
            ['name' => 'Kenitra'],
            ['name' => 'Tetouan'],
            ['name' => 'Safi'],
            ['name' => 'El Jadida'],
            ['name' => 'Nador'],
            ['name' => 'Beni Mellal'],
            ['name' => 'Khouribga'],
            ['name' => 'Settat'],
            ['name' => 'Mohammedia'],
            ['name' => 'Laayoune'],
            ['name' => 'Khemisset'],
            ['name' => 'Inezgane'],
        ];
        foreach($cities as $city ){
            Ville::create([
                'name'=>$city['name']
            ]);
        }
    }
}
