<?php
// 関数読み込み
include("functions.php");

//コンソールのネットワークで確認する
// var_dump($_GET);
// exit();

$search_word = $_GET["searchword"]; // GETでデータ受け取り

// db連携
$pdo = connect_to_db();

$sql = "SELECT * FROM item_table WHERE material LIKE :search_word";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':search_word', "%{$search_word}%", PDO::PARAM_STR);
$status = $stmt->execute();



if ($status == false) {
    // エラー処理をかく
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result); // JSON形式にして出力
    exit();
}
