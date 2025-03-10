<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SavingsController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WishlistController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');
    Route::post('/transactions' , [TransactionController::class , 'create'])->name('transaction.submit');
    Route::get('/savings' , [SavingsController::class , 'index'])->name('savings');
    Route::post('/savings' , [SavingsController::class , 'create'])->name('saving.submit');
    Route::put('/savings', [SavingsController::class, 'update'])->name('savings.update');
    Route::get('/savings/{id}' , [SavingsController::class , 'destroy'])->name('saving.destroy');
    Route::get('/transactions/{id}' , [TransactionController::class , 'destroy'])->name('depense.destroy');
    Route::post('/dashboard' , [DashboardController::class , 'update'])->name('money.add');
    Route::get('/wishlist' , [WishlistController::class , 'index'])->name('wishlist');
    Route::post('/wishlist' , [WishlistController::class , 'store'])->name('wishlist.add');
    Route::delete('/wishlist/delete/{id}' , [WishlistController::class , 'destroy'])->name('wishlist.delete');
    Route::get('/alerts' , [AlertController::class , 'index'])->name('alerts');
    Route::post('/alerts' , [AlertController::class , 'store'])->name('alert.store');
    Route::put('/alerts/{id}' , [AlertController::class , 'update'])->name('alert.update');
    Route::post('/alerts/category' , [AlertController::class , 'store'])->name('alert.category');
    Route::put('/alerts/category/{id}' , [AlertController::class , 'update'])->name('alert.category.update');
    Route::delete('/alerts/{id}' , [AlertController::class , 'destroy'])->name('alert.destroy');
});

Route::middleware(AdminMiddleware::class)->group(function(){
    Route::get('/admin', [AdminController::class , 'index'])->name('admin');
    Route::post('/admin' , [AdminController::class , 'create'])->name('category.create');
    Route::delete('/admin/inactif' , [AdminController::class , 'Inactif'])->name('inactif.destroy');
});

require __DIR__ . '/auth.php';
