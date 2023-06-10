<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\JenisKerawanan;
use App\Models\User;
use Illuminate\Support\Facades\DB as data;
use Illuminate\Support\Facades\Hash;
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
        for ($i = 0; $i < 15; $i++) {
        $this->call(akunSeeder::class);
        $this->call(layananSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(JenisKerawananSeeder::class);
        $this->call(KonselingSeeder::class);
        $this->call(KerawananSeeder::class);
        }
    }
}
