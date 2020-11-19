<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/tasks', 'App\Http\Controllers\TaskController@createTask')->name('create_task_route'); // Добавить новое задание
Route::get('/tasks', 'App\Http\Controllers\TaskController@allTasks')->name('show_tasks_route');    // Просмотреть все задания(неоптимизированно)
Route::get('/tasks/{taskId}', 'App\Http\Controllers\TaskController@showTask')->name('one_task_route'); // Посмотреть задание {id}
Route::put('/tasks/{task}', 'App\Http\Controllers\TaskController@editTask')->name('edit_task_route'); // Изменить задание {id}
Route::delete('/tasks/{task}', 'App\Http\Controllers\TaskController@deleteTask')->name('delete_task_route'); // Удалить задание {id}

