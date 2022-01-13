<?php 
    if (($_POST[id] == "john") && ($_POST[pwd]=="john1234")) /*假如參數名稱id內資料為john 和 參數名稱pwd內資料為john1234 */
        echo "Welcome"; /*顯示 Welcome */
    else                /*否則 */
        echo "fail login";/*顯示 fail login */
?>
