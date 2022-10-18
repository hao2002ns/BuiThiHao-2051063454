<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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
// Route::get('Student/manage', function () {
//  return view('Student_manage');
// });
Route::get('student/list',[StudentController::class,'get_all_student']);
Route::get('student/create',[StudentController::class,'create']);
Route::post('student/create',[StudentController::class,'store']);
Route::get('student/edit/{id}',[StudentController::class,'edit']);
Route::post('student/edit/{id}',[StudentController::class,'update']);
Route::get('student/delete/{id}',[StudentController::class,'destroy']);



