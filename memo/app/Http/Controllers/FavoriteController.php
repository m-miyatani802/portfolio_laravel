<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FavoritesWord;
use App\Models\FavoritesUser;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * 自身のuser_idを使いお気に入り登録した単語を取得し,ページへ遷移
     * 
     * @return \Illuminate\Http\Response
     */
    public function wordsIndex()
    {
        $user_id = Auth::id();
        $items = [
            'favorites_words' => FavoritesWord::with("word")->where('user_id', $user_id)->simplePaginate(10),
            'user_id' => $user_id,
        ];
        return view('favorite.word', compact('items'));
    }

    /**
     * word_idとuser_idを使いお気に入りに登録し、単語のお気に入り一覧ページへ遷移.
     * @param  \Illuminate\Http\Request  $request --- word_id
     * @return \Illuminate\Http\Response
     */
    public function wordRegister(Request $request)
    {
        $favorite = new FavoritesWord();
        $str = FavoritesWord::whereUser_id(Auth::id())->whereWord_id($request->word_id)->first();
        if (!empty($str)) {
            return redirect()->action('App\Http\Controllers\FavoriteController@wordsIndex');
        } elseif (empty($str)) {
            $favorite->create([
                'user_id' => Auth::id(),
                'word_id' => $request->word_id,
            ]);
        }
        return redirect()->action('App\Http\Controllers\FavoriteController@wordsIndex');
    }

    /**
     * word_idとuser_idを使いお気に入りから削除し、単語のお気に入り一覧画面へ遷移.
     * @param  \Illuminate\Http\Request  $request --- user_id
     * @return \Illuminate\Http\Response
     */
    public function wordDelete(Request $request)
    {
        $user_id = Auth::id();
        $favorite = new FavoritesWord();
        $favorite->where('word_id', $request->id)->where('user_id', $user_id)->delete();
        return redirect()->action('App\Http\Controllers\FavoriteController@wordsIndex');
    }

    /**
     * 自身のuser_idを使いお気に入りしたユーザーを取得し遷移.
     * @return \Illuminate\Http\Response
     */
    public function usersIndex()
    {
        $user_id = Auth::id();
        $items = FavoritesUser::where('user_id', $user_id)->simplePaginate();
        // dd($items);
        return view('favorite.user', compact('items'));
    }

    /**
     * other_user_idとuser_idを使いお気に入りに登録し、ユーザーのお気に入り一覧ページへ遷移.
     * @param  \Illuminate\Http\Request  $request --- other_user_id
     * @return \Illuminate\Http\Response
     */
    public function usersRegister(Request $request)
    {
        $favorite = new FavoritesUser();
        $str = FavoritesUser::whereUser_id(Auth::id())->whereOther_user_id($request->user_id)->first();

        if (!empty($str)) {
            return redirect()->action('App\Http\Controllers\FavoriteController@usersIndex');
        } elseif (empty($str)) {
            $favorite->create([
                'user_id' => Auth::id(),
                'other_user_id' => $request->user_id,
            ]);
        }
        return redirect()->action('App\Http\Controllers\FavoriteController@usersIndex');
    }

    /**
     * other_user_idとuser_idを使いお気に入りから削除し、単語のお気に入り一覧画面へ遷移.
     * @param  \Illuminate\Http\Request  $request --- other_user_id
     * @return \Illuminate\Http\Response
     */
    public function usersDelete(Request $request)
    {
        $favorite = new FavoritesUser();
        $favorite->where('user_id', Auth::id())->where('other_user_id', $request->other_user)->delete();
        return redirect()->action('App\Http\Controllers\FavoriteController@usersIndex');
    }
}
