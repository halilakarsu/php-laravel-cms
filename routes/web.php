<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/admin', function () {
    return view('backend.default.index');
});*/
Route ::view('admin','backend.default.index');
Route ::view('admin/settings','backend.settings.index')->name('settings');
