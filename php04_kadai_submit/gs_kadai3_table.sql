-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2025-01-01 14:55:51
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db_class3_kadai`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_kadai3_table`
--

CREATE TABLE `gs_kadai3_table` (
  `id` int(12) NOT NULL,
  `indate` datetime NOT NULL,
  `bookname` varchar(64) NOT NULL,
  `url` text NOT NULL,
  `comment` text NOT NULL,
  `favorite` varchar(12) NOT NULL,
  `wordfile` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_kadai3_table`
--

INSERT INTO `gs_kadai3_table` (`id`, `indate`, `bookname`, `url`, `comment`, `favorite`, `wordfile`) VALUES
(44, '2025-01-01 10:35:06', 'スティーブジョブス', 'https://englishhub.jp/news/commencement-speech.html#chapter01', 'Appleの共同創業者の一人であるスティーブ・ジョブズは、2005年のスタンフォード大学の卒業式で、自身の人生において重要な意味を持つ3つのエピソードを紹介しました。大学中退、自らが立ち上げたAppleからの解雇、癌との闘病という数々の困難を乗り越えてきたジョブズのストーリーは、卒業式に参加していた学生たちのみならず、あらゆる聴衆の心を打ちます。\r\n\r\nジョブズはスピーチの締めくくりに、1960年代後半～70年代にかけて刊行されていた雑誌“Whole Earth Catalog”の最終号から、“Stay hungry. Stay foolish.”というフレーズを引用しました。聞く人によってさまざまな解釈の仕方ができるこの言葉は、自分が信じる道を歩み続けようとする人の背中を力強く押してくれるメッセージとして、今でも多くの人々の記憶に残っています。', '', ''),
(46, '2025-01-01 10:25:17', 'ビル・ゲーツ', 'https://englishhub.jp/news/commencement-speech.html#chapter05', '起業家であり、ポール・アレンとともにMicrosoftを創業したビル・ゲイツは、2016年にハーバード大学の卒業式でスピーチを行いました。ゲイツは自らの学生生活を振り返り、経済や政治については多くを学んだ一方、世界中に広がる格差の問題には十分に目を向けられていなかったと語ります。そのことに気が付くまで長い時間を要したというゲイツは、これまでに慈善基金団体である「ビル＆メリンダ・ゲイツ財団」の活動を通じ、世界にはびこる飢餓や貧困の解消に向けて多額の支援を行ってきました。\r\n\r\nスピーチの中でも特に印象的なのは、亡き母がゲイツと妻のメリンダに贈った、“From those to whom much is given, much is expected.”という言葉です。このメッセージを引用した背景には、世界トップレベルの名門校であり、優れた知性と才能を持つ学生が集まるハーバード大学だからこそ、その力を他者や社会のために活かしてほしいという力強い激励と期待の気持ちが込められているのはないでしょうか。', '', ''),
(47, '2025-01-01 10:36:25', 'シェリル・サンドバーグ', 'https://englishhub.jp/news/commencement-speech.html#chapter04', 'Facebook（現：Meta Platforms）のCOO（最高執行責任者）として活躍し、著書の『LEAN IN（リーン・イン）』が世界中で話題となったシェリル・サンドバーグ。2015年に夫を亡くしたサンドバーグは、翌年招かれたカリフォルニア大学バークレー校の卒業式で、当時の耐え難い悲しみや、今も続く喪失感について赤裸々に語りました。しかし皮肉にも、この悲痛な経験によって、友人の優しさや家族の愛、子どもたちの笑い声に対して深い感謝の気持ちを持つことができたと言います。\r\n\r\n辛い時こそ周りの人たちと助け合い、困難を跳ね返す力を持ってほしい、と前向きなメッセージで締めくくられたサンドバーグのスピーチは、悲しみや辛い経験を抱えながらも前に進む多くの人たちを勇気づけたことでしょう。', '', ''),
(48, '2025-01-01 10:43:08', 'J.K. ローリング', 'https://englishhub.jp/news/commencement-speech.html#chapter02', '『ハリー・ポッター』シリーズの著者として知られるJ.K. ローリングは、2008年のハーバード大学の卒業式で、失敗から得られる恩恵と想像力の大切さについて話しました。大学を卒業後、結婚生活が短期間で破綻し、仕事がない状態で一人親として子どもを育てるなど、貧困に苦しんでいたローリングは、この経験をきっかけに自らを取り繕うことをやめ、自分がすべきことに全力を注ぐようになったと言います。\r\n\r\nスピーチの中で、世界を変えるために必要なのは「魔法」ではなく、誰もが持つ「よりよい世界を想像する力」だと語ったローリング。苦境に立たされながらも、自らが執筆した本で世界中に大きな影響を与えた彼女のエピソードは、多くの人々の心に響きました。', 'True', '');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_kadai3_table`
--
ALTER TABLE `gs_kadai3_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_kadai3_table`
--
ALTER TABLE `gs_kadai3_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
