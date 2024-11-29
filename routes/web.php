<?php

use App\Events\UserRegistered;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    event(new UserRegistered(request('username')));

    return 'Event fired';
});

Route::get('register-user', function () {
    $user = [
        'name' => 'John Doe',
        'email' => 'johndoe@gmail.com',
        'username' => 'johndoe'
    ];

    event(new UserRegistered($user));

    return 'Mengirim email ke ' . $user['email'];
});
