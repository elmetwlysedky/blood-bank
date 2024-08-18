<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DonationRequest>
 */
class DonationRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone' => '01061998145',
            'age' => rand(1, 60),
            'bags' => rand(1, 20),
            'details' => $this->faker->paragraph($nb =3),
            'hospital_name' => $this->faker->lastName,
            'hospital_address' =>$this->faker->address,
            'latitude'=>'45.253345',
            'longitude'=>'43.107205',
            'blood_type_id'=>rand(1, 8),
            'city_id'=>rand(1, 300),
            'client_id'=>rand(6, 11)
        ];
    }
}
