<?php
    error_reporting(0); //禁用錯誤報告，也就是不顯示錯誤
    session_start();    //啟動頁面的 session 功能
    if (!$_SESSION["id"]) 
    {
        echo "please login first";                                     //顯示 "please login first"
        echo "<meta http-equiv=REFRESH content='3, url=login.html'>";  //3秒後跳轉到"login.html"
    }
    else                    //否則
    {
        //mysqli_connect() 函数打开一个到 MySQL 服务器的新的连接
        $conn=mysqli_connect("localhost","root","","mydb");
        # 從公告中選擇 bid
        $result=mysqli_query($conn, "select * from bulletin where bid={$_GET[bid]}");
        $row=mysqli_fetch_array($result);
        $checked1="";            //宣告$checked1=(null)
        $checked2="";            //宣告$checked1=(null)
        $checked3="";            //宣告$checked1=(null)
        if ($row['type']==1)            $checked1="checked";  //如果type==1 checked1回傳"checked"
        if ($row['type']==2)            $checked2="checked";  //如果type==2 checked2回傳"checked"
        if ($row['type']==3)            $checked3="checked";  //如果type==3 checked3回傳"checked"
        /*佈告編號：{$row['bid']}
          標 題：{$row['title']}
          內 容：
          {$row['content']}
          佈告類型：O系上公告 O獲獎資訊 O徵才資訊
          發布時間： 年 / 月 / 日
          修改布告 清除
        */
        echo 
        "
        <html>
            <head><title>新增佈告</title></head>
            <body>
                <form method=post action=bulletin_edit.php>
                    佈告編號：{$row['bid']}<input type=hidden name=bid value={$row['bid']}><br>
                    標    題：<input type=text name=title value={$row['title']}><br>
                    內    容：<br><textarea name=content rows=20 cols=20>{$row['content']}</textarea><br>
                    佈告類型：<input type=radio name=type value=1 {$checked1}>系上公告 
                            <input type=radio name=type value=2 {$checked2}>獲獎資訊
                            <input type=radio name=type value=3 {$checked3}>徵才資訊<br>
                    發布時間：<input type=date name=time value={$row['time']}><p></p>
                    <input type=submit value=修改佈告> <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>