<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Task;
use App\Http\Livewire\EditModal;
use App\Http\Livewire\Addmenu;
use App\Http\Livewire\EditExtension;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/task',Task::class)->middleware(['auth'])->name('task');

Route::get('/editmenu',EditExtension::class)->middleware(['auth'])->name('editmenu');

Route::get('/addmenu',Addmenu::class)->middleware(['auth'])->name('addmenu');


require __DIR__.'/auth.php';
