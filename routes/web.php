<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\Mail\Welcome as WelcomeEmail;
//use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use App\User;
Route::get('/', function () {
    return view('welcome');
});
Route::get('welcome', function () {
    //second method
    $user = new User([
        'name' => 'Carlos Romero Garcia',
        'email' => 'carlos@gmail.com',
    ]);

    Mail::to($user->email, $user->name)
        ->cc('alex@muserpol.gob.bo')
        ->bcc('ronal@muserpol.gob.bo')
        ->send(new WelcomeEmail($user));

    //first method
    // Mail::send('emails.welcome', ['name' => 'Felix'], function(Message $message) {
    //     $message->to('fbalderrama@muserpol.gob.bo', 'Felix Balderrama')
    //             ->from('mmamani@muserpol.gob.bo', 'Miguel Mamani')
    //             ->subject('Bienvenido a Muserpol');
    // });
});

Auth::routes();

Route::get('/home', 'HomeController@index');
