<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Responses\LoginResponse;
use Laravel\Fortify\Http\Responses\RegisterResponse;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    // 新規ユーザの登録処理
    Fortify::createUsersUsing(CreateNewUser::class);

    // GETメソッドで/registerにアクセスしたときに表示するviewファイル
    Fortify::registerView(function () {
        return view('auth.register');
    });
    // GETメソッドで/loginにアクセスしたときに表示するviewファイル
    Fortify::loginView(function () {
        return view('auth.login');
    });

        // ---------- ③ ログイン後のリダイレクト ----------
        $this->app->singleton(LoginResponse::class, function () {
            return new class implements LoginResponse {
                public function toResponse($request)
                {
                    return redirect()->intended('/admin');
                }
            };
        });

        // ---------- ④ 会員登録後のリダイレクト ----------
        $this->app->singleton(RegisterResponse::class, function () {
            return new class implements RegisterResponse {
                public function toResponse($request)
                {
                    return redirect('/admin');
                }
            };
        });
    }
}
