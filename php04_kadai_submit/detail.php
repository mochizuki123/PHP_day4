<?php
session_start();
require_once("funcs.php"); // funcs.phpを読み込んで関数を使えるようにする
logincheck(); //funcs.phpで定義したユーザのlog in 有無状態確認

$pdo = db_conn();

if (!isset($_GET['id'])) {
    exit('Error: ID is not set.');
}

$id = $_GET['id'];

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_kadai4_table WHERE id = :id;');
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else { 
    $result = $stmt->fetch();
}   
?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <!-- <legend>フリーアンケート</legend>
                <label>名前：<input type="text" name="name" value="<?= $result["name"]?>"></label><br>
                <label>Email：<input type="text" name="email" value="<?= $result["email"]?>"></label><br>
                <label>年齢：<input type="text" name="age" value="<?= $result["email"]?>"></label><br>
                <label><textarea name="content" rows="4" cols="40"><?= $result["content"]?></textarea></label><br> -->
                
                <label>スピーカー：<input type="text" name="bookname" value="<?= $result["bookname"]?>"></label><br>
                <label>URL：<input type="text" name="url" value="<?= $result["url"]?>"></label><br>
                <label>コメント<textArea name="comment" rows= "4" cols="40"><?= $result["comment"]?></textarea></label><br>
                <label>お気に入り: <?= htmlspecialchars($result['favorite'], ENT_QUOTES, 'UTF-8') ?></label><br>
                <input type="checkbox" name="favorite" value="True"><br>
                <label>登録日時: <?= htmlspecialchars($result['indate'], ENT_QUOTES, 'UTF-8') ?></label><br>
                <label>Wordファイル: <a href="download.php?id=<?= $result['id'] ?>">ダウンロード</a></label>
                <input type="hidden" name="id" value="<?= $result["id"]?>"></label><br>
                <input type="submit" value="送信">


            </fieldset>
        </div>
    </form>
</body>

</html>
