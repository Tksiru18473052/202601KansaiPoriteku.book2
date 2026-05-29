<bookRegistration.blade.php> 登録画面

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>書籍登録</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f9; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; padding: 20px 0; }
        .container { background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); width: 450px; }
        h1 { text-align: center; color: #333; margin-top: 0; margin-bottom: 30px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; color: #555; font-weight: bold; }
        input, textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; font-size: 16px; box-sizing: border-box; font-family: inherit; }
        
        .title-input { 
            font-size: 18px; 
            font-weight: bold; 
            color: #1a1a1a; 
            background-color: #f8fafc; 
            border: 2px solid #4a90e2; 
            padding: 12px; 
            text-align: left; 
            resize: none; 
            min-height: 80px; 
            word-break: break-all; 
        }
        input[readonly], textarea[readonly] { cursor: not-allowed; background-color: #f9f9f9; color: #555; }
        
        button { width: 100%; padding: 12px; color: white; border: none; border-radius: 6px; font-size: 16px; cursor: pointer; margin-top: 10px; box-sizing: border-box; transition: background-color 0.2s; }
        .btn-search { background-color: #28a745; text-align: center; text-decoration: none; display: block; }
        .btn-search:hover { background-color: #218838; }
        .btn-submit { background-color: #4a90e2; font-weight: bold; margin-top: 25px; }
        .btn-submit:hover { background-color: #357abd; }
        
        /* 登録ボタンが無効化されている時のスタイル */
        .btn-submit:disabled { background-color: #ccc !important; cursor: not-allowed; }
    </style>
</head>
<body>

    <header class="app-header">
        <div class="header-container">
            <h2 class="header-logo">蔵書管理</h2>
            <div class="header-action">
                <a href="{{ route('books.accounting') }}" class="btn-register">一覧に戻る</a>
            </div>
        </div>
    </header>

<div class="container">
    <h1>書籍登録</h1>

    @if (session('error'))
        <div style="background-color: #f8d7da; color: #bd2130; padding: 12px; border-radius: 6px; margin-bottom: 20px; text-align: center; font-weight: bold; border: 1px solid #f5c6cb;">
            ⚠️ {{ session('error') }}
        </div>
    @endif

    <div class="form-group">
        <label for="isbn_input">ISBN</label>
        <input type="text" id="isbn_input" placeholder="例: 9784297152451" value="{{ $isbn ?? '' }}">
    </div>

    <button type="button" class="btn-search" onclick="searchBook()">ISBNから検索</button>

<form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="isbn" value="{{ $isbn ?? '' }}">
        <input type="hidden" name="title" value="{{ $title ?? '' }}">
        <input type="hidden" name="author" value="{{ $author ?? '' }}">
        <input type="hidden" name="publisher" value="{{ $publisher ?? '' }}">


        <div class="form-group">
            <label for="display_title" style="color: #4a90e2;">書籍名</label>
            <textarea id="display_title" class="title-input" readonly placeholder="確認用タイトル" required>{{ $title ?? '' }}</textarea>
        </div>

        <div class="form-group">
            <label for="display_author">著者</label>
            <input type="text" id="display_author" value="{{ $author ?? '' }}" readonly placeholder="著者名" style="font-weight: bold;">
        </div>

        <div class="form-group">
            <label for="display_publisher">出版社</label>
            <input type="text" id="display_publisher" value="{{ $publisher ?? '' }}" readonly placeholder="出版社名" style="font-weight: bold;">
        </div>

<div class="mb-3">
        <label class="form-label">表紙画像（任意）</label>
        <input type="file" name="image" class="form-control" accept="image/*">
        <small class="text-muted">JPG, PNG, GIF形式推奨（最大2MB）</small>
    </div>

        <button type="submit" class="btn-submit" {{ empty($title) ? 'disabled' : '' }}>登録する</button>

    </form>
</div>

<script>
function searchBook() {
    const isbn = document.getElementById('isbn_input').value.trim();
    if (!isbn) { alert('ISBNを入力してください'); return; }
    // 大文字小文字のミスを防ぐため、コントローラーのルート（/bookRegistration）に合わせる
    window.location.href = '/bookRegistration?isbn=' + encodeURIComponent(isbn);
}
</script>
</body>
</html>