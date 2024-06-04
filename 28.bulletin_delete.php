<?php

    // 關閉錯誤報告
    error_reporting(0);

    // 開始會話
    session_start();

    // 檢查用戶是否已登錄，通過檢查會話變量 'id' 是否設置
    if (!$_SESSION["id"]) {
        // 如果用戶未登錄，顯示消息並在3秒後重定向到登錄頁面
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {   
        // 如果用戶已登錄，連接到數據庫
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 構造刪除佈告欄的SQL查詢，根據bid值
        $sql = "delete from bulletin where bid='{$_GET["bid"]}'";

        // 執行查詢並檢查是否成功
        if (!mysqli_query($conn, $sql)) {
            // 如果查詢失敗，顯示錯誤消息
            echo "佈告刪除錯誤";
        } else {
            // 如果查詢成功，顯示成功消息
            echo "佈告刪除成功";
        }
        // 無論成功與否，3秒後重定向到佈告欄頁面
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
    }

?>
