<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as data;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Faker\Factory as faker;
use Illuminate\Support\Str;

class akunSeeder extends Seeder
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

        for ($i = 0; $i < 1; $i++) {
            $userId = data::table('users')->insertGetId([
                'name' => $NameBk,
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('123'), // password
                'role' => $randomRole,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if ($randomRole === 'guru') {
                // Insert data ke tabel 'gurubk' dan dapatkan ID
                data::table('gurubk')->insert([
                    'user_id' => $userId,
                    'name' => $NameBk,
                    'tgl_lahir' => $faker->date($format = 'd/m/Y', $max = '2000-01-01'),
                    'nip' => $faker->numerify('######'),
                    'jenis_kelamin' => $randomkelamin,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else 

            if ($randomRole === 'walas') {
                // Insert data ke tabel 'walas' dan dapatkan ID
                data::table('walas')->insert([
                    'user_id' => $userId,
                    'name_guru' => $faker->name(),
                    'nip' => $faker->numerify('######'),
                    'jenis_kelamin' => $randomkelamin,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else

            if ($randomRole === 'murid') {
                // Pemeriksaan apakah nilai kelas_id sudah ada di tabel kelas
                $kelasExists = data::table('kelas')->where('id','<>', '')->first();
            
                if ($kelasExists) {
                    $kelasExistss = $kelasExists->id; 
                    // Insert data ke tabel 'murids' dan dapatkan ID
                    data::table('murids')->insert([
                        'user_id' => $userId,
                        'kelas_id' => $kelasExistss,
                        'name' => $faker->name(),
                        'nipd' => $faker->numerify('######'),
                        'jenis_kelamin' => $randomkelamin,
                        'tgl_lahir' => $faker->date($format = 'd/m/Y', $max = '2000-01-01'),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                } else {
                    // Jika kelas_id tidak ada di tabel kelas
                    User::where('id', $userId)->where('role', 'murid')->delete();
                    // Lakukan tindakan yang sesuai, seperti menampilkan pesan kesalahan
                    echo "Kelas dengan ID 1 tidak ditemukan";
                }
            }
            
        }
    }
}
