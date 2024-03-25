<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicePersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $person1 = Person::find(1);
        $person1Services = Service::whereIn('id', [1, 2, 3, 4])->get();
        $person1->services()->attach($person1Services->pluck('id'));

        $person2 = Person::find(2);
        $person2Services = Service::all();
        $person2->services()->attach($person2Services->pluck('id'));
    }
}
