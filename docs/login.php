

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
    <link href="css/login.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="img_rogo">
            <img src="./img/beatles_rogo06.jpg" alt="aaaaaa">
        </div>

    </header>
    <main>
        <!-- action と method 忘れずに！ -->

        <form action="login_act.php" method="post" autocomplete="off">

            <div class="form_container">
                <div>
                    <h1>~~~~~にログイン</h1>
                </div>
                <div class="input_styles">
                    <input type="text" onfocus="animation1()" onblur="animationout1()" id="input_name1" name="username" required>
                    <div id="anime1" class="placeholder1">名前を入力してください</div>
                </div>

                <div class="space_24"></div>

                <div class="input_styles">
                    <input type="password" onfocus="animation2()" onblur="animationout2()" id="input_name2" name="password" required>
                    <div id="anime2" class="placeholder2">パスワードを入力してください</div>
                </div>

                <div class="space_24"></div>

                <button class="gradient1">ログイン</button>

                <div class="space_24"></div>

            </div>
            <a href="signup.php" class="btn">新規登録はこちらから</a>
            </div>

        </form>
    </main>

    <script>
        const placeholder1 = document.getElementById('anime1');
        const placeholder2 = document.getElementById('anime2');
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


        // ---input textの入力された値をゲット---
        function inputChange(event) {
            console.log(event.currentTarget.value);
            return event.currentTarget.value;
        }

        const input_name1 = document.getElementById('input_name1');
        const input_name2 = document.getElementById('input_name2');
        input_name1.addEventListener('input', inputChange);
        input_name2.addEventListener('input', inputChange);
        // ________
    </script>


</body>

</html>