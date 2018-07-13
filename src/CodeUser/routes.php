<?php

Route::name('admin.')
        ->prefix('admin/')
        ->middleware('web')
        ->namespace('CodePress\CodeUser\Controllers')
        ->group(function () {
            Route::resources([
                'users' => 'UsersController'
            ]);
        });
