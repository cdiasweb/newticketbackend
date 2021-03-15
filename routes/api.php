<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\VerificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/company/register', [CompaniesController::class, 'register']);

//Route::post('/autentica', [AuthController::class, 'login']);

Route::get('/verify-email/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

