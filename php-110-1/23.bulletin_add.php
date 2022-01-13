<?php
    error_reporting(0); //禁用錯誤報告，也就是不顯示錯誤
    session_start();    //啟動頁面的 session 功能
    if (!$_SESSION["id"]) 
    {
        echo "please login first";                                             //顯示 "please login first"
        echo "<meta http-equiv=REFRESH content='3, url=login.html'>";          //3秒後跳轉到"login.html"
    }
    else                    //否則
    {
        //mysqli_connect() 函数打开一个到 MySQL 服务器的新的连接
        $conn=mysqli_connect("localhost","root","", "mydb");
        #插入公告
        #|title|content|type|time|
        $sql="insert into bulletin(title, content, type, time) 
        values('{$_POST['title']}','{$_POST['content']}', {$_POST['type']},'{$_POST['time']}')";
        if (!mysqli_query($conn, $sql))
        {
            echo "新增命令錯誤";                                  //顯示 "新增命令錯誤"
        }
        else                //否則
        {
            echo "新增佈告成功，三秒鐘後回到網頁";                          //顯示 "新增佈告成功，三秒鐘後回到網頁"
            echo "<meta http-equiv=REFRESH content='3, url=bulletin.php'>";//3秒後跳轉到"bulletin.php"
        }
    }
?>
