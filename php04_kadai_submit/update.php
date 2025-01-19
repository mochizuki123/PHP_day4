<?php

//1. POSTデータ取得
$bookname   = isset($_POST['bookname']) ? $_POST['bookname'] : '';
$url        = isset($_POST['url']) ? $_POST['url'] : '';
$comment    = isset($_POST['comment']) ? $_POST['comment'] : '';
$favorite   = isset($_POST['favorite']) ? $_POST['favorite'] : '';
$id         = isset($_POST['id']) ? $_POST['id'] : '';

//2. DB接続します
//*** function化する！  *****************
require_once("funcs.php"); // funcs.phpを読み込んで関数を使えるようにする
$pdo = db_conn();

//３．データ登録SQL作成na
$stmt = $pdo->prepare(
    'UPDATE gs_kadai4_table SET
    bookname = :bookname,
    url =  :url,
    comment = :comment,
    favorite = :favorite,
    indate = sysdate()
    where id = :id;');

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR); 
$stmt->bindValue(':favorite', $favorite, PDO::PARAM_STR); 
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    header('Location: select.php');
    exit();
}



//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//2. $id = $_POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更
?>