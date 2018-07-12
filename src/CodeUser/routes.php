<?php

Route::name('admin.')
        ->prefix('admin/')
        ->middleware('web')
        ->namespace('CodePress\CodeTag\Controllers')
        ->group(function () {
            Route::resources([
                'tags' => 'AdminTagsController'
            ]);
        });
