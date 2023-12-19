<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/users', function (Request $request) {
    try {
        // Ваш код для получения ресурсов

        // Получите общее количество ресурсов, например, из базы данных
        $totalCount = 1; // Замените этот код соответствующим образом

        // Возвращаемый массив с данными
        $data = [['id' => 1, 'test' => 'test']];

        // Устанавливаем заголовок X-Total-Count в ответе
        return response($data)->header('Access-Control-Expose-Headers', 'X-Total-Count')->header('X-Total-Count', $totalCount);
    } catch (\Exception $e) {
        // Логика обработки ошибок, если это необходимо
        return response()->json(['error' => 'Something went wrong'], 500);
    }
});

Route::get('/users/{id}', function (Request $request) {
    try {
        // Ваш код для получения ресурсов

        // Получите общее количество ресурсов, например, из базы данных
        $totalCount = 1; // Замените этот код соответствующим образом

        // Возвращаемый массив с данными
        $data = ['id' => 1, 'test' => 'test'];

        // Устанавливаем заголовок X-Total-Count в ответе
        return response($data)->header('Access-Control-Expose-Headers', 'X-Total-Count')->header('X-Total-Count', $totalCount);
    } catch (\Exception $e) {
        // Логика обработки ошибок, если это необходимо
        return response()->json(['error' => 'Something went wrong'], 500);
    }
});
