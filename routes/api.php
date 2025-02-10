<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FamilyTreeController;
use App\Http\Controllers\RitualTextController;
use App\Http\Controllers\MemorialNotificationController;
use App\Http\Controllers\AnnouncementController;

// Định tuyến cho Users
Route::post('/login', [UserController::class, 'login']);
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);

// Định tuyến cho Cây gia phả
Route::get('/family-tree', [FamilyTreeController::class, 'index']);
Route::post('/family-tree', [FamilyTreeController::class, 'store']);

// Định tuyến cho Mẫu văn bản cúng bái
Route::get('/ritual-texts', [RitualTextController::class, 'index']);
Route::post('/ritual-texts', [RitualTextController::class, 'store']);

// Định tuyến cho Thông báo ngày giỗ
Route::get('/memorial-notifications', [MemorialNotificationController::class, 'index']);
Route::post('/memorial-notifications', [MemorialNotificationController::class, 'store']);

// Định tuyến cho Thông báo chung
Route::get('/announcements', [AnnouncementController::class, 'index']);
Route::post('/announcements', [AnnouncementController::class, 'store']);
