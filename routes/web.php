<?php

use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Home\LandingPage;
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

Route::get('/', LandingPage::class)
    ->name('index');

Route::get('/Admin/Officer', Login::class)
    ->name('login');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/Admin', AdminDashboard::class)
        ->name('Admin.dashboard');

});
