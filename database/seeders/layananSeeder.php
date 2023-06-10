<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as data;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as faker;
use Illuminate\Support\Str;

class layananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = faker::create();
        $NameBk = $faker->name();
        $roles = ['guru', 'murid', 'walas', 'admin'];
        $kel = ['L', 'P'];
        $ting = ['X', 'XI', 'XII'];
        $randomtingkat = $ting[array_rand($ting)];
        $randomkelamin = $kel[array_rand($kel)];
        $randomRole = $roles[array_rand($roles)];

        for ($i = 0; $i < 4; $i++) {
            data::table('layanans')->insert([
                'jenis_layanan' => 'Bimbingan Belajar',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
