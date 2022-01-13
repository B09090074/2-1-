<?php
    //mysqli_connect() 函数打开一个到 MySQL 服务器的新的连接
    //conn 為 connection 的簡寫， ()裡第一個參數是 server 名稱，第二個是帳號，第三個是密碼，第四個是 database(null)
    $conn = mysqli_connect("localhost", "root", "", "mydb");
    if (empty($conn))        //如果empty為空值
    {  
        die ("無法連結資料庫");//顯示"無法連結資料庫"
    }
    //用mysqli_query方法執行(sql語法)將結果存在變數中
    $result=mysqli_query($conn, "select * from user");
    #mysqli_fetch_array() 從查詢出來的資料一筆一筆抓出來
    $row=mysqli_fetch_array($result); //將資料處存在row
    echo $row["id"] . " " . $row["pwd"]; 
    echo $row["id"] . " " . $row["pwd"]; 
?>
