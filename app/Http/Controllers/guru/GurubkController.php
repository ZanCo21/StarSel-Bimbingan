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
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Gurubk;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Exports\KerawananHasilExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
 
class GurubkController extends Controller
{

      // export kerawanan
   public function KerawananHasilExportExcel() {
      
      return Excel::download(new KerawananHasilExport, 'data_hasil_kerawanan_murid.xlsx');
   }

   // guru-jadwal
   public function viewdashboardguru()
   {
      $dataguru = Auth::id();
      $getguruuser = User::where('id', $dataguru)->first();
      $getguru = Gurubk::where('user_id', $dataguru)->first();

      return view('guru.guru_dashboard', compact('getguru','getguruuser'));
   }

   public function destroykonseling(string $id)
   {
      $deletelayanan = Konseling::find($id);
      $deletelayanan->delete();

      return redirect('/guru/konseling');
   }

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
      $getkonsul = Konseling::where('guru_id', $loggedInUserId)->get();

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
      return redirect('/guru/konseling/bimbinganpribadi');
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

      return view('guru.konseling.guru_editkonseling', compact('getetkonsulpribadi', 'getlayanan', 'getkelas'));
   }

   public function updatekonsul(Request $request, $id)
   {
      $updatekonsul = Konseling::find($id);

      $updatekonsul->update($request->all());

      return redirect('/guru/konseling');
   }
   // guru-jadwal end

   // guru-bimbinganpribadi


   // detail kerawanan
   public function getpribadidetail($id)
   {
      $getdetail = Konseling::find($id);

      return view('guru.bimbingan.bimbingan_pribadi.guru_bimbingan_pribadi_detail', compact('getdetail'));
   }

   public function getdetail($userId)
   {

      $kerawanandetail = Kerawanan::where('murid_id', $userId)->get()
         ->groupBy('kerawanan_id')
         ->map(function ($item) {
            return $item->first();
         })
         ->unique('kerawanan_id')
         ->values();



      return view('guru.bimbingan.bimbingan_pribadi.guru_petakerawanan_detail', compact('kerawanandetail'));
   }


   public function viewbimbinganpribadi()
   {
      $getmurid = Murid::all();
      $getwalas = Walas::all();
      $getkelas = Kelas::where('gurubk_id', Auth::id())->get();
      $getjeniskerawanan = JenisKerawanan::all();


      $id = 4;
      $getkonsul = Konseling::where('layanan_id', $id)->get();

      $loggedInUserId = Auth::id();

      // $getkerawanan = DB::table('peta_kerawanan')
      // ->select('murid_id', 'kerawanan_id', DB::raw('count(*) as jumlah'))
      // ->where('gurubk_id', $loggedInUserId);

      $getkerawanan = Kerawanan::select('murid_id', 'walas_id','gurubk_id','kesimpulan')->distinct('murid_id')->get();

         

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

   // pending
   public function getmuridbimbinganpribadipending($id)
   {
      $getkonsul = Konseling::find($id);

      return view('guru.bimbingan.bimbingan_pribadi.guru_bimbingan_pribadi_pending', compact('getkonsul'));
   }

   public function updatebimbinganpribadipending(Request $request, $id)
   {
      $hasilKonselingtanggal = $request->tanggal_konseling;
      $hasilKonselingtempat = $request->tempat;
      $requestData = Konseling::find($id);

      if (empty($hasilKonselingtanggal) && !empty($hasilKonselingtempat)) {

         $requestData->status = 'accept';
         $requestData->tempat = $hasilKonselingtempat;
         $requestData->save();


         return redirect('/guru/konseling/bimbinganpribadi');
      } elseif (!empty($hasilKonselingtanggal) && !empty($hasilKonselingtempat)) {
         
         $requestData->status = 'reschedule';
         $requestData->tanggal_konseling = $hasilKonselingtanggal;
         $requestData->tempat = $hasilKonselingtempat;
         $requestData->save();

         
         return redirect('/guru/konseling/bimbinganpribadi');
      } else {
         return redirect('/guru/konseling/bimbinganpribadi');
      }
   }




   public function createpeta(Request $request)
   {

      try {
         //get data
         $walas_id = $request->walas_id;
         $guru_id = Auth::id();
         $murid_id = $request->murid_id;
         $kerawanan_id = $request->kerawanan_id;

         $insertData = [];
         for ($i = 0; $i < count($kerawanan_id); $i++) {
            $insertData[] = [
               'walas_id' => $walas_id,
               'gurubk_id' => $guru_id,
               'murid_id' => $murid_id,
               'kerawanan_id' => $kerawanan_id[$i],
            ];
         }

         Kerawanan::insertOrIgnore($insertData);

         return redirect('/guru/konseling/bimbinganpribadi');
      } catch (Exception $e) {
         return response()->json(['status' => false, 'message' => $e->getMessage()]);
      }
      // $request->validate([
      //    'walas_id' => 'required',
      //    'murid_id' => 'required',
      //    'kerawanan_id' => 'required',
      // ]);

      // $user = Kerawanan::create([
      //    'walas_id' => $request->input('walas_id'),
      //    'gurubk_id' =>  Auth::id(),
      //    'murid_id' => $request->input('murid_id'),
      //    'kerawanan_id' => $request->input('kerawanan_id'),
      // ]);

      // return redirect('/guru/konseling/bimbinganpribadi');
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

   // peta kerawanan
   public function addpetakerawanan_kesimpulan(Request $request, $murid_id)
   {
      $request->validate([
         'kesimpulan' => 'required',
      ]);

      $addkesimpulan = Kerawanan::where('murid_id', $murid_id)->update(['kesimpulan' => $request->kesimpulan]);


      return redirect('/guru/konseling/bimbinganpribadi');
   }

   public function update_kerawanan_bimbingan_pribadi(Request $request, $id)
   {
      $updatekelas = Kerawanan::find($id);
      $updatekelas->update($request->all());

      return redirect('/guru/konseling/bimbinganpribadi');
   }

   public function petakerawanan_kesimpulan($id)
   {
      $getkerawanan = Kerawanan::where('murid_id', $id)->first();

      return view('guru.bimbingan.bimbingan_pribadi.guru_petakerawanan_tindakan', compact('getkerawanan'));
   }
   // guru pribadi end





   // guru bimbingan sosial
   public function getsosialdetail($id)
   {
      $getdetail = Konseling::find($id);

      return view('guru.bimbingan.bimbingan_sosial.guru_bimbingan_sosial_detail', compact('getdetail'));
   }

   public function getmuridbimbingansosialpending($id)
   {
      $getkonsul = Konseling::find($id);

      return view('guru.bimbingan.bimbingan_sosial.guru_editbimbingan_sosial_pending', compact('getkonsul'));
   }

   public function updatebimbingansosialpending(Request $request, $id)
   {
      $hasilKonselingtanggal = $request->tanggal_konseling;
      $hasilKonselingtempat = $request->tempat;
      $requestData = Konseling::find($id);

      if (empty($hasilKonselingtanggal) && !empty($hasilKonselingtempat)) {
         
         $requestData->status = 'accept';
         $requestData->tempat = $hasilKonselingtempat;
         $requestData->save();

         
         return redirect('/guru/konseling/bimbingansosial');
      } elseif (!empty($hasilKonselingtanggal) && !empty($hasilKonselingtempat)) {
         
         $requestData->status = 'reschedule';
         $requestData->tanggal_konseling = $hasilKonselingtanggal;
         $requestData->tempat = $hasilKonselingtempat;
         $requestData->save();

         
         return redirect('/guru/konseling/bimbingansosial');
      } else {
         return redirect('/guru/konseling/bimbingansosial');
      }
   }

   public function updatebimbingan_sosial(Request $request, $id)
   {
      $request->validate([
         'hasil_konseling' => 'required',
      ]);

      $updatepribadi = Konseling::find($id);

      $updatepribadi->hasil_konseling = $request->hasil_konseling;
      $updatepribadi->status = 'complete';
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

      return view('guru.bimbingan.bimbingan_sosial.guru_editbimbingan_sosial', compact('getkonsul'));
   }

   public function viewbimbingansosial()
   {
      $getlayanan = Layanan::all();
      $getkelas = Kelas::where('gurubk_id', Auth::id())->get();
      $id = 3;
      $getkonsul = Konseling::where('layanan_id', $id)->get();
      return view('guru.bimbingan.bimbingan_sosial.guru_bimbingan_sosial', compact('getkelas', 'getlayanan', 'getkonsul'));
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
         $status = $request->input('status');
         // $status = 'accept';
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
      } catch (Exception $e) {
         return response()->json(['status' => false, 'message' => $e->getMessage()]);
      }
   }
   /*  guru bibimngan sosial end */

   // guru bimbingan karir
   public function getkarirdetail($id)
   {
      $getdetail = Konseling::find($id);

      return view('guru.bimbingan.bimbingan_karir.guru_bimbingan_karir_detail', compact('getdetail'));
   }

   public function updatebimbingankarirpending(Request $request, $id)
   {
      $hasilKonselingtanggal = $request->tanggal_konseling;
      $hasilKonselingtempat = $request->tempat;
      $requestData = Konseling::find($id);

      if (empty($hasilKonselingtanggal) && !empty($hasilKonselingtempat)) {
         $requestData->status = 'accept';
         $requestData->tempat = $hasilKonselingtempat;
         $requestData->save();


         return redirect('/guru/konseling/bimbingankarir');
      } elseif (!empty($hasilKonselingtanggal) && !empty($hasilKonselingtempat)) {
         $requestData->status = 'reschedule';
         $requestData->tanggal_konseling = $hasilKonselingtanggal;
         $requestData->tempat = $hasilKonselingtempat;
         $requestData->save();


         return redirect('/guru/konseling/bimbingankarir');
      } else {
         return back()->withErrors($request->errors())->withInput();
      }
   }

   public function getmuridbimbingankarirpending($id)
   {
      $getkonsul = Konseling::find($id);

      return view('guru.bimbingan.bimbingan_karir.guru_editbimbingan_karir_pending', compact('getkonsul'));
   }

   public function karirview()
   {
      $id = 2;

      $getkonsulkarir = Konseling::where('layanan_id', $id)->get();

      return view('guru.bimbingan.bimbingan_karir.guru_bimbingan_karir', compact('getkonsulkarir'));
   }

   public function getmuridbimbingankarir($id)
   {
      $getkonsul = Konseling::find($id);
      // $id = 4;
      // $getkonsultable = Konseling::where('layanan_id', $id)->get();

      return view('guru.bimbingan.bimbingan_karir.guru_editbimbingan_karir', compact('getkonsul'));
   }

   public function updatebimbingan_karir(Request $request, $id)
   {
      $request->validate([
         'hasil_konseling' => 'required',
      ]);

      $updatepribadi = Konseling::find($id);

      $updatepribadi->hasil_konseling = $request->hasil_konseling;
      $updatepribadi->status = 'complete';
      $updatepribadi->save();

      return redirect('/guru/konseling/bimbingankarir');
   }

   public function addbimbingankarir(Request $request)
   {
      try {
         //get data
         $layanan_id = $request->layanan_id;
         $guru_id = Auth::id();
         $murid_id = $request->murid_id;
         $walas_id = $request->input('walas_id');
         $tema = $request->input('tema');
         $keluhan = $request->input('keluhan');
         $status = $request->input('status');
         // $status = 'accept';
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

         return redirect('/guru/konseling/bimbingankarir');
      } catch (Exception $e) {
         return response()->json(['status' => false, 'message' => $e->getMessage()]);
      }
   }

   public function destroykarir(string $id)
   {
      $deletelayanan = Konseling::find($id);
      $deletelayanan->delete();

      return redirect('/guru/konseling/bimbingankarir');
   }
   // guru bimbingan karir end

   // guru bimbingan belajar
   public function getbelajardetail($id)
   {
      $getdetail = Konseling::find($id);

      return view('guru.bimbingan.bimbingan_belajar.guru_bimbingan_belajar_detail', compact('getdetail'));
   }

   public function updatebimbinganbelajarpending(Request $request, $id)
   {
      $hasilKonselingtanggal = $request->tanggal_konseling;
      $hasilKonselingtempat = $request->tempat;
      $requestData = Konseling::find($id);

      if (empty($hasilKonselingtanggal) && !empty($hasilKonselingtempat)) {
         $requestData->status = 'accept';
         $requestData->tempat = $hasilKonselingtempat;
         $requestData->save();


         return redirect('/guru/konseling/bimbinganbelajar');
      } elseif (!empty($hasilKonselingtanggal) && !empty($hasilKonselingtempat)) {
         $requestData->status = 'reschedule';
         $requestData->tanggal_konseling = $hasilKonselingtanggal;
         $requestData->tempat = $hasilKonselingtempat;
         $requestData->save();


         return redirect('/guru/konseling/bimbinganbelajar');
      } else {
         return back()->withErrors($request->errors())->withInput();
      }
   }

   public function getmuridbimbinganbelajarpending($id)
   {
      $getkonsul = Konseling::find($id);

      return view('guru.bimbingan.bimbingan_belajar.guru_responsebimbingan_belajar_pending', compact('getkonsul'));
   }

   public function belajarview()
   {
      $id = 1;

      $getkonsul = Konseling::where('layanan_id', $id)->get();

      return view('guru.bimbingan.bimbingan_belajar.guru_bimbingan_belajar', compact('getkonsul'));
   }

   public function getmuridbimbinganbelajar($id)
   {
      $getkonsul = Konseling::find($id);
      return view('guru.bimbingan.bimbingan_belajar.guru_hasilbimbingan_belajar', compact('getkonsul'));
   }

   public function updatebimbingan_belajar(Request $request, $id)
   {
      $request->validate([
         'hasil_konseling' => 'required',
      ]);

      $updatepribadi = Konseling::find($id);

      $updatepribadi->hasil_konseling = $request->hasil_konseling;
      $updatepribadi->status = 'complete';
      $updatepribadi->save();

      return redirect('/guru/konseling/bimbinganbelajar');
   }

   public function addbimbinganbelajar(Request $request)
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
      return redirect('/guru/konseling/bimbinganbelajar');
   }

   //  public function destroykarir(string $id)
   //  {
   //     $deletelayanan = Konseling::find($id);
   //     $deletelayanan->delete();

   //     return redirect('/guru/konseling/bimbingankarir');
   //  }
   // guru bimbingan belajar end

}
