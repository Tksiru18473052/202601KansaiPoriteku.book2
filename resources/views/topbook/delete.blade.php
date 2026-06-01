<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>書籍削除 - 蔵書管理</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header class="app-header">
        <div class="header-container">
            <h2 class="header-logo">蔵書管理</h2>
            
            <!-- 検索フォーム -->
            <form action="{{ route('books.delete') }}" method="GET" class="search-form">
                <input type="text" name="keyword" value="{{ request('keyword') }}" 
                       placeholder="タイトル、著者名、出版社名で検索..." class="search-input">
                <button type="submit" class="search-button">検索</button>
            </form>

            <div class="header-action">
                <a href="{{ route('books.accounting') }}" class="btn-register">一覧に戻る</a>
            </div>
        </div>
    </header>

<main class="main-wrapper">
        <div class="content-container">
            <h1 class="page-title">書籍削除（経理部社員専用）</h1>

            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 80px;">表紙</th>
                        <th>書籍名</th>
                        <th>著者</th>
                        <th>出版社</th>
                        <th style="width: 120px;">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td>
                            <!-- 画像をクリック → 詳細画面 -->
                            <a href="{{ route('books.show', $book->id) }}">
                                @if($book->image_url)
                                    <img src="{{ asset($book->image_url) }}" alt="" width="60" class="img-thumbnail">
                                @else
                                    なし
                                @endif
                            </a>
                        </td>
                        <td>
                            <!-- 書籍名をクリック → 詳細画面 -->
                            <a href="{{ route('books.show', $book->id) }}" class="text-decoration-none fw-bold">
                                {{ $book->bookname }}
                            </a>
                        </td>
                        
                        <!-- 著者名をクリック → 著者名で検索 -->
                        <td>
                            @if($book->author)
                                <a href="{{ route('books.delete') }}?keyword={{ urlencode($book->author) }}" 
                                   class="text-decoration-none">
                                    {{ $book->author }}
                                </a>
                            @else
                                不明
                            @endif
                        </td>
                        
                        <!-- 出版社名をクリック → 出版社名で検索 -->
                        <td>
                            @if($book->publisher)
                                <a href="{{ route('books.delete') }}?keyword={{ urlencode($book->publisher) }}" 
                                   class="text-decoration-none">
                                    {{ $book->publisher }}
                                </a>
                            @else
                                不明
                            @endif
                        </td>
                        
                        <td>
                            <form action="{{ route('books.destroy', $book) }}" method="POST"
                                  onsubmit="return confirm('本当に「{{ addslashes($book->bookname) }}」を削除しますか？\nこの操作は取り消せません。');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">🗑 削除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>