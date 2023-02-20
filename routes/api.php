<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
Use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 
// Route::get('users', function() {
//     // If the Content-Type and Accept headers are set to 'application/json', 
//     // this will return a JSON structure. This will be cleaned up later.
//     return User::all();
// });
 
// Route::get('users/{id}', function($id) {
//     return User::find($id);
// });

// Route::post('users', function(Request $request) {
//     $data = $request->all();
//     $password = Hash::make($data['password']);
//     return User::create([
//         'username' => $data['username'],
//         'password' => $password,
//     ]);
// });

// Route::put('users/{id}', function(Request $request, $id) {
//     $article = User::findOrFail($id);
//     $article->update($request->all());

//     return $article;
// });

// Route::delete('users/{id}', function($id) {
//     User::find($id)->delete();

//     return 204;
// });

Route::get('users', 'App\Http\Controllers\UserController@index');
Route::get('users/{id}', 'App\Http\Controllers\UserController@show');
Route::post('users', 'App\Http\Controllers\UserController@store');
Route::post('login', 'App\Http\Controllers\UserController@login');
Route::put('users/{id}', 'App\Http\Controllers\UserController@update');
Route::delete('users/{id}', 'App\Http\Controllers\UserController@delete');
