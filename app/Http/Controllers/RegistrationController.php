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
    /**
     * 登録フォーム画面を表示する (GET)
     * 経理部社員のみアクセス可能
     */
    public function create(Request $request)
    {
        // ① 権限チェック（経理部社員以外はアクセス不可）
        if (!auth()->user()->isAccounting()) {
            return redirect()->route('books.general')
                             ->with('error', 'このページは経理部社員のみ利用可能です。');
        }

        $isbn = $request->query('isbn');
        $title = null;
        $author = null;    
        $publisher = null; 
        $image_url = null;

        // ② ISBNが指定されている場合のみAPI検索
        if ($isbn) {
            $cleanIsbn = mb_convert_kana($isbn, "a", "UTF-8");
            $cleanIsbn = str_replace(['-', ' '], '', $cleanIsbn);

            try {
                $response = Http::timeout(8)->get("https://api.openbd.jp/v1/get?isbn={$cleanIsbn}");

                if ($response->successful()) {
                    $data = $response->json();
                    if ($data && $data[0] !== null) {
                        $summary = $data[0]['summary'] ?? [];

                        $title     = $summary['title'] ?? null;
                        $author    = $summary['author'] ?? null;    
                        $publisher = $summary['publisher'] ?? null; 
                        $image_url = $summary['cover'] ?? null;   // 表紙画像URL

                        $isbn = $cleanIsbn;

                        // 著者が配列の場合
                        if (is_array($author)) {
                            $author = implode(', ', $author);
                        }
                    }
                }
            } catch (\Exception $e) {
                // APIエラーは無視して手動入力可能にする
                session()->now('warning', 'APIが利用できません。手動で情報を入力してください。');
            }
        }

        // ③ ビューを表示（手動入力もAPI入力も両対応）
        return view('topbook.bookRegistration', compact('isbn', 'title', 'author', 'publisher', 'image_url'));
    }

    /**
     * 書籍の登録を実行し、完了画面（Confirm）へ移動する (POST)
     */
    /**
     * 書籍の登録を実行 (POST)
     */
public function store(Request $request)
    {
        $request->validate([
            'bookname'  => 'required|string|max:255',
            'author'    => 'nullable|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image_url = $request->image_url ?? null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();

            $destinationPath = public_path('images/books');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $file->move($destinationPath, $filename);
            $image_url = '/images/books/' . $filename;
        }

        Book::create([
            'bookname'   => $request->bookname,     // ← ここを $request->bookname に修正
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