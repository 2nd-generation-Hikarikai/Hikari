<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録画面</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <img src="img/beatles_logo02.jpeg" alt="">
        <h2>The Beatles</h2>
        <a href="login.php" class="btn">ログイン</a>
    </header>
    <main>
        <form action="signup_act.php" method="POST" autocomplete="off">
            <h3>初めての方はこちら</h3>
            <div>
                name <input type="text" name="username" placeholder="name">
            </div>
            <div>
                email <input type="text" name="email" placeholder="email">
            </div>
            <div>
                性別
                <label>
                    男性
                    <input type="radio" name="sex" value="">
                </label>
                <label>
                    女性
                    <input type="radio" name="sex" value="">
                </label>
                <label>
                    その他
                    <input type="radio" name="sex" value="">
                </label>
            </div>
            <div>
                password <input type="password" name="password">
            </div>

            <div>
                <button class="gradient1">登録する</button>
            </div>
        </form>
    </main>

</body>

</html>