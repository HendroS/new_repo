<?php


//use App\Http\Controllers\CourseController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GeolocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



//validasi user param user id  request['course_id','operator_id']. 
Route::put('/validation/{id}','App\Http\Controllers\UserRegistrationController@validation');
//Fill additional profile detail. return user.
Route::put('/userProfiles','App\Http\Controllers\UserRegistrationController@userFill');
//Registrasi user need request['latitude','longitude','altitude','email','password'].return user.
Route::post('/users', 'App\Http\Controllers\UserRegistrationController@regUser');


// Crud masing-masing data tabel
// method POST,GET,DELETE,PUT
Route::apiResource('/courses', CourseController::class);
Route::apiResource('/admins', AdminController::class);
Route::apiResource('/geolocs',GeolocationController::class);
