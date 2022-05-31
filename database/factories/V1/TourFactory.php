<?php

namespace Database\Factories\V1;

use App\Models\V1\Tour;
use Illuminate\Database\Eloquent\Factories\Factory;

class TourFactory extends Factory
{
    protected $model = Tour::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $statuses = array(Tour::STATUS_DRAFT, tour::STATUS_PUBLIC);

        return [
            'name' => $this->faker->word(),
            'itenary' => $this->faker->sentence(3),
            'status' => $this->faker->randomElement($statuses),
        ];
    }
}
