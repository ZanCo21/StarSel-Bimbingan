<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Murid;
use App\Models\Walas;
use App\Models\Gurubk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Layanan;

class AdminController extends Controller
{

    //  admin-guru
    public function index()
    {
        $getgurus = Gurubk::all();

        return view('admin.admin_guru', compact('getgurus'));
    }

    public function createguru(Request $request)
    {
        $getgurus = Gurubk::all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'tgl_lahir' => 'required',
            'nip' => 'required',
            'password' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => 'guru',
            'password' => $request->password,
        ]);

        // Membuat entri di tabel "gurus"
        $gurubk = Gurubk::create([
            'user_id' => $user->id,
            'name' => $request->input('name'),
            'nip' => $request->input('nip'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
        ]);


        return redirect('/admin/guru')->with(compact('getgurus'));
    }

    public function deleteguru($id)
    {
        $deleteguru = User::find($id);
        $deleteguru->delete();

        return redirect('/admin/guru');
    }

    public function editgetguru($id)
    {
        $geteditguru = Gurubk::where('user_id', $id)->first();
        $getedituser = User::find($id);


        return view('admin.admin_editguru', compact('geteditguru','getedituser'));
    }

    public function updateguru(Request $request, $id)
    {
        $editsiswa = User::find($id);
        $editguru = Gurubk::where('user_id',$id)->first();

    
        $dt2 = [
            'email' => $request->email,
            'name' => $request->name,
        ];
    
        $dt1 = [
            'name' => $request->name,
            'tgl_lahir' => $request->tgl_lahir,
            'nip' => $request->nip,
            'jenis_kelamin' => $request->jenis_kelamin,
        ];
    
        $editsiswa->update($dt2);
        $editguru->update($dt1);
    
        return redirect('/admin/guru');
    }
    // admin-guru-end

    // admin-murid
    public function muridview()
    {
        $getmurid = Murid::all();
        $getwalas = Walas::all();
        $getkelas = Kelas::all();

        return view('admin.murid.admin_murid', compact('getmurid','getkelas','getwalas'));
    }

    public function createmurid(Request $request)
    {
        $getkelas = Kelas::all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'nipd' => 'required',
            'tgl_lahir' => 'required',
            'kelas_id' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->password,
            'role' => 'murid',
        ]);

        // Membuat entri di tabel "gurus"
        $gurubk = Murid::create([
            'user_id' => $user->id,
            'kelas_id' => $request->input('kelas_id'),
            'name' => $request->input('name'),
            'nipd' => $request->input('nipd'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tgl_lahir' => $request->input('tgl_lahir'),
        ]);

        // return response()->json($gurubk);
        return redirect('/admin/murid')->with(compact('getkelas'));
    }

    public function deletemurid($id)
    {
        $deletemurid = Murid::find($id);
        $deletemurid->delete();

        return redirect('/admin/murid');
    }

    public function editgetmurid($id)
    {
        $geteditmurid = Murid::where('user_id', $id)->first();
        $getedituser = User::find($id);
        $geteditkelass = Kelas::where('id', $geteditmurid->kelas_id)->first();
        $geteditkelas = Kelas::all();



        return view('admin.murid.admin_editmurid', compact('geteditkelas','getedituser','geteditmurid','geteditkelass'));
    }
    public function updatemurid(Request $request, $id)
    {
        $editsiswa = User::find($id);
        $editguru = Murid::where('user_id',$id)->first();

    
        $dt2 = [
            'email' => $request->email,
            'name' => $request->name,
        ];
    
        $dt1 = [
            'name' => $request->name,
            'kelas_id' => $request->kelas_id,
            'nipd' => $request->nipd,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
        ];
    
        $editsiswa->update($dt2);
        $editguru->update($dt1);
    
        return redirect('/admin/murid');
    }
    // admin-murid end

    
    // admin-kelas
    public function kelasview()
    {
        $getgurus = Gurubk::all();
        $getwalas = Walas::all();
        $getkelas = Kelas::all();

        return view('admin.kelas.admin_kelas', compact('getgurus','getwalas','getkelas'));
    }
    public function createkelas(Request $request)
    {
        $getkelas = Kelas::all();

        $request->validate([
            'tingkat_kelas' => 'required',
            'gurubk_id' => 'required',
            'walas_id' => 'required',
            'jurusan' => 'required',
        ]);

        $user = Kelas::create([
            'tingkat_kelas' => $request->input('tingkat_kelas'),
            'gurubk_id' => $request->input('gurubk_id'),
            'walas_id' => $request->input('walas_id'),
            'jurusan' => $request->input('jurusan'),
        ]);


        return redirect('/admin/kelas')->with(compact('getkelas'));
    }

    public function editgetkelas($id)
    {
        $geteditkelas = Kelas::find($id);
        $getgurus = Gurubk::all();
        $getwalas = Walas::all();


        return view('admin.kelas.admin_editkelas', compact('geteditkelas','getgurus','getwalas'));
    }

    public function deletekelas($id)
    {
        $deleteguru = Kelas::find($id);
        $deleteguru->delete();

        return redirect('/admin/kelas');
    }
    

    public function updatekelas(Request $request, $id)
    {
        $updatekelas = Kelas::find($id);
        $updatekelas->update($request->all());
        return redirect('/admin/kelas');
    }
    // admin-kelas end
    // admin-walas
    public function walasview()
    {
        $getwalas = Walas::all();
        return view('admin.walas.admin_walas', compact('getwalas'));
    }
    
    public function createwaalas(Request $request)
    {
        $getwalas = walas::all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'nip' => 'required',
            'password' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => 'walas',
            'password' => $request->password,
        ]);

        // Membuat entri di tabel "gurus"
        $gurubk = Walas::create([
            'user_id' => $user->id,
            'name_guru' => $request->input('name'),
            'nip' => $request->input('nip'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
        ]);


        return redirect('/admin/walas')->with(compact('getwalas'));
    }

    public function deletewalas($id)
    {
        $deleteguru = Walas::find($id);
        $deleteguru->delete();

        return redirect('/admin/walas');
    }
    public function editgetwalas($id)
    {
        $geteditwalas = Walas::where('user_id', $id)->first();
        $getedituser = User::find($id);



        return view('admin.walas.admin_editwalas', compact('geteditwalas','getedituser'));
    }
    public function updatewalas(Request $request,$id)
    {
        $edituser = User::find($id);
        $editwalas = Walas::where('user_id',$id)->first();

    
        $dt2 = [
            'email' => $request->email,
            'name' => $request->name,
        ];
    
        $dt1 = [
            'name_guru' => $request->name,
            'nip' => $request->nip,
            'jenis_kelamin' => $request->jenis_kelamin,
        ];
    
        $edituser->update($dt2);
        $editwalas->update($dt1);
    
        return redirect('/admin/walas');
    }
    // admin-walas end
    // admin-layanans
    public function layananview()
    {
        $getlayanan = Layanan::all();

        return view('admin.layanan.admin_layanan', compact('getlayanan'));
    }
    
    public function createlayanan(Request $request)
    {
        $getlayanan = Layanan::all();
    
        $editlayanan = new Layanan;
        $editlayanan->jenis_layanan = $request->jenis_layanan;
        $editlayanan->save();
    

        return redirect('/admin/layanan')->with(compact('getlayanan'));

    }

    public function deletelayanan($id)
    {
        $deletelayanan = Layanan::find($id);
        $deletelayanan->delete();

        return redirect('/admin/layanan');
    }

    public function editgetlayanan($id)
    {
        $geteditlayanan = Layanan::find($id);

        return view('admin.layanan.admin_editlayanan', compact('geteditlayanan'));
    }

    public function updatelayanan(Request $request, $id)
    {
        $editlayanan = Layanan::find($id);
        $editlayanan->jenis_layanan = $request->jenis_layanan;
        $editlayanan->save();
    

        return redirect('/admin/layanan');
    }
    // admin-layanans end
}
