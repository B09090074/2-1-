<?php
    session_start();    //啟動頁面的 session 功能
    unset($_SESSION["counter"]);
    echo "counter重置成功....";    //顯示 "counter重置成功...."
    echo "<meta http-equiv=REFRESH content='2; url=counter.php'>";  //兩秒後跳轉到"counter.php"

?>