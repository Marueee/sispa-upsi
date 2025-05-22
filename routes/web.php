<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Posts;
use App\Livewire\Admin\Members;
use App\Livewire\Admin\AttendanceManager;
use App\Livewire\Admin\Report;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\NewsManager;
use App\Http\Controllers\SispaAdminController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SispaController;


Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('admin/dashboard', Dashboard::class)->name('dashboard');
    Route::get('admin/posts', Posts::class)->name('admin.posts');
    Route::get('admin/news', NewsManager::class)->name('admin.news');
    Route::get('admin/members', Members::class)->name('admin.members');
    Route::get('admin/attendance', AttendanceManager::class)->name('admin.attendance');
    Route::get('admin/report', Report::class)->name('admin.report');
    Route::get('admin/sispa-applications', [SispaAdminController::class, 'index'])->name('admin.sispa.index');
    Route::post('admin/sispa-applications/{id}/status', [SispaAdminController::class, 'updateStatus'])->name('admin.sispa.updateStatus');
});


Route::view('posts', 'posts')
    ->middleware(['auth', 'role:admin'])
    ->name('posts');

Route::view('user', 'user')
    ->middleware(['auth', 'role:user'])
    ->name('user');

Route::get('/news/{news}', [WelcomeController::class, 'show'])->name('news.show');


Route::get('/sispa-register', [SispaController::class, 'showForm'])->name('sispa.register.form');
Route::post('/sispa-register', [SispaController::class, 'store'])->name('sispa.register');

require __DIR__.'/auth.php';
