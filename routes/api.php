<?php

use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\HireController;
use Illuminate\Support\Facades\Route;

Route::get('/freelancers', [FreelancerController::class, 'index']);
Route::get('/freelancers/{freelancer}', [FreelancerController::class, 'show']);
Route::post('/hire/{freelancer}', [HireController::class, 'store']);
Route::post('/payment/{hire}/confirm', [HireController::class, 'confirm']);
