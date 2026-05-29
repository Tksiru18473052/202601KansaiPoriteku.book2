<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Http;

class RegistrationController extends Controller
{
    /**
     * 登録フォーム画面を表示する (GET)
     */
    public function create(Request $request)
    {

    if (!auth()->user()->isAccounting()) {
            return redirect()->route('books.general')
->with('error', 'このページは経理部社員のみ利用可能です。');
        }

        $isbn = $request->query('isbn');
        $title = null;
        $author = null;    
        $publisher = null; 

        if ($isbn) {
            // 全角英数を半角に変換し、ハイフンやスペースを除去
            $cleanIsbn = mb_convert_kana($isbn, "a", "UTF-8");
            $cleanIsbn = str_replace(['-', ' '], '', $cleanIsbn);

            // openBD API から書籍情報を取得
            $response = Http::get("https://api.openbd.jp/v1/get?isbn={$cleanIsbn}");
            
            if ($response->successful()) {
                $data = $response->json();
                if ($data && $data[0] !== null) {
                    $title     = $data[0]['summary']['title'] ?? null;
                    $author    = $data[0]['summary']['author'] ?? null;    
                    $publisher = $data[0]['summary']['publisher'] ?? null; 
                    $isbn      = $cleanIsbn;
                } else {
                    session()->now('error', '書籍が見つかりませんでした。ISBN番号を確認してください。');
                }
            } else {
                session()->now('error', 'APIとの通信に失敗しました。');
            }
        }

        // 正しいビュー名「bookRegistration」を指定して表示
        return view('topbook.bookRegistration', compact('isbn', 'title', 'author', 'publisher'));
    }

    /**
     * 書籍の登録を実行し、完了画面（Confirm）へ移動する (POST)
     */
    /**
     * 書籍の登録を実行 (POST)
     */
public function store(Request $request)
    {

    if (!auth()->user()->isAccounting()) {
            return redirect()->route('books.general')
->with('error', 'このページは経理部社員のみ利用可能です。');
        }



        $request->validate([
            'title'     => 'required|string|max:255',
            'author'    => 'nullable|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image_url = $request->image_url ?? null;

        // 画像アップロード処理
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();

            $destinationPath = public_path('images/books');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);   // フォルダがなければ自動作成
            }

            $file->move($destinationPath, $filename);
            $image_url = '/images/books/' . $filename;
        }

        Book::create([
            'bookname'   => $request->title,
            'author'     => $request->author,
            'publisher'  => $request->publisher,
            'image_url'  => $image_url,
        ]);

        return redirect('/registrationConfirm')
                     ->with('success', '書籍の登録が完了しました！');
    }

    
    /**
     * 登録完了画面（registrationConfirm）を表示する (GET)
     * ※もし相方さんが別のコントローラーで一覧を表示させる場合は、このメソッドごと削除してOKです！
     */
    public function confirm()
    {
        // 🟢 'asc' に変更：新しく登録した本が【一番最後（下）】に表示されるようになります
        $books = Book::orderBy('id', 'asc')->get();

        // 完了画面のBlade（registrationConfirm.blade.php）にデータを渡して表示
        return view('topbook.registrationConfirm', compact('books'));
    }
}