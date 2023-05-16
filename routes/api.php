<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CdoController;
use App\Http\Controllers\Api\AllCdoController;

use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\AllProjectController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\AllPartnerController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AllUserController;
use App\Http\Controllers\Api\LogOutController;
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
Route::post('/auth/login', [LoginController::class, 'loginUser']);
Route::post('/auth/register', [RegisterController::class, 'createUser']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
///Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [LogOutController::class, 'logout']) ;
///api
Route::get('/user/show', function (Request $request) {
    $user = Auth::guard('sanctum')->user();

    return response()->json([
        'id' => $user->id,
        'fullName' => $user->fullName,
        'role' => $user->role,
        'address' => $user->address,
        'phoneNumber' => $user->phoneNumber,
    ]);
});
    Route::apiResource('/cdo', CdoController::class);
    Route::apiResource('/partner', PartnerController::class);
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/project', ProjectController::class);
///all
    Route::get('/all-users', AllUserController::class);
    Route::get('/all-partner', AllPartnerController::class);
    Route::get('/all-cdo', AllCdoController::class);
    Route::get('/all-project', AllProjectController::class);

///search
    Route::get('search-project/{title}', [ProjectController::class , "search"]);
    Route::get('search-cdo/{name}', [CdoController::class , "search"]) ;
    Route::get('search-user/{fullName}', [UserController::class , "search"]);
    Route::get('search-partner/{fullName}', [PartnerController::class , "search"]);
//});

