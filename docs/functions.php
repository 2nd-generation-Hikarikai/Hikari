<?php

//DB接続のための関数
function connect_to_db()
{
    // DB接続情報  dbnameを自分のデータベース名にする
    //$user,$pwdは初期値（レンタルサーバー等のときは適宜変更する）
    $dbn = 'mysql:dbname=hikarify;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';
    // DB接続 「return」がある
    try {
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        exit('dbError:' . $e->getMessage());
    }
}
