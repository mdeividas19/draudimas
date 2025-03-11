<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\Owner;

class OwnerSeeder extends Seeder
{
    public function run(): void
    {
        Owner::factory(10)
            ->has(
                Car::factory()
                    ->count(3)
                    ->state(function (array $attributes, Owner $owner) {
                        return ['owner_id' => $owner->id];
                    })
            )->create();
     #   Owner::factory(10)->create()->each(function ($owner) {
      #      Car::factory(3)->create(['owner_id' => $owner->id]);
      #  });
    }
}
