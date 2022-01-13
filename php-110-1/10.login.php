<?php
   //mysqli_connect() 函数打开一个到 MySQL 服务器的新的连接
   $conn=mysqli_connect("localhost","root","","mydb");
   #mysqli_query() 從資料庫查詢資料
   $result=mysqli_query($conn, "select * from user");
   #mysqli_fetch_array() 從查詢出來的資料一筆一筆抓出來
   $login=FALSE;
   #mysqli_fetch_array() 從查詢出來的資料一筆一筆抓出來
   while ($row=mysqli_fetch_array($result)) 
   {
     if (($_POST["id"]==$row["id"]) && ($_POST["pwd"]==$row["pwd"])) //如果輸入資料row=post(帳號密碼正確)
     {
       $login=TRUE;  //login狀態設成true
     }
   } 
   if ($login==TRUE)   //假如login狀態為true
   {
    session_start();    //啟動頁面的 session 功能
    $_POST["pwd"]==$row["pwd"]
    $_SESSION["id"]=$_POST["id"];
    echo "welcome!!";  //顯示 Welcome 
    echo "<meta http-equiv=REFRESH content='3, url=bulletin.php'>";   //三秒後跳轉到"bulletin.php"
   }

  else  //否則
  {
    echo "帳號或密碼錯誤"; //顯示"帳號或密碼錯誤"
    echo "<meta http-equiv=REFRESH content='3, url=login.html'>";  //三秒後跳轉到"login.html"
  }
?>