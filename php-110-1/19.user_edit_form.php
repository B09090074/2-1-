<html>
    <head><title>修改使用者</title></head>
    <body>
    <?php
    error_reporting(0); //禁用錯誤報告，也就是不顯示錯誤
    session_start();    //啟動頁面的 session 功能
    if (!$_SESSION["id"]) 
    {
        echo "請登入帳號";                                                        //顯示 "請登入帳號"
        echo "<meta http-equiv=REFRESH content='3, url=login.html'>";             //3秒後跳轉到"login.html"
    }
    else                    //否則
    {   
        //mysqli_connect() 函数打开一个到 MySQL 服务器的新的连接
        $conn=mysqli_connect("localhost", "root","","mydb");
        //用mysqli_query方法執行(sql語法)將結果存在變數中
        $result=mysqli_query($conn, "select * from user where id='{$_GET['id']}'");
        $row=mysqli_fetch_array($result);
        //帳號：{$row['id']}
        //密碼：(可輸入)    處存至pwd
        //修改  (按鈕)
        echo "
        <form method=post action=user_edit.php>
            <input type=hidden name=id value={$row['id']}>
            帳號：{$row['id']}<br> 
            密碼：<input type=text name=pwd value={$row['pwd']}><p></p>
            <input type=submit value=修改>
        </form>
        ";
    }
    ?>
    </body>
</html>