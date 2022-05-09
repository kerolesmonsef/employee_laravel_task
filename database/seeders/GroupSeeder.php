<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ["Managers", "Head Office", "Office", "Developers"];
        foreach ($names as $name) {
            Group::query()->create([
                'name' => $name,
            ]);
        }
    }
}
