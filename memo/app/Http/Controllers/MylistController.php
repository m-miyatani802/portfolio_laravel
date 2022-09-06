<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MylistController extends Controller
{
    /**
     * 自身のuser_idを使いマイリストを取得し遷移.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mylists = DB::table('mylists')->join('users', 'mylists.user_id', '=', 'users.id')
            ->select('mylists.*', 'mylists.name as mylist_name', 'mylists.id as mylist_id', 'users.id as user_id', 'users.name')
            ->where('mylists.user_id', Auth::id())
            ->simplePaginate(10);
        return view('mylist.listIndex', compact('mylists'));
    }

    /**
     * mylist_idを使いマイリスト内の単語を取得し遷移.
     * @param  \Illuminate\Http\Request  $request --- mylist_id
     * @return \Illuminate\Http\Response
     */
    public function wordIndex(Request $request, $mylist_id)
    {
        $mylists_words = DB::table('mylists_words')->join('mylists', 'mylists_words.mylist_id', '=', 'mylists.id')
            ->join('words', 'mylists_words.word_id', 'words.id')
            ->join('users', 'words.user_id', '=', 'users.id')
            ->select('mylists_words.*', 'mylists.name as mylist_name', 'users.id as user_id', 'users.name as user_name', 'words.reading', 'words.phrases', 'words.meaning')
            ->where('mylist_id', $mylist_id)
            ->simplePaginate(10);

        return view('mylist.wordListIndex', compact('mylists_words'));
    }

    /**
     * mylist_idとword_idを使いマイリストに単語を登録しマイリスト内の単語一覧画面へ遷移.
     * @param  \Illuminate\Http\Request  $request --- word_id, mylist_id
     */
    public function wordRegister(Request $request)
    {
        DB::table('mylists_words')->insert([
            'word_id' => $request->word_id,
            'mylist_id' => $request->mylist_id,
        ]);

        return redirect()->action('App\Http\Controllers\MylistController@index');
    }

    /**
     * マイリスト作成画面へ遷移.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mylist.mylist_create');
    }

    /**
     * requestをもとにマイリストを登録し、マイページへredirectする.
     * @param  \Illuminate\Http\Request  $request --- mylist_name
     */
    public function store(request $request)
    {
        DB::table('mylists')->insert([
            'name' => $request->mylist_name,
            'user_id' => Auth::id(),
        ]);

        return redirect()->action('App\Http\Controllers\WordController@index');
    }

    /**
     * requestをもとにマイリスト情報取得し編集画面へ遷移.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function nameEdit(Request $request)
    {
        $item = DB::table('mylists')->where('id', $request->id)->first();
        return view('mylist.mylist_nameEdit', compact('item'));
    }

    /**
     * requestをもとにマイリストをupdateしマイリスト一覧へredirectする
     * @param  \Illuminate\Http\Request  $request --- mylist_id, mylist_name
     */
    public function nameUpdate(Request $request)
    {
        DB::table('mylists')->where('id', $request->mylist_id)->update([
            'name' => $request->mylist_name,
            'user_id' => Auth::id(),
        ]);

        return redirect()->action('App\Http\Controllers\MylistController@index');
    }

    /**
     * マイリスト削除確認ページへ遷移.
     * @param  \Illuminate\Http\Request  $request --- mylist_id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $items =  [
            'id' => $request->id,
            'page' => 'mylist',
        ];

        return view('yes_or_no', compact('items'));
    }

    /**
     * requestをもとにマイリストを削除し、削除したidを持マイリスト内の単語を削除し,マイリスト一覧へredirectする.
     * @param  \Illuminate\Http\Request  $request --- mylist_id
     */
    public function deleteAction(Request $request)
    {
        DB::table('mylists')->where('id', $request->id)->where('user_id', AUth::id())->delete();
        DB::table('mylists_words')->where('mylist_id', $request->id)->delete();
        return redirect()->action('App\Http\Controllers\MylistController@index');
    }

    /**
     * マイリスト内の単語を削除確認画面へ遷移する.
     * @param  \Illuminate\Http\Request  $request --- word_id, mylist_id
     * @return \Illuminate\Http\Response
     */
    public function wordDelete(Request $request)
    {
        $items = [
            'word_id' => $request->word_id,
            'mylist_id' => $request->mylist_id,
            'page' => 'mylist_word'
        ];
        return view('yes_or_no', compact('items'));
    }

    /**
     * word_idとmylist_idをもとにmylists_wordsを削除しマイリスト内単語一覧にredirectする.
     * @param  \Illuminate\Http\Request  $request --- word_id, mylist_id
     */
    public function wordDeleteAction(Request $request)
    {
        DB::table('mylists_words')->where('word_id', $request->word_id)
            ->where('mylist_id', $request->mylist_id)->delete();
        return redirect()->action('App\Http\Controllers\MylistController@wordIndex', $request->mylist_id);
    }
}
