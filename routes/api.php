<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;

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

Route::middleware(['auth:sanctum'])->group(function () {
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
});



// End point Register dan Login
Route::post("/register", [AuthController::class, "register"]);

Route::post("/login", [AuthController::class, "login"]);
