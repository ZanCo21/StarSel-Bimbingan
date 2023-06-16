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

class SearchController extends Controller
{
    public function pending_view()
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

        return view('walas.walas_pending', compact('getjadwals'));
    }
    public function actions_pending(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            $authId = Auth::id();
            if ($query != '') {
                $data = Konseling::where(function ($q) use ($authId, $query) {
                    $q->where('walas_id', $authId)
                        ->where(function ($q) use ($query) {
                            $q->where('layanan_id', 'like', '%' . $query . '%')
                                ->orWhere('id', 'like', '%' . $query . '%')
                                ->orWhere('status', 'like', '%' . $query . '%')
                                ->orWhere('tempat', 'like', '%' . $query . '%')
                                ->orWhere('created_at', 'like', '%' . $query . '%')
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
                $data = Konseling::where(function ($q) use ($authId) {
                    $q->Where('walas_id', $authId);
                })
                    ->orderBy('id', 'desc')
                    ->get();
            }
        }
        $total_row = $data->count();
        if ($total_row > 0) {
            foreach ($data as $row) {
                if ($row->status == 'pending') {

                    $output .= '
                        <tr>
                        <td>' . $row->id . '</td>
                        <td>' . $row->murids->name . '</td>
                        <td>' . $row->guru->name . '</td>
                        <td>' . $row->layanan->jenis_layanan . '</td>
                        <td>';
                    $output .= '<span class="badge badge-danger">' . $row->status . '</span>';
                    $output .=
                        '</td>
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

    public function accept_view()
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

        return view('walas.walas_accept', compact('getjadwals'));
    }
    public function actions_accept(Request $request)
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
                if ($row->status == 'accept') {
                    $output .= '
                        <tr>
                        <td>' . $row->id . '</td>
                        <td>' . $row->murids->name . '</td>
                        <td>' . $row->guru->name . '</td>
                        <td>' . $row->layanan->jenis_layanan . '</td>
                        <td>';
                    $output .= '<span class="badge badge-success">' . $row->status . 'ed' . '</span>';
                    $output .=
                        '</td>
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
    public function complete_view()
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

        return view('walas.walas_complete', compact('getjadwals'));
    }
    public function actions_complete(Request $request)
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
                    ->orderBy('tanggal_konseling', 'asc')
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
                if ($row->status == 'complete') {
                    $output .= '
                        <tr>
                        <td>' . $row->id . '</td>
                        <td>' . $row->murids->name . '</td>
                        <td>' . $row->guru->name . '</td>
                        <td>' . $row->layanan->jenis_layanan . '</td>
                        <td>';
                    $output .= '<span class="badge badge-info">' . $row->status . 'd' . '</span>';
                    $output .=
                        '</td>
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

    public function reschedule_view()
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

        return view('walas.walas_reschedule', compact('getjadwals'));
    }
    public function actions_reschedule(Request $request)
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
                if ($row->status == 'reschedule') {
                    $output .= '
                        <tr>
                        <td>' . $row->id . '</td>
                        <td>' . $row->murids->name . '</td>
                        <td>' . $row->guru->name . '</td>
                        <td>' . $row->layanan->jenis_layanan . '</td>
                        <td>';
                    $output .= '<span class="badge badge-warning">' . $row->status . 'd' . '</span>';
                    $output .=
                        '</td>
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


    public function actions_kerawanan(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            $authId = Auth::id();
            if ($query != '') {
                $data = Kerawanan::where(function ($q) use ($authId, $query) {
                    $q->where('walas_id', $authId)
                        ->where(function ($q) use ($query) {
                            $q->where('id', 'like', '%' . $query . '%')
                                // ->orWhere('id', 'like', '%' . $query . '%')
                                // ->orWhere('status', 'like', '%' . $query . '%')
                                ->orWhere('kesimpulan', 'like', '%' . $query . '%')
                                // ->orWhere('created_at', 'like', '%' . $query . '%')
                                ->orWhereHas('murid', function ($q) use ($query) {
                                    $q->where('name', 'like', '%' . $query . '%');
                                })
                                ->orWhereHas('gurus', function ($q) use ($query) {
                                    $q->where('name', 'like', '%' . $query . '%');
                                })
                                ->orWhereHas('jeniskerawanan', function ($q) use ($query) {
                                    $q->where('jenis_kerawanan', 'like', '%' . $query . '%');
                                });
                        });
                })
                    ->orderBy('id', 'desc')
                    ->get();
            } else {
                $subquery = Kerawanan::where('walas_id', $authId)
                ->selectRaw('MAX(id) as id')
                ->groupBy('murid_id');
            
            $data = Kerawanan::whereIn('id', $subquery)
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
        <td>' . $row->murid->name . '</td>
        <td>' . $row->gurus->name . '</td>
        <td>' . $row->created_at . '</td>
        <td>' .
                    '<a href="/walas/peta-kerawanan/details/' . $row->murid_id . '">
                <label class="badge badge-primary">Details</label>
            </a>' .

                    '<a href="/walas/peta-kerawanan/get/' . $row->id . '">
                <label class="badge badge-success">Edit</label>
            </a>' .

                    '<a href="/walas/peta-kerawanan/delete/' . $row->id . '">
                <label class="badge badge-danger">Delete</label>
            </a>'
                    . '</td>
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
}
