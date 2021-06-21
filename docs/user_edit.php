<?php
// GETで取れているか最初に確認する
// var_dump($_GET);
// exit();


session_start();
//関数用のファイルを読み込む
include('functions.php');
check_session_id();

// 送信されたidをgetで受け取る
$id = $_GET['id'];

// DB接続
$pdo = connect_to_db();

//id名でテーブルから検索
$sql = 'SELECT * FROM item_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// fetch()で1レコード取得できる．
if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
}
//レコード取得できているか確認する。取れていたらHTMLのinputに表示するのを書く
// var_dump($record);
// exit();


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール編集</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>


    <header>
        <h3>プロフィール</h3>
        <a href="beatls.php" class="btn">beatls</a>
        <a href="user_playlist.php" class="btn">マイページ</a>
        <a href="logout.php" class="btn">logout</a>

    </header>

    <form action="user_update.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <div class="record">
                <div class="formItem">
                    <input type="file" name="image" accept="image/*">
                    <input type="hidden" name="image_old" accept="image/*" value="<?= $record["image"] ?>">
                </div>
                <div class="formItem">
                    <label>
                        作品名<br> <input type="text" name="title" placeholder="さくひん名を入力" autocomplete=”off” value="<?= $record["title"] ?>">
                    </label>
                </div>
                <div class="formItem">
                    <label for="">作品の説明<br>
                        <textarea name="description" rows="4" cols="40" id="#result_text"><?= $record["description"] ?></textarea>
                    </label>
                    <a class="ecBtn" href=""><i class="fas fa-microphone" fa-lg></i></a>
                </div>
                <div class="formItem">
                    <label for="">
                        素材<input type="text" name="material" placeholder="そざいを入力" autocomplete=”off” value="<?= $record["material"] ?>">
                    </label>
                </div>
                <div class="formItem">
                    <label for="">
                        制作日 <input type="date" name="production_date" value="<?= $record["production_date"] ?>">
                    </label>
                </div>
                <div class="formItem">
                    <label for="">
                        制作した年齢 <input type="number" name="production_age" value="<?= $record["production_age"] ?>">
                    </label>
                </div>
                <div class="formItem">
                    <label for="">
                        金額 <input type="text" name="value" autocomplete=”off” value="<?= $record["value"] ?>">
                    </label>
                </div>
                <!-- idを見えないように送る input type="hidden"を使用する！-->
                <input type="hidden" name="id" value="<?= $record['id'] ?>">
                <button class="btn">登録</button>
            </div>
        </fieldset>
    </form>
    <script src="https://kit.fontawesome.com/b28496ef11.js" crossorigin="anonymous"></script>

</body>

</html>