<?php

// use App\Models\Gurubk;
use App\Models\Gurubk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\admin\logController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\guru\GurubkController;
use App\Http\Controllers\murid\MuridController;
use App\Http\Controllers\walas\WalasController;
use App\Http\Controllers\walas\SearchController;
use App\Http\Controllers\walas\getkonsulController;
use App\Http\Controllers\login\LoginRegisController;
use App\Http\Controllers\walas\getKerawananController;
use App\Http\Controllers\walas\HasilBimbinganController;

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

Route::get('/', function (Request $request) {
    $cek = Auth::user();
    //role
    return view('index', compact('cek'));
});



// login/regis
Route::post('/register', [LoginRegisController::class, 'storeregis'])->name('register');
Route::post('/login', [LoginRegisController::class, 'login'])->name('login');
Route::get('/logout', [LoginRegisController::class, 'logout'])->name('logout');
Route::get('/login-regis', function () {
    return view('login-regis');
})->name('login-regis');


Route::group(['middleware' => ['auth', 'RoleMiddleware:admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin');
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

    // admin log login
    Route::get('/admin/log-login', [logController::class, 'authenticated'])->name('admin_log_login');

    // // admin-bimbingan karir
    // Route::get('/admin/karir', [AdminController::class, 'karirview'])->name('admin_karir');
    // // Route::post('/admin/karir/add', [AdminController::class, 'createkarir'])->name('add_admin_karir');
    // // Route::get('/admin/karir/delete/{id}', [AdminController::class, 'deletekarir'])->name('delete_admin_karir');
    // // Route::get('/admin/karir/get/{id}', [AdminController::class, 'editgetkarir'])->name('getedit_admin_karir');
    // // Route::post('/admin/karir/update/{id}', [AdminController::class, 'updatekarir']);
    // // admin-karir end
    Route::get('/export+gurubk+excel', [AdminController::class, 'GuruBkExportExcel']);
    Route::get('/export+murid+excel', [AdminController::class, 'MuridExportExcel']);
    Route::get('/export+walas+excel', [AdminController::class, 'WalasExportExcel']);

    Route::get('/export+gurubk+pdf', [AdminController::class, 'GuruBkExportPdf']);
    Route::get('/export+murid+pdf', [AdminController::class, 'MuridExportPdf']);
    Route::get('/export+walas+pdf', [AdminController::class, 'WalasExportPdf']);

});

