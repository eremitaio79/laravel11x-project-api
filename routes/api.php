<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

// Route::get('/status', function() {
//     return "Status OK";
// });

Route::get('/status', [ApiController::class, 'status']);
Route::get('/clients', [ApiController::class, 'clients']);
