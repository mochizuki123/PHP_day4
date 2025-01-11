<?php
session_start();


require_once("funcs.php"); // funcs.phpを読み込んで関数を使えるようにする
$pdo = db_conn();

if (!isset($_GET['id'])) {
    exit('Error: ID is not set.');
}

$id = $_GET['id'];

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT wordfile FROM gs_kadai4_table WHERE id = :id;');
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else { 
    $result = $stmt->fetch();
    if ($result && !empty($result['wordfile'])) {
    //データベースから取得したWordファイルの内容をユーザーにダウンロードさせるためのHTTPヘッダーを設定し、ファイルの内容を出力
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Disposition: attachment; filename="wordfile.docx"');
    echo $result['wordfile'];
    } else {
        exit('Error: File not found.');
    }
}   
?>

<!-- 目的: この行は、データベースから取得したファイルの内容を出力します。 
 詳細: $result['wordfile']には、データベースから取得したWordファイルのバイナリデータが格納されています。
 echoを使用して、このデータをHTTPレスポンスのボディに出力
 効果: ブラウザは、レスポンスのボディに含まれるバイナリデータを受け取り、Content-Typeおよび
 Content-Dispositionヘッダーに基づいてファイルとして保存しま-->
