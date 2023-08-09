<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Murid;
use App\Models\Gurubk;
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
        $user = User::with('murid','guru')->where('email', $request->email)->first();

        //validasi $user apabila tidak null dan password nya encrypt kemudian membuat variable $g untuk membawa
        //data $user bersama seluruh data table murid
        if($user!='[]' && Hash::check($request->password, $user->password)){
            
            //kemudian validasi ketiga check akun apakah rolenya murid atau guru, jika tidak akan merespon error
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
            } else if($user->role === 'guru') {
                //dan terakhir membuat token kemudian membawa data dalam berbentuk json
                $token=$user->createToken('Personal Acces Token')->plainTextToken;
                $g = $user->guru;
                $response = [
                    'status' => 200,
                    'token' => $token,
                    'user' => $user,
                    'message' => 'Successfully Login! Welcome Back.',
                    'relasi' => $g,
                ];
                return response()->json($response);
            }else{
                $response = [
                    'status' => 500,
                    'message' => 'Anda tidak memiliki akses sebagai murid ataupun gurubk.',
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
        $userId = $request->query('user_id');
        $userRole = $request->query('role');
        $status = $request->query('status');
    
        if ($userRole === 'murid') {
            $jadwals = Konseling::with('murid', 'gurus', 'layanan', 'walas')
                ->where('murid_id', $request->id)
                ->whereIn('status', explode(',', $status))  
                ->orderBy('updated_at', 'desc')
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
            } else {
                return response()->json(['message' => 'Success', 'data' => $jadwals]);
            }
        } else if($userRole === 'guru') {
            $jadwals = Konseling::with('murid', 'gurus', 'layanan', 'walas')
                ->where('guru_id', $request->id)
                ->whereIn('status', explode(',', $status))  
                ->orderBy('updated_at', 'desc')
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
            } else {
                return response()->json(['message' => 'Success', 'data' => $jadwals]);
            }
        }else {
            $response = ['status' => 500, 'message' => 'Akun tidak memiliki akses dikarenakan role yang berbeda'];
            return response()->json($response);
        }
    }
    

    public function createJadwal(Request $request){
        $userRole = $request->query('role');

        if($userRole === 'murid'){
            $cjadwal = Murid::with('kelas', 'user')->where('user_id', $request->id)->first();
    
            $bikinjadwal = [
                'id' => $cjadwal->user_id,
                'name' => $cjadwal->name,
                'email' => $cjadwal->user->email,
                'kelas_id' => $cjadwal->kelas_id,
                'kelas' => $cjadwal->kelas->tingkat_kelas . " " . $cjadwal->kelas->jurusan, 
                'tingkat_kelas' => $cjadwal->kelas->tingkat_kelas,
                'jurusan' => $cjadwal->kelas->jurusan,
                'nipd' => $cjadwal->nipd,
                'jenis_kelamin' => $cjadwal->jenis_kelamin,
                'tgl_lahir' => $cjadwal->tgl_lahir,
                'walikelas_id' => $cjadwal->kelas->walas_id,
                'walikelas' => $cjadwal->kelas->walas->name_guru,
                'gurubk_id' => $cjadwal->kelas->gurubk_id,
                'gurubk' => $cjadwal->kelas->gurubk->name,
            ];
    
            return response()->json(['message' => 'Success', 'data' => $bikinjadwal]);

        } else if($userRole === 'guru'){
            $cjadwals = Gurubk::with('kelass', 'user')->where('user_id', $request->id)->first();
            // dd($cjadwal);

            $kelasData = $cjadwals->kelass->map(function ($kelas) {
                // Get murid data for this kelas
                $muridData = $kelas->murid->map(function ($murid) {
                    return [
                        'user_id' => $murid->user_id,
                        'kelas_id' => $murid->kelas_id,
                        'nama_murid' => $murid->name
                    ];
                });
            
                return [
                    'kelas_id' => $kelas->id,
                    'walikelas_id' => $kelas->walas_id,
                    'kelas' => $kelas->tingkat_kelas . " " . $kelas->jurusan,
                    'murids' => $muridData  // Include murid data
                ];
            });
            
            $bikinjadwal = [
                'id' => $cjadwals->user_id,
                'name' => $cjadwals->name,
                'email' => $cjadwals->user->email,
                'nip' => $cjadwals->nip,
                'jenis_kelamin' => $cjadwals->jenis_kelamin,
                'tgl_lahir' => $cjadwals->tgl_lahir,
                'kelas' => $kelasData,  // Include the 'kelas' data
            ];
            
    
            return response()->json(['message' => 'Success', 'data' => $bikinjadwal]); 
        } else {
            $response = ['status' => 500, 'message' => 'Akun tidak memiliki akses dikarenakan role yang berbeda'];
            return response()->json($response);
        }

    }

    public function storeJadwal(Request $request){
        $murids = User::with('murid')->where('id', $request->id)->first();
        // $getkelas = Kelas::with('gurubk','walas')->where('id', $murids->murid->kelas_id)->first();
        // dd($murids);
 
        $jadwalbaru = Konseling::create([
            'layanan_id' => $request->input('layanan_id'),
            'murid_id' => $request->input('murid_id'),
            'walas_id' => $request->input('walas_id'),
            'guru_id' => $request->input('guru_id'),
            'tema' => $request->input('tema'),
            'keluhan' => $request->input('keluhan'),
            'status' => 'pending',
            'tanggal_konseling' => $request->input('tanggal_konseling'),
            'tempat' => $request->input('tempat'),
        ]);

        return response()->json(['message' => 'Success', 'data' => $jadwalbaru]);
    }

    // public function createKonseling(Request $request)
    // {
    //     $cjadwal = User::with('siswa')->where('user_id', $request->id)->first();
    
    //     $buatjadwal = [
    //         'user_id' => $cjadwal->user_id,
    //         'siswa_id' => $cjadwal->user_id,
    //         'kelas_id' => $cjadwal->kelas_id,
    //         'walas_id' => $cjadwal->kelas->walikelas_id,
    //         'guru_id' => $cjadwal->kelas->guru_id,
    //         'guru' => $cjadwal->kelas->guru->nama,
    //     ];

    //     $response = ['status' => 200, 'data' => $buatjadwal, 'message' => 'data berhasil'];
    //     return response()->json($response);
    // }

    public function profile(Request $request){
        // $userRole = $request->query('role');

        $murid = Murid::with('kelas', 'user')->where('user_id', $request->id)->first();
        $guru = Gurubk::with('kelass', 'user')->where('user_id', $request->id)->first();

        if ($murid !== null && $murid->user !== null && $murid->user->role === 'murid') {
            // If $murid is null, return an error message
            if ($murid === null) {
                return response()->json(['message' => 'No Murid found with this user_id']);
            }
    
            $muridDetails = [
                'id' => $murid->user_id,
                'name' => $murid->name,
                'email' => $murid->user->email,
                'kelas_id' => $murid->kelas_id,
                'kelas' => $murid->kelas->tingkat_kelas . " " . $murid->kelas->jurusan, 
                'tingkat_kelas' => $murid->kelas->tingkat_kelas,
                'jurusan' => $murid->kelas->jurusan,
                'nipd' => $murid->nipd,
                'jenis_kelamin' => $murid->jenis_kelamin,
                'tgl_lahir' => $murid->tgl_lahir,
                'walikelas_id' => $murid->kelas->walas_id,
                'walikelas' => $murid->kelas->walas->name_guru,
                'gurubk_id' => $murid->kelas->gurubk_id,
                'gurubk' => $murid->kelas->gurubk->name,
            ];
    
            return response()->json(['message' => 'Success', 'data' => $muridDetails]);
        }else if($guru !== null && $guru->user !== null && $guru->user->role === 'guru') {
    
            // If $murid is null, return an error message
            if ($guru === null) {
                return response()->json(['message' => 'No Guru found with this user_id']);
            }

            $kelasData = $guru->kelass->map(function ($kelas) {
                // Get murid data for this kelas
                $muridData = $kelas->murid->map(function ($murid) {
                    return [
                        'user_id' => $murid->user_id,
                        'kelas_id' => $murid->kelas_id,
                        'nama_murid' => $murid->name
                    ];
                });
            
                return [
                    'kelas_id' => $kelas->id,
                    'walikelas_id' => $kelas->walas_id,
                    'kelas' => $kelas->tingkat_kelas . " " . $kelas->jurusan,
                    'murids' => $muridData,  // Include murid data
                    'total_murid' => $muridData->count() 
                ];
            });

            $totalMurid = $kelasData->reduce(function ($carry, $kelas) {
                return $carry + $kelas['total_murid'];
            }, 0);
        
            $guruDetails = [
                'id' => $guru->user_id,
                'name' => $guru->name,
                'email' => $guru->user->email,
                'nip' => $guru->nip,
                'jenis_kelamin' => $guru->jenis_kelamin,
                'tgl_lahir' => $guru->tgl_lahir,
                'total_murid' => $totalMurid,
                'kelas' => $kelasData,
            ];
        
            return response()->json(['message' => 'Success', 'data' => $guruDetails]);
        }else{
            $response = ['status' => 500, 'message' => 'Akun tidak memiliki akses dikarenakan role yang berbeda'];
            return response()->json($response);
        }
        
    }
    
    // public function editprofile(Request $request){
    //     $murid = Murid::with('kelas', 'user')->where('user_id', $request->id)->first();
    //     $banyakkelas = Kelas::with('gurubk','walas')->get();

    //     $muridDetails = [
    //         'id' => $murid->user_id,
    //         'name' => $murid->name,
    //         'email' => $murid->user->email,
    //         'kelas_id' => $murid->kelas_id,
    //         'kelas' => $murid->kelas->tingkat_kelas . " " . $murid->kelas->jurusan, 
    //         'tingkat_kelas' => $murid->kelas->tingkat_kelas,
    //         'jurusan' => $murid->kelas->jurusan,
    //         'nipd' => $murid->nipd,
    //         'jenis_kelamin' => $murid->jenis_kelamin,
    //         'tgl_lahir' => $murid->tgl_lahir,
    //         'walikelas_id' => $murid->kelas->walas_id,
    //         'walikelas' => $murid->kelas->walas->name_guru,
    //         'gurubk_id' => $murid->kelas->gurubk_id,
    //         'gurubk' => $murid->kelas->gurubk->name,
    //     ];

    //     return response()->json(['message' => 'Success', 'data' => $muridDetails, 'kelas' => $banyakkelas]);

    // }

    public function updateProfile(Request $request, $id) {
        $murid = User::with('murid')->find($id);
        $guru = User::with('guru')->find($id);

        // dd($guru);

        if($murid !== null && $murid->role === 'murid'){
            $murid->update($request->all());
        
            if ($murid->murid) {
                $murid->murid->update($request->all());
        
                // Get related Kelas instance
                $kelas = Kelas::with('gurubk','walas')->where('id', $murid->murid->kelas_id)->first();
                
                // Make sure $kelas is not null before updating
                if ($kelas) {
                    // Specify the fields to be updated in Kelas
                    $kelas->update($request->all());
                }
            }
    
        return response()->json(['message' => 'Berhasil', 'data' => $murid]);
        }elseif($guru !== null && $guru->role === 'guru'){
            $guru->update($request->all());
        
            if ($guru->guru) {
                $guru->guru->update($request->all());
            }

            return response()->json(['message' => 'Berhasil', 'data' => $guru]);
        }else{
            return response()->json(['message' => 'No matching user role found for update operation'], 404);
        }      
    }


    public function updateJadwal(Request $request, $id) {
        $updatekonsul = Konseling::with('murid', 'gurus', 'layanan', 'walas')->find($id);
        $role = $request->input('role');
        
        if($updatekonsul !== null && ($role === 'murid' || $role === 'guru')){
            $updatekonsul->update($request->all());
            return response()->json(['message' => 'Berhasil', 'data' => $updatekonsul]);
        }
        
        return response()->json(['message' => 'Update failed, konsul not found or invalid role']);

    }


    public function deleteJadwal($id){
        $jadwal = Konseling::find($id);
        $jadwal->delete();
        return response()->json(['message' => 'Data berhasil dihapus', 'data' => $jadwal]);
    }


}