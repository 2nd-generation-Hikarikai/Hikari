<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <h3>The Beatles</h3>
    </header>
    <main>
        <!-- action と method 忘れずに！ -->
        <form action="login_act.php" method="post" autocomplete="off">
            <h2>ログイン</h2>
            <div>
                <!-- name属性わすれずに！dbと同じにする -->
                ユーザーネーム <input type="text" name="username" placeholder="name">
            </div>
            <div>
                パスワード <input type="password" name="password" placeholder="password">
            </div>
            <div>
                <button class="gradient1">ログイン</button>
            </div>
            <a href="signup.php" class="btn">新規登録はこちらから</a>
        </form>
    </main>

</body>

</html>