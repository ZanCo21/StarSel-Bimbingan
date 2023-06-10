<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as data;
use Faker\Factory as faker;

class KelasSeeder extends Seeder
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

        $guru = data::table('gurubk')->where('user_id', '<>', '')->first();
        $walas = data::table('walas')->where('user_id', '<>', '')->first();

if ($guru && $walas) {
    $guruId = $guru->user_id;
    $walasId = $walas->user_id;

    data::table('kelas')->insert([
        'gurubk_id' => $guruId,
        'walas_id' => $walasId,
        'tingkat_kelas' => $randomtingkat,
        'jurusan' => 'PPLG',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
} else {
    echo "
Tidak ditemukan user_id pada tabel gurubk atau walas dengan nilai null
    ";
}

    }
}
