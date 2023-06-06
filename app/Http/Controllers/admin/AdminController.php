<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Gurubk;
use App\Models\User;
use Illuminate\Http\Request;

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
        $editsiswaguru = Gurubk::where('user_id', $id);

        $dt2 = [
            'email'   => $request->email,
            'name'   => $request->name,
            'password'   => $request->password,
        ];

        $dt1 = [
            'name'   => $request->name,
            'tgl_lahir'   => $request->tgl_lahir,
            'jenis_kelamin'   => $request->jenis_kelamin,
            'password'   => $request->password,
        ];

        $editsiswa->update($dt2);
        $editsiswaguru->update($dt1);


        return redirect('/admin/guru');
    }

    // admin-guru-end

    public function muridview()
    {
        return view('admin.admin_murid');
    }

    public function kelasview()
    {
        $getgurus = Gurubk::all();

        return view('admin.admin_kelas', compact('getgurus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createkelas(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'kelas' => 'required',
            'tgl_lahir' => 'required',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => 'guru',
        ]);


        return view('admin.admin_kelas', compact('getgurus'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
