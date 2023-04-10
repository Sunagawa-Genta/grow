<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FinishController;
use App\Http\Controllers\ChatFavoriteController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\ChartjsController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ReplyController;



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
Route::middleware('auth')->group(function () {
  Route::post('chat/{chat}/favorites', [ChatFavoriteController::class, 'store'])->name('favorites');
  Route::post('chat/{chat}/unfavorites', [ChatFavoriteController::class, 'destroy'])->name('unfavorites');
  Route::post('goal/{goal}/finishes', [FinishController::class, 'store'])->name('finishes');
  Route::post('goal/{goal}/unfinishes', [FinishController::class, 'destroy'])->name('unfinishes');
  Route::resource('chat', ChatController::class);
  Route::get('/goal/mypage', [GoalController::class, 'mydata'])->name('goal.mypage');
  Route::resource('goal', GoalController::class);
  Route::get('full-calender',[FullCalenderController::class,'index'])->name('full-calender');
  Route::post('full-calender/action', [FullCalenderController::class, 'action']);
  Route::resource('chartjs', ChartjsController::class);
  Route::resource('log', LogController::class);
  Route::get('/log/mypage', [LogController::class, 'mydata'])->name('log.mypage');
  Route::post('/posts/{postId}/replies', [ReplyController::class, 'store'])->name('replies.store');
  Route::delete('/replies/{id}', [ReplyController::class, 'destroy'])->name('replies.destroy');
});


Route::get('/', function () {
    return view('welcome');
});


Route::get('/event', function () {
    return view('event');
})->middleware(['auth', 'verified'])->name('event');

// Route::get('/chartjs', function () {
//     return view('chartjs/chartjs');
// })->middleware(['auth', 'verified'])->name('chartjs');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/use', function () {
    return view('use');
})->middleware(['auth', 'verified'])->name('use');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
