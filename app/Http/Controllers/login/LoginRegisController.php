<?php

namespace App\Http\Controllers\login;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginRegisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('admin');
            } elseif ($user->role == 'murid') {
                return redirect()->route('user.dashboard');
            } elseif ($user->role == 'guru') {
                return redirect()->route('guru_dashboard');
            }
        }

        return back()->with('error', 'Email atau password salah');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeregis(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'role' => 'required',
            'password' => 'required',
        ]);

        // Buat user baru
        $user = new User([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->save();

        // Redirect ke halaman dashboard atau halaman setelah registrasi
        return view('login-regis');
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
    public function logout(Request $request){
        auth::logout();
        return redirect('/');
    }
}
