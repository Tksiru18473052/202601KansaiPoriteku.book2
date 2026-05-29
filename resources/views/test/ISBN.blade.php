@extends('topbook.base')

@section('title', 'ISBN検索テスト')
@section('page_title', 'ISBNから書籍情報取得＆表紙表示')

@section('content')
<div class="container mt-4">
    <h1>ISBNから書籍情報取得</h1>

    <form method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-8">
                <label class="form-label">ISBNを入力してください（10桁 or 13桁）</label>
                <input type="text" name="isbn" 
                       value="{{ request('isbn') }}" 
                       placeholder="978-4-10-101001-4" 
                       class="form-control form-control-lg">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">取得する</button>
            </div>
        </div>
    </form>

    @if (!empty(request('isbn')))
        @php
            $isbn = preg_replace('/[^0-9X]/i', '', request('isbn'));
        @endphp

        <h2>検索結果：ISBN {{ $isbn }}</h2>

        @php
            // 1. openBD（日本の書籍に強い）
            $openbd_url = "https://api.openbd.jp/v1/get?isbn={$isbn}";
            $json = @file_get_contents($openbd_url);
            $data = $json ? json_decode($json, true) : null;
            $summary = $data[0]['summary'] ?? null;
        @endphp

        @if ($summary && !empty($summary['title']))
            <!-- openBDで見つかった場合 -->
            <div class="row">
                <div class="col-md-8">
                    <h3>{{ $summary['title'] }}</h3>
                    <p><strong>著者：</strong> {{ $summary['author'] ?? '不明' }}</p>
                    <p><strong>出版社：</strong> {{ $summary['publisher'] ?? '不明' }}</p>
                </div>
                <div class="col-md-4 text-center">
                    <img src="{{ $summary['cover'] ?? 'https://covers.openlibrary.org/b/isbn/'.$isbn.'-L.jpg' }}" 
                         alt="書籍表紙" class="book-detail-image">
                </div>
            </div>

        @else
            <!-- openBDで見つからなかった場合 → Google Books APIを試す -->
            @php
                $google_url = "https://www.googleapis.com/books/v1/volumes?q=isbn:{$isbn}";
                $google_json = @file_get_contents($google_url);
                $google_data = $google_json ? json_decode($google_json, true) : null;
                $item = $google_data['items'][0] ?? null;
                $volumeInfo = $item['volumeInfo'] ?? null;
            @endphp

            @if ($volumeInfo)
                <div class="alert alert-info">
                    openBDにはありませんでしたが、Google Booksで見つかりました。
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <h3>{{ $volumeInfo['title'] ?? 'タイトル不明' }}</h3>
                        <p><strong>著者：</strong> {{ implode(', ', $volumeInfo['authors'] ?? ['不明']) }}</p>
                        <p><strong>出版社：</strong> {{ $volumeInfo['publisher'] ?? '不明' }}</p>
                    </div>
                    <div class="col-md-4 text-center">
                        @if (!empty($volumeInfo['imageLinks']['thumbnail']))
                            <img src="{{ $volumeInfo['imageLinks']['thumbnail'] }}" 
                                 alt="書籍表紙" class="book-detail-image">
                        @else
                            <p>表紙画像なし</p>
                        @endif
                    </div>
                </div>
            @else
                <div class="alert alert-warning">
                    申し訳ありません。このISBNの書籍情報は見つかりませんでした。<br>
                    <small>別のISBNをお試しください（例: 9784065166055）</small>
                </div>
            @endif
        @endif
    @endif
</div>
@endsection