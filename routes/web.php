<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Notifications\sendNotification;

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

Route::get('/send', function () {
    /* User::find(1)->notify(new sendNotification); */
    $users=User::all();
    Notification::send($users, new sendNotification);
});
Route::get('/ondmand', function () {
    Notification::route('mail', 'banikalam95@gmail.com')
            ->notify(new sendNotification);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
