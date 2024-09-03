<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\SlidersController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\DefaultController;

Route::prefix('admin')->group(function(){
Route::view('login', 'backend.default.login')->name('admin.login');
Route::post('login', [DefaultController::class, 'authenticate'])->name('login.enter');
Route::get('logout', [DefaultController::class, 'logout'])->name('admin.logout');
});

Route::group(['middleware' => ['admin']], function () {
Route::prefix('admin')->group(function () {
    Route::get('admin/home', [DefaultController::class, 'index'])->name('admin.home');
    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('settings/sortable', [SettingsController::class, 'sortable'])->name('sortable');
    Route::get('settings/delete/{id}', [SettingsController::class, 'destroy'])->name('destroy');
    Route::get('settings/edit/{id}', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::post('settings/update/{id}', [SettingsController::class, 'update'])->name('settings.update');

    Route::resource('blog', BlogController::class);
    Route::post('blog/sortable', [BlogController::class, 'sortable'])->name('blog.sortable');
    Route::resource('page', PageController::class);
    Route::post('/page/sortable', [PageController::class, 'sortable'])->name('page.sortable');

    Route::resource('slider', SlidersController::class);
    Route::post('/slider/sortable', [SlidersController::class, 'sortable'])->name('slider.sortable');

    Route::resource('user', UsersController::class);
    Route::post('/user/sortable', [UsersController::class, 'sortable'])->name('user.sortable');

});

});





