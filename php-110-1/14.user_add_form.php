<html>
    <head><title>新增使用者</title></head>
    <body>
<?php        
    error_reporting(0); //禁用錯誤報告，也就是不顯示錯誤
    session_start();    //啟動頁面的 session 功能
    if (!$_SESSION["id"]) 
    {
        echo "請登入帳號";                                                         //顯示 "請登入帳號"
        echo "<meta http-equiv=REFRESH content='3, url=login.html'>";              //3秒後跳轉到"login.html"
    }
    else                    //否則
    {    
        /*帳號:(可輸入文字方塊)
          密碼:(可輸入文字方塊)
          新增(按鈕)  清除(按鈕)
        */
        echo "
            <form action=user_add.php method=post>
                帳號：<input type=text name=id><br>
                密碼：<input type=text name=pwd><p></p>
                <input type=submit value=新增> <input type=reset value=清除>
            </form>
        ";
    }
?>
    </body>
</html>