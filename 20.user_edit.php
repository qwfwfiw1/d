<?php

    // 關閉錯誤報告
    error_reporting(0);

    // 啟動會話
    session_start();

    // 檢查是否存在會話中的用戶ID
    if (!$_SESSION["id"]) {
        // 如果用戶未登入，顯示提示訊息並在3秒後重定向到登入頁面
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
    } else {   
        // 建立資料庫連結
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 執行更新用戶密碼的 SQL 命令
        $sql = "update user set pwd='{$_POST['pwd']}' where id='{$_POST['id']}'";
        
        // 檢查 SQL 命令是否執行成功
        if (!mysqli_query($conn, $sql)) {
            // 如果修改失敗，顯示錯誤訊息並在3秒後重定向到用戶頁面
            echo "修改錯誤";
            echo "<meta http-equiv=REFRESH content='3; url=18.user.php'>";
        } else {
            // 如果修改成功，顯示成功訊息並在3秒後重定向到用戶頁面
            echo "修改成功，三秒鐘後回到網頁";
            echo "<meta http-equiv=REFRESH content='3; url=18.user.php'>";
        }
    }

?>
