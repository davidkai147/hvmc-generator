<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Core\Base\Helpers\BaseHelper;
use DummyNamespace\Http\Controllers\DummyNameController;

/**
 * Admin routes
 */

$moduleRoute = 'DummyAlias';

Route::group(['prefix' => BaseHelper::getAdminPrefix()], function () {
    Route::group([
        'prefix' => strtolower(Config::get('DummyAlias.name')),
        'middleware' => [
            'module.authentication:admin'
        ]
    ], function () {
        Route::get('/', [DummyNameController::class, 'index'])->name(Config::get('DummyAlias.route.admin.list'));
        Route::get('/create', [DummyNameController::class, 'form'])->name(Config::get('DummyAlias.route.admin.create'));
        Route::get('/edit/{id}', [DummyNameController::class, 'show'])->name(Config::get('DummyAlias.route.admin.show'));
        Route::post('/edit/{id}', [DummyNameController::class, 'update'])->name(Config::get('DummyAlias.route.admin.edit'));
        Route::post('/store', [DummyNameController::class, 'store'])->name(Config::get('DummyAlias.route.admin.store'));
    });
});