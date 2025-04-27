<?php


use App\Http\Controllers\BookingController;
use App\Http\Controllers\NeshanController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TravelPackageController;

//travelPackages
Route::post('/travel-packages', [TravelPackageController::class, 'store']);
Route::get('/travel-packages', [TravelPackageController::class, 'index']);
Route::post('/packages/{packageId}/bookings', [BookingController::class, 'store']);

//neshan, openStreetMap, googleMap , etc....
Route::get('/neshan-location-info', [NeshanController::class, 'getLocationInfo']);
