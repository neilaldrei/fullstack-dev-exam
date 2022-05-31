<?php

namespace Database\Factories\v1;

use App\Models\V1\Tour;
use App\Models\V1\TourBooking;
use Illuminate\Database\Eloquent\Factories\Factory;

class TourBookingFactory extends Factory
{
    protected $model = TourBooking::class;

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

        $statuses = array(TourBooking::STATUS_SUBMITTED, TourBooking::STATUS_CONFIRMED, TourBooking::STATUS_CANCELLED);

        return [
            'tour_id' => $this->faker->randomElement($tours),
            'tour_date' => $this->faker->dateTimeThisYear(),
            'status' => $this->faker->randomElement($statuses),
        ];
    }
}
