@extends('topbook.base')

@section('title', 'コメント編集')
@section('page_title', 'コメント編集')

@section('content')
<div class="detail-container">

    {{-- 成功メッセージ --}}
    @if (session('success'))
        <div class="alert alert-success success-message text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- エラーメッセージ --}}
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

    <div class="card">
        <div class="card-body">
            <h4>コメントを編集</h4>

            <form action="{{ route('comments.update', $comment) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>コメント</label>
                    <textarea name="comment" class="form-control comment-textarea" rows="8" required>{{ $comment->comment }}</textarea>
                </div>

                <div class="mb-3">
                    <label>おすすめ度</label>
                    <select name="review" class="form-select" required>
                        <option value="5" {{ $comment->review == 5 ? 'selected' : '' }}>5 - 非常に良い</option>
                        <option value="4" {{ $comment->review == 4 ? 'selected' : '' }}>4 - 良い</option>
                        <option value="3" {{ $comment->review == 3 ? 'selected' : '' }}>3 - 普通</option>
                        <option value="2" {{ $comment->review == 2 ? 'selected' : '' }}>2 - あまり良くない</option>
                        <option value="1" {{ $comment->review == 1 ? 'selected' : '' }}>1 - 良くない</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">更新する</button>
                <a href="{{ route('books.show', $comment->book_id) }}" class="btn btn-secondary">キャンセル</a>
            </form>
        </div>
    </div>

</div>
@endsection