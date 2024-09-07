<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cars;
use Faker\Factory as Faker;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            Cars::create([
                'name_cars' => $faker->word,
                'publisher' => $faker->company,
                'year' => $faker->date('Y-m-d')
            ]);
        }
    }
}
