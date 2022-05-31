<?php

namespace Database\Seeders;

use App\Models\V1\Tour;
use Illuminate\Database\Seeder;

class ToursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tour::factory(10)->create();
    }
}
