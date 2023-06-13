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
    public function action(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            $authId = Auth::id();
            if ($query != '') {
                $data = Konseling::where(function ($q) use ($authId, $query) {
                    $q->where('walas_id', $authId)
                        ->where(function ($q) use ($query) {
                            $q->Where('id', 'like', '%' . $query . '%')
                                ->orWhere('status', 'like', '%' . $query . '%')
                                ->orWhere('tempat', 'like', '%' . $query . '%')
                                // ->orWhere('created_at', 'like', '%' . $query . '%')
                                ->orWhereHas('murids', function ($q) use ($query) {
                                    $q->where('name', 'like', '%' . $query . '%');
                                })
                                ->orWhereHas('guru', function ($q) use ($query) {
                                    $q->where('name', 'like', '%' . $query . '%');
                                })
                                ->orWhereHas('layanan', function ($q) use ($query) {
                                    $q->where('jenis_layanan', 'like', '%' . $query . '%');
                                });
                        });
                })
                ->orderBy('id', 'desc')
                ->get();
            } else {
                $data = Konseling::where(function ($query) use ($authId) {
                    $query->Where('walas_id', $authId);
                })
                    ->orderBy('id', 'desc')
                    ->get();
            }
        }
        $total_row = $data->count();
        if ($total_row > 0) {
            foreach ($data as $row) {
                    $output .= '
                        <tr>
                        <td>' . $row->id . '</td>
                        <td>' . $row->murids->name . '</td>
                        <td>' . $row->guru->name . '</td>
                        <td>' . $row->layanan->jenis_layanan . '</td>
                        <td>';
                        if ($row->status == 'pending') {
                            $output .= '<span class="badge badge-danger">' . $row->status . '</span>';
                        }
                        if ($row->status == 'accept') {
                            $output .= '<span class="badge badge-success">' . $row->status.'ed' . '</span>';
                        }
                        if ($row->status == 'complete') {
                            $output .= '<span class="badge badge-info">' . $row->status.'d' . '</span>';
                        }
                        if ($row->status == 'reschedule') {
                            $output .= '<span class="badge badge-warning">' . $row->status.'d' . '</span>';
                        }
                        $output .= '</td>
                        <td>' . $row->created_at . '</td>
                        <td>
                        <a href="/walas/hasil-konsultasi/details/' . $row->id . '">
                        <button type="button" class="btn btn-primary btn-icon-text">
                            <i class="mdi mdi-file-check btn-icon-prepend"></i>
                            Details
                        </button></a>
                    </td>
                        </tr>
                        ';
              
            }
        } else {
            $output = '
                <tr>
                    <td align="center" colspan="5">No Data Found</td>
                </tr>
                ';
        }
        $data = array(
            'table_data'  => $output,
            'total_data'  => $total_row
        );
        echo json_encode($data);
    }

    public function maindash()
    {
        $loggedInUserId = Auth::id();
        $kelasWalas = session('kelasWalas');
        $getwalas = Walas::find($loggedInUserId);
        $kelas = Kelas::where('walas_id', $loggedInUserId)->first();
        $user = User::where('id', $loggedInUserId)->first();
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

        return view('walas.walas_dashboard', compact('user','getjadwals','getwalas','kelas'));
    }

    public function petakerawanan()
    {
        $getJenisKerawanan = JenisKerawanan::all();
        $loggedInUserId = Auth::id();
        $getkerawanans = Kerawanan::select('murid_id', 'walas_id','gurubk_id','kesimpulan')->distinct('murid_id')->get();

        $getMurid = Murid::whereHas('kelass', function ($query) use ($loggedInUserId){
            $query->whereColumn('kelas.id', 'murids.kelas_id')
            ->where('kelas.walas_id', $loggedInUserId);
        })
        ->with('kelass')
        ->get();
        
        $getWalas = Walas::whereHas('kelass', function ($query) use ($loggedInUserId){
            $query->whereColumn('kelas.walas_id', 'walas.user_id')
            ->where('kelas.walas_id', $loggedInUserId);
        })
        ->with('kelass')
        ->get();
        $getGurubk = Gurubk::whereHas('kelass', function ($query) use ($loggedInUserId){
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

        return view('walas.walas_kerawanan', compact('getkerawanan', 'getJenisKerawanan','getMurid','getWalas','getGurubk'));
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
        $getmurid = Murid::all();
        $getwalas = Walas::all();
        $loggedInUserId = Auth::id();
        $kelasWalas = session('kelasWalas');
        $getJenisKerawanan = JenisKerawanan::all();
        $getkerawanans = Kerawanan::find($id);
        $getkerawanan = Kerawanan::whereHas('murids', function ($query) use ($kelasWalas) {
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

        return view('walas.walas_editkerawanan', compact('getJenisKerawanan','getkerawanans','getkerawanan', 'getmurid', 'getwalas'));
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
            'kerawanan_id' => $request->kerawanan_id,
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
