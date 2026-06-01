<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '蔵書管理アプリ')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header class="app-header">
        <div class="header-container">
            <h2 class="header-logo">蔵書管理</h2>
            
            <form action="" method="GET" class="search-form">
                <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="タイトル、著者名で検索..." class="search-input">
                <button type="submit" class="search-button">検索</button>
            </form>

            <div class="header-action">
                @yield('header_action')
            </div>
        </div>
    </header>

    <main class="main-wrapper">
        <div class="content-container">
            
            <h1 class="page-title">@yield('page_title')</h1>

            {{-- 一覧画面の場合のみ書籍グリッドを表示 --}}
            @isset($books)
<div class="book-grid">
                @foreach ($books as $book)
                    <a href="{{ route('books.show', $book->id) }}" class="book-card-link">
                        <div class="book-card">

                            <div class="book-image-wrapper">
                                <img
                                    src="{{ asset($book->image_url ?? '') }}"
                                    alt="{{ $book->bookname }}"
                                    class="book-image">
                            </div>

                            <div class="book-info">
                                <p class="book-bookname">
                                    {{ $book->bookname }}
                                </p>
                                <p class="book-author">
                                    {{ $book->author ?? '著者不明' }}
                                </p>
                                <p class="publisher">
                                    {{ $book->publisher ?? '出版社不明' }}
                                </p>
                            </div>

                        </div>
                    </a>
                @endforeach
            </div>
            @endisset

            {{-- 詳細画面などはここでコンテンツを上書き --}}
            @yield('content')

        </div>
    </main>

</body>
</html>