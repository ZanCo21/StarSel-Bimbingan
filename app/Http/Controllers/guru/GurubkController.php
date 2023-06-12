<?php

namespace App\Http\Controllers\guru;

use Exception;
use App\Models\Kelas;
use App\Models\Murid;
use App\Models\Walas;
use App\Models\Layanan;
use App\Models\Kerawanan;
use App\Models\Konseling;
use App\Models\JenisKerawanan;
use Illuminate\Support\Facades\Auth;

use App\Exports\GuruBkExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
 
class GurubkController extends Controller
{

   // // export guru bk
   // public function GuruBkExport() {
   //    return Excel::download(new GuruBkExport, 'Data.xlsx');
   // }


   // guru-jadwal
   public function getmuridbykelas($id)
   {
      $murids = Murid::where('kelas_id', $id)->get();

      return response()->json($murids);
   }

   public function index()
   {
      $loggedInUserId = Auth::id();
      $kelas = Kelas::where('gurubk_id', $loggedInUserId)->get();
      $kelasIds = $kelas->pluck('id')->toArray();
      $getkonsul = Konseling::whereHas('kelas', function ($query) use ($kelasIds) {
         $query->whereIn('id', $kelasIds);
      })
         ->with('kelas', 'gurus')
         ->get();

      $getlayanan = Layanan::all();
      $getkelas = Kelas::where('gurubk_id', Auth::id())->get();
      return view('guru.konseling.guru_konseling', compact('getkelas', 'getkonsul', 'getlayanan'));
   }
   public function createkonsultasi(Request $request)
   {

      $murids = Konseling::create([
         'layanan_id' => $request->input('layanan_id'),
         'guru_id' => Auth::id(),
         'murid_id' => $request->input('murid_id'),
         'walas_id' => $request->input('walas_id'),
         'tema' => $request->input('tema'),
         'keluhan' => $request->input('keluhan'),
         'status' => $request->input('status'),
         'tanggal_konseling' => $request->input('tanggal_konseling'),
         'tempat' => $request->input('tempat'),
      ]);
      //   $updatekonsel = new Konseling;
      //   $updatekonsel->$request->all();
      // return response()->json($murids);
      return redirect('/guru/konseling');
   }

   public function deletekonsul($id)
   {
      $deleteguru = Konseling::find($id);
      $deleteguru->delete();

      return redirect('/guru/konseling');
   }

   public function getkonsul($id)
   {
       $getetkonsulpribadi = Konseling::find($id);
       $getlayanan = Layanan::all();
       $getkelas = Kelas::where('gurubk_id', Auth::id())->get();

       return view('guru.konseling.guru_editkonseling', compact('getetkonsulpribadi','getlayanan','getkelas'));
   }

   public function updatekonsul(Request $request, $id)
   {
      $updatekonsul = Konseling::find($id);

      $updatekonsul->update($request->all());

      return redirect('/guru/konseling');
   }
   // guru-jadwal end

   // guru-bimbinganpribadi
   public function viewbimbinganpribadi()
   {
      $getmurid = Murid::all();
      $getwalas = Walas::all();
      $getkelas = Kelas::where('gurubk_id', Auth::id())->get();

      $getjeniskerawanan = JenisKerawanan::all();

      $loggedInUserId = Auth::id();
      $getkerawanan = Kerawanan::where('gurubk_id', $loggedInUserId)->get();
      

      $id = 4;
      $getkonsul = Konseling::where('layanan_id', $id)->get();

      return view('guru.bimbingan.bimbingan_pribadi.guru_bimbingan_pribadi', compact('getkonsul', 'getkerawanan', 'getmurid', 'getwalas', 'getjeniskerawanan', 'getkelas'));
   }

   public function getmuridbimbinganpribadi($id)
   {
      $getkonsul = Konseling::find($id);
      $id = 4;
      $getkonsultable = Konseling::where('layanan_id', $id)->get();

      return view('guru.bimbingan.bimbingan_pribadi.guru_editbimbingan_pribadi', compact('getkonsul', 'getkonsultable'));
   }
   
   public function updatebimbingan_pribadi(Request $request, $id)
   {
       $request->validate([
           'hasil_konseling' => 'required',
       ]);
   
       $updatepribadi = Konseling::find($id);
   
       $updatepribadi->hasil_konseling = $request->hasil_konseling;
       $updatepribadi->status = 'complete';
       $updatepribadi->save();
   
       $id = 4;
       $getkonsul = Konseling::where('layanan_id', $id)->get();
       return redirect('/guru/konseling/bimbinganpribadi');
   }

   public function updatebimbingan_pribadi_pending(Request $request, $id)
   {
   
       $updatepribadi = Konseling::find($id);
   
       $updatepribadi->tanggal_konseling = $request->hasil_konseling;
       $updatepribadi->status = 'complete';
       $updatepribadi->save();
   
       $id = 4;
       $getkonsul = Konseling::where('layanan_id', $id)->get();
       return redirect('/guru/konseling/bimbinganpribadi');
   }
   

