<?php
session_start();
session_destroy();
echo "
    <script>
    setTimeout(function(){window.location.href='首頁.php';},0000);
    window.alert('登出成功');
    </script>";//如果錯誤使用js 1秒後跳轉到登入頁面重試;
?>