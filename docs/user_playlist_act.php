<?php
//まず確認
// var_dump($_GET);
// exit();

//dbの構造をかくにんすること
//最初にセッションスタート
session_start();
// var_dump(session_id());

include('functions.php');


//値を受け取る
$playlist_id = $_GET['playlist_id'];
// var_dump($playlist_id);
// exit();


//DB接続
$pdo = connect_to_db();





// プレイリスト名・曲名・曲・画像を表示する
// SELECT文（DB結合）
$sql = 'SELECT * FROM music_table INNER JOIN playlist_create_table ON music_table.music_id = playlist_create_table.music_id
WHERE playlist_id=:playlist_id';

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':playlist_id', $playlist_id, PDO::PARAM_INT);
$status = $stmt->execute(); // SQLを実行 $statusに実行結果(取得したデータではない！)
// var_dump($status);
// exit;
// exit('ok');

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);  //fetchAllで全部とれる
$songs = '';

//繰り返し文（foreach以外）でもOK
foreach ($result as $record2) {
    // var_dump($result);
    // exit;
    $songs .= "
    <li><div class='music_wrap'>
    <div class='img_wrap'>
        <img src='./album_img/{$record2['music_img']}'>
    </div>
    <div class='song_wrap'>
        <h2>{$record2["music_name"]}</h2>
        <audio controls>
        <source src='./music/Here,There_And_Everywhere.mp3'>
        </audio>
    </div></div>
    </li>";
}


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
        <a href="beatles.php" class="btn"><img src="img/beatles_logo05.png" alt="" height="60px"></a>
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


        <form action="user_playlist_act.php" method="POST">
            <ul>
                <!-- ここに<li>でphpデータが入る -->
                <?= $songs ?>
            </ul>

        </form>



    </main>
</body>

</html>