
<?php
header("Content-Type:text/html; charset=utf-8");
require_once('connect.php');
session_start();
checksession();
$con = create_connection(); 
$get_Content = $_POST['content'];
$movie = $_SESSION['getMovieTitle'];

if($_POST['grade'] == "one"){
    $get_Grade = 1;
}
elseif($_POST['grade'] == "two"){
    $get_Grade = 2;
}
elseif($_POST['grade'] == "three"){
    $get_Grade = 3;
}
elseif($_POST['grade'] == "four"){
    $get_Grade = 4;
}
elseif($_POST['grade'] == "five"){
    $get_Grade = 5;
}
    $query = "INSERT INTO comment VALUES ('$movie', '$get_Grade','$get_Content', '$_SESSION[user]')";
    mysqli_query($con, 'SET NAMES utf8'); 
    mysqli_query($con, $query);
    echo "
    <script>
    setTimeout(function(){window.location.href='../PHP/電影內容.php?movie=$movie';},0010);;
    </script>"; 

?>