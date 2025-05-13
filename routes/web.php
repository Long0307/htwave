<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\SolutionforCustomerController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TechnologyStatusController;
use App\Http\Controllers\TechnologyCategoryController;
use App\Http\Controllers\AwardsAndCertificationController;
use App\Http\Controllers\ContactWithCusController;
use App\Http\Controllers\SolutionCategriesController;
use App\Http\Controllers\TechnologiesForCustomerController;
use App\Http\Controllers\ProductForCustomerController;
use App\Http\Controllers\CompanyForCustomerController;
use App\Http\Controllers\HomeForCustomerController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\BannerInfoController;
use App\Http\Controllers\CKEditorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');

Route::get('/testForMail', [InquiryController::class, 'mail']);

// ===============================

Route::get('/', [HomeForCustomerController::class, 'index'])->name('homepage');
Route::get('/solution_{id}', [HomeForCustomerController::class, 'show'])->name('solution.show');
Route::get('/technology_{id}', [HomeForCustomerController::class, 'showTechnology'])->name('technology.show');

Route::get('/company', [CompanyForCustomerController::class, 'index'])->name('company');

Route::get('/product', [ProductForCustomerController::class, 'index'])->name('product');

Route::get('/technology', [TechnologiesForCustomerController::class, 'index'])->name('technology');

Route::get('/solution', [SolutionforCustomerController::class, 'index'])->name('solution');

Route::get('/solution-categories', [SolutionCategriesController::class, 'index'])->name('solution-categorie');
// Route::get('/solution-category-create', [SolutionCategriesController::class, 'create'])->name('solution-categorie-create');
Route::post('/solution-categories-create', [SolutionCategriesController::class, 'store'])->name('solution_categories.store');
Route::post('/solution-categories-delete', [SolutionCategriesController::class, 'delete'])->name('solution_categories.delete');
Route::delete('items/{id}', [SolutionCategriesController::class, 'destroy'])->name('items.destroy');

// Technology

Route::get('/storage-link', function(){
    $targetFolder = storage_path('app/public');
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    // dd($targetFolder);
    Storage::copy($targetFolder,$linkFolder);
});

Route::get('/contact', [ContactWithCusController::class, 'index'])->name('contact');
Route::post('/submit-inquiry', [InquiryController::class, 'store']);

Route::get('/technology-categories',[TechnologyCategoryController::class, 'index'])->name('technology_categories.index');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// đây là history
Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
Route::get('/history/create', [HistoryController::class, 'create'])->name('history.create');
Route::post('/history/store', [HistoryController::class, 'store'])->name('history.store');
Route::get('/history/edit_{id}', [HistoryController::class, 'edit'])->name('history.edit');
Route::put('/history/update_{id}', [HistoryController::class, 'update'])->name('history.update');
Route::get('/history/show_{id}', [HistoryController::class, 'show'])->name('history.show');
Route::delete('/history/destroy_{id}', [HistoryController::class, 'destroy'])->name('history.destroy');

Route::get('/bannerintro', [BannerInfoController::class, 'index'])->name('bannerintro.index');
Route::get('/bannerintro/create', [BannerInfoController::class, 'create'])->name('bannerintro.create');
Route::post('/bannerintro/store', [BannerInfoController::class, 'store'])->name('bannerintro.store');
Route::get('/bannerintro/edit_{id}', [BannerInfoController::class, 'edit'])->name('bannerintro.edit');
Route::put('/bannerintro/update_{id}', [BannerInfoController::class, 'update'])->name('bannerintro.update');
Route::get('/bannerintro/show_{id}', [BannerInfoController::class, 'show'])->name('bannerintro.show');
Route::delete('/bannerintro/destroy_{id}', [BannerInfoController::class, 'destroy'])->name('bannerintro.destroy');


Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        
        // Route::get('/storage', function(){
        //     $targetFolder = storage_path('app/public');
        //     $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
        //     symlink($targetFolder,$linkFolder);
        // });

        Route::resource('contacts', ContactController::class);
        Route::resource('technologies', TechnologyController::class);
        Route::resource(
            'awards-and-certifications',
            AwardsAndCertificationController::class
        );
        Route::resource('inquiries', InquiryController::class);
        Route::resource('solutions', SolutionController::class);
        Route::resource('banners', BannerController::class);
        Route::resource(
            'technology-categories',
            TechnologyCategoryController::class
        );
        Route::resource(
            'technology-statuses',
            TechnologyStatusController::class
        );
        Route::resource('users', UserController::class);
    });
