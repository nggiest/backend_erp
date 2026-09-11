<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;

Route::get('/', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'Welcome to House of Noodz API',
        'version' => '1.0.0'
    ]);
});

Route::resource('branch', BranchController::class);
