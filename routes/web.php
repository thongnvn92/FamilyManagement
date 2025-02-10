<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FamilyTreeController;
use App\Http\Controllers\RitualTextController;
use App\Http\Controllers\LunarCalendarController;

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

Route::middleware('auth')->group(function () {
    Route::get('/family-tree', [FamilyTreeController::class, 'index'])->name('family.tree');
    Route::get('/family-tree/data', [FamilyTreeController::class, 'getFamilyTreeData'])->name('family.tree.data');
    Route::post('/family-tree/store', [FamilyTreeController::class, 'store'])->name('family.tree.store');
    Route::delete('/family-tree/delete/{id}', [FamilyTreeController::class, 'destroy'])->name('family.tree.delete');
});

// Trang chủ
Route::get('/', function () {
    return view('welcome');
});

// Quản lý người dùng
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/detail/{id}', [UserController::class, 'show'])->name('users.detail.show');
// Route cập nhật thông tin thành viên (đổi từ '/family-members/{id}' thành '/users/{id}')
Route::post('/users/detail/{id}', [UserController::class, 'update'])->name('users.update');
Route::post('/users', [UserController::class, 'store']);

// Quản lý cây gia phả
Route::get('/family-tree', [FamilyTreeController::class, 'index'])->name('family.tree');

Route::resource('/ritual-texts', RitualTextController::class)->except(['create', 'show']);

Route::get('/lunar-calendar', [LunarCalendarController::class, 'index'])->name('lunar.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
