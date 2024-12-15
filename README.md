# アプリケーション名

お問い合わせフォーム

##  環境構築
1.下記でディレクトリ内にクローンしてください
    $ git clone git@github.com:riku37-create/miyaharariku-kadai.git

2.個人のリモートリポジトリを作成してください

3.下記で作成したリポジトリに変更してください
    $ git remote set-url origin 作成したリポジトリのurl
    $ git add .
    $ git commit -m "リモートリポジトリの変更"
    $ git push origin main

4.以下のコマンドでコンテナを作成します
    $ docker-compose up -d --build

5.以下のコマンドでパッケージのインストールをします
    $ docker-compose exec php bash
    $ composer install

6..envファイルは、.env.exampleファイルをコピーして作成します
    $ cp .env.example .env

7.VSCode から.envファイルの11行目以降を以下のように修正します
    DB_CONNECTION=mysql
    - DB_HOST=127.0.0.1
    + DB_HOST=mysql
    DB_PORT=3306
    - DB_DATABASE=laravel
    - DB_USERNAME=root
    - DB_PASSWORD=
    + DB_DATABASE=laravel_db
    + DB_USERNAME=laravel_user
    + DB_PASSWORD=laravel_pass

8.モーダルウィンドウを表示するためlivewireをインストールしてください
    $composer require livewire/livewire

##  使用技術
・Laravel Framework 8.83.8
・PHP
・HTML
・CSS
・Livewire


## ER図
以下はこのプロジェクトのデータベース構造を示すER図です。

![ER図](/contacts.drawio.png)


## URL
お問い合わせフォーム　http://localhost/
お問い合わせフォーム確認　http://localhost/confirm
サンクスページ　http://localhost/thanks
登録ページ　http://localhost/register
ログインページ　http://localhost/login
管理画面　http://localhost/admin
　

## 実装できていないところ
管理画面においての検索、モーダルウィンドウの表示。
