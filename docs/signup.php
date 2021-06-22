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

    <h2>初めての方はこちら</h2>

        <form method="POST"  action="signup_act.php" > 

        <p>name <br>
        <input type="text" name="username" value="" autocomplete="off"></p>

        <p>e-mail <br>
        <input type="email" name="email" placeholder="email"></p>

        <div><label for="">男性
        <input type="radio" name="sex" value="">
        </label>
        <label for="">女性
        <input type="radio" name="sex" value="">
        </label>
        <label for="">その他
        <input type="radio" name="sex" value="">
        </label>
        </div>
        <p>パスワード<br>
        <input type="password" name="password" value=""></p>

            <div>
            <select id="year" name="year"></select>
            <select id="month" name="month"></select>
            <select id="date" name="date"></select>
            </div>


        <p> <input type="submit" name="signup" value="Sign Up!(登録する)"></p>

        <p>パスワードは半角英数文字をそれぞれ1文字以上含んだ、<br>8文字以上で設定してください。</p>
        </form>
    </main>

</body>

<script>

</script>

</html>
// <!-- 
// <form action="signup_act.php" method="POST" autocomplete="off">
//             <h3>初めての方はこちら</h3>
//             <div>
//                 name <input type="text" name="username" placeholder="name">
//             </div>
//             <div>
//                 email <input type="text" name="email" placeholder="email">
//             </div>
//             <div>
//                 性別
//                 <label>
//                     男性
//                     <input type="radio" name="sex" value="">
//                 </label>
//                 <label>
//                     女性
//                     <input type="radio" name="sex" value="">
//                 </label>
//                 <label>
//                     その他
//                     <input type="radio" name="sex" value="">
//                 </label>
//             </div>
//             <div>
//                 password <input type="password" name="password">
//             </div>

//             <div>
//                 <button class="gradient1">登録する</button>
//             </div>
//         </form> -->