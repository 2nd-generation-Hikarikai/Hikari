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
$sql = 'INSERT INTO playlists_create_table(id, playlist_id, music_id, created_at)
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




// SQLでいいねの件数をカウント
$sql = 'SELECT COUNT(*) FROM like_table WHERE user_id=:user_id AND todo_id=:todo_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':todo_id', $todo_id, PDO::PARAM_INT);
$status = $stmt->execute(); // SQL実行

if ($status == false) {
    // エラー処理
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $like_count = $stmt->fetch();
    // var_dump($like_count[0]);
    // exit();
}

// いいねされているかで条件分岐する（いいねしていれば削除、していなければ追加）
if ($like_count[0] != 0) {
    // いいねされている状態（like_countが0でないとき）
    // DELETE文
    $sql = 'DELETE FROM like_table WHERE user_id=:user_id AND todo_id=:todo_id';
} else {
    // いいねされていない状態
    // INSERT文
    $sql = 'INSERT INTO like_table(id, user_id, todo_id, created_at)VALUES(NULL, :user_id, :todo_id, sysdate())';
}



$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':todo_id', $todo_id, PDO::PARAM_INT);
$status = $stmt->execute(); // SQL実行
if ($status == false) {
    // エラー処理
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header('Location:todo_read.php');
}
