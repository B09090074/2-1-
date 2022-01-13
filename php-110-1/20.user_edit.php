<?php

    error_reporting(0); //禁用錯誤報告，也就是不顯示錯誤
    session_start();    //啟動頁面的 session 功能
    if (!$_SESSION["id"]) 
    {
        echo "請登入帳號";                                               //顯示 "請登入帳號"
        echo "<meta http-equiv=REFRESH content='3, url=login.html'>";    //3秒後跳轉到"login.html"
    }
    else                    //否則
    {   
        //mysqli_connect() 函数打开一个到 MySQL 服务器的新的连接
        $conn=mysqli_connect("localhost","root","","mydb");
        if (!mysqli_query($conn, "update user set pwd='{$_POST['pwd']}' where id='{$_POST['id']}'"))
        {
            echo "修改錯誤";                                          //顯示 "修改錯誤"
            echo "<meta http-equiv=REFRESH content='3, url=user.php'>";//3秒後跳轉到"user.php"
        }
        else                //否則
        {
            echo "修改成功，三秒鐘後回到網頁";                          //顯示 "修改成功，三秒鐘後回到網頁"
            echo "<meta http-equiv=REFRESH content='3, url=user.php'>";//3秒後跳轉到"user.php"
        }
    }

?>