Route::group(['middleware' => ['auth', 'RoleMiddleware:guru']], function () {
    // Route::get('/guru/dashboard', function () {
    //     return view('guru.guru_dashboard');
    // })->name('guru_dashboard');

    Route::get('/export-pdf-guru', [PdfController::class, 'guruexportPDF']);

    Route::get('/guru/dashboard', [GurubkController::class, 'viewdashboardguru'])->name('guru_dashboard');
    


    // guru-konsultasi
    Route::get('/guru/konsul/delete/{id}', [GurubkController::class, 'destroykonseling'])->name('delete_karir');

    Route::get('/guru/konseling', [GurubkController::class, 'index'])->name('guru_konsultasi');
    Route::get('/guru/getmurid/{id}', [GurubkController::class, 'getmuridbykelas'])->name('guru_konsultasi');
    Route::post('/guru/konsultais/add', [GurubkController::class, 'createkonsultasi'])->name('add_guru_konsultais');
    Route::get('/admin/konsul/delete/{id}', [GurubkController::class, 'deletekonsul'])->name('delete_admin_konsul');
    Route::get('/guru/konsul/getkonsul/{id}', [GurubkController::class, 'getkonsul'])->name('guru_konsultasi');
    Route::post('/guru/konsul/update/{id}', [GurubkController::class, 'updatekonsul']);
    // guru-konsultasi

    // guru-bimbingan pribadi
    Route::get('/guru/konseling/bimbinganpribadi', [GurubkController::class, 'viewbimbinganpribadi'])->name('guru_konsultasi_viewbimbinganpribadi');
    Route::get('/guru/konseling/getbimbinganpribadi/{id}', [GurubkController::class, 'getmuridbimbinganpribadi'])->name('guru_konsultasi_viewbimbinganpribadi');
    Route::get('/guru/getmurid/{id}', [GurubkController::class, 'getmuridbykelas'])->name('guru_konsultasi');
    Route::post('/konseling/updatebimbinganpribadi/{id}', [GurubkController::class, 'updatebimbingan_pribadi']);
    Route::post('/guru/peta-kerawanan/add', [GurubkController::class, 'createpeta'])->name('add_guru_kerawanan');
    Route::get('/guru/peta-kerawanan/delete/{id}', [GurubkController::class, 'destroy'])->name('delete_guru_kerawanan');
    Route::get('/guru/peta-kerawanan/get/{id}', [GurubkController::class, 'edit'])->name('edit_guru_kerawanan');
    Route::post('/guru/peta-kerawanan/{id}', [GurubkController::class, 'update_kerawanan_bimbingan_pribadi']);

    Route::get('/guru/bimbinganpribadi/detail/{id}', [GurubkController::class, 'getpribadidetail']);
    // peetakerawanan
    Route::get('/guru/petakerawanan/kesimpulan/{id}', [GurubkController::class, 'petakerawanan_kesimpulan'])->name('guru_konsultasi_viewbimbinganpribadi');
    
    Route::post('/guru/petakerawanan/addkesimpulan/{murid_id}', [GurubkController::class, 'addpetakerawanan_kesimpulan']);

    Route::post('/konseling/updatebimbinganpribadi-pending/{id}', [GurubkController::class, 'updatebimbinganpribadipending']);
    Route::get('/guru/konseling/getbimbinganpribadipending/{id}', [GurubkController::class, 'getmuridbimbinganpribadipending'])->name('guru_konsultasi_viewbimbinganpribadi');
    Route::get('/guru/petakerawanan/detail/{userId}', [GurubkController::class, 'getdetail']);

    // guru-bimbingan pribadi end

    // guru-bimbingan sosial
    Route::get('/guru/bimbingansosial/detail/{id}', [GurubkController::class, 'getsosialdetail']);
    Route::post('/konseling/updatebimbingansosial/{id}', [GurubkController::class, 'updatebimbingan_sosial']);
    Route::get('/guru/konseling/bimbingansosial', [GurubkController::class, 'viewbimbingansosial'])->name('guru_konsultasi_viewbimbingansosial');
    Route::get('/guru/konseling/getbimbingansosial/{id}', [GurubkController::class, 'getmuridbimbingansosial'])->name('guru_konsultasi_viewbimbinganpribadi');
    Route::get('/guru/konseling/bimbingansosial/getmurid', [GurubkController::class, 'viewbimbingansosial'])->name('guru_konsultasi_viewbimbingansosial');
    Route::post('/guru/konseling/addbimbingansosial', [GurubkController::class, 'addbimbingansosial'])->name('guru_konsultasi_viewbimbingansosial');

    Route::post('/konseling/updatebimbingansosial-pending/{id}', [GurubkController::class, 'updatebimbingansosialpending']);
    Route::get('/guru/konseling/getbimbingansosialpending/{id}', [GurubkController::class, 'getmuridbimbingansosialpending'])->name('guru_konsultasi_viewbimbingansosialprending');
    // guru-bimbingan sosial end

    // admin-bimbingan karir
    Route::get('/guru/bimbingankarir/detail/{id}', [GurubkController::class, 'getkarirdetail']);
    Route::get('/guru/konseling/bimbingankarir', [GurubkController::class, 'karirview'])->name('admin_karir');
    Route::get('/guru/konseling/getbimbingankarir/{id}', [GurubkController::class, 'getmuridbimbingankarir'])->name('guru_konsultasi_viewbimbinganpribadi');
    Route::post('/guru/konseling/addbimbingankarir', [GurubkController::class, 'addbimbingankarir'])->name('guru_konsultasi_viewbimbingansosial');
    Route::post('/konseling/updatebimbingankarir/{id}', [GurubkController::class, 'updatebimbingan_karir']);

    Route::get('/guru/konseling/deletekarir/{id}', [GurubkController::class, 'destroykarir'])->name('delete_karir');
    Route::post('/konseling/updatebimbingankarir-pending/{id}', [GurubkController::class, 'updatebimbingankarirpending']);
    Route::get('/guru/konseling/getbimbingankarirpending/{id}', [GurubkController::class, 'getmuridbimbingankarirpending'])->name('guru_konsultasi_viewbimbingansosialprending');
    // admin-karir end

    // admin-bimbingan belajar
    Route::get('/guru/bimbinganbelajar/detail/{id}', [GurubkController::class, 'getbelajardetail']);
    Route::get('/guru/konseling/bimbinganbelajar', [GurubkController::class, 'belajarview'])->name('admin_belajar');
    Route::get('/guru/konseling/getbimbinganbelajar/{id}', [GurubkController::class, 'getmuridbimbinganbelajar'])->name('guru_konsultasi_viewbimbinganpribadi');
    Route::post('/guru/konseling/addbimbinganbelajar', [GurubkController::class, 'addbimbinganbelajar'])->name('guru_konsultasi_addwbimbinganbelajar');
    Route::post('/konseling/updatebimbinganbelajar/{id}', [GurubkController::class, 'updatebimbingan_belajar']);

    // Route::get('/guru/konseling/deletekarir/{id}', [GurubkController::class, 'destroykarir'])->name('delete_karir');
    Route::post('/konseling/updatebimbinganbelajar-pending/{id}', [GurubkController::class, 'updatebimbinganbelajarpending']);
    Route::get('/guru/konseling/getbimbinganbelajarpending/{id}', [GurubkController::class, 'getmuridbimbinganbelajarpending'])->name('guru_konsultasi_viewbimbinganbelajarprending');
    // admin-belajar end

    //kerawanan excel
    Route::get('/export+kerawanan+excel', [GurubkController::class, 'KerawananHasilExportExcel']);

});

