<?php
session_start();
include("functions.php");
// require_once __DIR__ . './functions.php';

// DB接続
$pdo = connect_to_db();

// ---プレイリストへ追加---
$stmt = $pdo->prepare('SELECT * FROM playlists_table WHERE user_id=?');
$stmt->execute([$_SESSION['user_id']]);
$my_playlist = $stmt->fetchAll(PDO::FETCH_ASSOC);
// ---プレイリストへ追加---end---


// ---おんがぐ一覧表示---
$stmt = $pdo->prepare('SELECT * FROM music_table');
$stmt->execute();
$musicAll = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($musicAll);
// exit();

$output = '';
foreach ($musicAll as $key => $music) {
  // var_dump($music['music_id']);
  // exit();
  ///////
  $output .= "
  <li class='relative'>
  <div id='absolute' class='absolute' ontouchstart>
    <div class='col-2 title_img'>
      <img src='./album_img/{$music['music_img']}'>
      <div id='like-{$key}' class='like' onclick='getId(this)'>
        <span class='fas fa-heart color'></span>
      </div>
    </div>
    <div class='music_title'>{$music['music_name']}</div>
    <audio controls controlslist='nodownload'>
      <source src='./music/{$music['music_name']}.mp3'>
    </audio>
    <h3>Trivia</h3>
    <div class='trivia'>{$music['Trivia1']}</div>
    <div class='trivia'>{$music['Trivia2']}</div>
    <div class='trivia'>{$music['Trivia3']}</div>
  </div>
  <ul class='playlist_ul none' id='playlist_ul-{$key}' onclick='getId(this)'>
  ";
  foreach ($my_playlist as $list) {
    $output .= "
    <form id='fm-{$list['playlist_id']}'>
    <li class='playlist_li' onclick='submitFnc({$list['playlist_id']}, {$music['music_id']})'>{$list['playlist_name']}</li>
      <input type='hidden' name='playlist_id'>
      <input type='hidden' name='music_id'>
    </form>
    ";
  }
  $output .= "
  </ul>
</li>
";
}
// ---おんがぐ一覧表示---end---


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>鬼のマッチングビートルズ</title>
  <link href="css/beatles.css" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">

</head>

