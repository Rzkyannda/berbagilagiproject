<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PenerimaController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('beranda');
});

// ROUTE AUTENTIKASI (Tanpa login)
Route::get('backend/login', [AuthController::class, 'login'])->name('login'); // menampilkan halaman login
Route::post('backend/login', [AuthController::class, 'loginAction'])->name('loginAction'); // proses login
Route::post('backend/logout', [AuthController::class, 'logout'])->name('logout'); // proses logout

Route::get('backend/register', [AuthController::class, 'register'])->name('register'); // menampilkan halaman register 
Route::post('backend/register', [AuthController::class, 'registerSave'])->name('registerSave'); // proses register


// ROUTES UNTUK ADMIN
Route::middleware(['auth', 'role:admin'])->prefix('backend')->name('backend.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('items', ItemController::class);
    Route::resource('penerima', PenerimaController::class);
    Route::resource('claims', ClaimController::class);
    Route::get('items/status/logs', [ItemController::class, 'showLogStatus'])->name('showStatusLogs');

    // Hanya admin yang bisa akses 'users' dan 'messages'
    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('messages', MessageController::class);
    });

    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/upload-foto', [ProfileController::class, 'uploadFoto'])->middleware('auth');
    Route::post('/profile/upload-foto', [ProfileController::class, 'uploadFoto'])->middleware('auth');
});



// ROUTE KHUSUS UNTUK PENERIMA
Route::get('/beranda', [BerandaController::class, 'beranda'])->name('beranda');
Route::get('/about', [BerandaController::class, 'about'])->name('about');
Route::get('/items', [BerandaController::class, 'items'])->name('items');
Route::middleware(['auth', 'role:penerima'])->group(function () {
    Route::post('/items/claims', [BerandaController::class, 'claimItems'])->name('itemsClaim');
    Route::get('/claim-form/{item}', [BerandaController::class, 'formClaim'])->name('claims.form');
    Route::get('/contact', [BerandaController::class, 'contact'])->name('contact');
    Route::get('/history', [BerandaController::class, 'history'])->name('history');
    Route::post('/contact/post', [BerandaController::class, 'contactStore'])->name('contactStore');
});
