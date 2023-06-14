<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Konseling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    // ---- FLUTTER ---- \\

    // ---- LOGIN 

    public function loginApi(Request $request)
    {
        // validasi form email dan password
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        // membawa data user bersama relasi table murid dengan kondisi mengambil email dan menjadi $user
        $user = User::with('murid')->where('email', $request->email)->first();

        //validasi $user apabila tidak null dan password nya encrypt kemudian membuat variable $g untuk membawa
        //data $user bersama seluruh data table murid
        if($user!='[]' && Hash::check($request->password, $user->password)){
            
            //kemudian validasi ketiga check akun apakah rolenya murid, jika tidak akan merespon error
            if ($user->role === 'murid') {

                //dan terakhir membuat token kemudian membawa data dalam berbentuk json
                $token=$user->createToken('Personal Acces Token')->plainTextToken;
                $g = $user->murid;
                $response = [
                    'status' => 200,
                    'token' => $token,
                    'user' => $user,
                    'message' => 'Successfully Login! Welcome Back.',
                    'relasi' => $g,
                ];
                return response()->json($response);
            } else {
                $response = [
                    'status' => 500,
                    'message' => 'Anda tidak memiliki akses sebagai murid.',
                ];
                return response()->json($response);
            }
        }else if($user=='[]'){
            $response = ['status' => 500, 'message' => 'Akun tidak tersimpan dalam database'];
            return response()->json($response);
        }else{
            $response = ['status' => 500, 'message' => 'Email atau password salah! tolong coba lagi!'];
            return response()->json($response);
        }
    }

    // ---- LOG OUT

    // GET JADWAL

    public function jadwal(Request $request) {
        $jadwals = Konseling::with('murid', 'gurus', 'layanan', 'walas')
    ->where('murid_id', $request->id)
    // ->where('status', 'accept')
    ->orderBy('updated_at', 'desc') 
    ->take(3)
    ->get()
    ->map(function ($jadwal) {
        return [
            'id' => $jadwal->id,
            'layanan_id' => $jadwal->layanan_id,
            'guru_id' => $jadwal->guru_id,
            'bk_name' => implode(', ', $jadwal->gurus->map(function ($guru) {
                return $guru->name;
            })->toArray()),
            'murid_id' => $jadwal->murid_id,
            'murid_name' => implode(', ', $jadwal->murid->map(function ($murid) {
                return $murid->name;
            })->toArray()),
            'walas_id' => $jadwal->walas_id,
            'walas_name' => implode(', ', $jadwal->walas->map(function ($walas) {
                return $walas->name_guru;
            })->toArray()),
            'tema' => $jadwal->tema,
            'keluhan' => $jadwal->keluhan,
            'tanggal_konseling' => $jadwal->tanggal_konseling,
            'tempat' => $jadwal->tempat,
            'hasil_konseling' => $jadwal->hasil_konseling,
            'kesimpulan' => $jadwal->kesimpulan,
            'status' => $jadwal->status,
            'created_at' => $jadwal->created_at,
            'updated_at' => $jadwal->updated_at,
            'murid' => $jadwal->murid,
            'layanan' => $jadwal->layanan,
            'walas' => $jadwal->walas,
        ];
    });



        if ($jadwals->isEmpty()) {
            return response()->json(['message' => 'No jadwals found for this user atau status jadwal belum diterima']);
        }else{
            return response()->json(['message' => 'Success', 'data' => $jadwals]);
        }
        
    }


}
