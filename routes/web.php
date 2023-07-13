<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProvidersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Auth/Register', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth', 'verified'])->get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::get('/products/{id}', [ProductsController::class, 'edit'])->name('products.edit');
    Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
    Route::put('/products/{id}', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductsController::class, 'destroy'])->name('products.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/providers', [ProvidersController::class, 'index'])->name('providers.index');
    Route::get('/providers/create', [ProvidersController::class, 'create'])->name('providers.create');
    Route::get('/providers/{id}', [ProvidersController::class, 'edit'])->name('providers.edit');
    Route::post('/providers', [ProvidersController::class, 'store'])->name('providers.store');
    Route::put('/providers/{id}', [ProvidersController::class, 'update'])->name('providers.update');
    Route::delete('/providers/{id}', [ProvidersController::class, 'destroy'])->name('providers.delete');
});

require __DIR__.'/auth.php';
