@extends('layouts.new')

@section('title')
    yes_or_no
@endsection

@section('content')
    <div class="row-my-2">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <p>削除しますか？？</p>
                    @if ($items['page'] == 'word')
                        <form action="{{ route('words.destroy', $items['id']) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <div>
                                <button class="btn btn-outline-primary" type="submit">はい</button>
                            </div>
                            <button class="btn btn-primary" onClick="history.back(); return false;">いいえ</button>
                        </form>
                    @elseif($items['page'] == 'mylist')
                        <form action="{{ route('mylist.delete_action') }}" method="post">
                            @csrf
                            <div>
                                <input type="hidden" name="id" value="{{ $items['id'] }}">
                                <button class="btn btn-outline-primary" type="submit">はい</button>
                            </div>
                            <button class="btn btn-primary" onClick="history.back(); return false;">いいえ</button>
                        </form>
                    @elseif($items['page'] == 'mylist_word')
                        <form action="{{ route('mylist_word_delete_action') }}">
                            @csrf
                            <div>
                                <input type="hidden" name="word_id" value="{{ $items['word_id'] }}">
                                <input type="hidden" name="mylist_id" value="{{ $items['mylist_id'] }}">
                                <button class="btn btn-outline-primary" type="submit">はい</button>
                            </div>
                            <button class="btn btn-primary" onClick="history.back(); return false;">いいえ</button>
                        </form>
                    @endif

                </div>
            </div>
            <div class="col-sm-2"></div>
        @endsection
