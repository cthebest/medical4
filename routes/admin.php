<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resources([
        'articles' => ArticleController::class,
        'categories' => CategoryController::class,
        'menu-items' => MenuItemController::class,
        'roles' => RoleController::class,
    ]);
});
