<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\CustomLogoutController;
use App\Http\Middleware\RedirectIfLoggedOut;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/services',[App\Http\Controllers\ExcelController::class,'services'])->name('services');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::delete('/delete', [App\Http\Controllers\ExcelController::class, 'delete'])->name('delete');

    Route::get('/history', [ExcelController::class, 'showImportHistory'])->name('history');
    Route::get('/feuille-tabs/{filename}/{importDateTime}', [ExcelController::class, 'showFeuilleTabs'])->name('feuille-tabs.show');

    Route::get('/feuille/system/{filename}/{importDateTime}', [ExcelController::class, 'showFeuille1Data'])->name('historique.system');
    Route::get('/feuille/stgtables/{filename}/{importDateTime}', [ExcelController::class, 'showFeuille2Data'])->name('historique.stgtables');
    Route::get('/feuille/datatype/{filename}/{importDateTime}', [ExcelController::class, 'showFeuille3Data'])->name('historique.datatype');
    Route::get('/feuille/supplements/{filename}/{importDateTime}', [ExcelController::class, 'showFeuille4Data'])->name('historique.supplements');
    Route::get('/feuille/bkey/{filename}/{importDateTime}', [ExcelController::class, 'showFeuille5Data'])->name('historique.bkey');
    Route::get('/feuille/bmap/{filename}/{importDateTime}', [ExcelController::class, 'showFeuille6Data'])->name('historique.bmap');
    Route::get('/feuille/bmapvalues/{filename}/{importDateTime}', [ExcelController::class, 'showFeuille7Data'])->name('historique.bmapvalues');
    Route::get('/feuille/coretables/{filename}/{importDateTime}', [ExcelController::class, 'showFeuille8Data'])->name('historique.coretables');
    Route::get('/feuille/tablemapping/{filename}/{importDateTime}', [ExcelController::class, 'showFeuille9Data'])->name('historique.tablemapping');
    Route::get('/feuille/columnmaping/{filename}/{importDateTime}', [ExcelController::class, 'showFeuille10Data'])->name('historique.columnmapping');

    Route::get('/import',[App\Http\Controllers\ExcelController::class,'index'])->name('import');
    Route::post('import',[App\Http\Controllers\ExcelController::class,'importexceldata']);

    Route::get('/system', [ExcelController::class, 'system'])->name('system');
    Route::get('/stgtables', [ExcelController::class, 'stgtables'])->name('stgtables');
    Route::get('/datatype', [ExcelController::class, 'datatype'])->name('datatype');
    Route::get('/supplements', [ExcelController::class, 'supplements'])->name('supplements');
    Route::get('/bkey', [ExcelController::class, 'bkey'])->name('bkey');
    Route::get('/bmap', [ExcelController::class, 'bmap'])->name('bmap');
    Route::get('/bmapvalues', [ExcelController::class, 'bmapvalues'])->name('bmapvalues');
    Route::get('/coretables', [ExcelController::class, 'coretables'])->name('coretables');
    Route::get('/tablemapping', [ExcelController::class, 'tablemapping'])->name('tablemapping');
    Route::get('/columnmapping', [ExcelController::class, 'columnmapping'])->name('columnmapping');

    
   

});

require __DIR__.'/auth.php';
