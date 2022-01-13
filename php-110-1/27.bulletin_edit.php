<?php

    error_reporting(0); //禁用錯誤報告，也就是不顯示錯誤
    session_start();    //啟動頁面的 session 功能
    if (!$_SESSION["id"]) 
    {
        echo "請登入帳號";                                                        //顯示 "請登入帳號"
        echo "<meta http-equiv=REFRESH content='3, url=login.html'>";            //3秒後跳轉到"login.html"
    }
    else                       //否則
    {   #mysqli_connect() 建立資料庫連結
        $conn=mysqli_connect("localhost","root","","mydb");
        if 
        (
            //用mysqli_query方法執行(sql語法)將結果存在變數中
            //更新公告設置標題
            !mysqli_query($conn, "update bulletin set title='{$_POST['title']}'
                                                            ,content='{$_POST['content']}'
                                                            ,time='{$_POST['time']}'
                                                            ,type={$_POST['type']} 
                                                            where bid='{$_POST['bid']}'")
            )
        {
            echo "修改錯誤";                                                     //顯示 "修改錯誤"
            echo "<meta http-equiv=REFRESH content='3, url=bulletin.php'>";     //3秒後跳轉到"bulletin.php"
        }
        else                    //否則
        {
            echo "修改成功，三秒鐘後回到佈告欄列表";                                //顯示 "修改成功，三秒鐘後回到佈告欄列表"     
            echo "<meta http-equiv=REFRESH content='3, url=bulletin.php'>";        //3秒後跳轉到"bulletin.php"
        }
    }

?>