<?php

namespace App\Http\Controllers\walas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Konseling;
use Illuminate\Support\Facades\Auth;

class HasilBimbinganController extends Controller
{
    public function index()
    {
        return view('walas.walas_bimbingan');
    }
    public function actions_hasil(Request $request)
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
                if ($row->layanan->jenis_layanan == 'Bimbingan Belajar' && $row->kesimpulan == null && $row->status == 'complete') {

                    $output .= '
                        <tr>
                        <td>' . $row->id . '</td>
                        <td>' . $row->murids->name . '</td>
                        <td>' . $row->guru->name . '</td>
                        <td>';
                    if ($row->status == 'complete') {
                        $output .= '<span class="badge badge-info">' . $row->status . 'd' . '</span>';
                    }
                    $output .= '</td>
                        <td>' . $row->created_at . '</td>
                        <td>. <a href="/walas/hasil-konsultasi/kesimpulan/' . $row->id . '">
                        <label class="badge badge-success">Kesimpulan</label>
                    </a>
                    <a href="/walas/hasil-konsultasi/details/' . $row->id . '">
                <label class="badge badge-primary">Details</label>
            </a>
                    .</td>
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
}
