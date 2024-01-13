<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SalaryController;
use App\Models\Employee;
use App\Models\Purchase;
use App\Models\Salary;
use Illuminate\Support\Facades\Route;

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

Route::get("/", function () {
    return view('home');
});
Route::get("/items", [ItemController::class, "index"]);
Route::post("/items", [ItemController::class, "store"]);
Route::delete("/items/{item}", [ItemController::class, "destroy"]);
Route::get("/items/input", function () {
    return view("items/input");
});

Route::get("/salaries", [SalaryController::class, "index"]);
Route::post("/salaries", [SalaryController::class, "store"]);
Route::delete("/salaries/{salary}", [SalaryController::class, "destroy"]);
Route::get("/salaries/input", function () {
    $employees = Employee::all();
    return view("salaries/input", [
        "employees" => $employees
    ]);
});
