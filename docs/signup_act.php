<?php
include('functions.php');

$username = $_POST["username"];
$email = $_POST['email'];
$password = $_POST["password"];
$sex = $_POST["sex"];
$myselect = $_POST["myselect"];
$year = $_POST["year"];
$month = $_POST["month"];
$day = $_POST["day"];

$pdo = connect_to_db();

// ??
$sql = 'SELECT COUNT(*) FROM users_table WHERE username=:username';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
}

if ($stmt->fetchColumn() > 0) {
    echo "<p>すでに登録されているユーザです．</p>";
    echo '<a href="index.php">login</a>';
    exit();
}

//  // SQL作成&実行
$sql = 'INSERT INTO users_table(id, username, email,password, ,sex,is_admin, is_deleted, created_at, updated_at) VALUES(NULL, :username, :email,:password, 0, 0, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':email', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:index.php");
    exit();
}
