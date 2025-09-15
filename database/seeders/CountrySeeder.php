<?php

namespace Database\Seeders;

use App\Models\Country\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::factory()->count(3)->create();
    }
}
