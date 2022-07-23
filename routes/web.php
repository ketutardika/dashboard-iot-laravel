<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\SensorsDeviceController;
use App\Http\Controllers\SensorsTypeController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\SettingGeneralsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard')->middleware('auth');

// Route::get('/{id}', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard-user')->middleware('auth');

Route::get('hello', [App\Http\Controllers\HomeController::class, 'hello'])->name('hello')->middleware('auth');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});
Route::resource('farms', FarmsController::class);
Route::resource('projects', ProjectsController::class);
Route::resource('sections', SectionsController::class);
Route::resource('sensors', SensorsDeviceController::class);

Route::get('/sensors/dashboard/{unique_id}', [App\Http\Controllers\SensorsDeviceController::class, 'dashboardShow'])->name('sensors.dashboard')->middleware('auth');
Route::delete('/sensors/dashboard/deleted/{id}', [App\Http\Controllers\SensorsDeviceController::class, 'deleted'])->name('sensors.dashboard-deleted')->middleware('auth');
Route::get('/sensors/dashboard/create/{unique_id}', [App\Http\Controllers\SensorsDeviceController::class, 'createSensor'])->name('sensors.createsensor')->middleware('auth');
Route::get('/sensors/api/{unique_id}', [App\Http\Controllers\SensorsDeviceController::class, 'apiShow'])->name('sensors.api')->middleware('auth');
Route::get('/sensors/config/{unique_id}', [App\Http\Controllers\SensorsDeviceController::class, 'configShow'])->name('sensors.config')->middleware('auth');
Route::get('/sensors/datalog/{unique_id}', [App\Http\Controllers\SensorsDeviceController::class, 'datalogShow'])->name('sensors.datalog')->middleware('auth');
Route::resource('sensors-type', SensorsTypeController::class);

Route::get('data/{unique_id}/{type}', [App\Http\Controllers\SensorsDeviceController::class, 'data'])->name('sensors.daya')->middleware('auth');

Route::get('monitor/{unique_id}', [App\Http\Controllers\SensorsDeviceController::class, 'monitor'])->name('sensors.monitor')->middleware('auth');

Route::get('update', [App\Http\Controllers\DataController::class, 'update'])->name('datas.update')->middleware('auth');


Route::get('data/{unique_id}/{type}', [App\Http\Controllers\DataController::class, 'data'])->name('datas.data')->middleware('auth');

Route::get('api/data/push', [App\Http\Controllers\DataController::class, 'update'])->name('datas.push');

Route::get('ex', [App\Http\Controllers\ExController::class, 'index']);
Route::get('ex/{id}', [App\Http\Controllers\ExController::class, 'show']);
Route::get('ex/change/{id}/{status}', [App\Http\Controllers\ExController::class, 'changeStatus']);


Route::get('/settings/general', [SettingGeneralsController::class, 'index'])->name('settings.dashboard-general')->middleware('auth');

Route::put('/settings/general/update/{id}', [SettingGeneralsController::class, 'update'])->name('settings.general-update')->middleware('auth');