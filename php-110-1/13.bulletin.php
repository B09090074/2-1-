<?php
    error_reporting(0); //禁用錯誤報告，也就是不顯示錯誤
    session_start();    //啟動頁面的 session 功能
    if (!$_SESSION["id"]) 
    {
        echo "please login first";       //顯示 "please login first"
        echo "<meta http-equiv=REFRESH content='3, url=login.html'>"; //3秒後跳轉到"login.html"
    }
    else                    //否則
    {
        echo "Welcome, ".$_SESSION["id"].     //顯示Welcome  (參數)"id"
        //登出            在"登出"建立超連結        
        //新增使用者      在"新增使用者"建立超連結
        //管理使用者      在"管理使用者"建立超連結
        "[<a href=logout.php>登出</a>]       
        [<a href=user_add_form.php>新增使用者</a>]
        [<a href=user.php>管理使用者</a>]<br>";
        $conn=mysqli_connect("localhost","root","", "mydb");  //檢查連結
        //用mysqli_query方法執行(sql語法)將結果存在變數中
        $result=mysqli_query($conn, "select * from bulletin");
        //建立表格
        //|佈告編號 |佈告類別   |標題    |佈告內容  |發佈時間|
        //|bid      |type       |title  |content   |time    |  回傳參數
        echo 
        "<table border=2>       
        <tr>
          <td>佈告編號</td>
          <td>佈告類別</td>
          <td>標題</td>
          <td>佈告內容</td>
          <td>發佈時間</td>
        </tr>";
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
        echo "</table>";//表格結束
    
    }

?>
