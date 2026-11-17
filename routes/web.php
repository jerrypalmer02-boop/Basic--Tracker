<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackerController;

Route::get('/', [TrackerController::class, 'index'])->name('trackers.index');

Route::resource('trackers', TrackerController::class)->except(['index', 'show']);