<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Medecins routes

Route::get('/medecins', [App\Http\Controllers\MedecinsController::class, 'index']);
Route::get('/medecins/{id}', [App\Http\Controllers\MedecinsController::class, 'show']);

// Add,update,delete medecin
Route::post('/medecins', [App\Http\Controllers\MedecinsController::class, 'store']);
Route::put('/medecins/{id}', [App\Http\Controllers\MedecinsController::class, 'update']);
Route::delete('/medecins/{id}', [App\Http\Controllers\MedecinsController::class, 'destroy']);

// Patients routes

Route::get('/patients', [App\Http\Controllers\PatientsController::class, 'index']);
Route::get('/patients/{id}', [App\Http\Controllers\PatientsController::class, 'show']);

// Add,update,delete patient
Route::post('/patients', [App\Http\Controllers\PatientsController::class, 'store']);
Route::put('/patients/{id}', [App\Http\Controllers\PatientsController::class, 'update']);
Route::delete('/patients/{id}', [App\Http\Controllers\PatientsController::class, 'destroy']);

// Maladie

Route::get('/maladies', [App\Http\Controllers\MaladiesController::class, 'index']);
Route::get('/maladies/{id}', [App\Http\Controllers\MaladiesController::class, 'show']);

// Add,update,delete maladie
Route::post('/maladies', [App\Http\Controllers\MaladiesController::class, 'store']);
Route::put('/maladies/{id}', [App\Http\Controllers\MaladiesController::class, 'update']);
Route::delete('/maladies/{id}', [App\Http\Controllers\MaladiesController::class, 'destroy']);

// Assign maladie to patient
Route::post('/patients/{id}/maladies', [App\Http\Controllers\PatientsController::class, 'assignMaladie']);

// Chambres routes

Route::get('/chambres', [App\Http\Controllers\ChambresController::class, 'index']);
Route::get('/chambres/disponibles', [App\Http\Controllers\ChambresController::class, 'getAvailableChambres']);
Route::get('/chambres/{id}', [App\Http\Controllers\ChambresController::class, 'show']);


// assin chambre to patient
Route::post('/patients/{id}/chambres', [App\Http\Controllers\PatientsController::class, 'assignChambre']);

// Add,update,delete chambre
Route::post('/chambres', [App\Http\Controllers\ChambresController::class, 'store']);

Route::put('/chambres/{id}', [App\Http\Controllers\ChambresController::class, 'update']);
Route::delete('/chambres/{id}', [App\Http\Controllers\ChambresController::class, 'destroy']);

