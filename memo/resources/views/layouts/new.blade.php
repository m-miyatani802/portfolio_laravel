<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>
        @yield('title')
    </title>
    <style>
        . {
            margin-right: 50;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('top') }}">電子単語帳</a>
            {{-- 一旦保留↓↓ --}}
            {{-- <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  account
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="{{ route('/logout') }}"
                    onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a></li>
                </ul>
              </div>

              <a class="nav-link navbar-brand" href="{{ route('words.create') }}">単語登録</a>
 --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('words.index') }}">My page</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">account creating</a></li>
                            <li><a class="dropdown-item" href="./member/account/edit/authentication.php">account
                                    edit</a></li>
                            <li><a class="dropdown-item" href="{{ route('/logout') }}"
                                onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('words.create') }}">単語登録</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            favorite
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="{{ route('favorite.users_index') }}">Users</a></li>
                            <li><a class="dropdown-item" href="{{ route('favorite.words_index') }}">Words</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Mylist
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="{{ Route('mylist.listIndex') }}">マイリスト一覧</a></li>
                            <li><a class="dropdown-item" href="{{ Route('mylist.create') }}">マイリスト作成</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" action="{{ Route('search.action') }}" method="get">
                    <!-- <fieldset>
                        <legend>テーブル名</legend> -->
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="users_search" id="users" value="1">
                        <label class="form-check-label" for="users">ユーザー名</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="words_search" id="words" value="1" checked>
                        <label class="form-check-label" for="words">単語</label>
                    </div>
                    <!-- </fieldset>
                    <fieldset>
                        <legend>選択肢</legend> -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="reading" id="search_reading" value="1">
                        <label class="form-check-label" for="search_reading">
                            読み
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="phrases" id="search_phrases" value="2" checked>
                        <label class="form-check-label" for="search_phrases">
                            語句
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="meaning" id="search_meaning" value="3">
                        <label class="form-check-label" for="search_meaning">
                            意味
                        </label>
                    </div>
                    <!-- </fieldset> -->
                    <input class="form-control me-2" type="search" name="search_word" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">検索</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
        </script>
</body>

</html>
