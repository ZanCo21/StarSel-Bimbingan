<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as data;
use Faker\Factory as faker;

class KonselingSeeder extends Seeder
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
        $stat = ['pending','accept'];
        $randomstat = $stat[array_rand($stat)];
        $randomtingkat = $ting[array_rand($ting)];
        $randomkelamin = $kel[array_rand($kel)];
        $randomRole = $roles[array_rand($roles)];

        for ($i = 0; $i < 4; $i++) {
            $walas_id = data::table('walas')->where('user_id', '<>', '')->first();
            $murid_id = data::table('murids')->inRandomOrder()->first();
            $gurubk_id = data::table('gurubk')->where('user_id', '<>', '')->first();
            $layanan_id = data::table('layanans')->inRandomOrder()->first();

            if ($walas_id && $murid_id && $gurubk_id && $layanan_id) {
                $walasId = $walas_id->user_id;
                $muridId = $murid_id->user_id;
                $guruId = $gurubk_id->user_id;
                $layananId = $layanan_id->id;
                data::table('konseling')->insert([
                    'layanan_id' => $layananId,
                    'guru_id' => $guruId,
                    'murid_id' => $muridId,
                    'walas_id' => $walasId,
                    'tema' => 'Bimbingan Belajar',
                    'keluhan' => 'Saya dari hari ke hari sangat susah sekali untuk fokus dalam belajar',
                    'tanggal_konseling' => '06/06/23',
                    'tempat' => 'Mushola Sekolah',
                    'hasil_konseling' => 'Masalah selesai dengan baik.',
                    'kesimpulan' => 'sjdadasd',
                    'status' => $randomstat,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                echo "
                Tidak ditemukan user_id pada tabel gurubk atau walas atau murids dengan nilai null
                ";
            }
        }
    }
}
