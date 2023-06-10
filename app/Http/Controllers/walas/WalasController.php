<?php

namespace App\Http\Controllers\walas;

use App\Models\Gurubk;
use App\Models\Walas;
use App\Models\Konseling;
use App\Models\User;
use App\Models\Murid;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as data;
use App\Models\Kerawanan;
use App\Http\Controllers\Controller;
use App\Models\JenisKerawanan;
use Illuminate\Http\Request;

class WalasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loggedInUserId = Auth::id();
        $kelasWalas = session('kelasWalas');
        $getjadwals = Konseling::whereHas('murid', function ($query) use ($kelasWalas) {
            $query->whereColumn('murids.user_id', 'konseling.murid_id');
        })
            ->whereHas('walas', function ($query) use ($loggedInUserId) {
                $query->whereColumn('walas.user_id', 'konseling.walas_id')
                    ->where('walas.user_id', $loggedInUserId);
            })
            ->whereHas('gurus', function ($query) {
                $query->whereColumn('gurubk.user_id', 'konseling.guru_id');
            })
            ->with('walas', 'murid', 'gurus')
            ->get();

        return view('walas.walas_konsultasi', compact('getjadwals'));
    }

    public function maindash()
    {
        $loggedInUserId = Auth::id();
        $kelasWalas = session('kelasWalas');
        $getjadwals = Konseling::whereHas('murid', function ($query) use ($kelasWalas) {
            $query->whereColumn('murids.user_id', 'konseling.murid_id');
        })
            ->whereHas('walas', function ($query) use ($loggedInUserId) {
                $query->whereColumn('walas.user_id', 'konseling.walas_id')
                    ->where('walas.user_id', $loggedInUserId);
            })
            ->whereHas('gurus', function ($query) {
                $query->whereColumn('gurubk.user_id', 'konseling.guru_id');
            })
            ->whereHas('layanans', function ($query) {
                $query->whereColumn('layanans.id', 'konseling.layanan_id');
            })
            ->with('walas', 'murid', 'gurus', 'layanans')
            ->get();

        return view('walas.walas_dashboard', compact('getjadwals'));
    }

    public function petakerawanan()
    {
        $getJenisKerawanan = JenisKerawanan::all();
        $loggedInUserId = Auth::id();

        // $getmurids = Murid::where('kelas_id', Auth::id())->get();
        // $getMurid = Murid::whereHas('kelass', function ($query) use ($loggedInUserId) {
        //     $query->whereColumn('kelas.id', 'murids.kelas_id')
        //         ->where('kelas.walas_id', $loggedInUserId);
        // })
        //     ->with('kelass')
        //     ->get();

        $getWalas = Walas::whereHas('kelass', function ($query) use ($loggedInUserId) {
            $query->whereColumn('kelas.walas_id', 'walas.user_id')
                ->where('kelas.walas_id', $loggedInUserId);
        })
            ->with('kelass')
            ->get();

        $getGurubk = Gurubk::whereHas('kelass', function ($query) use ($loggedInUserId) {
            $query->whereColumn('kelas.gurubk_id', 'gurubk.user_id')
                ->where('kelas.walas_id', $loggedInUserId);
        })
            ->with('kelass')
            ->get();

        $getkerawanan =
            Kerawanan::whereHas('murids', function ($query) {
                $query->whereColumn('murids.user_id', 'peta_kerawanan.murid_id');
            })
            ->whereHas('walas', function ($query) use ($loggedInUserId) {
                $query->whereColumn('walas.user_id', 'peta_kerawanan.walas_id')
                    ->where('walas.user_id', $loggedInUserId);
            })
            ->whereHas('jenis_kerawanan', function ($query) {
                $query->whereColumn('jenis_kerawanan.id', 'peta_kerawanan.kerawanan_id');
            })
            ->with('walas', 'murids', 'jenis_kerawanan')
            ->get();

        return view('walas.walas_kerawanan', compact('getkerawanan', 'getJenisKerawanan', 'getWalas', 'getGurubk'));
    }
    public function jadwalkonsul()
    {
        return view('walas.walas_jadwal');
    }
    /**
     * Show the form for creating a new resource.
     */
    // public function createkelas(Request $request)
    // {
    //     $getkelas = Kelas::all();

    //     $request->validate([
    //         'tingkat_kelas' => 'required',
    //         'gurubk_id' => 'required',
    //         'walas_id' => 'required',
    //         'jurusan' => 'required',
    //     ]);

    //     $user = ke::create([
    //         'tingkat_kelas' => $request->input('tingkat_kelas'),
    //         'gurubk_id' => $request->input('gurubk_id'),
    //         'walas_id' => $request->input('walas_id'),
    //         'jurusan' => $request->input('jurusan'),
    //     ]);


    //     return redirect('/admin/kelas')->with(compact('getkelas'));
    // }
    public function create(Request $request)
    {

        $request->validate([
            'gurubk_id' => 'required',
            'walas_id' => 'required',
            'murid_id' => 'required',
            'kerawanan_id' => 'required',
        ]);

        $user = Kerawanan::create([
            'gurubk_id' => $request->input('gurubk_id'),
            'walas_id' => $request->input('walas_id'),
            'murid_id' => $request->input('murid_id'),
            'kerawanan_id' => $request->input('kerawanan_id'),
        ]);

        return redirect('/walas/peta-kerawanan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $getJenisKerawanan = JenisKerawanan::all();
        $loggedInUserId = Auth::id();
        $getkerawanans = Kerawanan::find($id);
        $getMurid = Murid::whereHas('kelass', function ($query) use ($loggedInUserId) {
            $query->whereColumn('kelas.id', 'murids.kelas_id')
                ->where('kelas.walas_id', $loggedInUserId);
        })
            ->with('kelass')
            ->get();

        $getWalas = Walas::whereHas('kelass', function ($query) use ($loggedInUserId) {
            $query->whereColumn('kelas.walas_id', 'walas.user_id')
                ->where('kelas.walas_id', $loggedInUserId);
        })
            ->with('kelass')
            ->get();

        $getGurubk = Gurubk::whereHas('kelass', function ($query) use ($loggedInUserId) {
            $query->whereColumn('kelas.gurubk_id', 'gurubk.user_id')
                ->where('kelas.walas_id', $loggedInUserId);
        })
            ->with('kelass')
            ->get();
        $getkerawanan = Kerawanan::whereHas('murids', function ($query) {
            $query->whereColumn('murids.user_id', 'peta_kerawanan.murid_id');
        })
            ->whereHas('walas', function ($query) use ($loggedInUserId) {
                $query->whereColumn('walas.user_id', 'peta_kerawanan.walas_id')
                    ->where('walas.user_id', $loggedInUserId);;
            })
            ->whereHas('jenis_kerawanan', function ($query) {
                $query->whereColumn('jenis_kerawanan.id', 'peta_kerawanan.kerawanan_id');
            })
            ->with('walas', 'murids')
            ->get();

        return view('walas.walas_editkerawanan', compact('getkerawanan','getMurid', 'getWalas','getGurubk','getJenisKerawanan','getkerawanans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $editkerawanan = Kerawanan::find($id);

        $editkerawanan->update($request->all());

        return redirect('/walas/peta-kerawanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deletelayanan = Kerawanan::find($id);
        $deletelayanan->delete();

        return redirect('/walas/peta-kerawanan');
    }
}
