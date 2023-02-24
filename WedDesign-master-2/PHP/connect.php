<?php
    function create_connection() { //連接資料庫
        $dbhost = "localhost";
        $dbuser = "Sisia";
        $dbpasswd = "Annie26468230";
        $dbname = "作業";
        $con = mysqli_connect($dbhost, $dbuser, $dbpasswd, $dbname) or die ("Error Connection");
        mysqli_query($con, "SET NAME utf8");
        return $con;
    }

    function execute_sql($con, $sql) { //傳SQL指令
        $result = mysqli_query($con, $sql);
        return $result;
    }

    function checksession(){
        if($_SESSION['user'] == NULL){
            echo "
            <script>
            setTimeout(function(){window.location.href='../HTML/登入.html';},0000);
            window.alert('登入後方能使用本系統');
            </script>";//如果錯誤使用js 1秒後跳轉到登入頁面重試;
        }
    }

    #require_once('connect.php');
?>