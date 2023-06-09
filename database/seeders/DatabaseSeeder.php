<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        $faker = faker::create();
        $NameBk = $faker->name();
        $roles = ['guru', 'murid', 'walas', 'admin'];
        $randomRole = $roles[array_rand($roles)];

        for ($i = 0; $i < 1; $i++) {
            // $userId = data::table('users')->insertGetId([
            //     'name' => $NameBk,
            //     'email' => $faker->unique()->safeEmail(),
            //     'password' => Hash::make('123'), // password
            //     'role' => 'guru',
            //     'remember_token' => Str::random(10),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);

            // data::table('gurubk')->insert([
            //     'user_id' => $userId,
            //     'name' => $NameBk,
            //     'tgl_lahir' => '19/02/91',
            //     'nip' => '199221',
            //     'jenis_kelamin' => 'L',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);

            // data::table('walas')->insert([
            //     'user_id' => $userId,
            //     'name_guru' => $faker->name(),
            //     'nip' => '199221',
            //     'jenis_kelamin' => 'L',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);

            // data::table('kelas')->insert([
            //     'gurubk_id' => '2',
            //     'walas_id' => '3',
            //     'tingkat_kelas' => 'XI',
            //     'jurusan' => 'PPLG',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);

            // data::table('murids')->insert([
            //     'user_id' => $userId,
            //     'kelas_id' => '1',
            //     'name' => $faker->name(),
            //     'nipd' => '934029849023',
            //     'jenis_kelamin' => 'P',
            //     'tgl_lahir' => '02/28/05',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);
            
            // data::table('layanans')->insert([
            //     [
            //         'jenis_layanan' => 'Bimbingan Belajar',
            //         'created_at' => now(),
            //         'updated_at' => now(),
            //     ],
            //     [
            //         'jenis_layanan' => 'Bimbingan Karir',
            //         'created_at' => now(),
            //         'updated_at' => now(),
            //     ],
            //     [
            //         'jenis_layanan' => 'Bimbingan Sosial',
            //         'created_at' => now(),
            //         'updated_at' => now(),
            //     ],
            //     [
            //         'jenis_layanan' => 'Bimbingan Pribadi',
            //         'created_at' => now(),
            //         'updated_at' => now(),
            //     ],
            // ]);

            // data::table('jenis_kerawanan')->insert([
            //     [
            //         'jenis_kerawanan' => 'Bolos',
            //         'created_at' => now(),
            //         'updated_at' => now(),
            //     ],
            //     [
            //         'jenis_kerawanan' => 'Telat',
            //         'created_at' => now(),
            //         'updated_at' => now(),
            //     ],
            //     [
            //         'jenis_kerawanan' => 'Judi',
            //         'created_at' => now(),
            //         'updated_at' => now(),
            //     ],
            //     [
            //         'jenis_kerawanan' => 'Rokok',
            //         'created_at' => now(),
            //         'updated_at' => now(),
            //     ],
            // ]);

            // data::table('konseling')->insert([
            //     'layanan_id' => '1',
            //     'guru_id' => '1',
            //     'murid_id' => '3',
            //     'walas_id' => '2',
            //     'tema' => 'Bimbingan Belajar',
            //     'keluhan' => 'Saya dari hari ke hari sangat susah sekali untuk fokus dalam belajar',
            //     'tanggal_konseling' => '06/06/23',
            //     'tempat' => 'Mushola Sekolah',
            //     'hasil_konseling' => 'Masalah selesai dengan baik.',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);

            // data::table('peta_kerawanan')->insert([
            //     'walas_id' => '2',
            //     'murid_id' => '3',
            //     'jenis_kewaranan' => 'Merokok',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);
        }
    }
}
