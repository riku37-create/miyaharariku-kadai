# アプリケーション名

お問い合わせフォーム

##  環境構築
```
1.下記でディレクトリ内にクローンしてください
    $ git clone git@github.com:riku37-create/miyaharariku-kadai.git

２.以下のコマンドでコンテナを作成します
    $ docker-compose up -d --build

3.以下のコマンドでパッケージのインストールをします
    $ docker-compose exec php bash
    $ composer install

4..envファイルは、.env.exampleファイルをコピーして作成します
    $ cp .env.example .env

5.VSCode から.envファイルの11行目以降を以下のように修正します
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

6. アプリケーションを実行できるようにPHPコンテナで以下のコマンドを打ちましょう
    $ docker-compose exec php bash
    $ php artisan key:generate

7. マイグレーション、シーディングを行うため以下のコードをうってください
    $ php artisan migrate
    $ php artisan db:seed

8. 『he stream or file could not be opened』というエラーが出た場合は下記コマンドで権限設定をおねがいします
sudo chmod -R 777 src/storage 
```

##  使用技術
・Laravel Framework 8.83.8
・PHP 7.4.9
・mysql  Ver 8.0.26
・nginx/1.21.1
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
