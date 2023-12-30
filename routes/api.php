<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutContent;

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

Route::get('/about/page/{slug}', [AboutContent::class, 'pageContent']);
Route::get('/about', [AboutContent::class, 'all']);
Route::get('/about/{id}', [AboutContent::class, 'data']);
Route::post('/about', [AboutContent::class, 'store']);
Route::put('/about/{id}', [AboutContent::class, 'store']);
Route::delete('/about/{id}', [AboutContent::class, 'remove']);
Route::get('/topBar/links', [AboutContent::class, 'topBarLinks']);
