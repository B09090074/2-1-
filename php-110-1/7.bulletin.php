<?php
    #error_reporting(E_ERROR | E_WARNING | E_PARSE);     //報告所有錯誤
    //禁用錯誤報告，也就是不顯示錯誤
    error_reporting(0);
    //mysqli_connect() 函数打开一个到 MySQL 服务器的新的连接
    $conn=mysqli_connect("localhost","root","", "mydb");
    #mysqli_query() 從資料庫查詢資料
    $result=mysqli_query($conn, "select * from bulletin");
    //建立表格
    //|佈告編號 |佈告類別   |標題    |佈告內容  |發佈時間|
    echo "<table border=2>   
    <tr>
        <td>佈告編號</td>
        <td>佈告類別</td>
        <td>標題</td>
        <td>佈告內容</td>
        <td>發佈時間</td>
    </tr>";
    #建立表格
    # 佈告編號 佈告類別 標題 佈告內容 發佈時間
    
    while ($row=mysqli_fetch_array($result))   //mysqli_fetch_array() 從查詢出來的資料一筆一筆抓出來
    {
    //|bid      |type       |title  |content   |time    |  回傳參數
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
    echo "</table>"//表格結束
?>
