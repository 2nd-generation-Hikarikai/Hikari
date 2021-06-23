<?php
// ホバーアクションを遅らせる--ok--
// 検索の勉強--森重さん
// 音楽入れる
// サインアップ画面
// プレイリスト--津曲さん
// ローディング画面

session_start();
include("functions.php");
// require_once __DIR__ . './functions.php';
// exit('ok');

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
foreach ($musicAll as $key => $music) {
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
    <audio controls>
      <source src='./music/Here,There_And_Everywhere.mp3'>
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
    <form id='fm'>
    <li class='playlist_li' onclick='submitFnc()'>{$list['playlist_name']}</li>
      <input type='hidden' name='playlist_id' value='{$list['playlist_id']}'>
      <input type='hidden' name='music_id' value='{$music['music_id']}'>
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
<div id="mask"></div>


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


    const array_30 = [];
    for (let i = 0; i < 30; ++i) {
      array_30.push(document.getElementById("like-" + i));
      console.log(array_30);

    }
    let playlist_ul;
    const mask = document.getElementById('mask');
    mask.addEventListener('click',() => {
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

    let fm = document.getElementById("fm");

    function submitFnc() {
      //formオブジェクトを取得する

      //Submit値を操作したい場合はこんな感じでできます。
      // 例）name="hid1"の値を"hoge"にする
      // fm.hid1.value = "hoge";

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