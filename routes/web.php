<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BasketController;

Auth::routes([
    'reset'=>false,
    'confirm'=>false,
    'verify'=>false,
]);

//Route::resource('books', 'BookController');

Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('book/{id}', [BookController::class,'book'])->name('book');

//ВЗАИМОДЕЙСТВИЕ С СИСТЕМОЙ
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');

//УПРАВЛЕНИЕ БАЗОЙ ДАННЫХ
Route::group(['prefix' => 'editDB','middleware' => ['auth','is_admin']],function (){
    Route::get('', [BookController::class, 'edit'])->name('editDB');
    Route::get('/{id}/delete', [BookController::class, 'deleteBook'])->name('editDB.delete');
    Route::get('/{id}/change', [BookController::class, 'changeBook'])->name('editDB.change');
    Route::post('/{id}/update', [BookController::class, 'updateBook'])->name('editDB.update');
    Route::post('/submit', [BookController::class, 'store'])->name('editDB.store');
    Route::post('/submit/{id}', [BookController::class, 'create'])->name('editDB.create');
});

//МАРШРУТЫ КОРЗИНЫ
Route::group(['prefix'=>'basket'],function (){
    Route::post('/add/{id}',[BasketController::class,'basketAdd'])->name('basket-add');
    Route::group(['middleware'=>'basket_not_empty'],function (){
        Route::get('',[BasketController::class,'basket'])->name('basket');
        Route::get('/place',[BasketController::class,'basketPlace'])->name('basket-place');
        Route::post('/place',[BasketController::class,'basketConfirm'])
            ->name('basket-confirm');
        Route::post('/remove/{id}',[BasketController::class,'basketRemove'])
            ->name('basket-remove');
    });
});

Route::get('{genre}', [BookController::class, 'category'])->name('BooksOfThisGenre');




