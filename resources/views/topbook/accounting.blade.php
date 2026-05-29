@extends('topbook.base')

@section('title', '書籍一覧（経理部社員）')
@section('page_title', '書籍一覧')

{{-- 経理部社員だけ、ヘッダーに2つのボタンを表示 --}}
@section('header_action')
    <a href="/bookRegistration" class="btn-register me-2">📝 書籍登録</a>
    <a href="/books/delete" class="btn-delete">🗑 書籍削除</a>
@endsection