
<?php
session_start();
require_once("funcs.php"); // funcs.phpを読み込んで関数を使えるようにする
logincheck(); //funcs.phpで定義したユーザのlog in 有無状態確認

//【重要】
/**
 * DB接続のための関数をfuncs.phpに用意
 * require_onceでfuncs.phpを取得
 * 関数を使えるようにする。
 */
$pdo = db_conn();
$favorite = isset($_GET['favorite']) ? $_GET['favorite'] : '';

//２．データ登録SQL作成
if ($favorite === 'True') {
    $stmt = $pdo->prepare('SELECT * FROM gs_kadai4_table WHERE favorite = :favorite;');
    $stmt->bindValue(':favorite', $favorite, PDO::PARAM_STR);
} else {
    $stmt = $pdo->prepare('SELECT * FROM gs_kadai4_table;');
}

$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    $view .= '<table border = "1">';
    $view .= '<tr><th>ID</th><th>登録日</th><th>スピーカー</th><th>お気に入り</th><th>詳細</th><th>削除</th></tr>';
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $favorite_display = ($result['favorite'] === 'True') ? '★' : '';
        $view .= "<tr>";
        $view .= "<td>" . htmlspecialchars($result["id"], ENT_QUOTES, "UTF-8") . "</td>" ;
        $view .= "<td>" . htmlspecialchars($result["indate"], ENT_QUOTES, "UTF-8") . "</td>" ;
        $view .= "<td>" . htmlspecialchars($result["bookname"], ENT_QUOTES, "UTF-8") . "</td>" ;
        $view .= "<td>" . $favorite_display . "</td>";
        if($_SESSION["kanri_flg"]===1){          //login_act.phpで定義した管理者フラグ（管理者のみ削除ボタンを表示）
            // $view .= '<a class="btn btn-danger" href="delete.php?id=' . $r['id'] . '">';
            $view .= "<td>" . '<a href="detail.php?id=' . htmlspecialchars($result['id'], ENT_QUOTES, "UTF-8") . '">[詳細]</a>' . "</td>";
            $view .= "<td>" . '<a href="delete.php?id=' . htmlspecialchars($result['id'], ENT_QUOTES, "UTF-8") . '">[削除]</a>' . "</td>";
            $view .= "<td>" . '<a href="download.php?id=' . htmlspecialchars($result['id'], ENT_QUOTES, "UTF-8") . '">[ダウンロード]</a>' . "</td>";
        }else{
            $view .= "<td></td><td></td>"; //管理者でない場合は空のセルを追加
        }
        $view .= "</tr>" ;
        }
    $view .= "</table>";
}
        // ?は、三項演算子（条件演算子）を意味します。三項演算子は、条件式が真か偽かによって異なる値を返すために使用
    //a タグはリンク。　?id=1という情報をつけて送る（getはURLに情報をつけて送る
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>フリーアンケート表示</title>
    <link rel="stylesheet" href="css/style.css">

    <style>    
    div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar-default">
            
                <div class="navbar-header">
                    <a href="index.php">データ表示</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <a href="detail.php"></a>
            <?= $view ?>
        </div>
    </div>
    <!-- Main[End] -->

</body>

</html>
