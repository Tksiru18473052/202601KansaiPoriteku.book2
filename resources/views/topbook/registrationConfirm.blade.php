<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録完了</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f9; display: flex; flex-direction: column; align-items: center; min-height: 100vh; margin: 0; padding: 40px 0; }
        .message-container { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); width: 850px; text-align: center; margin-bottom: 25px; box-sizing: border-box; }
        .success-box { background-color: #d4edda; color: #155724; padding: 20px; border-radius: 8px; font-weight: bold; border: 1px solid #c3e6cb; font-size: 18px; margin-bottom: 20px; }
        .btn-back { background-color: #4a90e2; color: white; border: none; border-radius: 6px; font-size: 16px; padding: 12px 24px; cursor: pointer; text-decoration: none; display: inline-block; transition: background-color 0.2s; font-weight: bold; }
        .btn-back:hover { background-color: #357abd; }
        
        .list-container { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); width: 850px; box-sizing: border-box; }
        h2 { text-align: center; margin-top: 0; margin-bottom: 20px; font-size: 20px; border-bottom: 2px solid #4a90e2; padding-bottom: 8px; color: #4a90e2; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 14px; table-layout: fixed; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #eee; word-break: break-all; }
        th { background-color: #f8fafc; color: #555; font-weight: bold; }
        tr:hover { background-color: #f8fafc; }
        .no-data { text-align: center; color: #999; padding: 20px; }
        
        .tbl-title { font-weight: bold; color: #333; }
        .tbl-author, .tbl-publisher { font-weight: bold; color: #444; }
    </style>
</head>
<body>

<div class="message-container">
    @if (session('success'))
        <div class="success-box">
            🎉 {{ session('success') }}
        </div>
    @else
        <div class="success-box" style="background-color: #e2e3e5; color: #383d41; border-color: #d6d8db;">
            書籍一覧を表示しています
        </div>
    @endif
    
    <a href="/bookRegistration" class="btn-back">続けて書籍を登録する</a>
    <a href="/books/accounting" class="btn-back">一覧に戻る</a>
</div>

<div class="list-container">
    <h2>登録済み書籍一覧</h2>
    @if(isset($books) && $books->count() > 0)
        <table>
            <thead>
                <tr>
                    <th style="width: 10%;">ID</th>
                    <th style="width: 45%;">書籍名</th>
                    <th style="width: 25%;">著者</th>
                    <th style="width: 20%;">出版社</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td style="color: #666;">#{{ $book->id }}</td>
                        <td class="tbl-title">{{ isset($book->bookname) ? $book->bookname : '---' }}</td>
                        <td class="tbl-author">{{ isset($book->author) ? $book->author : '---' }}</td> 
                        <td class="tbl-publisher">{{ isset($book->publisher) ? $book->publisher : '---' }}</td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">まだ登録されている書籍はありません。</div>
    @endif
</div>

</body>
</html>