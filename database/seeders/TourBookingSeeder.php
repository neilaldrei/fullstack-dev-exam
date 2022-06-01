<?php

namespace Database\Seeders;

use App\Models\V1\Booking;
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
        Booking::factory(10)->create();
    }
}
