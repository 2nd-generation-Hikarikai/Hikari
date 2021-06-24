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
WHERE playlist_id=:playlist_id ';

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
        <a href="beatles.php"><img src="img/beatles_logo05.png" alt="" height="60px"></a>
        <a href="user_mypage.php" class="btn"><i class='fas fa-headphones'></i> MyPlaylist </a>
        <a href="logout.php" class="gradient1">logout</a>

    </header>
    <main>




        <form action="user_playlist_act.php" method="POST" class="play_music">
            <h3><?= $_SESSION['playlist_name']  ?> </h3>
            <ul>
                <!-- ここに<li>でphpデータが入る -->
                <?= $songs ?>
            </ul>
        </form>
    </main>
    <script src="https://kit.fontawesome.com/b28496ef11.js" crossorigin="anonymous"></script>
</body>

</html>