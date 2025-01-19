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
$stmt = $pdo->prepare('SELECT * FROM gs_user_table where lid= :lid AND lpw= :lpw;');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

echo(check1); ここまでは流れていることを確認★

//3. SQL実行時にエラーがある場合STOP
if($status === false){
    sql_error($stmt);
}
echo(check2);

//4. 抽出データ数を取得  1行データを取得
// $val = $stmt->fetch();

$val = $stmt->fetch(PDO::FETCH_ASSOC);
if ($val === false) {
    // データが見つからなかった場合の処理
    echo "IDまたはパスワードが間違っています。";
    exit();
}

 echo(check3);

if(password_verify($lpw, $val['lpw'])){ //* PasswordがHash化の場合はこっちのIFを使うハッシュ化前とハッシュ化後の一致を確認（True/False）
if( $val['id'] != '' && password_verify($lpw, $val["lpw"])){  // !記号は後述の関数を否定。
    //Login成功時 該当レコードがあればSESSIONに値を代入
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["kanri_flg"] = $val["kanri_flg"];// select.phpで管理者フラグを３．データ表示で利用
    
    header('Location: select.php');}
}

// else{
//     //Login失敗時(Logout経由)
//     header('Location: login.php');
// }

// exit();
