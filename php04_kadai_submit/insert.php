<link rel="stylesheet" href="css/style.css">

<?php

var_dump($_POST);
var_dump($_FILES); // ファイル情報を確認するために追加

//1. POSTデータ取得
$bookname   = isset($_POST['bookname']) ? $_POST['bookname'] : '';
$url        = isset($_POST['url']) ? $_POST['url'] : '';
$comment    = isset($_POST['comment']) ? $_POST['comment'] : '';
$favorite   = isset($_POST['favorite']) ? $_POST['favorite'] : '';

require_once("funcs.php"); // funcs.phpを読み込んで関数を使えるようにする
$pdo = db_conn();

// ファイルアップロード処理
//file_get_contents — ファイルを読み込み、バイナリ文字列に変換する
//$_FILES['wordfile']['tmp_name'] はアップロードされたファイルが一時的に保存されている場所
//ファイルがアップロードされたかどうかは、$_FILES['wordfile']['error'] が UPLOAD_ERR_OK かどうかで確認
$wordfile = '';
if (isset($_FILES['wordfile']) && $_FILES['wordfile']['error'] == UPLOAD_ERR_OK) {
    $wordfile = file_get_contents($_FILES['wordfile']['tmp_name']);
    var_dump($wordfile);// ファイルの中身を表示
}  


//３．データ登録SQL作成　（SQLステートメント）
$stmt = $pdo->prepare(
    'INSERT INTO
        gs_kadai4_table(
            bookname, url, comment, favorite, wordfile, indate
        )
    VALUES (
            :bookname, :url, :comment, :favorite, :wordfile, now()
        );'
);

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR); 
$stmt->bindValue(':wordfile', $wordfile, PDO::PARAM_LOB); 
$stmt->bindValue(':favorite', $favorite, PDO::PARAM_STR); 
$status = $stmt->execute(); //実行


//４．データ登録処理後
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));

    } else {
    //*** function化する！*****************
    header('Location: index.php');
    exit();
}
?>
<!-- wordfile からむのデータ型はLONGBLOBは大きなバイナリデータを格納するためのデータ型であり、Wordファイルのようなバイナリデータを保存するのに適しています。 -->
