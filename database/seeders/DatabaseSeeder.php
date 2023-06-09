<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        // User::create([
        //     'name' => 'Marketing',
        //     'email' => 'marketing@gmail.com',
        //     'password' => bcrypt('marketing123'),
        //     'role' => 'marketing',
        // ]);

        // User::create([
        //     'name' => 'Staf',
        //     'email' => 'staf@gmail.com',
        //     'password' => bcrypt('staf123'),
        //     'role' => 'staf',
        // ]);
    }
}
