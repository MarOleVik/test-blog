<?php

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Nnjeim\World\World;

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

Route::get('getAllCountries', function (){
    return World::countries([
        'fields' => 'id, name',
    ])->data;
});
Route::post('getCitiesByCountry', function (){
    return World::states([
        'fields' => 'id, name',
        'filters' => [
            'country_id' => request('country_id'),
        ]
    ])->data;
});
