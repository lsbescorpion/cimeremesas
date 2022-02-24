<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('imports', ExcelController::class);
Route::get('/checks',[ExcelController::class,'check']);
Route::post('/verify',[ExcelController::class,'verify'])->name('imports.verify');

Route::post('/imports/uploadfiles', [ExcelController::class,'uploadFiles'])->name('uploadFiles');
Route::post('/imports/removefiles', [ExcelController::class,'removeFiles'])->name('removeFiles');

