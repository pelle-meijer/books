<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Redis;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//GETS------------------------------------>
Route::get('/', [BookController::class, "index"]);
Route::get('/del-book/{book}', [BookController::class, "destroy"])->middleware('admin.check');
Route::get('/del-auth/{author}', [AuthorController::class, "destroy"])->middleware('admin.check');
Route::get('/del-pub/{publisher}', [PublisherController::class, "destroy"])->middleware('admin.check');
Route::get('/del-store/{store}', [StoreController::class, "destroy"]);
Route::get('/add/{view}', [BookController::class, "indexView"])->middleware('admin.check');
Route::get('/publisher/{publisher}', [PublisherController::class, "show"]);
Route::get('/author/{author}', [AuthorController::class, "show"]);
Route::get('/bookstore/{store}', [StoreController::class, "show"])->middleware('store.buy');
Route::get('/edit-book/{book}', [BookController::class, "edit"])->middleware('admin.check');
Route::get('/edit-auth/{author}', [AuthorController::class, "edit"])->middleware('admin.check');
Route::get('/edit-pub/{publisher}', [PublisherController::class, "edit"])->middleware('admin.check');
Route::get('/edit-store/{store}', [StoreController::class, "edit"]);
Route::get('/search', [SearchController::class, "search"]);
Route::get('/stats/book/{id}/{store}', [BookController::class, "salesDisplay"])->middleware('admin.check');
Route::get('/search-page', function(){
    return view('search');
});
Route::get('/language/{language}', [TranslationController::class, "setLanguage"]);
Route::get('/store-panel', [StoreController::class, "index"])->middleware('auth')->middleware('store.panel');
Route::get('/test/counter', function(){
    return view('price-counter-test');
});

//POSTS----------------------------------->
Route::post('/book', [BookController::class,"store"]);
Route::post('/book/update/{book}', [BookController::class, "update"]);
Route::post('/author/update/{author}', [AuthorController::class, "update"]);
Route::post('/publisher/update/{publisher}', [PublisherController::class, "update"]);
Route::post('/store/update/{store}', [StoreController::class, "update"]);
Route::post('/author', [AuthorController::class,"store"]);
Route::post('/publisher', [PublisherController::class,"store"]);
Route::post('/store', [StoreController::class, "store"]);
Route::post('/translation', [TranslationController::class, "store"]);
Route::post('bookstore/order/{store}', [OrderController::class, "store"]);
Route::post('/login', [UserController::class, "login"]);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/testing", function () {
    dd(Redis::get('books'));
});
