<?php

use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\HireController;
use Illuminate\Support\Facades\Route;

Route::get('/freelancers', [FreelancerController::class, 'index']);
Route::get('/freelancers/{freelancerId}', [FreelancerController::class, 'show']);
Route::post('/hire/{freelancerId}', [HireController::class, 'store']);
Route::post('/payment/{hireId}/confirm', [HireController::class, 'confirm']);
