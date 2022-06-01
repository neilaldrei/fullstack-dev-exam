<?php

namespace Database\Factories\v1;

use App\Models\V1\Booking;
use App\Models\V1\Tour;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tours = Tour::where('status', '>', 0)
                    ->select('id')
                    ->pluck('id');

        $statuses = array(Booking::STATUS_SUBMITTED, Booking::STATUS_CONFIRMED, Booking::STATUS_CANCELLED);

        return [
            'tour_id' => $this->faker->randomElement($tours),
            'tour_date' => $this->faker->dateTimeThisYear(),
            'status' => $this->faker->randomElement($statuses),
        ];
    }
}
