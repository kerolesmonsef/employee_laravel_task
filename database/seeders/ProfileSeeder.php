<?php

namespace Database\Seeders;

use App\Models\Profile;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        foreach (range(1, 10) as $_) {
            Profile::query()->create([
                'name' => $faker->name,
            ]);
        }
    }
}
