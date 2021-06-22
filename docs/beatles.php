<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>鬼のマッチングビートルズ</title>
  <link href="css/beatles.css" rel="stylesheet">

</head>

<body>
  <!-- ヘッダーをレスポンシブにしたい -->
  <header class="header_text">
    <h3>beatls</h3>
    <a href="logout.php" class="btn">logout</a>
    <a href="user_playlist.php" class="btn">playlist</a>
    <a href="user_edit.php" class="btn">My Profile</a>
    <div class="searchform">
      <input type="text" id="search" size="25" placeholder="Search">
    </div>

  </header>
  <main>
    <div class="top_container">
      <!-- メイン画面のデザイン -->
      <p>oooo</p>
    </div>
    <div class="main_container">

      <!-- <div class="row"> -->
      <ul class="row">
        <li class="relative">
          <div class="absolute">
            <div class="col-2 title_img">
              <img src="./album_img/AbbeyRoad.jpg">
            </div>
            <div class="music_title"></div>
            <audio controls>
              <source src="./music/EleanorRigby.mp3" type="audio/mp3">
            </audio>
          </div>
        </li>



        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
        <li class="relative">
          <div class="absolute">
            <div class="col-2">a</div>
          </div>
        </li>
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
    $('#search').on('keyup', function(e) {
      console.log(e.target.value); //inputの内容をリアルタイムに取得する
      const searchWord = e.target.value;
      const requestUrl = 'ajax_get.php'; //リクエスト送信先のファイル名

      // phpへリクエストを送って結果を出力する処理
      axios.get(`${requestUrl}?searchword=${searchWord}`) // リクエストを送信する
        .then(function(response) {
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