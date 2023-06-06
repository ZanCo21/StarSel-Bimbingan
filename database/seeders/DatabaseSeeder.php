<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Support\Facades\DB as data;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $faker = faker::create();

        for ($i = 0; $i < 5; $i++) {
            $userId = data::table('users')->insertGetId([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => '123', // password
                'role' => 'walas',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $jenisKelamin = array_rand(['L', 'P']);
            // $numbers = range(44, 9999999);
            // $randomNumber = $numbers[array_rand($numbers)];

            data::table('walas')->insert([
                'user_id' => $userId,
                'name_guru' => $faker->name(),
                'nip' => '199221',
                'jenis_kelamin' => 'L',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
