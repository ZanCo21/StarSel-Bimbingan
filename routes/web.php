<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\guru\GurubkController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\login\LoginRegisController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});



// login/regis
Route::post('/register', [LoginRegisController::class, 'storeregis'])->name('register');
Route::post('/login', [LoginRegisController::class, 'login'])->name('login');
Route::get('/logout', [LoginRegisController::class, 'logout'])->name('logout');
Route::get('/login-regis', function () {
    return view('login-regis');
})->name('login-regis');


Route::group(['middleware' => ['auth','RoleMiddleware:admin']], function() {
    Route::get('/admin/dashboard', function () { return view('admin.admin_dashboard');})->name('admin');
    // admin guru
    Route::get('/admin/guru', [AdminController::class, 'index'])->name('admin_guru');
    Route::get('/admin/guru/delete/{id}', [AdminController::class, 'deleteguru'])->name('delete_admin_guru');
    Route::post('/admin/addguru', [AdminController::class, 'createguru'])->name('add_admin_guru');
    Route::get('/admin/guru/get/{id}', [AdminController::class, 'editgetguru'])->name('getedit_admin_guru');
    // admin-guru-end

    Route::get('/admin/murid', [AdminController::class, 'muridview'])->name('admin_murid');
    Route::get('/admin/kelas', [AdminController::class, 'kelasview'])->name('admin_kelas');
    Route::post('/admin/guru/addkelas', [AdminController::class, 'createkelas'])->name('add_admin_kelas');
});

Route::group(['middleware' => ['auth','RoleMiddleware:guru']], function() {
    Route::get('/guru/dashboard', function () { return view('guru.guru_dashboard');})->name('guru_dashboard');
    Route::get('/guru/konsultasi', [GurubkController::class, 'index'])->name('guru_konsultasi');
});
