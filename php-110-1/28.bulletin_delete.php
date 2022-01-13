<?php
    error_reporting(0);  //禁用錯誤報告，也就是不顯示錯誤
    session_start();     //啟動頁面的 session 功能
    if (!$_SESSION["id"]) 
    {
        echo "請登入帳號";         //顯示 "請登入帳號"
        echo "<meta http-equiv=REFRESH content='3, url=login.html'>";//三秒後跳轉到"login.html"
    }
    else                          //否則
    {   #mysqli_connect() 建立資料庫連結
        $conn=mysqli_connect("localhost","root","","mydb");
        $sql="delete from bulletin where bid='{$_GET[bid]}'";  //DELETE FROM 用來刪除資料表中的資料。 
        //用mysqli_query方法執行(sql語法)將結果存在變數中
        if (!mysqli_query($conn,$sql))
        {
            echo "佈告刪除錯誤";    //顯示 "佈告刪除錯誤"
        }
        else                       //否則
        {
            echo "佈告刪除成功";    //顯示 "佈告刪除成功"
        }
        //三秒後跳轉到"bulletin.php"
        echo "<meta http-equiv=REFRESH content='3, url=bulletin.php'>";   
    }
?>