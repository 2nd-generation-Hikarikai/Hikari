<?php
session_start();

include("functions.php");
// require_once __DIR__ . './functions.php';
$pdo = connect_to_db();

// var_dump($_POST);
// exit('ok');

if ( // 入力チェック(未入力の場合は弾く，commentのみ任意)
  !isset($_POST['playlist_id']) || $_POST['playlist_id'] == '' ||
  !isset($_POST['music_id']) || $_POST['music_id'] == '' 
) {
  exit('Param Error');
} 

$playlist_id = $_POST['playlist_id'];
$music_id = $_POST['music_id'];

// var_dump($playlist_id);
// var_dump($music_id);

  // SQL作成&実行
  $sql = "INSERT INTO playlist_create_table(create_id, playlist_id, music_id, created_at) VALUES(NULL, :playlist_id, :music_id, sysdate())";

  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':playlist_id', $playlist_id, PDO::PARAM_INT);
  $stmt->bindValue(':music_id', $music_id, PDO::PARAM_INT);
  $status = $stmt->execute(); // SQLを実行
  // exit('');
  // exit('ok');

  if ($status == false) {
    $error = $stmt->errorInfo();
    // データ登録失敗次にエラーを表示 
    exit('sqlError:' . $error[2]);
  } else {
    // 登録ページへ移動
    // exit('fini');
    header('Location:beatles.php');
    // echo '投稿できました！';
  }