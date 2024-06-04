<?php
    // 啟動會話
    session_start();
    
    // 清除會話中的用戶ID
    unset($_SESSION["id"]);
    
    // 顯示登出成功的訊息
    echo "登出成功....";
    
    // 設定3秒後自動重定向到登錄頁面
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
?>
