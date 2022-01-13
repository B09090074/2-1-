<?php
   //mysqli_connect() 函数打开一个到 MySQL 服务器的新的连接
   $conn=mysqli_connect("localhost","root","","mydb");
   #mysqli_query() 從資料庫查詢資料
   $result=mysqli_query($conn, "select * from user");
   #mysqli_fetch_assoc方法可取得一筆值
   #while迴圈會根據資料數量，決定跑的次數
   while ($row=mysqli_fetch_array($result)) 
   {
     // 每跑一次迴圈就抓一筆值，就將資料顯示出來
     echo $row["id"]." ".$row["pwd"]."<br>";
   } 
?>