<?php
for ($i = 1920; $i <= 2020; $i++) {
    $year .= '<option value="' . $i . '">' . $i . '年</option>';
}

for ($i = 1; $i <= 12; $i++) {
    $month .= '<option value="' . $i . '">' . $i . '月</option>';
}

for ($i = 1; $i <= 31; $i++) {
    $day .= '<option value="' . $i . '">' . $i . '日</option>';
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録画面</title>
    <link href="css/signup.css" rel="stylesheet">
    
</head>

<body>
    <header>
        <img src="img/beatles_logo02.jpeg" alt="">
        <h2>The Beatles</h2>
        <a href="login.php" class="btn">ログイン</a>
    </header>
    <main>

    <h2 class="info">初めての方はこちら</h2>

        <form method="POST"  action="signup_act.php" > 

        <p>name <br>
        <input type="text" name="username" value="" autocomplete="off"></p>

        <p>パスワード<br>
        <input type="password" name="password" value=""></p>

        <p>e-mail <br>
        <input type="email" name="email" placeholder="email"></p>

        <p>性別</p>
        <div class="gender">
        <div><label for="">男性<input type="radio" name="sex" value=""></label></div>
        <div><label for="">女性<input type="radio" name="sex" value=""></label></div>
        <div><label for="">その他<input type="radio" name="sex" value=""></label></div>
        </div>

        <p>恋愛対象</p>
    <select name="myselect" id="" >
        <option value="man">男性</option>
        <option value="woman">女性</option>
        <option value="nbg">限定しない</option>
    </select>

    <!-- <p>パスワード<br>
        <input type="password" name="password" value=""></p> -->

    <p>誕生日</p>
    <select name="year"><?= $year ?></select>
    <select name="month"><?= $month ?>'</select>
    <select name="day"><?= $day ?></select>

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