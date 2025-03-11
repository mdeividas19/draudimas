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
        for ($i = 0; $i < 10; $i++) {
            Owner::factory()
                ->has(
                    Car::factory()
                        ->count(rand(1, 3))
                        ->state(function (array $attributes, Owner $owner) {
                            return ['owner_id' => $owner->id];
                        })
                )->create();
        }
    }
}
