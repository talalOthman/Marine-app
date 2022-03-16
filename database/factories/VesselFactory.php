<?php

namespace Database\Factories;

use App\Models\Vessel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VesselFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vessel::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['Container', 'Bulk', 'Naval', 'Tanker', 'Passenger']),
            'callName' => strtoupper(Str::random(4)),
            'MMSI' => strtoupper(Str::random(7)),
            'cargo' => $this->faker->randomElement(['Food', 'Cars', 'Weapons', 'Fuel']),
        ];
    }
}
