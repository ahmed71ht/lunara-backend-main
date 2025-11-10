<?php

use Illuminate\Support\Facades\Route;

// ملف فاضي علشان مايحصلش خطأ
Route::get('/', function () {
    return response()->json();
});
