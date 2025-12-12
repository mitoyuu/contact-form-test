<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Testing\Fluent\Concerns\Has;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    // 会員登録処理
    public function register(RegisterRequest $request)
    {
        // $password = $request->input('password'); // 生のパスワード
        // // ここでパスワードをハッシュする
        // // $hashed_password = Hash::make($password);

        // return redirect('admin.index');

        // ユーザーを作成
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 自動ログイン
        Auth::login($user);

        // 管理画面へ遷移
        return redirect()->route('admin.index');
    }

    // ログイン処理
    public function login(LoginRequest $request)
    {
        // $request がバリデーションを通過していることが保証される
        // 認証処理...
    }
}
