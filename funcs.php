<?php
//XSS対応（ echoする場所で使用！）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

//DB接続関数：db_conn() 
function db_conn()
{
    try {
        $db_name = 'gs_db_class4_kadai';    //データベース名
        $db_id   = 'root';      //アカウント名
        $db_pw   = '';      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = 'localhost'; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
    header('Location: ' . $file_name);
    exit();
}


// ログインチェク処理 loginCheck()
function logincheck(){
if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()){ 
exit("login error");
}
session_regenerate_id(true);
$_SESSION["chk_ssid"] = session_id();


}
/*関数の定義:

function logincheck(){ で logincheck 関数を定義しています。この関数は、ユーザーのログイン状態を確認するために使用されます。
セッション変数の確認:

if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()){ で、セッション変数 $_SESSION["chk_ssid"] が設定されているか、そしてその値が現在のセッションIDと一致しているかを確認しています。
!isset($_SESSION["chk_ssid"]) は、$_SESSION["chk_ssid"] が設定されていない場合に真となります。
$_SESSION["chk_ssid"] != session_id() は、$_SESSION["chk_ssid"] の値が現在のセッションIDと一致しない場合に真となります。
これらの条件のいずれかが真であれば、ユーザーはログインしていないと見なされます。
*/