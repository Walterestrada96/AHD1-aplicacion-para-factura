<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\FacturaModel;


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

Route::get('/', [HomeController::class, "index"])->name("facturas.index"); 

Route::post('facturas/create', [HomeController::class, "create"])->name("facturas.create"); 
Route::post('facturas/update', [HomeController::class, "update"])->name("facturas.update"); 
Route::get('facturas/delete-{id}', [HomeController::class, "delete"])->name("facturas.delete"); 



