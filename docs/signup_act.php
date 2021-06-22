<?php
include('functions.php');
// var_dump($_POST);
// exit('ok');

// formのクリア条件
if (
    !isset($_POST['username']) || trim($_POST['username']) == '' ||
    !isset($_POST['email']) || $_POST['email'] == '' ||
    !isset($_POST['password']) || trim($_POST['password']) == '' ||
    !isset($_POST['sex']) || $_POST['sex'] == '' ||
    !isset($_POST['myselect']) || $_POST['myselect'] == '' ||
    !isset($_POST['year']) || $_POST['year'] == '' ||
    !isset($_POST['month']) || $_POST['month'] == '' ||
    !isset($_POST['day']) || $_POST['day'] == ''
) {
    exit('Param Error');
}

//パスワードの正規表現(暗号化)
if (preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i', $_POST['password'])) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
} else {
    echo 'パスワードは半角英数字をそれぞれ1文字以上含んだ8文字以上で設定してください';
    return false;
}


$username = $_POST["username"];
$email = $_POST['email'];
$password = $_POST["password"];
$sex = $_POST["sex"];
$myselect = $_POST["myselect"];
$year = $_POST["year"];
$month = $_POST["month"];
$day = $_POST["day"];

// 日付（date）の結合
$birthday = "$year-$month-$day";
// exit('ok');

$pdo = connect_to_db();

// exit('ok');


//  // SQL作成&実行
$sql = 'INSERT INTO users_table(user_id, user_name, email, password, sex, love_target	, birthday) VALUES(NULL, :username, :email, :password, :sex, :myselect, :birthday)';
// exit('ok');

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':sex', $sex, PDO::PARAM_INT);
$stmt->bindValue(':myselect', $myselect, PDO::PARAM_INT);
$stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);
$status = $stmt->execute();
// exit('ok');

if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:login.php");
    exit();
}
