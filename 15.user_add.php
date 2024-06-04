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

    // 建立新增資料的 SQL 命令
    // insert into 表格名稱(欄位1,欄位2) values(欄位1的值,欄位2的值)
    $sql = "insert into user(id, pwd) values('{$_POST['id']}', '{$_POST['pwd']}')";
    
    // 執行 SQL 命令並檢查是否成功
    if (!mysqli_query($conn, $sql)) {
        // 如果新增資料失敗，顯示錯誤訊息
        echo "新增命令錯誤";
    } else {
        // 如果新增資料成功，顯示成功訊息並在3秒後重定向到用戶頁面
        echo "新增使用者成功，三秒鐘後回到網頁";
        echo "<meta http-equiv=REFRESH content='3; url=18.user.php'>";
    }
}
?>
