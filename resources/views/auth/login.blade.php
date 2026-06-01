<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン - 書籍管理システム</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f7f5f1;
            overflow: hidden;
        }

        /* 背景の円 */
        .bg-circle {
            position: fixed;
            border-radius: 50%;
            background: rgba(206, 169, 169, 0.4);
            z-index: -1;
            animation: float 12s ease-in-out infinite;
        }

        .circle1 {
            width: 300px;
            height: 300px;
            top: 15%;
            left: 5%;
        }

        .circle2 {
            width: 220px;
            height: 220px;
            top: 65%;
            right: 10%;
            animation-delay: -4s;
        }

        .circle3 {
            width: 180px;
            height: 180px;
            top: 35%;
            right: 25%;
            animation-delay: -8s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-40px);
            }
        }

        /* ログインカード */
        .login-card {
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
    </style>
</head>

<body>

    <!-- 背景アニメーション -->
    <div class="bg-circle circle1"></div>
    <div class="bg-circle circle2"></div>
    <div class="bg-circle circle3"></div>

    <!-- ヘッダー -->
    <header class="py-4 border-bottom"
            style="background-color: #eceae6;">
        <div class="container d-flex justify-content-between align-items-center">

            <h3 class="mb-0 text-secondary fw-bold">
                株式会社 ポリポリどっとこむ
            </h3>

            <span class="fs-3 text-secondary fw-bold">
                社員専用ページです（部外者立ち入り禁止）
            </span>

        </div>
    </header>

    <!-- ログインフォーム -->
    <div class="row justify-content-center" style="margin-top: 15vh;">
        <div class="col-10 col-sm-8 col-md-4">

            <div class="card login-card">

                <div class="card-header text-center">
                    <h4 class="mb-0">書籍管理システム</h4>
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
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                required
                                autofocus>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">パスワード</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required>
                        </div>

                        <button type="submit"
                                class="btn btn-primary w-100">
                            ログイン
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>

</body>
</html>