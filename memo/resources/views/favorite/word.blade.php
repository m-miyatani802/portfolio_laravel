@extends('layouts.new')

@section('title')
    お気に入り単語
@endsection

@section('content')
    <div class="row-my-2">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h1>favoriteswords</h1>
            @if (count($items) > 0)
                <table class="table table-striped table-hover">
                    <tr>
                        <th>読み方</th>
                        <th>語句</th>
                        <th>意味</th>
                    </tr>
                    @foreach ($items['favorites_words'] as $item)
                        @if (!empty($item->word->reading))
                            <tr>
                                <td>{{ $item->word->reading }}</td>
                                <td>{{ $item->word->phrases }}</td>
                                <td>{{ $item->word->meaning }}</td>
                                <td class="align-middle button">
                                    <form action="{{ Route('favorite.word_delete') }}" method="post">
                                        @csrf
                                        <input type="submit" class="btn btn-primary mx-sm-1" value="お気に入りから外す">
                                        <input type="hidden" name="id" value="{{ $item->word->id }}">
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            @else
                <p>お気に入りはありません</p>
            @endif
            {{ $items['favorites_words']->links() }}
        </div>
        <div class="col-sm-2"></div>
    </div>
@endsection
