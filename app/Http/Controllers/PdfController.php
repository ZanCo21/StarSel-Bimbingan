<?php

namespace App\Http\Controllers;

use App\Models\Gurubk;
use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\Kerawanan;
use App\Models\JenisKerawanan;
use App\Models\Walas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    public function guruexportPDF()
    {
        $loggedInUserId = Auth::id();
        $gurubk = Gurubk::where('user_id', $loggedInUserId)->first();

        $data = Kerawanan::where('gurubk_id', $loggedInUserId)->get(); // Ubah YourModel dengan model yang sesuai
        $imagePath = public_path('/assets/images/logo/logo.png');
        $imageData = file_get_contents($imagePath);
        $base64Image = base64_encode($imageData);
        $tanggal = Carbon::now();


        $pdf = new Dompdf();
        $pdf->setPaper('A4', 'portrait');
        $pdf->loadHtml(view('guru.pdf.export_guru', compact('data', 'base64Image', 'tanggal', 'gurubk')));
        // dd($pdf);
        $pdf->render();

        $pdf->stream('peta_kewaranan_guru.pdf');
    }

    public function walasexportPDF()
    {
        $loggedInUserId = Auth::id();

        $getwalas = Walas::where('user_id', $loggedInUserId)->first();
        $subquery = Kerawanan::where('walas_id', Auth::id())
                ->selectRaw('MIN(id) as id')
                ->groupBy('murid_id');
            
            $data = Kerawanan::whereIn('id', $subquery)
                ->orderBy('id', 'desc')
                ->get();
   $getjenis = JenisKerawanan::all();
   $getkerawanan = Kerawanan::select('murid_id', 'walas_id','gurubk_id','kesimpulan', 'kerawanan_id')->get();

        $imagePath = public_path('/assets/images/logo/logo.png');
        $imageData = file_get_contents($imagePath);
        $base64Image = base64_encode($imageData);
        $tanggal = Carbon::now();


        $pdf = new Dompdf();
        $pdf->setPaper('A4', 'portrait');
        $pdf->loadHtml(view('walas.pdf.export_walas', compact('getjenis','data', 'base64Image', 'tanggal', 'getwalas')));
        // dd($pdf);
        $pdf->render();

        $pdf->stream('peta_kewaranan_walas.pdf');
    }
}
