<?php
    // 關閉錯誤報告
    error_reporting(0);

    // 啟動會話
    session_start();

    // 檢查是否存在會話中的用戶ID
    if (!$_SESSION["id"]) {
        // 如果用戶未登入，顯示提示訊息並在3秒後重定向到登入頁面
        echo "please login first";
        echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
    } else {
        // 建立資料庫連結
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 建立新增佈告的 SQL 命令
        $sql = "insert into bulletin(title, content, type, time) 
                values('{$_POST['title']}', '{$_POST['content']}', {$_POST['type']}, '{$_POST['time']}')";

        // 執行 SQL 命令並檢查是否成功
        if (!mysqli_query($conn, $sql)) {
            // 如果新增資料失敗，顯示錯誤訊息
            echo "新增命令錯誤";
        } else {
            // 如果新增資料成功，顯示成功訊息並在3秒後重定向到佈告欄頁面
            echo "新增佈告成功，三秒鐘後回到網頁";
            echo "<meta http-equiv=REFRESH content='3; url=11.bulletin.php'>";
        }
    }
?>
