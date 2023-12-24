<?php

namespace Database\Seeders;
use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    public function run()
    {
        // Trip::create([
        //     'from' => 'Dhaka',
        //     'to' => 'Cox\'s Bazaar',
        //     'paribahan_name' => 'Example Paribahan',
        //     'total_seats' => 36,
        //     'journey_date' => now()->addDays(7), // Example date 7 days from now
        //     'departure_time' => '08:00:00',
        //     'arrival_time' => '16:00:00',
        // ]);

        // Add more trips with random routes
        Trip::factory()->count(3)->create();
    }
}