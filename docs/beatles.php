<?php
// ホバーアクションを遅らせる--ok--
// 検索の勉強--森重さん
// 音楽入れる
// サインアップ画面
// プレイリスト--津曲さん
// ローディング画面

session_start();
require_once __DIR__ . '/functions.php';

// DB接続
$pdo = connect_to_db();



// ---プレイリストへ追加---
$stmt = $pdo->prepare('SELECT * FROM playlists_table WHERE user_id=?');
$stmt->execute([$_SESSION['user_id']]);
$my_playlist = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($my_playlist);
// exit('ok');
// $push = "";
// foreach ($my_playlist as $list) {
//   $push .= "
//   <li class='playlist_li'>{$list['playlist_name']}</li>
//   <input type='hidden' value='{$list['playlist_id']}'>
//   <input type='hidden' value='{$music['music_id']}'>
//   ";
// }

// ---プレイリストへ追加---end---

// ---おんがぐ一覧表示---

$stmt = $pdo->prepare('SELECT * FROM music_table');
$stmt->execute();
$musicAll = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($musicAll);
// exit();



$output = '';
foreach ($musicAll as $music) {
  $output .= "
  <li class='relative'>
  <div id='absolute' class='absolute' ontouchstart>
    <div class='col-2 title_img'>
      <img src='./album_img/{$music['music_img']}'>
      <div id='like' class='like'>好</div>
    </div>
    <div class='music_title'>{$music['music_name']}</div>
    <audio controls>
      <source src='./music/Here,There_And_Everywhere.mp3'>
    </audio>
    <h3>Trivia</h3>
    <div class='trivia'>{$music['Trivia1']}</div>
    <div class='trivia'>{$music['Trivia2']}</div>
    <div class='trivia'>{$music['Trivia3']}</div>
  </div>
  <ul class='playlist_ul'>
  ";
  foreach ($my_playlist as $list) {
    $output .= "
    <li class='playlist_li' id='fm'>{$list['playlist_name']}</li>
    <input type='hidden' value='{$list['playlist_id']}'>
    <input type='hidden' value='{$music['music_id']}'>
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
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>

<body>
  <!-- ヘッダーをレスポンシブにしたい -->
  <header class="header_text">
    <h3>beatls</h3>
    <a href="logout.php" class="btn">logout</a>
    <a href="user_mypage.php" class="btn">playlist</a>
    <a href="user_mypage.php" class="btn">My Profile</a>
    <div class="searchform">
      <input type="text" id="search" size="25" placeholder="Search">
    </div>

  </header>
  <main>
    <div class="top_container">
      <!-- メイン画面のデザイン -->
      <p id="ooo">oooo</p>
    </div>
    <div class="main_container">

      <!-- <div class="row"> -->
      <ul class="row">

        <!-- <li class="relative">
          <div class="absolute">
            <div class="col-2 title_img">
              <img src="./album_img/AbbeyRoad.jpg">
            </div>
            <div class="music_title">A Hard Day's Night</div>
            <audio controls>
              <source src="./music/EleanorRigby.mp3" type="audio/mp3">
            </audio>
            <h3>Trivia</h3>
            <div class="trivia">初の主演映画『ハード・デイズ・ナイト』の主題歌。</div>
            <div class="trivia">上映館内では絶叫が飛び交い、スクリーンの4人に突進して、スクリーンが破られたというエピソードも</div>
            <div class="trivia">初の主演映画『ハード・デイズ・ナイト』の主題歌。</div>
          </div>
        </li> -->
        <?= $output ?>


      </ul>
    </div>



  </main>
  <footer>
    <div class="footer_container">

      a
    </div>
  </footer>






  <!-- fontawsome -->
  <script src="https://kit.fontawesome.com/b28496ef11.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


  <script>
    function submitFnc() {
      //formオブジェクトを取得する
      var fm = document.getElementById("fm");

      //Submit値を操作したい場合はこんな感じでできます。
      // 例）name="hid1"の値を"hoge"にする
      // fm.hid1.value = "hoge";

      //Submit形式指定する（post/get）
      fm.method = "post"; // 例）POSTに指定する

      //targetを指定する
      // 例）新しいウィンドウに表示
      // fm.target = "_blank"; 

      //action先を指定する
      fm.action = "/php/sample.php"; // 例）"/php/sample.php"に指定する

      //Submit実行
      fm.submit();
    }







    $('#search').on('keyup', function(e) {
      console.log(e.target.value); //inputの内容をリアルタイムに取得する
      const searchWord = e.target.value;
      const requestUrl = './ajax_get.php'; //リクエスト送信先のファイル名

      // phpへリクエストを送って結果を出力する処理
      axios.get(`${requestUrl}?searchword=${searchWord}`) // リクエストを送信する
        .then(function(response) {
          console.log(response);
          console.log(response.data); // responseにPHPから送られたデータが入る

          // ブラウザに表示する処理
          const tagArray = [];
          response.data.forEach(function(x) {
            tagArray.push(`<tr><td>${x.deadline}</td><td>${x.todo}</td><tr>`)
            tagArray.push(
              `<li class="border">
                                <div class="flex"><div class="imgBox"><img src="img/${x.image}"></div>
                                <div class="descriptiionList">
                                    <h2>作品名 : ${x.title}</h2>
                                    <p>素材 :  ${x.material}  制作日 : ${x.production_date}   制作した年齢 : ${x.production_age} 歳</p>
                                    <p>作品の説明 : ${x.description}</p>
                                    <h3>金額 : ${x.value} 円</h3>
                                    
                                </div>
                            </li>`)
          });
          $('#results').html(tagArray);

        });
      // .catch(function (error) { })
      // .finally(function () { });
    });
  </script>
</body>

</html>