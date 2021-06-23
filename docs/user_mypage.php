<?php
session_start();
//関数用のファイルを読み込む
include('functions.php');
check_session_id();

//DB接続
$pdo = connect_to_db();


// 空っぽのプレイリストの表示
// $sql = "SELECT * FROM playlists_table";


// プレイリスト名・曲名・曲・画像を表示する
// SELECT文（DB結合）
$sql = 'SELECT * FROM playlists_table LEFT OUTER JOIN playlist_create_table ON playlists_table.playlist_id = playlist_create_table.playlist_id';

$stmt = $pdo->prepare($sql);
$status = $stmt->execute(); // SQLを実行 $statusに実行結果(取得したデータではない！)


// // 失敗時にエラーを出力し，成功時は登録画面に戻る
if ($status == false) {
    $error = $stmt->errorInfo();  // データ登録失敗時にエラーを表示
    exit('sqlError:' . $error[2]);
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  //fetchAllで全部とれる
    $output = '';
    //繰り返し文（foreach以外）でもOK
    foreach ($result as $record) {
        // var_dump($result);
        // exit;
        $output .= '<li class="border">';
        $output .= '<img src="img/' . $record["music_img"] . '" >';
        $output .= '<h2>' . $record["music_name"] . '</h2>';

        // edit deleteリンクを追加

        $output .= '</li>';
    }
    // $recordの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
    // 今回は以降foreachしないので影響なし
    unset($record);
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>playlist</title>
    <link href="css/style.css" rel="stylesheet">
</head>


<body>
    <header>
        <a href="beatles.php" class="btn"><img src="img/beatles_logo02.jpeg" alt=""></a>
        <h3>My Playlist</h3>
        <a href="logout.php" class="btn">logout</a>
        <a href="user_edit.php" class="btn">プロフィール編集</a>

    </header>
    <main>

        <form action="user_playlist_create.php" method="POST">
            <fieldset>

                <div>
                    <input type="text" name="playlist_name" placeholder="playlist name">
                </div>
                <button class="gradient1">プレイリストを作成</button>
                </div>
            </fieldset>
        </form>

        <ul>
            <!-- ここに<li>でphpデータが入る -->
            <?= $output ?>
        </ul>
    </main>
</body>

</html>