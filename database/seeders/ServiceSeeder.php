<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'name' => 'Haircut',
            'price' => 30,
            'description' => 'Professional haircut service.',
            'status' => 'available',
        ]);
        Service::create([
            'name' => 'Shave',
            'price' => 20,
            'description' => 'Smooth and clean shave service.',
            'status' => 'available',
        ]);
        Service::create([
            'name' => 'Hair coloring',
            'price' => 25,
            'description' => 'Professional hair coloring service.',
            'status' => 'available',
        ]);
        Service::create([
            'name' => 'Hair dyeing',
            'price' => 35,
            'description' => 'Professional hair dyeing service.',
            'status' => 'available',
        ]);
        Service::create([
            'name' => 'Hair styling',
            'price' => 40,
            'description' => 'Professional hair styling service.',
            'status' => 'available',
        ]);

        Service::create([
            'name' => 'Beard Trim',
            'price' => 50,
            'description' => 'Professional beard trim service.',
            'status' => 'available',
        ]);
        Service::create([
            'name' => 'Pedicure',
            'price' => 60,
            'description' => 'Professional pedicure service.',
            'status' => 'available',
        ]);

        Service::create([
            'name' => 'Manicure',
            'price' => 55,
            'description' => 'Professional manicure service.',
            'status' => 'available',
        ]);

        Service::create([
            'name' => 'Makeup',
            'price' => 70,
            'description' => 'Professional makeup service.',
            'status' => 'available',
        ]);
        Service::create([
            'name' => 'Massage',
            'price' => 80,
            'description' => 'Professional massage service.',
            'status' => 'available',
        ]);
    }
}
