<?php
    session_start();    //啟動頁面的 session 功能
    unset($_SESSION["id"]);
    echo "登出成功....";  //顯示"登出成功...."
    echo "<meta http-equiv=REFRESH content='3; url=login.html'>";//3秒後跳轉到"login.html"

?>