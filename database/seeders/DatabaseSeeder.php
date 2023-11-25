<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //call the seeder to generate and populate data in db
        $this->call(UsersTableSeeder::class); //from seeder the written data will be inserted in db
        \App\Models\User::factory(10)->create(); //from factory 10 fake data will be created

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


    }
}
