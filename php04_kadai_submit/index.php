<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>インスパイヤされるスピーチ集</title>
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/style.css">
    
    
</head>

<body>

    <!-- Head[Start] -->
    
    <header>
        <nav class="navbar-default">
            <div class="navbar-header">
                <a  href="login.php" class="button">ログイン</a>
                <a  href="logout.php"class="button">ログアウト</a>
                <a  href="select.php">インスパイヤされるスピーチ集</a>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="insert.php">
        <div class="form">
                <legend>ブックマーク</legend>
            <!-- <label> タグに for 属性を追加し、対応する入力フィールドの id 属性と一致させることで、
                ラベルと入力フィールドの関連付けを明確。label とinput はインライン属性なので、分けて
                記載しないと意図しない改行がされる -->

                <ul  class="form-list">
                <li><label for ="bookname">スピーカー：</label>
                <input type="text" name="bookname"></li><br>

                <li><label for ="url">URL：</label>
                <input type="text" name="url"></li><br>
                
                <li><label for="comment">概要</label></li>
                <textArea name="comment" rows= "3" cols="40"></textArea>
                <br>
                <li><label for="favorite">お気に入り</label>
                <input type="checkbox" name="favorite" value="True"> 
                </li>
                <br>
                
                </ul>
            
            <div class="form-submit">
                <input type="submit" value="この内容で登録">
            </div><br>

        
            <ul><li><strong>自分の感想をアップロード</strong> 
                <input type="file" name="upfile"></li>
            </ul>

            </fieldset>
        </div>
    </form>
    
    <!-- お気に入り検索フォーム -->
    <form method="get" action="select.php">
        <div class="jumbotron">
            <fieldset>
                <legend>お気に入り検索</legend>
                <input type="hidden" name="favorite" value="True">
                <input type="submit" value="検索">
            </fieldset>
        </div>
    </form>
    


</body>

</html>
