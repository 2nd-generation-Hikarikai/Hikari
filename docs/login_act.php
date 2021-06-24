<?php
//まず確認
// var_dump($_POST);
// exit();
session_start();
include('functions.php');
$pdo = connect_to_db();

if (isset($_SESSION['EMAIL'])) {
    header('Location: //localhost/myfile_lab05/Hikari/docs/beatles.php');
    exit;
  } else {
    echo '';
  }





//値を受け取る
$username = $_POST['username'];
$password = $_POST['password'];

//db連携
$sql = 'SELECT * FROM users_table WHERE user_name=:username AND password=:password';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();


if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $val = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$val) {
        echo "<p>ログイン情報に誤りがあります</p>";
        echo "<a href=login.php>ログイン</a>";
        exit();
    } else {
        $_SESSION = array();
        $_SESSION["session_id"] = session_id();
        $_SESSION["user_id"] = $val["user_id"];
        $_SESSION["username"] = $val["username"];
        $_SESSION["EMAIL"] = $val["email"];
        // var_dump($_SESSION);
        header("Location:beatles.php");
        exit();
    }
}