Route::group(['middleware' => ['auth', 'RoleMiddleware:walas']], function () {
    Route::get('/export-pdf-walas', [PdfController::class, 'walasexportPDF']);

    Route::get('/walas/dashboard', [WalasController::class, 'maindash'])->name('walas_dashboard');
    Route::get('/walas/jadwal-konsultasi', [WalasController::class, 'jadwalkonsul'])->name('walas_jadwal');
    Route::get('/walas/hasil-konsultasi', [WalasController::class, 'index'])->name('walas_konsultasi');
    Route::get('/walas/hasil-konsultasi/search', [WalasController::class, 'action'])->name('actions');
    Route::get('/walas/peta-kerawanan', [WalasController::class, 'petakerawanan'])->name('walas_kerawanan');
    Route::get('/walas/peta-kerawanan/get/{id}', [WalasController::class, 'edit'])->name('edit_walas_kerawanan');
    Route::post('/walas/peta-kerawanan/update/{id}', [WalasController::class, 'update']);
    Route::post('/walas/peta-kerawanan/add', [WalasController::class, 'create'])->name('add_walas_kerawanan');
    Route::get('/walas/peta-kerawanan/delete/{id}', [WalasController::class, 'destroy'])->name('delete_walas_kerawanan');
    Route::get('/walas/peta-kerawanan/search', [SearchController::class, 'actions_kerawanan'])->name('action_kerawanan');
    Route::get('/walas/jadwal-konsultasi/pending', [SearchController::class, 'pending_view'])->name('walas_konsultasi_pending');
    Route::get('/walas/jadwal-konsultasi/pending/search', [SearchController::class, 'actions_pending'])->name('action_pending');
    Route::get('/walas/jadwal-konsultasi/accept', [SearchController::class, 'accept_view'])->name('walas_konsultasi_accept');
    Route::get('/walas/jadwal-konsultasi/accept/search', [SearchController::class, 'actions_accept'])->name('action_accept');
    Route::get('/walas/jadwal-konsultasi/complete', [SearchController::class, 'complete_view'])->name('walas_konsultasi_complete');
    Route::get('/walas/jadwal-konsultasi/complete/search', [SearchController::class, 'actions_complete'])->name('action_complete');
    Route::get('/walas/jadwal-konsultasi/reschedule', [SearchController::class, 'reschedule_view'])->name('walas_konsultasi_reschedule');
    Route::get('/walas/jadwal-konsultasi/reschedule/search', [SearchController::class, 'actions_reschedule'])->name('action_reschedule');
    Route::get('/walas/hasil-bimbingan-sosial', [HasilBimbinganController::class, 'index'])->name('bimbingan_sosial');
    Route::get('/walas/hasil-bimbingan-sosial/search', [HasilBimbinganController::class, 'actions_hasil'])->name('actions_hasils');
    Route::get('/walas/hasil-konsultasi/details/{id}', [getkonsulController::class, 'index'])->name('details_konsultasi');
    Route::get('/walas/hasil-konsultasi/kesimpulan/{id}',[getkonsulController::class, 'bimbingan_kesimpulan'])->name('bimbingan_kesimpulan');
    Route::post('/walas/hasil-konsultasi/kesimpulan/update/{id}', [getkonsulController::class, 'action_kesimpulan'])->name('bimbingan_kesimpulan_update');
    Route::get('/walas/peta-kerawanan/details/{userId}', [getKerawananController::class, 'index'])->name('details_kerawanan');

    Route::get('/export+kerawananwalas+excel', [WalasController::class, 'KerawananWalasExportExcel']);
});

Route::group(['middleware' => ['auth', 'RoleMiddleware:murid']], function () {
    // ---- DASHBOARD ---- \\
    Route::get('/murid/dashboard', [MuridController::class, 'profilMurid'])->name('murid_dashboard');

    // VIEW KONSELING
    Route::get('/murid/konseling/karir', [MuridController::class, 'viewKonselingkarir'])->name('murid_konsultasi_karir');

    Route::get('/murid/konseling', [MuridController::class, 'viewKonseling'])->name('murid_konsultasi');
    Route::post('/murid/konseling/add', [MuridController::class, 'createKonsultasi'])->name('murid_konsultasi_tambah');
    Route::get('/murid/konseling/detail/{id}', [MuridController::class, 'detailKonsultasi'])->name('murid_konsultasi_detail');

    //VIEW BIMBINGAN PRIBADI
    Route::get('/murid/konseling/bimbingan-pribadi', [MuridController::class, 'viewBimbinganPribadi'])->name('murid_bimbingan_pribadi');

    //VIEW BIMBINGAN SOSIAL
    Route::get('/murid/konseling/bimbingan-sosial', [MuridController::class, 'viewBimbinganSosial'])->name('murid_bimbingan_sosial');

    //VIEW BIMBINGAN KARIR
    Route::get('/murid/konseling/bimbingan-karir', [MuridController::class, 'viewBimbinganKarir'])->name('murid_bimbingan_karir');

    //VIEW BIMBINGAN BELAJAR
    Route::get('/murid/konseling/bimbingan-belajar', [MuridController::class, 'viewBimbinganBelajar'])->name('murid_bimbingan_belajar');

    //VIEW PROFIL SISWA
});


