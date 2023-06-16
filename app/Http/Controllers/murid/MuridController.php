<?php

namespace App\Http\Controllers\murid;

use App\Models\User;
use App\Models\Murid;
use App\Models\Walas;
use App\Models\Gurubk;
use App\Models\Layanan;
use App\Models\Konseling;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MuridController extends Controller
{
    public function viewKonselingkarir()
    {
        $muridId = Auth::id();
        $loggedUserName = Auth::user()->name;

        $konseling = Konseling::with('layanan', 'murids', 'gurus', 'walas', 'kelas')
            ->whereHas('murids', function ($query) use ($loggedUserName) {
                $query->whereHas('user', function ($query) use ($loggedUserName) {
                    $query->where('name', $loggedUserName);
                });
            })
            ->get();
        $getlayanan = Layanan::whereIn('id', [1, 3, 4])->get();
        $kelasMurid = Murid::with('kelas')->find($muridId);

        return view('murid.konseling.murid_add_karir', compact('konseling', 'getlayanan', 'kelasMurid', 'muridId'));
    }

    public function profilMurid()
    {
        $muridnya = Auth::user();
        $detailsiswa = User::with('murid')->find($muridnya->id);
        return view('murid.murid_dashboard', compact('muridnya', 'detailsiswa'));
    }

    public function viewKonseling()
    {
        $muridId = Auth::id();
        $loggedUserName = Auth::user()->name;

        $konseling = Konseling::with('layanan', 'murids', 'gurus', 'walas', 'kelas')
            ->whereHas('murids', function ($query) use ($loggedUserName) {
                $query->whereHas('user', function ($query) use ($loggedUserName) {
                    $query->where('name', $loggedUserName);
                });
            })
            ->get();
        $getlayanan = Layanan::whereIn('id', [1, 3, 4])->get();
        $kelasMurid = Murid::with('kelas')->find($muridId);

        return view('murid.konseling.murid_konseling', compact('konseling', 'getlayanan', 'kelasMurid', 'muridId'));
    }

    public function createKonsultasi(Request $request)
    {
        $konsultasi = Konseling::create([
            'layanan_id' => $request->input('layanan_id'),
            'murid_id' => $request->input('murid_id'),
            'walas_id' => $request->input('walas_id'),
            'guru_id' => $request->input('gurubk_id'),
            'tema' => $request->input('tema'),
            'keluhan' => $request->input('keluhan'),
            'status' => 'pending',
            'tanggal_konseling' => $request->input('tanggal_konseling'),
            'tempat' => $request->input('tempat'),
        ]);

        return redirect('/murid/konseling');
    }

    public function detailKonsultasi($id)
    {
        $muridId = Auth::id();
        $muridnya = Auth::user();
        // $loggedUserName = Auth::user()->name;
        $getdetail = Konseling::with('layanan', 'murids', 'gurus', 'walass', 'kelas')->findOrFail($id);
        $kelasMurid = Murid::with('kelas')->find($muridId);
        $detailsiswa = User::with('murid')->find($muridnya->id);

        return view('murid.konseling.detail_murid_konseling', compact('getdetail', 'detailsiswa'));
    }
}
