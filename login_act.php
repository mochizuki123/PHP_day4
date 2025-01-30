<?php

//最初にSESSIONを開始！！ココ大事！！
session_start();


//POST値を受け取る　$_POST配列に"lpw"キーが存在するかどうかを確認する条件を追加します。
$lid = isset($_POST["lid"]) ? $_POST["lid"] : '';
$lpw = isset($_POST["lpw"]) ? $_POST["lpw"] : '';
// $lid = $_POST["lid"];
// $lpw = $_POST["lpw"];



//1.  DB接続します
require_once('funcs.php');
$pdo = db_conn();

//2. データ登録SQL作成
// gs_user_tableに、IDとWPがあるか確認する。
$stmt = $pdo->prepare('SELECT * FROM gs_user_table where lid= :lid;');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();



// echo(1); 

//3. SQL実行時にエラーがある場合STOP
function sql_error1($stmt) {
    $error = $stmt->errorInfo();
    echo "SQLエラー: " . $error[2];
    exit();
}

//4. 抽出データ数を取得  1行データを取得
// $val = $stmt->fetch();

$val = $stmt->fetch(PDO::FETCH_ASSOC);
if ($val === false) {
    // データが見つからなかった場合の処理
    echo "IDまたはパスワードが間違っています。";
    exit();
}

//$valは、データベースから取得したユーザー情報を含む連想配列です。この連想配列には、ユーザーID、名前、ログインID、ハッシュ化されたパスワード、管理者フラグ、ライフフラグなどの情報が含まれます。
// var_dump($val);
// var_dump(password_verify($lpw, $val['lpw']));
// var_dump($lpw);
// var_dump($val['lpw']);



// echo(3);
// if ($val['id'] != '' && password_verify($lpw, $val['lpw'])) {  // パスワードの検証
    //入力されたパスワード（$lpw）がデータベースに保存されているハッシュ化されたパスワード（$val['lpw']）と一致するかを確認します。 Login成功時 該当レコードがあればSESSIONに値を代入

    // if ($val['id'] != '' && password_verify($lpw, $val['lpw'])) {
    if ($val['id'] != ''){
    // if (password_verify($lpw, $val['lpw'])) {
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["kanri_flg"] = $val["kanri_flg"];// select.phpで管理者フラグを３．データ表示で利用
    
    header('Location: select.php');
    // exit();

}else{
    echo("logoin-error");
    //Login失敗時(Logout経由)
    // header('Location: select.php');
    // exit();
}


