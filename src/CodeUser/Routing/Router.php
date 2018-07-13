<?php

namespace CodePress\CodeUser\Routing;

use Illuminate\Support\Facades\Route;

/**
 * 
 *
 * @author gabriel
 */
class Router
{

    public function auth()
    {
        $namespace = "\\CodePress\\CodeUser\\Controllers";
        Route::group([
            'namespace' => null
        ], function () use ($namespace) {
            Route::get('login', "$namespace\\Auth\\LoginController@showLoginForm")->name('login');
            Route::post('login', "$namespace\\Auth\\LoginController@login");
            Route::post('logout', "$namespace\\Auth\\LoginController@logout")->name('logout');

            // Password Reset Routes...
            Route::get('password/reset', "$namespace\\Auth\\ForgotPasswordController@showLinkRequestForm")->name('password.request');
            Route::post('password/email', "$namespace\\Auth\\ForgotPasswordController@sendResetLinkEmail")->name('password.email');
            Route::get('password/reset/{token}', "$namespace\\Auth\\ResetPasswordController@showResetForm")->name('password.reset');
            Route::post('password/reset', "$namespace\\Auth\\ResetPasswordController@reset");
        });
    }

}
