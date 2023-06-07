<?php

namespace App\Http\Controllers\walas;

use App\Models\Gurubk;
use App\Models\Walas;
use App\Models\Konseling;
use App\Models\User;
use App\Models\Murid;
use App\Models\Kelas;
use App\Models\Kerawanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WalasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getjadwals = Konseling::whereHas('murids', function ($query) {
            $query->whereColumn('murids.user_id', 'konseling.murid_id');
        })
        ->whereHas('gurus', function ($query) {
            $query->whereColumn('gurubk.user_id', 'konseling.guru_id');
        })
        ->with('gurus','murids')
        ->get();
        
        return view('walas.walas_konsultasi', compact('getjadwals'));
    }

    public function maindash() {
        $getjadwals = Konseling::whereHas('murids', function ($query) {
            $query->whereColumn('murids.user_id', 'konseling.murid_id');
        })
        ->whereHas('gurus', function ($query) {
            $query->whereColumn('gurubk.user_id', 'konseling.guru_id');
        })
        ->with('gurus','murids')
        ->get();
        
        return view('walas.walas_dashboard', compact('getjadwals'));
    }

    public function petakerawanan() {
        $getmurid = Murid::all();
        $getwalas = Walas::all();
        $getkerawanan = Kerawanan::whereHas('murids', function ($query) {
            $query->whereColumn('murids.user_id', 'peta_kerawanan.murid_id');
        })
        ->whereHas('walas', function ($query) {
            $query->whereColumn('walas.user_id', 'peta_kerawanan.walas_id');
        })
        ->with('walas','murids')
        ->get();

        return view('walas.walas_kerawanan', compact('getkerawanan','getmurid','getwalas'));
    }
    public function jadwalkonsul(){
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
            'walas_id' => 'required',
            'murid_id' => 'required',
            'jenis_kewaranan' => 'required',
        ]);

        $user = Kerawanan::create([
            'walas_id' => $request->input('walas_id'),
            'murid_id' => $request->input('murid_id'),
            'jenis_kewaranan' => $request->input('jenis_kewaranan'),
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
        $getmurid = Murid::all();
        $getwalas = Walas::all();
        $getkerawanan = Kerawanan::whereHas('murids', function ($query) {
            $query->whereColumn('murids.user_id', 'peta_kerawanan.murid_id');
        })
        ->whereHas('walas', function ($query) {
            $query->whereColumn('walas.user_id', 'peta_kerawanan.walas_id');
        })
        ->with('walas','murids')
        ->get();

        return view('walas.walas_editkerawanan', compact('getkerawanan','getmurid','getwalas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $editkerawanan = Kerawanan::find($id);
    
        $dt1 = [
            'walas_id' => $request->walas_id,
            'murid_id' => $request->murid_id,
            'jenis_kewaranan' => $request->jenis_kewaranan,
        ];
        $editkerawanan->update($dt1);
    
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
