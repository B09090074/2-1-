<?php
    error_reporting(0); //禁用錯誤報告，也就是不顯示錯誤
    session_start();    //啟動頁面的 session 功能
    if (!$_SESSION["id"]) 
    {
        echo "請先登入帳號";  //顯示"請先登入帳號"
        echo "<meta http-equiv=REFRESH content='3, url=login.html'>";//3秒後跳轉到"login.html"
    }
    else
    {
        echo "Welcome, ".$_SESSION["id"]."[<a href=logout.php>logout</a>]<br>";
        //mysqli_connect() 函数打开一个到 MySQL 服务器的新的连接
        $conn=mysqli_connect("localhost","root","", "mydb");
        #mysqli_query() 從資料庫查詢資料
        $result=mysqli_query($conn, "select * from bulletin");
        echo 
        "<table border=2>
         <tr>
             <td>佈告編號</td>
             <td>佈告類別</td>
             <td>標題</td>
             <td>佈告內容</td>
             <td>發佈時間</td>
         </tr>";
        #mysqli_fetch_array() 從查詢出來的資料一筆一筆抓出來
        while ($row=mysqli_fetch_array($result))
        {
            echo "<tr><td>";
            echo $row["bid"];
            echo "</td><td>";
            echo $row["type"];
            echo "</td><td>"; 
            echo $row["title"];
            echo "</td><td>";
            echo $row["content"]; 
            echo "</td><td>";
            echo $row["time"];
            echo "</td></tr>";
        }
        # bid type title content time
        # bid type title content time
        echo "</table>";//表格結束
    
    }

?>
