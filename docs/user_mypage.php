<?php
session_start();
//関数用のファイルを読み込む
include('functions.php');
check_session_id();

//DB接続
$pdo = connect_to_db();





// プレイリスト名・曲名・曲・画像を表示する
// SELECT文（DB結合）
// $sql = 'SELECT * FROM music_table INNER JOIN playlist_create_table ON music_table.music_id = playlist_create_table.music_id
// INNER JOIN playlists_table ON playlists_table.playlist_id = playlist_create_table.playlist_id WHERE user_id=?';

// $stmt = $pdo->prepare($sql);

// // $stmt->bindValue(':playlist_id', $todo_id, PDO::PARAM_INT);
// $status = $stmt->execute([$_SESSION['user_id']]); // SQLを実行 $statusに実行結果(取得したデータではない！)
// // var_dump($status);
// // exit;

// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  //fetchAllで全部とれる
// $songs = '';

// //繰り返し文（foreach以外）でもOK
// foreach ($result as $record2) {
//     // var_dump($result);
//     // exit;
//     $songs .= "
//     <li><div class='music_wrap'>
//     <div class='img_wrap'>
//         <img src='./album_img/{$record2['music_img']}'>
//     </div>
//     <div class='song_wrap'>
//         <h2>{$record2["music_name"]}</h2>
//         <audio controls>
//         <source src='./music/Here,There_And_Everywhere.mp3'>
//         </audio>
//     </div></div>
//     </li>";
// }




// // $recordの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
// // 今回は以降foreachしないので影響なし
// unset($record);


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
        
        <form id='fm-{$record['playlist_id']}'>
        <li onclick='submitFnc({$record['playlist_id']})'>{$record["playlist_name"]}</li>
        <input type='hidden' name='playlist_id' value='{$record['playlist_id']}'>
        </form>
        
        </li>";
}
// <input type='hidden' name='music_id' value='{$music['music_id']}'>


// <a href='user_playlist_act.php?playlist_id={$record["playlist_id"]}'>{$record["playlist_name"]}</a>


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


        <!-- <form action="user_playlist_act.php" method="POST"> -->
        <ul>
            <!-- ここに<li>でphpデータが入る -->

            <?= $output ?>
        </ul>

        <!-- </form> -->

    </main>
    <script>
        function submitFnc(a) {
            const fm = document.getElementById(`fm-${a}`);
            //formオブジェクトを取得する

            //Submit値を操作したい場合はこんな感じでできます。
            // 例）name="hid1"の値を"hoge"にする
            // fm.hid1.value = "hoge";

            //Submit形式指定する（post/get）
            fm.method = "get"; // 例）POSTに指定する

            //targetを指定する
            // 例）新しいウィンドウに表示
            // fm.target = "_blank"; 

            //action先を指定する
            fm.action = "user_playlist_act.php"; // 例）"/php/sample.php"に指定する

            //Submit実行
            fm.submit();
        }
    </script>
</body>

</html>