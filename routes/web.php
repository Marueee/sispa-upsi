<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Members;
use App\Livewire\Admin\AttendanceManager;
use App\Livewire\Admin\Report;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\NewsManager;
use App\Livewire\Admin\SispaApplications;
use App\Http\Controllers\SispaAdminController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SispaController;
use App\Http\Controllers\Admin\SispaApplicationController;
use App\Http\Controllers\ContactFormController;
use App\Livewire\Admin\ContactMessages;
use App\Livewire\Admin\GalleryManager;

Route::post('/sispa/register', [SispaController::class, 'register'])->name('sispa.register');
Route::get('/sispa/register', [SispaController::class, 'showRegisterForm'])->name('sispa.register.form');
Route::post('/contact-submit', [ContactFormController::class, 'store'])->name('contact.submit');
Route::get('/admin/messages', ContactMessages::class)->name('admin.messages');

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
    Route::get('admin/news', NewsManager::class)->name('admin.news');
    Route::get('admin/members', Members::class)->name('admin.members');
    Route::get('admin/attendance', AttendanceManager::class)->name('admin.attendance');
    Route::get('admin/gallery', GalleryManager::class)->name('admin.gallery');
    Route::get('admin/report', Report::class)->name('admin.report');
    Route::get('admin/sispa-applications', SispaApplications::class)->name('admin.sispa.applications');
    Route::post('admin/sispa-applications/{id}/status', [SispaAdminController::class, 'updateStatus'])->name('admin.sispa.updateStatus');

});


Route::view('posts', 'posts')
    ->middleware(['auth', 'role:admin'])
    ->name('posts');

Route::view('user', 'user')
    ->middleware(['auth', 'role:user'])
    ->name('user');

Route::get('/news/{news}', [WelcomeController::class, 'show'])->name('news.show');

Route::post('admin/sispa-applications/{id}/update-status', [SispaApplicationController::class, 'updateStatus'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.sispa.updateStatus');

require __DIR__.'/auth.php';
