<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Models\Menu;
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

Route::get('/', function () {
    $menu = Menu::All();
    return view('app')->with(compact('menu'));
});
Route::resource('menu', MenuController::class);
Route::resource('pesanan', PesananController::class);
Route::get('menu/delete/{id}', [MenuController::class, 'destroy'])->name('menu.delete');
