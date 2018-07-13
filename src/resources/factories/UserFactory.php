<?php

use CodePress\CodeUser\Models\User;

$factory->define(User::class, function () {
    return [
        'name' => 'user',
        'email' => 'user@email.com',
        'password' => bcrypt(123456),
        'remember_token' => str_random(10),
    ];
});
