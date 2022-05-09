<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Profile;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $groups = Group::all();
        $profiles = Profile::all();

        foreach (range(1, 20) as $_) {
            User::query()->create([
                'name' => $faker->name,
                'email' => $faker->email,
                'status' => $faker->randomElement(['Active', "InActive"]),
                "group_id" => $groups->random(1)->first()->id,
                "profile_id" => $profiles->random(1)->first()->id,
            ]);
        }
    }
}