   public function createpeta(Request $request)
   {

      $request->validate([
         'walas_id' => 'required',
         'murid_id' => 'required',
         'kerawanan_id' => 'required',
      ]);

      $user = Kerawanan::create([
         'walas_id' => $request->input('walas_id'),
         'gurubk_id' =>  Auth::id(),
         'murid_id' => $request->input('murid_id'),
         'kerawanan_id' => $request->input('kerawanan_id'),
      ]);

      return redirect('/guru/konseling/bimbinganpribadi');
   }

   public function destroy(string $id)
   {
      $deletelayanan = Kerawanan::find($id);
      $deletelayanan->delete();

      return redirect('/guru/konseling/bimbinganpribadi');
   }

   public function edit($id)
   {
      $getmurid = Murid::all();
      $getwalas = Walas::all();
      $getkerawanan = Kerawanan::whereHas('murids', function ($query) {
         $query->whereColumn('murids.user_id', 'peta_kerawanan.murid_id');
      })
         ->whereHas('walas', function ($query) {
            $query->whereColumn('walas.user_id', 'peta_kerawanan.walas_id');
         })
         ->with('walas', 'murids')
         ->get();

      return view('guru.bimbingan.bimbingan_pribadi.guru_rawanbimbingan_pribadi', compact('getkerawanan', 'getmurid', 'getwalas'));
   }

   public function update_kerawanan_bimbingan_pribadi(Request $request, $id)
   {
      $updatekelas = Kerawanan::find($id);
      $updatekelas->update($request->all());

      return redirect('/guru/konseling/bimbinganpribadi');
   }





   // guru bimbingan sosial
      public function updatebimbingan_sosial(Request $request, $id)
   {
      $request->validate([
         'hasil_konseling' => 'required',
     ]);
 
     $updatepribadi = Konseling::find($id);
 
     $updatepribadi->hasil_konseling = $request->hasil_konseling;
     $updatepribadi->status = 'accept';
     $updatepribadi->save();
 
   //   $id = 4;
   //   $getkonsul = Konseling::where('layanan_id', $id)->get();

      return redirect('/guru/konseling/bimbingansosial');
   }

   public function getmuridbimbingansosial($id)
   {
      $getkonsul = Konseling::find($id);
      // $id = 4;
      // $getkonsultable = Konseling::where('layanan_id', $id)->get();

      return view('guru.bimbingan.bimbingan_sosial.guru_editbimbingan_sosial',compact('getkonsul'));
   }

   public function viewbimbingansosial()
   {
      $getlayanan = Layanan::all();
      $getkelas = Kelas::where('gurubk_id', Auth::id())->get();
      $id = 3;
      $getkonsul = Konseling::where('layanan_id', $id)->get();
      return view('guru.bimbingan.bimbingan_sosial.guru_bimbingan_sosial', compact('getkelas','getlayanan','getkonsul'));
   }

   public function addbimbingansosial(Request $request)
   {
      try {
         //get data
         $layanan_id = $request->layanan_id;
         $guru_id = Auth::id();
         $murid_id = $request->murid_id;
         $walas_id = $request->input('walas_id');
         $tema = $request->input('tema');
         $keluhan = $request->input('keluhan');
         $status = 'pending';
         $tanggal_konseling = $request->input('tanggal_konseling');
         $tempat = $request->input('tempat');
         $insertData = [];
         for ($i = 0; $i < count($murid_id); $i++) {
            $insertData[] = [
                'layanan_id' => $layanan_id,
                'guru_id' => $guru_id,
                'murid_id' => $murid_id[$i],
                'walas_id' => $walas_id,
                'tema' => $tema,
                'keluhan' => $keluhan,
                'status' => $status,
                'tanggal_konseling' => $tanggal_konseling,
                'tempat' => $tempat,
            ];
        }

         Konseling::insertOrIgnore($insertData);

         return redirect('/guru/konseling/bimbingansosial');
         // return response()->json(['status' => true, 'message' => "Berhasil Simpan"]);
     } catch (Exception $e) {
         return response()->json(['status' => false, 'message' => $e->getMessage()]);
     }
   }
   /*  guru bibimngan sosial end */

   // guru bimbingan karir
   public function karirview()
   {
      $id = 2;
      
      $getkonsulkarir = Konseling::where('layanan_id', $id)->get();

      return view('guru.bimbingan.bimbingan_karir.guru_bimbingan_karir',compact('getkonsulkarir'));
   }

   public function getmuridbimbingankarir($id)
   {
      $getkonsul = Konseling::find($id);
      // $id = 4;
      // $getkonsultable = Konseling::where('layanan_id', $id)->get();

      return view('guru.bimbingan.bimbingan_karir.guru_editbimbingan_karir',compact('getkonsul'));
   }

   public function updatebimbingan_karir(Request $request, $id)
   {
      $request->validate([
         'tanggal_konseling' => 'required',
     ]);
 
     $updatepribadi = Konseling::find($id);
 
     $updatepribadi->tanggal_konseling = $request->tanggal_konseling;
     $updatepribadi->tempat = $request->tempat;
     $updatepribadi->status = 'accept';
     $updatepribadi->save();
 
     return redirect('/guru/konseling/bimbingankarir');
   }
   // guru bimbingan karir end
}
