@extends('layouts.new')

@section('title')
    mylist一覧
@endsection

@section('content')
    <div class="row-my-2">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h1>Mylist</h1>
            @if(!is_null($mylists))
            <table class="table table-striped table-hover">
                <tr>
                    <th>マイリスト一覧</th>
                </tr>
                @foreach($mylists as $mylist)
                <tr>
                    <td><a href="{{ route('mylist.wordIndex',$mylist->id) }}">{{ $mylist->mylist_name}}</a></td>
                    <td class="align-middle button">
                        <span class="btn-group">
                        <form action="{{ Route('mylist.nameEdit') }}" method="get">
                            @csrf
                            <input type="hidden" name="id" value="{{ $mylist->mylist_id }}">
                            <input type="submit" class="btn btn-primary mx-sm-1" value="名前変更">
                        </form>
                        <form action="{{ Route('mylist.delete') }}">
                            <input type="hidden" name="id" value="{{ $mylist->mylist_id }}">
                            <input type="submit" class="btn btn-primary mx-sm-1" value="削除">
                        </form>
                    </span>
                    </td>
                </tr>
                @endforeach
            </table>
            @else
            <p>マイリストがありません</p>
            @endif
            {{ $mylists->links() }}
        </div>
        <div class="col-sm-2"></div>
    </div>
@endsection
