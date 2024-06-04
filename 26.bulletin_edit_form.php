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

        // 從資料庫中查詢指定bid的佈告資料
        $result = mysqli_query($conn, "select * from bulletin where bid={$_GET["bid"]}");
        $row = mysqli_fetch_array($result);

        // 初始化佈告類型的選中狀態
        $checked1 = "";
        $checked2 = "";
        $checked3 = "";

        // 根據佈告類型設置選中狀態
        if ($row['type'] == 1)
            $checked1 = "checked";
        if ($row['type'] == 2)
            $checked2 = "checked";
        if ($row['type'] == 3)
            $checked3 = "checked";

        // 顯示修改佈告的表單
        echo "
        <html>
            <head><title>修改佈告</title></head>
            <body>
                <form method=post action=27.bulletin_edit.php>
                    <!-- 顯示佈告編號並使用隱藏字段傳遞 -->
                    佈告編號：{$row['bid']}<input type=hidden name=bid value={$row['bid']}><br>
                    <!-- 標題輸入欄位 -->
                    標    題：<input type=text name=title value='{$row['title']}'><br>
                    <!-- 內容輸入區域 -->
                    內    容：<br><textarea name=content rows=20 cols=20>{$row['content']}</textarea><br>
                    <!-- 佈告類型選項 -->
                    佈告類型：<input type=radio name=type value=1 {$checked1}>系上公告 
                            <input type=radio name=type value=2 {$checked2}>獲獎資訊
                            <input type=radio name=type value=3 {$checked3}>徵才資訊<br>
                    <!-- 發布時間選擇器 -->
                    發布時間：<input type=date name=time value='{$row['time']}'><p></p>
                    <!-- 提交和重置按鈕 -->
                    <input type=submit value=修改佈告> <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
