<?php
//必ず確認 POSTで送信された値は必ず$_POSTで受け取る
// var_dump($_POST);
// exit();

session_start();
include("functions.php");
check_session_id();

//入力チェック 未入力はエラー 必ず挙動確認すること
if (
    !isset($_POST['playlist_name']) || $_POST['playlist_name'] == ''
) {
    echo json_encode(["error_msg" => "no input"]);
    exit();
}

//受け取ったデータを$の変数に格納する（変数名は同じにしておくとわかりやすい）
$playlist_name = $_POST['playlist_name'];


$pdo = connect_to_db();

$sql = 'INSERT INTO playlists_table(playlist_id, user_id, playlist_name, is_deleted,created_at, updated_at) VALUES(NULL, :user_id, :playlist_name, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':playlist_name', $playlist_name, PDO::PARAM_STR);

$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:user_mypage.php");
    exit();
}
