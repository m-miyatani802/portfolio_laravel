@extends('layouts.new')

@section('title')
    トップページ
@endsection

@section('content')
    <div class="row-my-2">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h1>単語一覧</h1>
            <table class="table table-striped table-hover">
                <tr>
                    <th>読み方</th>
                    <th>語句</th>
                    <th>意味</th>
                    <th>登録者</th>
                </tr>
                @foreach ($items['words'] as $item)
                    <tr>
                        <td>{{ $item->reading }}</td>
                        <td>{{ $item->phrases }}</td>
                        <td>{{ $item->meaning }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td class="align-middle button">
                            <span class="btn-group">
                                <form action="{{ route('top.show') }}" method="get">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <input type="submit" value="詳細" class="btn btn-primary mx-sm-1">
                                </form>

                                @if ($items['user_id'] == $item->user_id)
                                    <form action="{{ route('words.edit', $item->id) }}" method="get">
                                        @csrf
                                        <input type="submit" class="btn btn-primary mx-sm-1" value="編集">
                                    </form>
                                @else
                                @endif

                                @if (!empty($items['user_id']))
                                    <form action="{{ route('favorite.word_register') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="word_id" value="{{ $item->id }}">
                                        <input type="submit" class="btn btn-primary mx-sm-1" value="お気に入り">
                                    </form>
                                @endif

                                @if (!empty($items['user_id']) && count($items['mylists']) === 0)
                                    <form action="{{ route('mylist.create') }}">
                                        @csrf
                                    <input type="submit" class="btn btn-primary mx-sm-1" value="マイリスト作成">
                                    </form>
                                @elseif(!empty($items['user_id']))
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            mylists
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            @foreach ($items['mylists'] as $mylist)
                                                @if (count($items['mylists']) === 0)
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="#">
                                                            無し
                                                        </a>
                                                    </li>
                                                @elseif(count($items['mylists']) > 0)
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ Route('mylist.register') }}?word_id={{ $item->id }}&mylist_id={{ $mylist->id }}">
                                                            {{ $mylist->name }}に登録
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if ($items['user_id'] == $item->user_id)
                                    <form action="{{ route('words.destroy', $item->id) }}" method="post">
                                        @csrf
                                        <input type="submit" class="btn btn-primary mx-sm-1" value="削除">
                                    </form>
                                @else
                                @endif
                            </span>
                        </td>
                    </tr>
                @endforeach

            </table>
            {{ $items['words']->links() }}
        </div>
        <div class="col-sm-2"></div>
    @endsection
