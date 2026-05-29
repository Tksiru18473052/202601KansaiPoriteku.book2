@extends('topbook.base')

@section('title', 'テストページ')
@section('page_title', 'テストページ（開発用）')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h5>テスト用確認ページ</h5>
        </div>
        <div class="card-body">
            <h6>現在ログイン中のユーザー</h6>
            <p><strong>名前：</strong> {{ $user->name }}</p>
            <p><strong>権限：</strong> 
                @if($user->isAccounting())
                    <span class="badge bg-success">経理部</span>
                @else
                    <span class="badge bg-secondary">一般社員</span>
                @endif
            </p>

            <hr>

            <h6>データ件数</h6>
            <p>書籍数：{{ $booksCount }} 件</p>
            <p>コメント数：{{ $commentsCount }} 件</p>

            <hr>

            <h6>書籍一覧（最新10件）</h6>
            <ul>
                @foreach($books as $book)
                    <li>
                        <a href="{{ route('books.show', $book->id) }}">
                            {{ $book->bookname }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="mt-4">
        <a href="/books/general" class="btn btn-primary">一般社員一覧へ</a>
        <a href="/books/accounting" class="btn btn-success">経理部一覧へ</a>
        <a href="/logout" class="btn btn-danger">ログアウト</a>
    </div>
</div>
@endsection