<?php

use App\Http\Controllers\InventarisController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('inventaris', InventarisController::class);