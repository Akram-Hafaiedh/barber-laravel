<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $location1 = Location::find(1);
        $location2 = Location::find(2);

        // Location 1
        Person::factory()->create([
            'name' => 'John Doe',
            'location_id' => $location1->id
        ]);
        Person::factory()->create([
            'name' => 'Jane Smith',
            'location_id' => $location1->id
        ]);

        // Location 2
        Person::factory()->create([
            'name' => 'Foo Bar',
            'location_id' => $location2->id
        ]);
        Person::factory()->create([
            'name' => 'Baz Baz',
            'location_id' => $location2->id
        ]);
        Person::factory()->create([
            'name' => 'Zee Zed',
            'location_id' => $location2->id
        ]);
    }
}
