<?php

namespace Database\Seeders;

use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            [
                'id' => 1,
                'name' => 'Accepted'
            ],
            [
                'id' => 2,
                'name' => 'Canceled'
            ],
            [
                'id' => 3,
                'name' => 'Rejected'
            ],
            [
                'id' => 4,
                'name' => 'Pending'
            ],
        ];
        foreach ($statuses as $status) {
            Status::create([
                'id' => $status['id'],
                'name' => $status['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
