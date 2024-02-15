<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // STEP 3
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginsController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\DosenController;
use App\Http\Charts\MahasiswaSkripsiChart;
use App\Http\Controllers\Mahasiswa2Controller;
use Illuminate\Http\Request;






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

// Route::get('/', function () {
//     return view('welcome'); //karena pake function bisa echo 'Hello World';
// });


// Login Routes

Route::match(['get', 'post'],'/login',[LoginsController::class,'index'])->name('login');
Route::match(['get', 'post'],'login-proses',[LoginsController::class, 'login_proses'])->name('login-proses');
Route::match(['get', 'post'],'/logout',[LoginsController::class, 'logout'])->name('logout');

//--------------------------------------

//harus diberi middleware untuk mengkses dashboard
Route::middleware(['auth'])->group(function(){ //biar gabisa main akses


    //departemen
    Route::group(['middleware' => ['role:departemen']], function () {
    Route::get('/dashboard', [MahasiswaController::class, 'index'])->name('dashboard');
    Route::get('/listmahasiswa-departemen', [MahasiswaController::class, 'listmahasiswa_departemen'])->name('listmahasiswa_departemen');
    Route::get('/carimahasiswa-departemen', [MahasiswaController::class, 'carimahasiswa_departemen'])->name('carimahasiswa_departemen'); //nama harus sama dengan functionnya
    Route::get('/carimahasiswa-departemen', [MahasiswaController::class, 'carimahasiswa_departemen'])->name('carimahasiswa_departemen');
    Route::get('/rekapmahasiswa-departemen', [MahasiswaController::class, 'rekapmahasiswa_departemen'])->name('rekapmahasiswa_departemen');



    //rekapmahasiswastatus_departemen
    Route::get('/detailmahasiswa/{id_mhs}', [MahasiswaController::class, 'lihatdetailmahasiswa'])->name('departemen.detailmahasiswa');
    Route::get('/detailsemestermhs/{id_mhs}', [MahasiswaController::class, 'detailsemestermhs_departemen'])->name('detailsemestermhs_departemen');
    Route::get('/exportpdf',[MahasiswaController::class,'exportpdf'])->name('exportpdf');
    Route::get('/exportpdf1',[MahasiswaController::class,'exportpdf1'])->name('exportpdf1');
    Route::get('/exportpdf2',[MahasiswaController::class,'exportpdf2'])->name('exportpdf2');
    });
    // Operator
    
    Route::group(['middleware' => ['role:operator']], function () {
        Route::match(['get', 'post'],'/user-import', [OperatorController::class,'import']);
        Route::get('/dashboard_operator', [OperatorController::class, 'index'])->name('dashboard_operator');
        Route::get('/dashboard_operator/{id_mhs}', [OperatorController::class, 'indexs'])->name('dashboarddenganid_operator');
        Route::get('/listmahasiswa-operator', [OperatorController::class, 'listmahasiswa_operator'])->name('listmahasiswa_operator'); //gadipake
        Route::get('/editprofilmhs-operator', [OperatorController::class, 'editprofilmhs_operator'])->name('editprofilmhs_operator');
        Route::get('/operator/generate_account', [OperatorController::class,'generateAccountForm']);
        Route::post('/operator/generate_account', [OperatorController::class,'generateAccount'])->name('generate.account');
        Route::post('/generate_csv', [OperatorController::class,'generateFromCSV'])->name('generate.from.csv');
        //crud mahasiswa
        Route::get('/delete/{id_mhs}', [OperatorController::class,'delete'])->name('delete');
        Route::match(['get','post','put'],'/tampilkandata/{id_mhs}', [OperatorController::class,'tampilkandata'])->name('tampilkandata'); //buat liat formnya
        Route::match(['get','post','put'],'/updatedata/{id_mhs}', [OperatorController::class,'updatedata'])->name('updatedata');

    
    });



    // DosenWali
    Route::group(['middleware' => ['role:dosenwali']], function () {
    // Route::get('/dashboard_dosenwali', [DosenController::class, 'index'])->name('dashboard_dosenwali');
        Route::get('/dashboard_dosenwali', [DosenController::class, 'mahasiswaPerwalian'])->name('dashboard_dosenwali');
        Route::get('/mahasiswa', [DosenController::class, 'daftarMahasiswa'])->name('dosenwali.daftarMahasiswa');
        Route::get('/listperwalian_dosenwali', [DosenController::class, 'listPerwalian'])->name('listperwalian_dosenwali');
        Route::get('/verifikasiIRS_dosenwali', [DosenController::class, 'verifikasiIrs'])->name('verifikasiIRS_dosenwali');
        Route::get('/verifikasiKHS_dosenwali', [DosenController::class, 'verifikasiKHS'])->name('verifikasiKHS_dosenwali');
        Route::get('/verifikasiPKL_dosenwali', [DosenController::class, 'verifikasiPKL'])->name('verifikasiPKL_dosenwali');
        Route::get('/verifikasiSkripsi_dosenwali', [DosenController::class, 'verifikasiSkripsi'])->name('verifikasiSkripsi_dosenwali');
        Route::get('/setujui_verifikasi_irs/{idIrs}', [DosenController::class, 'setujuiVerifikasiIrs'])->name('setujui_verifikasi_irs');
        Route::get('/tolak_verifikasi_irs/{idIrs}', [DosenController::class, 'tolakVerifikasiIrs'])->name('tolak_verifikasi_irs');
        Route::get('/setujui_verifikasi_khs/{idKhs}', [DosenController::class, 'setujuiVerifikasiKhs'])->name('setujui_verifikasi_khs');
        Route::get('/tolak_verifikasi_khs/{idKhs}', [DosenController::class, 'tolakVerifikasiKhs'])->name('tolak_verifikasi_khs');
        Route::get('/setujui_verifikasi_pkl/{idPkl}', [DosenController::class, 'setujuiVerifikasiPkl'])->name('setujui_verifikasi_pkl');
        Route::get('/tolak_verifikasi_pkl/{idPkl}', [DosenController::class, 'tolakVerifikasiPkl'])->name('tolak_verifikasi_pkl');
        Route::get('/setujui_verifikasi_skripsi/{idSkripsi}', [DosenController::class, 'setujuiVerifikasiSkripsi'])->name('setujui_verifikasi_skripsi');
        Route::get('/tolak_verifikasi_skripsi/{idSkripsi}', [DosenController::class, 'tolakVerifikasiSkripsi'])->name('tolak_verifikasi_skripsi');
        Route::get('/editIrs_dosenwali/{idIrs}', [DosenController::class, 'editIrs'])->name('editIrs_dosenwali');
        Route::put('/updateIrs_dosenwali/{idIrs}', [DosenController::class, 'updateIrs'])->name('updateIrs_dosenwali');
        Route::get('/editKhs_dosenwali/{idKhs}', [DosenController::class, 'editKhs'])->name('editKhs_dosenwali');
        Route::put('/updateKhs_dosenwali/{idKhs}', [DosenController::class, 'updateKhs'])->name('updateKhs_dosenwali');
        Route::get('/editPkl_dosenwali/{idPkl}', [DosenController::class, 'editPkl'])->name('editPkl_dosenwali');
        Route::put('/updatePkl_dosenwali/{idPkl}', [DosenController::class, 'updatePkl_dosenwali'])->name('updatePkl_dosenwali');
        Route::get('/editSkripsi_dosenwali/{idSkripsi}', [DosenController::class, 'editSkripsi'])->name('editSkripsi_dosenwali');
        Route::put('/updateSkripsi_dosenwali/{idSkripsi}', [DosenController::class, 'updateSkripsi'])->name('updateSkripsi_dosenwali');
        Route::get('/detailsemestermhs/{id_mhs}', [DosenController::class, 'lihatdetailmahasiswa'])->name('lihatdetailmahasiswa_dosenwali');
        
        
        
    });
    // Route::get('/listmahasiswa-departemen', [MahasiswaController::class, 'listmahasiswaperstatus_departemen']);

    // Mahasiswa
    Route::group(['middleware' => ['role:mahasiswa']], function () {
            Route::get('/dashboard-mahasiswa', [Mahasiswa2Controller::class, 'index'])->name('dashboard_mahasiswa');
            Route::get('/tampilProfil-mahasiswa', [Mahasiswa2Controller::class, 'tampilProfil_mahasiswa'])->name('tampilProfil_mahasiswa');
            Route::put('/editProfil-mahasiswa', [Mahasiswa2Controller::class, 'editProfil_mahasiswa'])->name('editProfil_mahasiswa');

            Route::get('detailIrs-mahasiswa',[Mahasiswa2Controller::class,'detailIrs_mahasiswa'])->name('detailIrs_mahasiswa');
            Route::match(['get', 'post'],'enrtyIrs-mahasiswa',[Mahasiswa2Controller::class,'entryIrs_mahasiswa'])->name('entryIrs_mahasiswa');
            
            Route::get('detailKhs-mahasiswa',[Mahasiswa2Controller::class,'detailKhs_mahasiswa'])->name('detailKhs_mahasiswa');
            Route::match(['get', 'post'],'enrtykhs-mahasiswa',[Mahasiswa2Controller::class,'entryKhs_mahasiswa'])->name('entryKhs_mahasiswa');

            Route::get('detailSkripsi-mahasiswa',[Mahasiswa2Controller::class,'detailSkripsi_mahasiswa'])->name('detailSkripsi_mahasiswa');
            Route::match(['get', 'post'],'enrtySkripsi-mahasiswa',[Mahasiswa2Controller::class,'entrySkripsi_mahasiswa'])->name('entrySkripsi_mahasiswa');

            Route::get('detailPkl-mahasiswa',[Mahasiswa2Controller::class,'detailPkl_mahasiswa'])->name('detailPkl_mahasiswa');
            Route::match(['get', 'post'],'enrtyPkl-mahasiswa',[Mahasiswa2Controller::class,'entryPkl_mahasiswa'])->name('entryPkl_mahasiswa');
        });
});


