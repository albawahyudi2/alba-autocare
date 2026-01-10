<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Health check endpoint
Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});

// Database connection test
Route::get('/db-check', function () {
    try {
        \DB::connection()->getPdo();
        return response()->json(['status' => 'Database connection OK']);
    } catch (\Exception $e) {
        return response()->json(['status' => 'Database connection failed', 'error' => $e->getMessage()], 500);
    }
});
