@extends('layouts.new')

@section('title')
    編集
@endsection

@section('content')
    <div class="row-my-2">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">単語編集</div>
                <div class="card-body">
                    <form action="{{ route('words.updateAction',$word->id) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="reading" class="form-label">reading</label>
                            <input type="text" name="reading" class="form-control" id="reading" value="{{ $word->reading }}">
                        </div>
                        <div class="mb-3">
                            <label for="phrases" class="form-label">phrases</label>
                            <input type="text" name="phrases" class="form-control" id="phrases"
                                value="{{ $word->phrases }}">
                        </div>
                        <div class="mb-3">
                            <label for="meaning" class="form-label">meaning</label>
                            <input type="text" name="meaning" class="form-control" id="meaning" value="{{ $word->meaning }}">
                        </div>
                        <button type="submit" class="btn btn-primary">登録</button>
                    </form>
                    <form action="#">
                        <button class="btn btn-outline-primary" onClick="history.back(); return false;">戻る</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-sm-2"></div>
    @endsection
