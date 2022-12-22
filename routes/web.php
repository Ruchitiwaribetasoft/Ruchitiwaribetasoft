<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\MailController;
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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auth/google/redirect', [AuthController::class, 'googleredirect'])->name('googleredirect');
Route::get('/auth/google/callback', [AuthController::class, 'googlecallback']);


//Email send
Route::get('/sendemail', [MailController::class, 'sendEmail']);

// Route::get('send-mail', function () {

//     $user = [
//         'name' => 'Websolutionstuff',
//         'info' => 'This is mailgun example in laravel 9'
//     ];

//     \Mail::to('softwaretester491@gmail.com')->send(new \App\Mail\EmailDemo($user));

//     dd("Successfully send mail..!!");

// });

