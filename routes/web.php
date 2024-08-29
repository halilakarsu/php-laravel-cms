<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\SlidersController;
use App\Http\Controllers\Backend\UsersController;
Route::view('/', 'backend.default.index')->name('admin.home');
Route::view('/login1', 'backend.default.login')->name('admin.login');

Route::prefix('admin/settings')->group(function () {
        Route::get('/', [SettingsController::class, 'index'])->name('settings.index');
        Route::post('sortable', [SettingsController::class, 'sortable'])->name('sortable');
        Route::get('delete/{id}', [SettingsController::class, 'destroy'])->name('destroy');
        Route::get('edit/{id}', [SettingsController::class, 'edit'])->name('settings.edit');
        Route::post('update/{id}', [SettingsController::class, 'update'])->name('settings.update');
  });

Route::prefix('admin')->group(function () {
    Route::resource('blog',BlogController::class);
    Route::post('/blog/sortable', [BlogController::class, 'sortable'])->name('blog.sortable');
});
Route::prefix('admin')->group(function () {
    Route::resource('page',PageController::class);
    Route::post('/page/sortable', [PageController::class, 'sortable'])->name('page.sortable');
});

Route::prefix('admin')->group(function () {
    Route::resource('slider',SlidersController::class);
    Route::post('/slider/sortable', [SlidersController::class, 'sortable'])->name('slider.sortable');
});

Route::prefix('admin')->group(function () {
    Route::resource('user',UsersController::class);
    Route::post('/user/sortable', [UsersController::class, 'sortable'])->name('user.sortable');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
