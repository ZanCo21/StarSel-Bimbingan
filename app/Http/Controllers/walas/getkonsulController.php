<?php

namespace App\Http\Controllers\walas;

use App\Http\Controllers\Controller;

use App\Models\Konseling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class getkonsulController extends Controller
{
    public function index($id) {

        $konsul = Konseling::find($id);
        return view('walas.walas_detail_jadwal', compact('konsul'));
    }
    public function bimbingan_kesimpulan($id){
        $konsul = Konseling::find($id);
        return view('walas.walas_kesimpulan',compact('konsul'));
    }
    public function action_kesimpulan(Request $request, $id) {
        $updatekonsul = Konseling::findOrFail($id);

    $validatedData = $request->validate([
        'kesimpulans' => 'required|string',
    ]);

    $updatekonsul->kesimpulan = $validatedData['kesimpulans'];

    $updatekonsul->save();

        return redirect('/walas/hasil-bimbingan-sosial');
    }
}
