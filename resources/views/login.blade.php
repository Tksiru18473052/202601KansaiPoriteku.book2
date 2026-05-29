<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="login-wrapper">
    <div class="container">

        <h1 class="main-title">蔵書管理アプリ</h1>

        <p class="sub-title">ログインしてください</p>

        <form class="login-form" action="#" method="post">

            <div class="form-group">
                <label for="user_id">ID</label>
                <input type="text" id="user_id" name="user_id" placeholder="IDを入力">
            </div>

            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" placeholder="パスワードを入力">
            </div>

            <div class="button-container">
                <button type="submit" class="login-button">ログイン</button>
            </div>

        </form>

        <div class="dev-links" style="margin-top: 30px; padding-top: 20px; border-top: 1px dashed #ddd; text-align: center;">
            <p style="font-size: 0.85rem; color: #7f8c8d; margin-bottom: 10px;">【開発用ショートカット】</p>
            <a href="{{ route('general.books') }}" style="color: #3498db; text-decoration: none; margin: 0 15px; font-size: 0.9rem; font-weight: bold;">→ 一般社員として一覧を見る</a>
            <a href="{{ route('accounting.books') }}" style="color: #e67e22; text-decoration: none; margin: 0 15px; font-size: 0.9rem; font-weight: bold;">→ 経理部社員として一覧を見る</a>
        </div>

    </div>

</body>
</html>