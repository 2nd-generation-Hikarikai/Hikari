<?php
require_once __DIR__ . '/docs/functions.php';
// --スプレッドシート読み込み--
$data = "https://spreadsheets.google.com/feeds/list/1NpD2fCnZ_8muKS1JGtj98SZ85QXFqC4dWlsgvfI3SGU/od6/public/values?alt=json";
$json = file_get_contents($data);
$json_decode = json_decode($json);

$names = $json_decode->feed->entry;
// var_dump($names);
// DB接続
$pdo = connect_to_db();

// "DELETE FROM music_table";
// exit("ok");

// スプレッドシートの全てを変数に格納
foreach ($names as $name) {
  $music_id = $name->{'gsx$id'}->{'$t'};
  $music_name = $name->{'gsx$曲名'}->{'$t'};
  $Album_name = $name->{'gsx$アルバム名'}->{'$t'};
  $Trivia1 = $name->{'gsx$豆知識1'}->{'$t'};
  $Trivia2 = $name->{'gsx$豆知識2'}->{'$t'};
  $Trivia3 = $name->{'gsx$豆知識3'}->{'$t'};
  $feel1 = $name->{'gsx$どんな感情1'}->{'$t'};
  $feel2 = $name->{'gsx$どんな感情2'}->{'$t'};
  $music_img = $name->{'gsx$musicimg'}->{'$t'};


  $sql = "SELECT * FROM music_table WHERE music_name = :music_name";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':music_name', $music_name);
  $stmt->execute();
  $member = $stmt->fetch();

  if ($member['music_name'] === $music_name) {
    // $msg = '同じ曲名が存在します。';
   // echo $msg;
    continue;
  } else {
    //登録されていなければinsert 
    $sql = 'INSERT INTO music_table (music_id, music_name, Album_name, Trivia1, Trivia2, Trivia3, feel1, feel2, music_img) VALUES(NULL, :music_name, :Album_name, :Trivia1, :Trivia2 ,:Trivia3, :feel1, :feel2, :music_img)';
   
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':music_name', $music_name, PDO::PARAM_STR);
    $stmt->bindValue(':Album_name', $Album_name, PDO::PARAM_STR);
    $stmt->bindValue(':Trivia1', $Trivia1, PDO::PARAM_STR);
    $stmt->bindValue(':Trivia2', $Trivia2, PDO::PARAM_STR);
    $stmt->bindValue(':Trivia3', $Trivia3, PDO::PARAM_STR);
    $stmt->bindValue(':feel1', $feel1, PDO::PARAM_STR);
    $stmt->bindValue(':feel2', $feel2, PDO::PARAM_STR);
    $stmt->bindValue(':music_img', $music_img, PDO::PARAM_STR);
    $status = $stmt->execute();
   
    if ($status == false) {
      $error = $stmt->errorInfo();
      echo json_encode(["error_msg" => "{$error[2]}"]);
      exit('eee');
    }
  }
}



echo '全ての曲がデータベースに保存されました';