<body>
  <!-- ヘッダーをレスポンシブにしたい -->
  <header class="header_text">

    <div class="header1">
      <h3>beatles</h3>
      <a href="logout.php">logout</a>
      <a href="user_mypage.php">playlist</a>
    </div>

    <!-- 感情検索表示 -->
    <div class="header2">
      <p class="feel">How are you feeling now?</p>
      <form method='post' action="ajax_get.php">
        <select name="myselect" id="search" class="select">
          <option value="元気を出したい">元気を出したい</option>
          <option value="気合をいれたい">気合をいれたい</option>
          <option value="楽しい">楽しい</option>
          <option value="嬉しい">嬉しい</option>
          <option value="悲しい">悲しい</option>
          <option value="孤独を感じる">孤独を感じる</option>
          <option value="投げやりな気分。">投げやりな気分。</option>
          <option value="現実世界を離れたい…">現実世界を離れたい…</option>
          <option value="虚しい">虚しい</option>
          <option value="切ない">切ない</option>
          <option value="辛い">辛い</option>
          <option value="人恋しい">人恋しい</option>
          <option value="誰かに助けてほしい">誰かに助けてほしい</option>
          <option value="眠たい">眠たい</option>
          <option value="物悲しい気分に浸りたい">物悲しい気分に浸りたい</option>
          <option value="旅に出たい。">旅に出たい。</option>
          <option value="衝撃を味わいたい">衝撃を味わいたい</option>
          <option value="愛が欲しい">愛が欲しい</option>
          <option value="刺激が欲しい">刺激が欲しい</option>
          <option value="昔を思い返したい">昔を思い返したい</option>
          <option value="リラックスしたい">リラックスしたい</option>
          <option value="ほんわかしたい">ほんわかしたい</option>
          <option value="泣きたい">泣きたい</option>
          <option value="腹が立つ">腹がたつ</option>
          <option value="勇気づけられたい">勇気づけられたい</option>
          <option value="誕生日を祝いたい">誕生日を祝いたい・祝って欲しい</option>
          <option value="癒されたい">癒されたい</option>
        </select>
        <!-- <button type="submit" name="name" onclick="location.href='./ajax_get.php'" value="値">送信</button> -->
        <input type="submit" onclick="location.href='ajax_get.php'" value="送信" name="name" class="input">
      </form>
    </div>

    <!-- 感情検索表示終わり -->
  </header>
  <main>
    <div class="top_container">
      <img src="./img/get.back.jpg">
      <!-- メイン画面のデザイン -->
      <div class="middle_container">
        <p class="title">The Beatles</p>
        <p class="info">映画『ゲット・バック』が2021年11月25日に世界同時劇場公開！<br>
          42分間の「ルーフトップ・コンサート」を含む60時間の未発表映像、 <br>
          150時間の未発表音源を再編集</p>
      </div>
    </div>
    <div class="main_container">
      <ul class="row">
        <?= $output ?>
      </ul>
    </div>
    <div id="mask"></div>
  </main>
  <footer>
    <div class="footer_container">
    </div>
  </footer>

  <!-- fontawsome -->
  <script src="https://kit.fontawesome.com/b28496ef11.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


  <script>
    const array_30 = [];
    for (let i = 0; i < 30; ++i) {
      array_30.push(document.getElementById("like-" + i));
      console.log(array_30);

    }
    let playlist_ul;
    const mask = document.getElementById('mask');
    mask.addEventListener('click', () => {
      mask.classList.remove('mask');
      playlist_ul.classList.add('none');
    });

    function getId(ele) {
      let id_value = ele.id; // eleのプロパティとしてidを取得
      const w = id_value.split('-');
      // console.log(w);
      const id_key = w[1];
      const key__ = parseInt(id_key);
      // console.log(key__);
      console.log(array_30[key__]);

      const id_name = "playlist_ul-" + key__;
      playlist_ul = document.getElementById(id_name);

      playlist_ul.classList.remove('none');
      mask.classList.add('mask');
    }

    function submitFnc(a, b) {
      let fm = document.getElementById(`fm-${a}`);
      //formオブジェクトを取得する

      //Submit値を操作したい場合はこんな感じでできます。
      // 例）name="hid1"の値を"hoge"にする
      fm.music_id.value = b;
      fm.playlist_id.value = a;

      //Submit形式指定する（post/get）
      fm.method = "post"; // 例）POSTに指定する

      //targetを指定する
      // 例）新しいウィンドウに表示
      // fm.target = "_blank"; 

      //action先を指定する
      fm.action = "beatles_act.php"; // 例）"/php/sample.php"に指定する

      //Submit実行
      fm.submit();
    }

    // function postDB() {

    // }

    // console.log(likeID);

    // function aaa() {
    //   const key = likeID.split('-');
    //   console.log(key);
    //   return key;
    // }
    // aaa();

    // const like = document.getElementById('like');
    // const playlist_ul = document.getElementById('playlist_ul0');
    // like.addEventListener('click',() => {
    //   if (playlist_ul.classList.contains('none') == true) {
    //     playlist_ul.classList.remove('none');
    //   } else {
    //     playlist_ul.classList.add('none');
    //   }
    // });


    // 音楽を重複再生できないようにする
    const audio = document.getElementById('audio');
    var audios = document.querySelectorAll("audio");
    for (var i = 0; i < audios.length; i++) {
      audios[i].addEventListener("play", function() {
        for (var j = 0; j < audios.length; j++) {
          if (audios[j] != this) {
            audios[j].pause()
          }
        }
      }, false);
    }
  </script>
</body>

</html>