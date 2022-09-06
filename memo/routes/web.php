<?php

use Illuminate\Support\Facades\Route;

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

// トップページへ遷移
Route::get('/', 'App\Http\Controllers\WordController@topPage')->name('top');

// アカウント関連
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('/logout');

// トップページ
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ログイン後の主な機能
Route::resource('words', App\Http\Controllers\WordController::class)->middleware('auth');


Route::get('words/top/show', 'App\Http\Controllers\WordController@topShow')->name('top.show');
// 単語削除の確認画面
Route::post('words/{id}', 'App\Http\Controllers\WordController@delete')->name('words.delete');
// 単語編集処理ページ
Route::get('words.store', 'App\Http\Controllers\WordController@store')->name('words.wordStor');

Route::post('words/update/{id}', 'App\Http\Controllers\WordController@update')->name('words.updateAction');

// 単語のお気に入り一覧
Route::get('favorite/words', 'App\Http\Controllers\FavoriteController@wordsIndex')->middleware('auth')->name('favorite.words_index');
// 単語のお気に入り登録
Route::post('favorite/words/create', 'App\Http\Controllers\FavoriteController@wordRegister')->middleware('auth')->name('favorite.word_register');
// 単語お気に入り削除
Route::post('favorite/words/delete', 'App\Http\Controllers\FavoriteController@wordDelete')->middleware('auth')->name('favorite.word_delete');
// ユーザーのお気に入り一覧
Route::get('favorite/users', 'App\Http\Controllers\FavoriteController@usersIndex')->middleware('auth')->name('favorite.users_index');
// ユーザーのお気に入り登録
Route::post('favorite/users/create', 'App\Http\Controllers\FavoriteController@usersRegister')->middleware('auth')->name('favorite.users_register');
// ユーザーのお気に入り削除
Route::post('favorite/users/delete', 'App\Http\Controllers\FavoriteController@usersDelete')->middleware('auth')->name('favorite.user_delete');


// 他ユーザーの登録単語ページ
Route::get('favorite//', 'App\Http\Controllers\WordController@userPage')->name('other_user.page');



// マイリスト一覧
Route::get('mylist/', 'App\Http\Controllers\MylistController@index')->middleware('auth')->name('mylist.listIndex');
// 各マイリスト内の単語の一覧ページ
Route::get('mylists/{id}', 'App\Http\Controllers\MylistController@wordIndex')->middleware('auth')->name('mylist.wordIndex');
// マイリスト作成
Route::get('mylist/create/', 'App\Http\Controllers\MylistController@create')->middleware('auth')->name('mylist.create');
// マイリスト作成処理
Route::post('mylist/store/', 'App\Http\Controllers\MylistController@store')->middleware('auth')->name('mylist.store');
// マイリスト名前編集
Route::get('mylist/edit', 'App\Http\Controllers\MylistController@nameEdit')->middleware('auth')->name('mylist.nameEdit');
// マイリスト名前編集処理
Route::post('mylist/update', 'App\Http\Controllers\MylistController@nameUpdate')->middleware('auth')->name('mylist.nameUpdate');
// マイリスト削除確認ページへ
Route::get('mylist/delete', 'App\Http\Controllers\MylistController@delete')->middleware('auth')->name('mylist.delete');
// マイリスト削除実行
Route::post('mylist/delete/action', 'App\Http\Controllers\MylistController@deleteAction')->middleware('auth')->name('mylist.delete_action');
// マイリスト内の単語削除
Route::get('mylist/words/delete/', 'App\Http\Controllers\MylistController@wordDelete')->middleware('auth')->name('mylist_word_delete');
// マイリスト内の単語削除処理
Route::get('mylist/words/delete/action', 'App\Http\Controllers\MylistController@wordDeleteAction')->middleware('auth')->name('mylist_word_delete_action');
// マイリストに単語を登録
Route::get('mylist/action', 'App\Http\Controllers\MylistController@wordRegister')->middleware('auth')->name('mylist.register');


// search results
Route::get('search/results', 'App\Http\Controllers\WordController@searchResults')->name('search.action');
