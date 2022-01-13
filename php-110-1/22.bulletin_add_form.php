<?php
    error_reporting(0); //禁用錯誤報告，也就是不顯示錯誤
    session_start();    //啟動頁面的 session 功能
    if (!$_SESSION["id"]) 
    {
        echo "please login first";                                            //顯示 "please login first"
        echo "<meta http-equiv=REFRESH content='3, url=login.html'>";         //3秒後跳轉到"login.html"
    }
    else                    //否則
    {
        /*標 題：
          內 容：


          佈告類型：O 系上公告 O 獲獎資訊 O 徵才資訊
          發布時間： 年 /月/日
          新增布告  清除      
        */
        echo 
        "
        <html>
            <head><title>新增佈告</title></head>
            <body>
                <form method=post action=bulletin_add.php>
                    標    題：<input type=text name=title><br>
                    內    容：<br><textarea name=content rows=20 cols=20></textarea><br>
                    佈告類型：<input type=radio name=type value=1>系上公告 
                            <input type=radio name=type value=2>獲獎資訊
                            <input type=radio name=type value=3>徵才資訊<br>
                    發布時間：<input type=date name=time><p></p>
                    <input type=submit value=新增佈告> <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>