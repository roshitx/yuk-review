<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Muhammad Aulia Rasyid Alzahrawi',
            'email' => 'roshit@gmail.com',
            'password' => bcrypt('rosyid07')
        ]);

        $faker = Faker::create('id_ID');
        for ($i=0; $i < 20; $i++) { 
            $gender = $faker->randomElement(['male','female','other']);
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt($faker->password(8)),
                'gender' => $gender
            ]);
        }
    }
}
