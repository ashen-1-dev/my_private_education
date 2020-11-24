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

Route::group(['prefix' => 'tasks'], function () {
    Route::post('', 'TaskController@createTask')->name('create_task_route'); // Добавить новое задание
    Route::get('', 'TaskController@allTasks')->name('show_tasks_route');    // Просмотреть все задания(неоптимизированно)
    Route::get('{taskId}', 'TaskController@showTask')->name('one_task_route'); // Посмотреть задание {id}
    Route::put('task}', 'TaskController@editTask')->name('edit_task_route'); // Изменить задание {id}
    Route::delete('{task}', 'TaskController@deleteTask')->name('delete_task_route'); // Удалить задание {id}
});

Route::get('headteachers', 'HeadTeacherController@index'); //получение списка всех завучей
Route::group(['prefix' => 'profile/headteacher'], function () {
    Route::get('{headteacher}', 'HeadTeacherController@show'); //получение завуча
    Route::put('{headteacher}', 'HeadTeacherController@update'); //обновление завуча
});

Route::get('teachers', 'TeacherController@index'); //получение списка всех учителей
Route::group(['prefix' => 'profile/teacher'], function () {
    Route::get('{teacher}', 'TeacherController@show'); //получение учителя
    Route::put('{teacher}', 'TeacherController@update'); //обновление учителя
});

Route::get('students', 'StudentController@index'); //получение списка всех завучей
Route::group(['prefix' => 'profile/student'], function () {
    Route::get('{student}', 'StudentController@show'); //получение завуча
    Route::put('{student}', 'StudentController@update'); //обновление завуча
});

Route::get('parents', 'ParenttController@index'); //получение списка всех родителей
Route::group(['prefix' => 'profile/parent'], function () {
    Route::get('{parent}', 'ParenttController@show'); //получение родителя
    Route::put('{parent}', 'ParenttController@update'); //обновление родителя
});

Route::get('classes', 'SchoolClassController@index'); //получение списка всех классов
Route::group(['prefix' => 'class'], function () {
    Route::post('', 'SchoolClassController@store'); //создание класса
    Route::get('{schoolClass}', 'SchoolClassController@show'); //получение класса
    Route::put('{schoolClass}', 'SchoolClassController@update'); //обновление класса
});

