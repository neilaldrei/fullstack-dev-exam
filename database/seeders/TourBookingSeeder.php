<?php

namespace Database\Seeders;

use App\Models\V1\TourBooking;
use Illuminate\Database\Seeder;

class TourBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TourBooking::factory(10)->create();
    }
}
