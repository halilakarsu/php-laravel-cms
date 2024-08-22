<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SettingsController;

Route ::view('admin','backend.default.index')->name('admin.home');
Route ::get('admin/settings',[SettingsController::class,'index'])->name('settings');
Route::post('admin/sortable',[SettingsController::class,'sortable'])->name('sortable');
Route::get('admin/settings/delete/{id}',[SettingsController::class,'destroy'])->name('detstroy');
Route::get('admin/settings/edit/{id}',[SettingsController::class,'edit'])->name('settings.edit');
