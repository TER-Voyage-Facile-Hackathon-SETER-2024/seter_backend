<?php

use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\GareController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\TrainController;
use App\Http\Controllers\ValidationNumber;
use App\Http\Controllers\VoyageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->post('v1/logout', [LoginController::class,'logout']);


Route::post('v1/code-auto', [ValidationNumber::class,'getCodeAuto']);
Route::post('v1/verify-otp', [ValidationNumber::class,'verifyOtp']);
Route::post('v1/register', [LoginController::class,'register']);
Route::put('v1/register',[LoginController::class,'update']);
Route::get('v1/register/{id}',[LoginController::class,'getUser']);
Route::get('v1/gare',[GareController::class,'index']);
Route::post('v1/gare',[GareController::class,'store']);
Route::get('v1/train',[TrainController::class,'index']);
Route::post('v1/train',[TrainController::class,'store']);
Route::post('v1/voyage',[VoyageController::class,'store']);
Route::get('v1/voyage',[VoyageController::class,'index']);
Route::get('v1/voyage/{id}',[VoyageController::class,'byUser']);
Route::post('v1/qr-code',[QrCodeController::class,'generateQrCode']);
Route::post('v1/abonnement',[AbonnementController::class,'store']);
Route::get('v1/abonnement',[AbonnementController::class,'index']);
Route::get('v1/abonnement/{id}',[AbonnementController::class,'byUser']);
Route::post('v1/qr-code',[QrCodeController::class,'generateQrCode']);


