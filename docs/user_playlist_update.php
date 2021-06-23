<?php
// 確認するuser_idとplaylist_idが送られる
// var_dump($_GET);
// exit();

// 関数ファイルの読み込み
include("functions.php");

// GETで値の取得
// 何の曲を、どのプレイリストにいれるか(プレイリストとユーザーは紐づいている)
// $user_id = $_GET['user_id'];
$playlist_id = $_GET['playlist_id'];
$music_id = $_GET['music_id'];

// DB接続
$pdo = connect_to_db();


// 1.プレイリストに曲追加したときのデータ受取処理
$sql = 'INSERT INTO playlists_create_table(create_id, playlist_id, music_id, created_at)
VALUES(NULL, :playlist_id, :music_id, sysdate())'; // SQL作成
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':playlist_id', $todo_id, PDO::PARAM_INT);
$stmt->bindValue(':music_id', $todo_id, PDO::PARAM_INT);
$status = $stmt->execute(); // SQL実行
if ($status == false) {
    // エラー処理
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header('Location:beatles.php');
}
