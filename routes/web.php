<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\guru\GurubkController;
use App\Http\Controllers\walas\WalasController;
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


Route::group(['middleware' => ['auth', 'RoleMiddleware:admin']], function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.admin_dashboard');
    })->name('admin');
    // admin guru
    Route::get('/admin/guru', [AdminController::class, 'index'])->name('admin_guru');
    Route::post('/admin/guru/update/{id}', [AdminController::class, 'updateguru']);
    Route::get('/admin/guru/delete/{id}', [AdminController::class, 'deleteguru'])->name('delete_admin_guru');
    Route::post('/admin/addguru', [AdminController::class, 'createguru'])->name('add_admin_guru');
    Route::get('/admin/guru/get/{id}', [AdminController::class, 'editgetguru'])->name('getedit_admin_guru');
    // admin-guru-end
    // admin-kelas
    Route::get('/admin/kelas', [AdminController::class, 'kelasview'])->name('admin_kelas');
    Route::post('/admin/kelas/update/{id}', [AdminController::class, 'updatekelas']);
    Route::get('/admin/kelas/delete/{id}', [AdminController::class, 'deletekelas'])->name('delete_admin_kelas');
    Route::get('/admin/kelas/get/{id}', [AdminController::class, 'editgetkelas'])->name('getedit_admin_kelas');
    Route::post('/admin/addkelas', [AdminController::class, 'createkelas'])->name('add_admin_kelas');
    // admin-kelas
    // admin-walas
    Route::get('/admin/walas', [AdminController::class, 'walasview'])->name('admin_walas');
    Route::post('/admin/walas/add', [AdminController::class, 'createwaalas'])->name('add_admin_walas');
    Route::get('/admin/walas/delete/{id}', [AdminController::class, 'deletewalas'])->name('delete_admin_walas');
    Route::get('/admin/walas/get/{id}', [AdminController::class, 'editgetwalas'])->name('getedit_admin_kelas');
    Route::post('/admin/walas/update/{id}', [AdminController::class, 'updatewalas']);
    // admin-walas end
    // admin-murids
    Route::get('/admin/murid', [AdminController::class, 'muridview'])->name('admin_murid');
    Route::post('/admin/murid/add', [AdminController::class, 'createmurid'])->name('add_admin_murid');
    Route::get('/admin/murid/delete/{id}', [AdminController::class, 'deletemurid'])->name('delete_admin_murid');
    Route::get('/admin/murid/get/{id}', [AdminController::class, 'editgetmurid'])->name('getedit_admin_murid');
    Route::post('/admin/murid/update/{id}', [AdminController::class, 'updatemurid']);
    // admin-murids end
    // admin-layanans
    Route::get('/admin/layanan', [AdminController::class, 'layananview'])->name('admin_layanan');
    Route::post('/admin/layanan/add', [AdminController::class, 'createlayanan'])->name('add_admin_layanan');
    Route::get('/admin/layanan/delete/{id}', [AdminController::class, 'deletelayanan'])->name('delete_admin_layanan');
    Route::get('/admin/layanan/get/{id}', [AdminController::class, 'editgetlayanan'])->name('getedit_admin_layanan');
    Route::post('/admin/layanan/update/{id}', [AdminController::class, 'updatelayanan']);
    // admin-layanans end
});

Route::group(['middleware' => ['auth', 'RoleMiddleware:guru']], function () {
    Route::get('/guru/dashboard', function () {
        return view('guru.guru_dashboard');
    })->name('guru_dashboard');

    // admin-konsultasi
    Route::get('/guru/konsultasi', [GurubkController::class, 'index'])->name('guru_konsultasi');
    // admin-konsultasi
});

Route::group(['middleware' => ['auth', 'RoleMiddleware:walas']], function () {
    Route::get('/walas/dashboard', [WalasController::class, 'maindash'])->name('walas_dashboard');
    Route::get('/walas/jadwal-konsultasi', [WalasController::class, 'jadwalkonsul'])->name('walas_jadwal');
    Route::get('/walas/hasil-konsultasi', [WalasController::class, 'index'])->name('walas_konsultasi');
    Route::get('/walas/peta-kerawanan', [WalasController::class, 'petakerawanan'])->name('walas_kerawanan');
    Route::get('/walas/peta-kerawanan/get/{id}', [WalasController::class, 'edit'])->name('edit_walas_kerawanan');
    Route::post('/walas/peta-kerawanan/update/{id}', [WalasController::class, 'update']);
    Route::post('/walas/peta-kerawanan/add', [WalasController::class, 'create'])->name('add_walas_kerawanan');
    Route::get('/walas/peta-kerawanan/delete/{id}', [WalasController::class, 'destroy'])->name('delete_walas_kerawanan');
    
});
