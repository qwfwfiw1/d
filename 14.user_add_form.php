<html>
    <head>
        <title>新增使用者</title>
    </head>
    <body>
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
    }
    else {    
        // 如果用戶已登入，顯示新增使用者的表單
        echo "
            <form action=15.user_add.php method=post>
                帳號：<input type=text name=id><br>
                密碼：<input type=text name=pwd><p></p>
                <input type=submit value=新增> <input type=reset value=清除>
            </form>
        ";
    }
?>
    </body>
</html>
