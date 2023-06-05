<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Gurubk;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getgurus = Gurubk::all();

        return view('admin.admin_guru', compact('getgurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createguru(Request $request)
    {
        $getgurus = Gurubk::all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'kelas' => 'required',
            'tgl_lahir' => 'required',
            'password' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => 'guru',
            'password' => bcrypt($request->password),
        ]);
    
        // Membuat entri di tabel "gurus"
        $gurubk = Gurubk::create([
            'user_id' => $user->id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'kelas' => $request->input('kelas'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
        ]);


        return view('admin.admin_guru', compact('getgurus'));

    }

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
            'password' => bcrypt($request->password),
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
