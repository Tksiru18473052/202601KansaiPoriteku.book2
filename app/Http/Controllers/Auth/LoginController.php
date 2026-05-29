<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * ログイン画面を表示
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * ログイン処理
     */
    public function login(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'password' => 'required|string',
        ]);

if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            $request->session()->regenerate();

            // ★★ ここで権限判定 ★★
            // Userモデルに実装済みの isAccounting() メソッドを使用
            if (Auth::user()->isAccounting()) {
                // 経理部社員 → accounting.blade.php を表示するページへ
                return redirect()->route('books.accounting');
            } else {
                // 一般社員 → general.blade.php を表示するページへ
                return redirect()->route('books.general');
            }
        }

        return back()->withErrors([
            'name' => 'ログイン情報が正しくありません。',
        ]);
    }

    /**
     * ログアウト処理
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}