<?php
include("functions.php");
session_start();
$pdo = connect_to_db();

if (isset($_SESSION['EMAIL'])) {
    header('Location:login.php');
    exit;
  } else {
    echo '';
  }
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
    <!-- <link href="css/style.css" rel="stylesheet"> -->

</head>

<body>
    <header>
        <img src="img/beatles_logo05.png" alt="" height="60px">
    </header>
    <main>

        <h3 class="info">初めての方はこちらから</h3>

        <form method="POST" action="signup_act.php" autocomplete="off">

            <div class="input_styles">
                <input type="text" onfocus="animation1()" onblur="animationout1()" id="input_name1" name="username" required>
                <div id="anime1" class="placeholder1">名前を入力してください</div>
            </div>

            <div class="space_24"></div>

            <div class="input_styles">
                <input type="password" minlength="4" onfocus="animation2()" onblur="animationout2()" id="input_name2" name="password" required>
                <div id="anime2" class="placeholder2">パスワードを入力してください</div>
            </div>
            <!-- <p>パスワード<br>
                <input type="password" name="password" minlength="4" required>
            </p> -->
            <div class="space_24"></div>

            <div class="input_styles">
                <input type="email" onfocus="animation3()" onblur="animationout3()" id="input_name3" name="email" required>
                <div id="anime3" class="placeholder3">メールアドレスを入力してください</div>
            </div>
            <!-- <p>e-mail <br>
                <input type="email" name="email" placeholder="email" required>
            </p> -->
            <!-- 選択しなくても行っちゃう -->
            <p>性別</p>

            <div class="gender">
                <div><label>男性<input type="radio" name="sex" value="1" style="transform:scale(1.5);"></label></div>

                <div><label>女性<input type="radio" name="sex" value="0" style="transform:scale(1.5);"></label></div>

                <div><label>その他<input type="radio" name="sex" value="2" style="transform:scale(1.5);"></label></div>
            </div>

            <p>恋愛対象</p>
            <select name="myselect" id="">
                <option value="1">男性</option>
                <option value="0">女性</option>
                <option value="2">限定しない</option>
            </select>

            <p>誕生日</p>
            <select name="year"><?= $year ?></select>
            <select name="month"><?= $month ?></select>
            <select name="day"><?= $day ?></select>

            <p><input type="submit" value="Sign Up! (登録する)" class="gradient1"></p>

            <p>パスワードは半角英数文字をそれぞれ1文字以上含んだ、<br>8文字以上で設定してください。</p>
        </form>
    </main>

</body>

<script>
    const placeholder1 = document.getElementById('anime1');
    const placeholder2 = document.getElementById('anime2');
    const placeholder3 = document.getElementById('anime3');
    const input = document.querySelector('input');

    function animation1() {
        placeholder1.classList.add('placeholder_animation1');
    }

    function animationout1() {

        if (inputChange(event) == "") {
            placeholder1.classList.add('placeholder1');
            placeholder1.classList.remove('done');
            placeholder1.classList.remove('placeholder_animation1');

        } else {
            placeholder1.classList.add('done');
            placeholder1.classList.remove('placeholder1');
        }
    }

    function animation2() {
        placeholder2.classList.add('placeholder_animation2');
    }

    function animationout2() {
        if (inputChange(event) == "") {
            placeholder2.classList.add('placeholder2');
            placeholder2.classList.remove('done');
            placeholder2.classList.remove('placeholder_animation2');

        } else {
            placeholder2.classList.add('done');
            placeholder2.classList.remove('placeholder2');
        }
    }

    function animation3() {
        placeholder3.classList.add('placeholder_animation3');
    }

    function animationout3() {
        if (inputChange(event) == "") {
            placeholder3.classList.add('placeholder3');
            placeholder3.classList.remove('done');
            placeholder3.classList.remove('placeholder_animation3');

        } else {
            placeholder3.classList.add('done');
            placeholder3.classList.remove('placeholder3');
        }
    }


    // ---input textの入力された値をゲット---
    function inputChange(event) {
        console.log(event.currentTarget.value);
        return event.currentTarget.value;
    }

    const input_name1 = document.getElementById('input_name1');
    const input_name2 = document.getElementById('input_name2');
    input_name1.addEventListener('input', inputChange);
    input_name2.addEventListener('input', inputChange);

</script>

</html>

