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

        // 建立刪除資料的 SQL 命令
        // delete from 表格名稱 where 條件
        $sql = "delete from user where id='{$_GET["id"]}'";
        
        // 執行 SQL 命令並檢查是否成功
        if (!mysqli_query($conn, $sql)) {
            // 如果刪除資料失敗，顯示錯誤訊息
            echo "使用者刪除錯誤";
        } else {
            // 如果刪除資料成功，顯示成功訊息
            echo "使用者刪除成功";
        }

        // 在3秒後重定向到用戶頁面
        echo "<meta http-equiv=REFRESH content='3; url=18.user.php'>";
    }
?>
