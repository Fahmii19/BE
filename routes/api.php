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

// Api Data Pasien Covid

Route::middleware(['auth:sanctum'])->group(function () {
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

    // Search resource by name
    Route::get("/covid/search/{name}", [PasienCovid::class, "search"]);

    // Get Positive Covid
    Route::get("/covid/positive/{name}", [PasienCovid::class, "positive"]);

    // Get Sembuh Covid
    Route::get("/covid/recover/{name}", [PasienCovid::class, "recover"]);

    // Get Death Covid
    Route::get("/covid/death/{name}", [PasienCovid::class, "death"]);
});
