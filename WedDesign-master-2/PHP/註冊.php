<?php
header("Content-Type:text/html; charset=utf-8");
require_once('connect.php');
$con = create_connection(); 
$Fname = $_POST['Fname'];
$Lname = $_POST['Lname'];
$Ssn = $_POST['Ssn'];
$Birthdate = $_POST['Birthdate'];
$Gender = $_POST['Gender'];
$Address = $_POST['Address'];
$Email = $_POST['Email'];
$Phonenumber = $_POST['Phonenumber'];
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$getDate= date("Y-m-d");
  //在html的name上面寫什麼這邊就宣告什麼，後面POST是資料庫欄位
  // 建立SQL語法，使用$query
$query = "INSERT INTO user VALUES ('$Phonenumber', '$Fname','$Lname', '$Ssn', '$Birthdate', '$Address', '$Gender', '$Email')";
$query2 = "INSERT INTO member VALUES ('$Username', '$getDate', '$Ssn', '$Password')";
  //送出SQL語法到資料庫系統
mysqli_query($con, 'SET NAMES utf8'); 
mysqli_query($con, $query);
mysqli_query($con, $query2);
if (!$query2){
  die('Error: ' . mysql_error());//如果sql執行失敗輸出錯誤
} else {
  echo "
      <script>
      setTimeout(function(){window.location.href='../HTML/登入.html';},0000);
      window.alert('註冊成功');
      </script>";
        //成功輸出註冊成功
}
?>