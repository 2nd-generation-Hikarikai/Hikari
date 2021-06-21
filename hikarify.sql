-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 6 月 21 日 06:07
-- サーバのバージョン： 10.4.19-MariaDB
-- PHP のバージョン: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `hikarify`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `music_table`
--

CREATE TABLE `music_table` (
  `music_id` int(11) NOT NULL,
  `artist` varchar(123) NOT NULL DEFAULT 'The Beatles',
  `music_name` varchar(123) NOT NULL,
  `Album_name` varchar(128) NOT NULL,
  `Trivia1` varchar(123) DEFAULT NULL,
  `Trivia2` varchar(123) DEFAULT NULL,
  `Trivia3` varchar(123) DEFAULT NULL,
  `feel1` varchar(123) DEFAULT NULL,
  `feel2` varchar(123) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `music_table`
--

INSERT INTO `music_table` (`music_id`, `artist`, `music_name`, `Album_name`, `Trivia1`, `Trivia2`, `Trivia3`, `feel1`, `feel2`) VALUES
(1, 'The Beatles', 'Back in the U.S.S.R.', 'The Beatles(white Album)', 'ロック史上初めてイントロでジェット機の轟音', '「U.S.S.R.」とは当時のソビエト連邦', '', '元気を出したい', '気合をいれたい'),
(2, 'The Beatles', 'Hey, Jude', 'Past Masters Vol.2', 'ポール・マッカートニーが、ジョン・レノンの息子', 'ジュリアン・レノンを励ますために書いた曲', '', '悲しい', '泣きたい'),
(3, 'The Beatles', 'Please Please Me', 'Please Please Me', '「ポンキッキ」で流れてた曲', '', '', '嬉しい　', '楽しい'),
(4, 'The Beatles', 'We Can Work it Out', 'Past Masters Vol.2', '曲名はWe Can Work it Out(意味：２人ならうまくいく)', '日本語曲名「恋を抱きしめよう」。原曲名と日本語曲名が全く違う曲', '', '楽しい', ''),
(5, 'The Beatles', 'Nowhere Man', 'Rubber Soul', 'ジョン、ポール、ジョージ、3人の重厚なアカペラ・コーラスが聞ける', '孤独な人がテーマ', '', '孤独を感じる', ''),
(6, 'The Beatles', 'Tomorrow Never Knows', 'Revolver', 'ジョンレノン がチベットの「ダライラマが丘の上で説法している感じ」\nの曲をイメージして作曲。お経のような曲。', 'ミスターチルドレンの同名曲はこの曲のタイトルを拝借', '', '現実世界を離れたい…', ''),
(7, 'The Beatles', 'Helter Skelter', 'The Beatles(white Album)', 'ビートルズ史上最もヘヴィな曲。', 'タイトル意味は「はちゃめちゃ」', 'この曲を聴いた男が狂って人を惨殺（20世紀の十大犯罪事件の一つ）', '投げやりな気分。', 'もうどうでもいい。'),
(8, 'The Beatles', 'I am  the Walrus', 'Magical Mystery Tour', 'ビートルズ史上最も革新的でナンセンスな曲', '作者のジョンレノン 自身が「100年経ってもまだ楽しめる」と発言', '', '投げやりな気分。', 'もうどうでもいい。'),
(9, 'The Beatles', 'Strawberry Fields Forever', 'Magical Mystery Tour', 'Strawberry Fieldsはジョンが幼いころ、よく遊んでいた実在の孤児院。', 'この曲は、二曲の異なる作品が繋げられた', '', '虚しい', ''),
(10, 'The Beatles', 'Yesterday', 'Help!', '１０００人以上のアーチストにカバー。ポールの夢の中で生まれた曲。', '当初のタイトル名は「スクランブルド・エッグ」(煎り卵)', '', '切ない', ''),
(11, 'The Beatles', 'Help!', 'Help!', '2作目の主演映画「ヘルプ！4人はアイドル」の主題歌', '過密スケジュールで活動中のジョンレノンの心の叫び', '', '誰かに助けてほしい', ''),
(12, 'The Beatles', 'Let it  Be', 'Let it  Be', 'ポール・マッカートニーの作詞作曲。', '「Let it be（なすがままに、放っておきなさい）」はポールが14歳のときに死別した母メアリーの生前の口癖', '', '辛い', '勇気づけられたい'),
(13, 'The Beatles', 'Eleanor Rigby', 'Revolver', '孤独な女性について歌った、哀感のある曲', 'ポールマッカートニーはこの曲でグラミー賞歌唱賞を受賞', '', '物悲しい気分に浸りたい', ''),
(14, 'The Beatles', 'I’m Only Sleeping', 'Revolver', '「逆回転」のサウンド。たった2分の曲だがオーバーダビングの作業に実に5時間もかけた', '', '', '眠たい', ''),
(15, 'The Beatles', 'Magical Mystery Tour', 'Magical Mystery Tour', '同名映画の主題歌。映画はオオコケ', '', '', '旅に出たい。', '旅先で聞きたい'),
(16, 'The Beatles', 'A Day In The Life', 'Sgt. Pepper’s Lonely Hearts Club Band', '曲を繋げた独創的なアレンジと幻想的な雰囲気のこの曲に、当時の音楽ファンは大きな衝撃を受けた', '', '', '衝撃を味わいたい', ''),
(17, 'The Beatles', 'A Hard Day\'s Night', 'A Hard Day\'s Night', '初の主演映画『ハード・デイズ・ナイト』の主題歌。', '上映館内では絶叫が飛び交い、スクリーンの4人に突進して、スクリーンが破られたというエピソードも', '', '楽しい', ''),
(18, 'The Beatles', 'All You Need Is Love', 'Magical Mystery Tour', 'ジョン レノンがたった30分で作ってしまった曲', '世界初通信衛星による番組で初公開。', '世界24カ国で放送され、約4億の人が視聴', '愛が欲しい', ''),
(19, 'The Beatles', 'In My Life', 'Rubber Soul', 'バロック音楽風の曲で郷愁がテーマ。', 'ジョン・レノンの祖父の名前も同じジョン・レノン', '', '昔を思い返したい', ''),
(20, 'The Beatles', 'Here, There And Everywhere', 'Revolver', '作者のポールマッカートニー本人がビートルズ時代に書いた中で最も好きな曲らしい', '', '', '人恋しい', ''),
(21, 'The Beatles', 'Come Together', 'Abbey Road', 'ファンキーなグルーヴを持つ曲。', 'ジョン・レノン自身が一番好きなビートルズソングのひとつ', '', '刺激が欲しい', ''),
(22, 'The Beatles', 'Here Comes The Sun', 'Abbey Road', 'SpotifyのUKデイリートップ200でコロナ下の2020年5月には19回もランクイン', '', '', 'リラックスしたい', ''),
(23, 'The Beatles', 'If I fell', 'A Hard Day\'s Night', '初期のハモリの最高峰といわれる隠れた名曲', '', '', '人恋しい', ''),
(24, 'The Beatles', 'I will', 'The Beatles(white Album)', '作者のポールが一人二役で高音と低音のパートをハモっている', '', '', 'ほんわかしたい', ''),
(25, 'The Beatles', 'Got To Get You Into My Life', 'Revolver', '初めてマリファナをやった時の高揚感から生まれたもので、マリファナを褒め称える歌らしい', '', '', '気合をいれたい', ''),
(26, 'The Beatles', 'While My Guitar Gently Weeps', 'The Beatles(white Album)', 'ジョージ・ハリソンの三大名曲の一つ。親友のエリッククラプトンがギター参加。', 'ジョージはクラプトンに妻を寝取られたことがある', '', '泣きたい', ''),
(27, 'The Beatles', 'Hey Bulldog', 'Yellow Submarine', '犬の鳴き真似あり。ビートルズが共同作業として作った最後の曲とも言われている', '', '', '腹が立つ', ''),
(28, 'The Beatles', 'The Long And Winding Road', 'Let it  Be', 'ビートルズが崩壊する直前にできた曲。作者のポールがメンバー間の軋轢やグループへの倦怠感を歌にしたと言われる。', '', '', '辛い・勇気づけられたい', ''),
(29, 'The Beatles', 'Birthday', 'The Beatles(white Album)', '誕生日をテーマにした唯一の曲。', '最近ではリンゴ・スターの70歳誕生日コンサートで歌われた', '', '誕生日を祝いたい。', '祝って欲しい'),
(30, 'The Beatles', 'Mother Nature’s Son', 'The Beatles(white Album)', 'ビートルズには珍しい自然や理想郷を歌った弾き語り曲', '', '', '癒されたい', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(123) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `sex` int(11) DEFAULT NULL,
  `love_target` int(11) NOT NULL,
  `birthday` date DEFAULT NULL,
  `my_img` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`user_id`, `user_name`, `email`, `password`, `sex`, `love_target`, `birthday`, `my_img`) VALUES
(1, 'mika', 'masa455.wv@gmail.com', '$2y$10$VfgP5Y0fBR0h7al/by/2vucFXx3v3PWVhRDLzY1Rj9H.UoZONCxxe', 1, 1, '1920-01-01', NULL),
(2, 'mika', 'masa455.wv@gmail.com', '$2y$10$WY09L4Lbs6LfrWxeK5C3ae0QS.XsCRd8KqxIWbaq7x3MymycgSOiK', 1, 1, '1920-01-01', NULL),
(3, 'ma-', 'hoge@hoge.com', '$2y$10$aXXAAz0wwQ00WdlqykvAK./mH3xPHAFbqS0JdcRAa6.zXkm3YuUwW', 2, 2, '1920-01-01', NULL),
(5, 'kirua', 'kirua@kirua.com', '$2y$10$XcVpyzsTKZCYWmqOei9uJOZL3v0MbXXoVzaaPhHnWM1fE14eIyP.O', 0, 0, '1920-03-03', NULL),
(6, 'ma', 'mav@m.aom', '$2y$10$QAtkkElaDod5XcDb2VME8.wISBMP4AlLhv9rL72B6PaYB/ZFHuBI6', 2, 2, '1920-01-01', NULL),
(7, 'mika', 'mav@g.aom', '$2y$10$ZaUfrYdtoqmxYD5/e84X3.az6vUOctkNhTrYdjerq7RhQQkHq8tP6', 0, 2, '1920-01-01', NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `music_table`
--
ALTER TABLE `music_table`
  ADD PRIMARY KEY (`music_id`);

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`user_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `music_table`
--
ALTER TABLE `music_table`
  MODIFY `music_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
