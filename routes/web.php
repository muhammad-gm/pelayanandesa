<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\WajibLaporController;
use App\Http\Controllers\SuratPengantarController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/lojin', function () {
    return view("lojin", ["nama" => "fajar"]);
});
Route::get('/user', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('user');


Route::get('/dashboard-admin', function(){
    return view("dashboard-admin",["nama" => 'Pengguna']);
});
Route::get('/template', function(){
    return view("template",["nama" => 'Pengguna']);
});
Route::get('/template1', function(){
    return view("template1",["nama" => 'Pengguna']);
});
Route::post('/surat-pengantar', [SuratPengantarController::class, 'store'])->name('surat-pengantar.store');
require __DIR__.'/auth.php';
Route::post('/wajib_lapors', [WajibLaporController::class, 'store'])->name('wajib_lapors.store')->middleware('auth');
Route::post('/notif/store', [NotifikasiController::class, 'store'])->name('notif.store');
// Route::get('/user', [NotifikasiController::class, 'index']);


