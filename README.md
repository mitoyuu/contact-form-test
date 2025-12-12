# アプリケーション名
お問合せフォーム

## 環境構築
Dockerビルド
・git clone git@github.com:mitoyuu/contact-form-test.git
・docker-compose up -d build（初回起動時のみ実行）
Laravel環境構築
・docker-compose exec php bash
・composer install
・cp .env.example .env ,環境変数を適宜変更(DB_DATABASE=laravel_db, DB_PASSWORD=laravel_pass)
・php artisan key:generate
・php artisan migrate
・php artisan db:seed

## 使用技術
・PHP 8.2.11
・Laravel ８.83.8
・MySQL 8.0.26・
・nginx 1.21.1

## ER図

## URL
開発環境
・お問合せ画面：http://localhost/
・お問合せ確認画面：http://localhost/confirm/
・サンクスページ：http://localhost/thanks/
・会員登録画面：http://localhost/register/
・ログイン画面：http://localhost/login/
・ログアウト：(管理画面から操作/URLなし)
・エクスポート：(管理画面のボタンから実行)
・管理画面：http://localhost/admin/
・管理画面（日付選択フォームクリック時）：http://localhost/admin/
・管理画面（モーダル表示時）：http://localhost/admin/
・検索：
・検索リセット：
・phpMyAdmin：http://localhost:8080/