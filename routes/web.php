<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\CreatorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\CabinetController;

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

//Route::resource('product', 'ProductController');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'product'], function () {
    Route::get('/{id}', [HomeController::class, 'product'])->name('product');
    Route::post('/{id}/addFavorites', [HomeController::class, 'addFavorites'])
        ->name('product.addFavorites');
    Route::post('/{id}/removeFromFavorites', [HomeController::class, 'removeFromFavorites'])
        ->name('product.removeFromFavorites');
});

Route::group(['prefix' => 'cabinet'], function () {
    Route::get('/favorites', [CabinetController::class, 'favorites'])->name('cabinet.favorites');
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', [CabinetController::class, 'index'])->name('cabinet.index');
        Route::get('/orders', [CabinetController::class, 'ordersIndex'])->name('cabinet.orders');
        Route::get('/order/{id}', [CabinetController::class, 'order'])->name('cabinet.order');
        Route::get('/order/{id}/export', [CabinetController::class, 'export'])->name('cabinet.order.export');
        Route::get('/form', [CabinetController::class, 'form'])->name('cabinet.form');
        Route::post('/form/change', [CabinetController::class, 'changeInformation'])->name('cabinet.changeInformation');
        Route::get('/form/changePassword', [CabinetController::class, 'indexPassword'])->name('cabinet.indexPassword');
        Route::post('/form/changePassword', [CabinetController::class, 'changePassword'])->name('cabinet.changePassword');
    });
});

Route::get('/reset', [ResetController::class, 'reset'])->name('reset');
Route::get('/search', [HomeController::class, 'search'])->name('search');

// ВЗАИМОДЕЙСТВИЕ С СИСТЕМОЙ
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Форма
Route::group(['prefix' => 'editDB', 'middleware' => 'auth'], function () {
    Route::get('', [HomeController::class, 'edit'])->name('editDB');
    Route::post('/submit', [HomeController::class, 'store'])->name('editDB.store');
});

//АДМИНКА
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', 'is_admin'],
    'namespace' => ''], function () {
    //ЗАКАЗЫ
    Route::get('', [OrderController::class, 'index'])->name('adminMain');
    Route::get('orders/{id}', [OrderController::class, 'order'])->name('admin.order');
    Route::get('orders/{id}/delete', [OrderController::class, 'delete'])
        ->name('deleteOrder');
    Route::post('orders/{id}/change', [OrderController::class, 'change'])
        ->name('changeOrder');
    Route::get('orders/{id}/check', [OrderController::class, 'check'])
        ->name('checkOrder');

    //Продукты
    Route::group(['prefix' => 'products'], function () {
        Route::get('', [ProductController::class, 'index'])
            ->name('product.index');
        Route::get('/form', [ProductController::class, 'addForm'])
            ->name('product.addForm');
        Route::post('/add', [ProductController::class, 'addProduct'])
            ->name('product.add');
        Route::get('/{id}/delete', [ProductController::class, 'deleteProduct'])
            ->name('product.delete');
        Route::get('/{id}/change', [ProductController::class, 'changeProduct'])
            ->name('product.change');
        Route::post('/{id}/update', [ProductController::class, 'updateProduct'])
            ->name('product.update');
        Route::get('export', [ProductController::class, 'export'])
            ->name('product.export');
        Route::get('addExportForm', [ProductController::class, 'addExportForm'])
        ->name('product.addExportForm');
        Route::post('import', [ProductController::class, 'import'])
            ->name('product.import');
    });

    //Виды
    Route::group(['prefix' => 'types'], function () {
        Route::get('', [TypeController::class, 'index'])
            ->name('type.index');
        Route::get('/form', [TypeController::class, 'addFrom'])
            ->name('type.addForm');
        Route::post('/add', [TypeController::class, 'add'])
            ->name('type.add');
        Route::get('/{id}/change', [TypeController::class, 'updateFrom'])
            ->name('type.updateForm');
        Route::post('/{id}/update', [TypeController::class, 'update'])
            ->name('type.update');
        Route::get('/{id}/delete', [TypeController::class, 'delete'])
            ->name('type.delete');
        Route::get('export', [TypeController::class, 'export'])
            ->name('type.export');
        Route::get('addExportForm', [TypeController::class, 'addExportForm'])
            ->name('type.addExportForm');
        Route::post('import', [TypeController::class, 'import'])
            ->name('type.import');
    });

    //Создатели
    Route::group(['prefix' => 'creators'], function () {
        Route::get('', [CreatorController::class, 'index'])
            ->name('creator.index');
        Route::get('/form', [CreatorController::class, 'addForm'])
            ->name('creator.addForm');
        Route::post('/add', [CreatorController::class, 'add'])
            ->name('creator.add');
        Route::get('/{id}/change', [CreatorController::class, 'updateForm'])
            ->name('creator.updateForm');
        Route::post('/{id}/update', [CreatorController::class, 'update'])
            ->name('creator.update');
        Route::get('/{id}/delete', [CreatorController::class, 'delete'])
            ->name('creator.delete');
        Route::get('export', [CreatorController::class, 'export'])
            ->name('creator.export');
        Route::get('addExportForm', [CreatorController::class, 'addExportForm'])
            ->name('creator.addExportForm');
        Route::post('import', [CreatorController::class, 'import'])
            ->name('creator.import');
    });

});

//МАРШРУТЫ КОРЗИНЫ
Route::group(['prefix' => 'basket'], function () {
    Route::post('/add/{id}', [BasketController::class, 'basketAdd'])->name('basket-add');
    Route::group(['middleware' => 'basket_not_empty'], function () {
        Route::get('', [BasketController::class, 'basket'])->name('basket');
        Route::get('/order', [BasketController::class, 'basketOrder'])->name('basket-order');
        Route::post('/order', [BasketController::class, 'basketConfirm'])
            ->name('basket-confirm');
        Route::post('/remove/{id}', [BasketController::class, 'basketRemove'])
            ->name('basket-remove');
    });
});

Route::get('products/{type}', [HomeController::class, 'category'])->name('ProductsOfThisType');
Route::get('creator/{id}', [HomeController::class, 'creator'])->name('CreatorsProducts');




