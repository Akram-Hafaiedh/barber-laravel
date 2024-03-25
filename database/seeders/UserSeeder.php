<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        //USERS
        $userRole = Role::where('name', 'user')->first();
        // $users = User::whereNot('email', 'admin@example.com')->get();
        // foreach ($users as $user) {
        //     $user->role()->associate($userRole);
        //     $user->save();
        // }
        //ADMIN
        $adminRole = Role::where('name', 'admin')->first();
        // $admin = User::where('email', 'admin@example.com')->first();
        // if ($admin) {
        //     $admin->role()->associate($adminRole);
        //     $admin->save();
        // }

        //INITIAL SEEDER
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $user->role()->associate($userRole);
        $user->save();

        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
        $admin->role()->associate($adminRole);
        $admin->save();
    }
}
