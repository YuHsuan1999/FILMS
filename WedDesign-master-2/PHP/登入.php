<?php
require_once('connect.php');
header("Content-Type: text/html; charset=utf8");
$con = create_connection(); 
$name = $_POST['username'];
$passowrd = $_POST['password'];
if ($name && $passowrd){    //如果使用者名稱和密碼都不為空
    $sql = "SELECT * FROM member WHERE M_Account = '$name' AND Password='$passowrd'";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($result);
    if($rows){
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        session_start();
        $_SESSION['user'] = $name;
        echo "
        <script>
        setTimeout(function(){window.location.href='首頁.php';},0000);
        </script>";
    } else {
        echo "
        <script>
        setTimeout(function(){window.location.href='../HTML/登入.html';},0000);
        window.alert('使用者名稱或密碼錯誤');
        </script>";//如果錯誤使用js 1秒後跳轉到登入頁面重試;
    }
}
mysqli_close($con);//關閉資料庫
?>