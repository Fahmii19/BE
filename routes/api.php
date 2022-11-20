<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PasienCovid;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// menampilkan data
Route::get("/students", [StudentController::class, "index"]);

// menambahkan data
Route::post("/students", [StudentController::class, "store"]);

// menampilkkan data berdasarkan id
Route::get("/students/{id}", [StudentController::class, "show"]);

// mengubah data
Route::put("/students/{id}", [StudentController::class, "update"]);

// menghapus data
Route::delete("/students/{id}", [StudentController::class, "destroy"]);


// Api Data Pasien Covid

// menampilkan data covid keseluruhan
Route::get("/covid", [PasienCovid::class, "index"]);

// Menambahkan satu data pasien covid
Route::post("/covid", [PasienCovid::class, "store"]);

// Menampilkan data covid berdasarkan id
Route::get("/covid/{id}", [PasienCovid::class, "show"]);

// Mengubah data covid berdasarkan id
Route::put("/covid/{id}", [PasienCovid::class, "update"]);

// Menghapus data covid berdasarkan id
Route::delete("/covid/{id}", [PasienCovid::class, "destroy"]);
