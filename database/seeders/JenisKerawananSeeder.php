<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as data;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as faker;
use Illuminate\Support\Str;

class JenisKerawananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = faker::create();
        $ting = [
            'Sering sakit', 
            'Sering ijin',
            'Sering alpha',
            'Sering alpha',
            'Sering terlambat',
            'Bolos',
            'Kelainan jasmani',
            'motivasi belajar kurang',
            'Introvert',
            'Tinggal dengan wali',
            'Kemampuan kurang',
            'Berkelahi',
            'Menentang guru',
            'Mengganggu teman',
            'Pacaran',
            'Broken home',
            'Kondisi ekonomi kurang',
            'Pergaulan di luar sekolah',
            'Pengguna narkoba',
            'Merokok',
            'Membiayai sekolah sendiri'
            ];
        $randomkerawanan = $ting[array_rand($ting)];

            data::table('jenis_kerawanan')->insert([
                'jenis_kerawanan' => $randomkerawanan,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
