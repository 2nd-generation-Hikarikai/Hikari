<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録画面</title>
    <!-- Bootstrapの読み込み -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- googlefontsの読み込み -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@300&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <form action="signup_act.php" method="POST" autocomplete="off">
        <fieldset>
            <legend>ユーザー登録画面</legend>
            <div>
                ユーザーネーム <input type="text" name="username">
            </div>
            <div>
                パスワード <input type="text" name="password">
            </div>
            <div>
                <button class="btn">登録する</button>
            </div>
            <a href="index.php">ログイン画面</a>
        </fieldset>
    </form>

</body>

</html>