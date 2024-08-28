<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\PageController;
Route::view('/', 'backend.default.index')->name('admin.home');

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

