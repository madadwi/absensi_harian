<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AbsenController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RayonController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\RombelController;
use App\Http\Controllers\Admin\RiwayatController;
use App\Http\Controllers\Admin\EditController;
use App\Models\Absen;
use App\Models\Riwayat;
use App\Models\Rayon;
use App\Models\Rombel;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome')->middleware('guest');

Route::middleware('siswa')->group(function () {
    Route::get('/absenn', function () {
        return view('absen.absenpage');
    });

    Route::post('/hadirrrrrrrrrrrrrrrrrrrrrrrrrrrrr', [AbsenController::class, 'hadir'])->name('absens.hadir');
    Route::post('/pulangggggggggggggggggggggggggggg/{hash}', [AbsenController::class, 'pulang'])->name('absens.pulang');

    Route::get('/izin', [AbsenController::class, 'izin'])->name('absens.izin');
    Route::post('/izin', [AbsenController::class, 'tidakhadir'])->name('absens.tidakhadir');

    Route::get('/dashboard', function () {
        return view('dashboard', [
            'absen' => Absen::firstWhere('user_id', Auth::id())
        ]);
    })->middleware(['auth'])->name('dashboard');
});

// Admin
Route::middleware(['admin', 'auth'])->group(function () {
    Route::resource('/students', SiswaController::class);
    Route::resource('/rayons', RayonController::class);
    Route::resource('/rombels', RombelController::class);

    Route::post('/resettttttttttttttttttttttttttttt', [AbsenController::class, 'reset'])->name('absens.reset');

    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    Route::get('/absen-page', [AbsenController::class, 'index']);
    Route::get('/riwayat-page', [RiwayatController::class, 'index']);

    Route::get('/edit-page', function () {
        return view('admin.editprofile.index');
    });
    Route::post('/editgannnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn', [EditController::class, 'update'])->name('edit-profile');
  

    Route::get('/kehadiran-page', function () {
        return view('admin.kehadiran.kehadiranpage', [
            'rombels' => Rombel::filter(request(['search']))->orderBy('rombel')->get()
        ]);
    });

    Route::get('/cekabsien', function () {
        return view('absen.absenpage');
    });
});

require __DIR__ . '/auth.php';
