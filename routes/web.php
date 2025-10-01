<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DirectorController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Egresado dashboard routes
Route::middleware(['auth', 'role:egresado'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/dashboard/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');
    
    Route::resource('proposals', ProposalController::class)->except(['edit', 'update', 'destroy']);
    Route::resource('requests', RequestController::class)->except(['edit', 'update', 'destroy']);
});

// Gestor dashboard routes
Route::middleware(['auth', 'role:gestor'])->prefix('gestor')->group(function () {
    Route::get('/dashboard', [ManagerController::class, 'dashboard'])->name('gestor.dashboard');
    
    Route::get('/proposals', [ManagerController::class, 'proposals'])->name('gestor.proposals.index');
    Route::get('/proposals/{proposal}', [ManagerController::class, 'showProposal'])->name('gestor.proposals.show');
    Route::put('/proposals/{proposal}', [ManagerController::class, 'updateProposal'])->name('gestor.proposals.update');
    
    Route::get('/requests', [ManagerController::class, 'requests'])->name('gestor.requests.index');
    Route::get('/requests/{request}', [ManagerController::class, 'showRequest'])->name('gestor.requests.show');
    Route::put('/requests/{request}', [ManagerController::class, 'updateRequest'])->name('gestor.requests.update');
    
    Route::get('/students', [ManagerController::class, 'students'])->name('gestor.students.index');
    Route::get('/students/{student}', [ManagerController::class, 'showStudent'])->name('gestor.students.show');
});

// Admin dashboard routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users.index');
    Route::get('/criteria', [AdminController::class, 'criteria'])->name('admin.criteria.index');
    Route::get('/graduates', [AdminController::class, 'graduates'])->name('admin.graduates.index');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
});

// Director dashboard routes
Route::middleware(['auth', 'role:director'])->prefix('director')->group(function () {
    Route::get('/dashboard', [DirectorController::class, 'dashboard'])->name('director.dashboard');
    Route::get('/reports', [DirectorController::class, 'reports'])->name('director.reports.index');
    // Alias for backward compatibility: some views used 'director.reports' without the .index suffix
    // Route::get('/reports', [DirectorController::class, 'reports'])->name('director.reports');
    Route::get('/profile', [DirectorController::class, 'profile'])->name('director.profile');
});