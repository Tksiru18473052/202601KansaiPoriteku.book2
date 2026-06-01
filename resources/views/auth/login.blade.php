<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン - 書籍管理システム</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- ヘッダー -->
    <header class="py-5 border-bottom"
        style="background-color: #eceae6;">
        <div class="container">
            <div class="container d-flex justify-content-between align-items-center">
            <h3 class="mb-0 text-secondary fw-bold">株式会社　ポリポリどっとこむ</h3>
            <span class="fs-3 text-secondary fw-bold">社員専用ページです（部外者立ち入り禁止）</span>
        </div>
    </header>

    <div class="row justify-content-center" style="margin-top: 15vh;">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>書籍管理システム</h4>
    
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">社員名</label>
                                <input type="text" name="name" class="form-control" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">パスワード</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">ログイン</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>