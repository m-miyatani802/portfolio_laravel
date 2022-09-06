@extends('layouts.new')

@section('title')
    mylist一覧
@endsection

@section('content')
    <div class="row-my-2">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h1>favoriteswords</h1>
            @if (!is_null($mylists_words))
                <table class="table table-striped table-hover">
                    <tr>
                        <th>読み方</th>
                        <th>語句</th>
                        <th>意味</th>
                    </tr>
                    @foreach ($mylists_words as $mylist)
                        <tr>
                            <td>{{ $mylist->reading }}</td>
                            <td>{{ $mylist->phrases }}</td>
                            <td>{{ $mylist->meaning }}</td>
                            <td class="align-middle button">
                                <span class="btn-group">
                                    <form action="{{ Route('mylist_word_delete') }}" method="get">
                                        @csrf
                                        <input type="hidden" name="word_id" value="{{ $mylist->word_id }}">
                                        <input type="hidden" name="mylist_id" value="{{ $mylist->mylist_id }}">
                                        <input type="submit" class="btn btn-primary mx-sm-1" value="マイリストから削除">
                                    </form>
                                </span>
                            </td>

                        </tr>
                    @endforeach
                </table>
            @else
                <p>マイリストがありません</p>
            @endif
            {{ $mylists_words->links() }}
        </div>
        <div class="col-sm-2"></div>
    </div>
@endsection
