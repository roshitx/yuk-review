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
        
        $faker = Faker::create('id_ID');
        User::create([
            'name' => 'Roshit',
            'email' => 'auliarasyidalzahrawi@gmail.com',
            'password' => bcrypt('rosyid07'),
            'gender' => 'Male',
            'role' => 'admin' 
        ]);

        User::create([
            'name' => 'Bukan Admin',
            'email' => 'bukanadmin@gmail.com',
            'password' => bcrypt('rosyid07'),
            'gender' => 'Male',
            'role' => 'user' 
        ]);


        for ($i=0; $i < 120; $i++) { 
            $gender = $faker->randomElement(['Male','Female','Other']);
            User::create([
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'password' => bcrypt($faker->password(8)),
                'gender' => $gender
            ]);
        }
    }
}
