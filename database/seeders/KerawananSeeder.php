<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as data;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as faker;
use Illuminate\Support\Str;

class KerawananSeeder extends Seeder
{
    /**
     * Run the database seeds.',
     */
    public function run(): void
    {
        $faker = faker::create();
        $NameBk = $faker->name();
        $roles = ['guru', 'murid', 'walas', 'admin'];
        $kel = ['L', 'P'];
        $ting = ['X', 'XI', 'XII'];
        $simpul = [
            'Di selesaikan secara kekeluargaan',
            'Siswa tersebut memperlihatkan peningkatan yang signifikan dalam kemampuan belajarnya setelah mengikuti program bimbingan.',
            'Siswa tersebut menunjukkan minat yang tinggi dalam mengikuti kegiatan ekstrakurikuler di sekolah.',
            'Siswa tersebut memiliki potensi yang besar dalam bidang seni dan sebaiknya diberikan kesempatan untuk mengembangkan bakatnya.',
            'Siswa tersebut memerlukan bantuan tambahan dalam mengatasi masalah kecemasan yang dihadapinya.',
            'Siswa tersebut memiliki keterampilan komunikasi yang baik dan mampu berinteraksi dengan baik dengan teman-temannya.',
            'Siswa tersebut menunjukkan sikap disiplin yang baik dalam menjalani proses belajar-mengajar.',
            'Siswa tersebut perlu mendapatkan dukungan dan motivasi lebih dalam mengatasi tekanan akademik yang dialaminya.',
            'Siswa tersebut memiliki konflik interpersonal dengan beberapa teman sekelasnya dan perlu dibantu dalam menyelesaikan masalah tersebut.',
            'Siswa tersebut menunjukkan minat yang besar dalam mengikuti kegiatan olahraga di sekolah.',
            'Siswa tersebut perlu diberikan bimbingan khusus dalam memilih jalur karier yang sesuai dengan minat dan bakatnya.',
            'Siswa tersebut memiliki kecerdasan emosional yang tinggi dan mampu mengelola emosinya dengan baik.',
            'Siswa tersebut menunjukkan kemampuan kepemimpinan yang baik dan perlu diberikan kesempatan untuk mengembangkan potensinya.',
            'Siswa tersebut perlu dibantu dalam meningkatkan motivasi belajarnya agar dapat mencapai hasil yang lebih baik.',
            'Siswa tersebut memiliki potensi dalam bidang teknologi dan sebaiknya diberikan kesempatan untuk mengembangkan keterampilannya.',
            'Siswa tersebut perlu diberikan dukungan dalam mengatasi masalah pribadi yang mempengaruhi performa akademiknya.',
            'Siswa tersebut menunjukkan kecenderungan untuk terlibat dalam perilaku bullying dan perlu diberikan pembinaan dalam hal ini.',
            'Siswa tersebut memerlukan bantuan tambahan dalam meningkatkan keterampilan sosialnya.',
            'Siswa tersebut memiliki keterampilan pemecahan masalah yang baik dan mampu berpikir kritis.',
            'Siswa tersebut perlu diberikan bimbingan karier untuk membantu dalam memilih program studi yang sesuai di perguruan tinggi.',
            'Siswa tersebut menunjukkan minat yang besar dalam bidang literasi dan sebaiknya diberikan kesempatan untuk mengembangkan minat tersebut.',
        ];
        $randomtingkat = $ting[array_rand($ting)];
        $randomkelamin = $kel[array_rand($kel)];
        $randomRole = $roles[array_rand($roles)];
        $randomSimpul = $simpul[array_rand($simpul)];


        $walas_id = data::table('walas')->where('user_id', '<>', '')->first();
        $murid_id = data::table('murids')->inRandomOrder()->first();
        $bk_id = data::table('gurubk')->inRandomOrder()->first();
        $kerawanan_id = data::table('jenis_kerawanan')->inRandomOrder()->first();

        if ($walas_id && $murid_id && $kerawanan_id) {
            $guruId = $walas_id->user_id;
            $muridId = $murid_id->user_id;
            $gurubkId = $bk_id->user_id;
            $kerawananId = $kerawanan_id->id;
            data::table('peta_kerawanan')->insert([
                'walas_id' => $guruId,
                'murid_id' => $muridId,
                'gurubk_id' => $gurubkId,
                'kerawanan_id' => $kerawananId,
                'kesimpulan' => $randomSimpul,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            echo "
Tidak ditemukan id pada tabel WALAS atau JENIS_KERAWANAN atau MURIDS dengan nilai null
            ";
        }
    }
}
