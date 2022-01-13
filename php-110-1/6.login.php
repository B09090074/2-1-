<?php
   //mysqli_connect() 函数打开一个到 MySQL 服务器的新的连接
   $conn=mysqli_connect("localhost","root","","mydb");
   #mysqli_query() 從資料庫查詢資料
   $result=mysqli_query($conn, "select * from user");
   #mysqli_fetch_array() 從查詢出來的資料一筆一筆抓出來
   $login=FALSE;
   //使用mysqli_fetch_array取回資料
   while ($row=mysqli_fetch_array($result)) 
   {
     //如果輸入資料row=post(帳號密碼正確)
     if (($_POST["id"]==$row["id"]) && ($_POST["pwd"]==$row["pwd"])) 
     {
       $login=TRUE; //login狀態設成true
     }
   } 
   if ($login==TRUE)//如果login狀態為true
     echo "welcome!!";//顯示"welcome!!"
  else              //否則
     echo "帳號或密碼錯誤";//顯示"帳號或密碼錯誤"
?>