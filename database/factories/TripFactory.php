<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $from = $this->faker->randomElement(['Dhaka', 'Comilla', 'Chittagong','Cox\'s Bazaar']);
        $to = $this->faker->randomElement(['Comilla','Dhaka', 'Chittagong', 'Cox\'s Bazaar']);
        
        while ($to === $from) {
            $to = $this->faker->randomElement(['Comilla', 'Chittagong', 'Cox\'s Bazaar']);
        }
        $paribahanName = $this->faker->randomElement([
            'Hanif Enterprise',
            'Ena Transport (Pvt) Ltd',
            'Saintmartin Travels',
            'Tuba Line',
            'Soudia Coach Service',
            'Saintmartin Hyundai (Robi Express)',
            'M R Paribahan',
            'Shah Ali Paribahan',
            'Royal Coach',
            'Times Travels',
            'SHOHAGH PARIBAHAN',
            'Evergreen Transport Ltd',
            'Qatar Paribahan',
            'Shanto Travels',
            'Eagle Paribahan',
        ]);
        $journeyDate = $this->faker->dateTimeBetween('this week', '+7 days')->format('Y-m-d');
        return [
            'from' => $from,
            'to' => $to,
            'paribahan_name' => $paribahanName,
            'total_seats' => $this->faker->numberBetween(20, 50),
            'journey_date' => $journeyDate,
            'ticket_price' => $this->faker->numberBetween(460, 990),
            'departure_time' => $this->faker->time,
            'arrival_time' => $this->faker->time,
        ];
    }
    
}
