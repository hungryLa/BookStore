<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\ResetController;

Auth::routes([
    'reset'=>false,
    'confirm'=>false,
    'verify'=>false,
]);

//Route::resource('books', 'BookController');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('book/{id}', [HomeController::class,'book'])->name('book');
Route::get('/reset',[ResetController::class,'reset'])->name('reset');
Route::get('/search',[HomeController::class, 'search'])->name('search');

// ВЗАИМОДЕЙСТВИЕ С СИСТЕМОЙ
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Форма
Route::group(['prefix' => 'editDB','middleware' => 'auth'],function (){
    Route::get('', [HomeController::class, 'edit'])->name('editDB');
    Route::post('/submit', [HomeController::class, 'store'])->name('editDB.store');
});

//АДМИНКА
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth','is_admin'],
    'namespace' => ''], function(){
    //ЗАКАЗЫ
    Route::get('',[OrderController::class, 'index'])->name('adminMain');
    Route::get('orders/{id}/delete',[OrderController::class, 'delete'])
        ->name('deleteOrder');
    Route::get('orders/{id}/check',[OrderController::class, 'check'])
        ->name('checkOrder');

    //КНИГИ
    Route::group(['prefix' => 'books'],function (){
        Route::get('',[BookController::class, 'index'])
            ->name('book.index');
        Route::get('/form', [BookController::class, 'addForm'])
            ->name('book.addForm');
        Route::post('/add', [BookController::class, 'addBook'])
            ->name('book.add');
        Route::get('/{id}/delete', [BookController::class, 'deleteBook'])
            ->name('book.delete');
        Route::get('/{id}/change', [BookController::class, 'changeBook'])
            ->name('book.change');
        Route::post('/{id}/update', [BookController::class, 'updateBook'])
            ->name('book.update');
    });

    //ЖАНРЫ
    Route::group(['prefix'=>'genres'],function (){
        Route::get('', [GenreController::class,'index'])
            ->name('genre.index');
        Route::get('/form',[GenreController::class,'addFrom'])
            ->name('genre.addForm');
        Route::post('/add',[GenreController::class,'add'])
            ->name('genre.add');
        Route::get('/{id}/change',[GenreController::class,'updateFrom'])
            ->name('genre.updateForm');
        Route::post('/{id}/update',[GenreController::class,'update'])
            ->name('genre.update');
        Route::get('/{id}/delete',[GenreController::class,'delete'])
            ->name('genre.delete');
    });

    //АВТОРЫ
    Route::group(['prefix'=>'authors'],function (){
        Route::get('', [AuthorController::class,'index'])
            ->name('author.index');
        Route::get('/form',[AuthorController::class,'addForm'])
            ->name('author.addForm');
        Route::post('/add',[AuthorController::class,'add'])
            ->name('author.add');
        Route::get('/{id}/change',[AuthorController::class,'updateForm'])
            ->name('author.updateForm');
        Route::post('/{id}/update',[AuthorController::class,'update'])
            ->name('author.update');
        Route::get('/{id}/delete',[AuthorController::class,'delete'])
            ->name('author.delete');
    });

});

//МАРШРУТЫ КОРЗИНЫ
Route::group(['prefix'=>'basket'],function (){
    Route::post('/add/{id}',[BasketController::class,'basketAdd'])->name('basket-add');
    Route::group(['middleware'=>'basket_not_empty'],function (){
        Route::get('',[BasketController::class,'basket'])->name('basket');
        Route::get('/order',[BasketController::class,'basketOrder'])->name('basket-order');
        Route::post('/order',[BasketController::class,'basketConfirm'])
            ->name('basket-confirm');
        Route::post('/remove/{id}',[BasketController::class,'basketRemove'])
            ->name('basket-remove');
    });
});

Route::get('books/{genre}', [HomeController::class, 'category'])->name('BooksOfThisGenre');
Route::get('author/{id}', [HomeController::class, 'author'])->name('AuthorsBooks');




