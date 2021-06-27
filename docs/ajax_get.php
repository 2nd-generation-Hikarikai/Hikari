<?php
// 関数読み込み
session_start();
include("./functions.php");
// var_dump($_GET);
//コンソールのネットワークで確認する
// var_dump($_GET);
// // exit();
$myselect = $_POST["myselect"];
// $search_word = $_GET["searchword"]; // GETでデータ受け取り

// db連携
$pdo = connect_to_db();
$sql = "SELECT * FROM music_table WHERE feel1 LIKE :myselect OR feel2 LIKE :myselect" ;
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':myselect', "%{$myselect}%", PDO::PARAM_STR);
$status = $stmt->execute();

$musicAll = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $sql = "SELECT * FROM music_table WHERE Trivia1 AND  Trivia2 AND  Trivia3 LIKE :search_word";

// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':search_word', "%{$search_word}%", PDO::PARAM_STR);
// $status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output = "";
    foreach ($musicAll as $key => $music) {
        $output .= "
        <li class='relative'>
        <div id='absolute' class='absolute' ontouchstart>
        <div class='col-2 title_img'>
            <img src='./album_img/{$music['music_img']}'>
            </div>
            </div>
            <div class='music_title'>{$music['music_name']}</div>
            <audio controls controlslist='nodownload'>
            <source src='./music/{$music['music_name']}.mp3'>
            </audio>
            <h3>Trivia</h3>
            <div class='trivia'>{$music['Trivia1']}</div>
            <div class='trivia'>{$music['Trivia2']}</div>
            <div class='trivia'>{$music['Trivia3']}</div>
        </div>
        <ul class='playlist_ul none' id='playlist_ul-{$key}' onclick='getId(this)';>
        ";
        foreach ($my_playlist as $list) {
            $output .= "
            <form id='fm'>
            <li class='playlist_li' onclick='submitFnc()'>{$list['playlist_name']}</li>
            <input type='hidden' name='playlist_id' value='{$list['playlist_id']}'>
            <input type='hidden' name='music_id' value='{$music['music_id']}'>
            </form>
            ";
        }
        $output .= "
        </ul>
        </li>
        ";
    }
    unset($value);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommended</title>
    <link href="css/ajax.css" rel="stylesheet">
</head>

<body>
    <header>
        <a href="beatles.php"><img src="img/beatles_logo05.png" alt="" height="60px"></a>
        <h2><i class="fas fa-record-vinyl"></i> Recommended</h2>
        <input type="button" onclick="history.back()" class="gradient1" value="戻る">
    </header>
    <main>

        <ul class="row">
            <?= $output ?>

    </main>
    <script src="https://kit.fontawesome.com/b28496ef11.js" crossorigin="anonymous"></script>
</body>

</html>


<!-- 
// if ($status == false) {
//     // エラー処理をかく
//     $error = $stmt->errorInfo();
//     echo json_encode(["error_msg" => "{$error[2]}"]);
//     exit();
// } else {
//     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     echo json_encode($result); // JSON形式にして出力
//     exit();
// } -->