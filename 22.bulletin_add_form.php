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
        // 如果用戶已登入，顯示新增佈告的表單
        echo "
        <html>
            <head><title>新增佈告</title></head>
            <body>
                <form method=post action=23.bulletin_add.php>
                    <!-- 標題輸入欄位 -->
                    標    題：<input type=text name=title><br>
                    <!-- 內容輸入區域 -->
                    內    容：<br><textarea name=content rows=20 cols=20></textarea><br>
                    <!-- 佈告類型選項 -->
                    佈告類型：<input type=radio name=type value=1>系上公告 
                            <input type=radio name=type value=2>獲獎資訊
                            <input type=radio name=type value=3>徵才資訊<br>
                    <!-- 發布時間選擇器 -->
                    發布時間：<input type=date name=time><p></p>
                    <!-- 提交和重置按鈕 -->
                    <input type=submit value=新增佈告> <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
