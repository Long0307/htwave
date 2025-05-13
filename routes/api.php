<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\InquiryController;
use App\Http\Controllers\Api\SolutionController;
use App\Http\Controllers\Api\TechnologyController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\TechnologyStatusController;
use App\Http\Controllers\Api\TechnologyCategoryController;
use App\Http\Controllers\Api\AwardsAndCertificationController;

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

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('contacts', ContactController::class);

        Route::apiResource('technologies', TechnologyController::class);

        Route::apiResource(
            'awards-and-certifications',
            AwardsAndCertificationController::class
        );

        Route::apiResource('inquiries', InquiryController::class);

        Route::apiResource('solutions', SolutionController::class);

        Route::apiResource('banners', BannerController::class);

        Route::apiResource(
            'technology-categories',
            TechnologyCategoryController::class
        );

        Route::apiResource(
            'technology-statuses',
            TechnologyStatusController::class
        );

        Route::apiResource('users', UserController::class);
    });
