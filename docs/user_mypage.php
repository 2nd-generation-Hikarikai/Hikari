<?php
session_start();
//関数用のファイルを読み込む
include('functions.php');
check_session_id();

//DB接続
$pdo = connect_to_db();





// プレイリスト名・曲名・曲・画像を表示する
// SELECT文（DB結合）
$sql = 'SELECT * FROM playlist_create_table INNER JOIN playlists_table ON playlists_table.playlist_id = playlist_create_table.playlist_id
INNER JOIN music_table ON playlist_create_table.music_id = music_table.music_id';

$stmt = $pdo->prepare($sql);
$status = $stmt->execute(); // SQLを実行 $statusに実行結果(取得したデータではない！)
// var_dump($status);
// exit;

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);  //fetchAllで全部とれる
$songs = '';
//繰り返し文（foreach以外）でもOK
foreach ($result as $record) {
    // var_dump($result);
    // exit;
    $songs .= "
    <li><div class='music_wrap'>
    <div class='img_wrap'>
        <img src='./album_img/{$record['music_img']}'>
    </div>
    <div class='song_wrap'>
        <h2>{$record["music_name"]}</h2>
        <audio controls>
        <source src='./music/Here,There_And_Everywhere.mp3'>
        </audio>
    </div></div>
    </li>";
}
// $recordの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
// 今回は以降foreachしないので影響なし
unset($record);


// 空っぽのプレイリストの表示
$sql = "SELECT * FROM playlists_table WHERE user_id=?";

$stmt = $pdo->prepare($sql);
$status = $stmt->execute([$_SESSION['user_id']]); // SQLを実行
// var_dump($status);
// exit;

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);  //fetchAllで全部とれる
$output = '';
//繰り返し文（foreach以外）でもOK
foreach ($result as $record) {
    // var_dump($result);
    // exit;
    $output .= "
        <li>
        <a href='#'>{$record["playlist_name"]}</a>
            <ul>
                {$songs}
            </ul>
        </li>";
}

// $recordの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
// 今回は以降foreachしないので影響なし
unset($record);


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>playlist</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/mypage.css" rel="stylesheet">
</head>


<body>
    <header>
        <a href="beatles.php" class="btn"><img src="img/beatles_logo05.png" alt=""></a>
        <h3>My Playlist</h3>
        <a href="logout.php" class="btn">logout</a>
        <a href="user_edit.php" class="btn">プロフィール編集</a>

    </header>
    <main>

        <form action="user_playlist_create.php" method="POST">
            <div>
                <input type="text" name="playlist_name" placeholder="playlist name">
            </div>
            <button class="gradient1">プレイリストを作成</button>
            </div>
        </form>

        <ul>
            <!-- ここに<li>でphpデータが入る -->
            <?= $output ?>
        </ul>


        <ul>
            <li>
                プレイリスト
                <ul>
                    <li>曲名１</li>
                    <li>曲名２</li>
                </ul>
            </li>

            <li>
                プレイリスト２
                <ul>
                    <li>曲名３</li>
                    <li>曲名４</li>
                </ul>
            </li>
    </main>
</body>

</html>