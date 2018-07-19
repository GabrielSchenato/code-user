<?php

Route::name('admin.')
        ->prefix('admin/')
        ->middleware('web')
        ->namespace('CodePress\CodeUser\Controllers')
        ->group(function () {
            Route::resources(['users' => 'UsersController']);
            Route::resource('roles', 'RolesController')->except([
                'destroy'
            ]);
            Route::resource('permissions', 'PermissionsController')->only([
                'index', 'show'
            ]);                         
});
