@extends('topbook.base')

@section('title', $book->bookname . ' - 詳細')
@section('page_title', $book->bookname)

@section('header_action')
    @if (auth()->user()->isAccounting())
        <a href="{{ route('books.accounting') }}" class="btn-register">一覧に戻る</a>
        <a href="/bookRegistration" class="btn-register me-2">📝 書籍登録</a>
        <a href="/books/delete" class="btn-delete">🗑 書籍削除</a>
    @else
        <a href="{{ route('books.general') }}" class="btn-register">一覧に戻る</a>
    @endif
@endsection

@section('content')
<div class="detail-container">

    {{-- 成功メッセージ --}}
    @if (session('success'))
        <div class="alert alert-success success-message text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- ★★★ エラーメッセージを表示する部分 ★★★ --}}
@if ($errors->any() || session('error'))
    <div class="alert alert-danger text-center">
        @if (session('error'))
            {{ session('error') }}
        @else
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        @endif
    </div>
@endif

    <div class="book-detail">
        {{-- 書籍情報 --}}
        <div class="text-center mb-4">
            @if($book->image_url)
                <img src="{{ asset($book->image_url) }}" 
                     alt="{{ $book->bookname }}" 
                     class="book-detail-image">
            @endif

            <h1 class="mt-3">{{ $book->bookname }}</h1>
            <p class="text-muted">
                著者：{{ $book->author ?? '不明' }}　｜　出版社：{{ $book->publisher ?? '不明' }}
            </p>
        </div>

<hr>

        <h4>みんなのコメント（{{ $book->comments->count() }}件）</h4>

        <!-- おすすめ度の分布（星の数で視覚的に表示） -->
        <div class="review-distribution mb-4">
            <h5>おすすめ度の分布</h5>
            <div class="review-list">
                @for ($i = 5; $i >= 1; $i--)
                    <div class="review-item d-flex align-items-center">
                        <div class="star-display me-3">
                            @for ($s = 1; $s <= 5; $s++)
                                @if ($s <= $i)
                                    ⭐
                                @else
                                    <span style="opacity: 0.2;">☆</span>
                                @endif
                            @endfor
                        </div>
                        <span class="ms-auto">{{ $reviewDistribution[$i] ?? 0 }}件</span>
                    </div>
                @endfor
            </div>
        </div>
    <hr>
    <br>
    

{{-- コメント一覧 --}}
        @foreach($book->comments as $comment)
            <div class="comment mb-3 p-3 bg-light rounded">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <strong>{{ $comment->user->name ?? '匿名' }}</strong>
                        
                        <!-- ★★★ 星の数で視覚的に表示 ★★★ -->
                        <span class="ms-2">
                            @for ($s = 1; $s <= 5; $s++)
                                @if ($s <= $comment->review)
                                    ⭐
                                @else
                                    <span style="opacity: 0.2;">☆</span>
                                @endif
                            @endfor
                        </span>
                    </div>

                    {{-- 編集ボタン（自分のコメントのみ） --}}
                    @if ($comment->users_id === auth()->id())
                        <form action="{{ route('comments.edit', $comment) }}" method="GET" style="display: inline;">
                            <button type="submit" class="btn btn-sm btn-warning me-2">✏️ 編集</button>
                        </form>
                    @endif

                    {{-- 削除ボタン --}}
                    @if ($comment->users_id === auth()->id() || auth()->user()->isAccounting())
                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" 
                              onsubmit="return confirm('このコメントを削除しますか？');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">🗑 削除</button>
                        </form>
                    @endif
                </div>
                <p class="mt-2 mb-0">{{ $comment->comment }}</p>
            </div>
        @endforeach

        <hr>

        {{-- コメント投稿フォーム --}}
        <h5>コメントを書く</h5>
        <form action="/comments" method="POST">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">

            <textarea name="comment" 
                      class="form-control comment-textarea" 
                      rows="8" 
                      placeholder="感想・コメントを入力してください" 
                      required></textarea>

            <div class="mt-3">
                <label>おすすめ度</label>
                <select name="review" class="form-select" required>
                    <option value="5">5 - 非常に良い</option>
                    <option value="4">4 - 良い</option>
                    <option value="3" selected>3 - 普通</option>
                    <option value="2">2 - あまり良くない</option>
                    <option value="1">1 - 良くない</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">投稿する</button>
        </form>
    </div>
</div>
@endsection