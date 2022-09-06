@extends('layouts.new')

@section('title')
    単語登録
@endsection

@section('content')
    <div class="row-my-2">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <form action="{{ route('words.wordStor') }}" method="get">
                @csrf
                <div class="mb-3">
                    <label for="reading" class="form-label">reading</label>
                    <input type="text" name="reading" class="form-control" id="reading">
                </div>
                <div class="mb-3">
                    <label for="phrases" class="form-label">phrases</label>
                    <input type="text" name="phrases" class="form-control" id="phrases">
                </div>
                <div class="mb-3">
                    <label for="meaning" class="form-label">meaning</label>
                    <input type="text" name="meaning" class="form-control" id="meaning">
                </div>
                <span class="btn-group">
                    <button type="submit" class="btn btn-primary">登録</button>
                    <button class="btn btn-primary" onClick="history.back(); return false;">戻る</button>
                </span>
            </form>


        </div>
        <div class="col-sm-2"></div>
    </div>
@endsection
