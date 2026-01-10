<?php

use App\Http\Controllers\VehicleController;
use App\Http\Controllers\MaintenanceTypeController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\SparePartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Resource Routes untuk CRUD
Route::resource('vehicles', VehicleController::class);
Route::patch('/vehicles/{vehicle}/update-km', [VehicleController::class, 'updateKm'])->name('vehicles.update-km');
Route::resource('maintenance-types', MaintenanceTypeController::class);
Route::resource('maintenances', MaintenanceController::class);
Route::resource('spare-parts', SparePartController::class);