// Route::get('/',[HomeController::class,'dashboard'])->name('dashboard');// STEP 2 ngeroute ke homecontroller, method index
// Route::group(['prefix' => 'departemen', 'middleware' => ['auth'], 'as' => 'departemen.'], function(){ //ini biar gabisa langsung akses dashboard, tapi harus login dulu, di login jangah lupa tambahain routingngan departemen.dashboard
//     Route::get('/dashboard', [MahasiswaController::class, 'index'])->name('dashboard');//->middleware('can:view_dashboard');//->middleware(['role:departemen|dosenwali']) // ->middleware untuk gating pada route, jika memang ada permission view_dashbaord, maka diperbolehkan melihat
//     Route::get('/user',[HomeController::class,'index']);
//     Route::match(['get', 'post'],'/user-import', [HomeController::class,'import']);
// });

//--------------------------------------
//Operator
// Route::group(['middleware' => ['role:operator']], function () {
//     Route::get('/dashboard', [OperatorController::class, 'index']);
// });

// Route::group(['middleware' => ['role:dosenwali']], function () {
//     Route::get('/dashboard', [DosenController::class, 'index']);
// });

// Route::group(['middleware' => ['role:mahasiswa']], function () {
//     Route::get('/dashboard', [MahasiswaController::class, 'index']);
// });

// Route::group(['middleware' => ['role:departemen']], function () {
//     Route::redirect('/dashboard', [DepartemenController::class, 'index'])->name('dashboard');
// });
