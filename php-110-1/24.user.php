<html>
    <head><title>使用者管理</title></head>
    <body>
    <?php
        error_reporting(0); //禁用錯誤報告，也就是不顯示錯誤
        session_start();    //啟動頁面的 session 功能
        if (!$_SESSION["id"]) 
        {
            echo "請登入帳號";                                                //顯示 "請登入帳號"                                        
            echo "<meta http-equiv=REFRESH content='3, url=login.html'>";     //3秒後跳轉到"login.html"
        }
        else                    //否則
        {   
            /*  使用者管理(h1大小)
                [新增使用者][回佈告欄列表]   (超連結文字)
                建立表格
                |  |帳號|	|密碼|
            */
            echo 
            "<h1>使用者管理</h1>
            [<a href=user_add_form.php>新增使用者</a>][<a href=bulletin.php>回佈告欄列表</a>]<br>
                <table border=1>
                    <tr>
                      <td></td>
                      <td>帳號</td>
                      <td>密碼</td>
                    </tr>";
            #mysqli_connect() 建立資料庫連結
            $conn=mysqli_connect("localhost","root","","mydb");
            //用mysqli_query方法執行(sql語法)將結果存在變數中
            $result=mysqli_query($conn, "select * from user");
            while ($row=mysqli_fetch_array($result))
            {
            #  修改|| 刪除 | 回傳參數'id' | 回傳參數'pwd' |
                echo 
                "<tr>
                    <td>
                        <a href=user_edit_form.php?id={$row['id']}>修改</a>
                        ||
                        <a href=user_delete.php?id={$row['id']}>刪除</a>
                    </td>
                        <td>{$row['id']}</td>
                        <td>{$row['pwd']}</td>
                </tr>";
            }
            echo "</table>";  //表格結束
        }
    ?> 
    </body>
</html>