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

                <!-- ログアウトボタン（常に表示） -->
                @auth
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-logout">
                            ログアウト
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </header>

    <main class="main-wrapper">
        <div class="content-container">
            
<h1 class="page-title">@yield('page_title')</h1>



            {{-- 一覧画面の場合のみ書籍グリッドを表示 --}}
            @isset($books)       
<!-- 自動方向決定の並び替えプルダウン -->
<div class="mb-3">
                <form method="GET" class="d-flex align-items-center">
                    
                    <!-- ★★★ 重要な修正：現在の検索キーワードを隠しフィールドで保持 ★★★ -->
                    @if (request()->filled('keyword'))
                        <input type="hidden" name="keyword" value="{{ request('keyword') }}">
                    @endif

                    <label class="me-2 fw-bold">並び替え：</label>
                    <select name="sort" class="form-select w-auto" onchange="this.form.submit()">
                        <option value="id" {{ request('sort') === 'id' ? 'selected' : '' }}>新着順</option>
                        <option value="bookname" {{ request('sort') === 'bookname' ? 'selected' : '' }}>書籍名順</option>
                        <option value="author" {{ request('sort') === 'author' ? 'selected' : '' }}>著者名順</option>
                        <option value="publisher" {{ request('sort') === 'publisher' ? 'selected' : '' }}>出版社順</option>
                        <option value="avg_review" {{ request('sort') === 'avg_review' ? 'selected' : '' }}>平均評価順</option>
                        <option value="review_count" {{ request('sort') === 'review_count' ? 'selected' : '' }}>評価件数順</option>
                    </select>
                </form>
            </div>
<div class="book-grid">
    @foreach ($books as $book)
        <div class="book-card">

            <!-- 画像をクリック → 詳細画面 -->
            <a href="{{ route('books.show', $book->id) }}" class="book-image-link">
                <div class="book-image-wrapper">
                    <img src="{{ asset($book->image_url ?? '') }}"
                         alt="{{ $book->bookname }}"
                         class="book-image">
                </div>
            </a>

            <div class="book-info">
                <!-- 書籍名をクリック → 詳細画面 -->
                <a href="{{ route('books.show', $book->id) }}" class="book-bookname-link">
                    <p class="book-bookname">
                        {{ $book->bookname }}
                    </p>
                </a>

<!-- 著者名をクリック → 現在の画面で検索 -->
                        @if($book->author)
                            <a href="{{ url(auth()->user()->isAccounting() ? '/books/accounting' : '/books/general') }}?keyword={{ urlencode($book->author) }}" 
                               class="book-author-link">
                                <p class="book-author">
                                    {{ $book->author }}
                                </p>
                            </a>
                        @else
                            <p class="book-author text-muted">著者不明</p>
                        @endif

                        <!-- 出版社名をクリック → 現在の画面で検索 -->
                        @if($book->publisher)
                            <a href="{{ url(auth()->user()->isAccounting() ? '/books/accounting' : '/books/general') }}?keyword={{ urlencode($book->publisher) }}" 
                               class="publisher-link">
                                <p class="publisher">
                                    {{ $book->publisher }}
                                </p>
                            </a>
                        @else
                            <p class="publisher text-muted">出版社不明</p>
                        @endif

                @php
                    $avgReview = $book->comments->avg('review');
                    @endphp
                        @if ($avgReview)
                            <p class="book-average mt-2">
                                ⭐ {{ number_format($avgReview, 1) }}
                            <small class="text-muted">（{{ $book->comments->count() }}件）</small>
                            </p>
                        @else
                        <p class="book-average mt-2 text-muted">
                                まだ評価がありません
                            </p>
                    @endif
            </div>

        </div>
    @endforeach
</div>
            @endisset

            {{-- 詳細画面などはここでコンテンツを上書き --}}
            @yield('content')

        </div>
    </main>

</body>
</html>