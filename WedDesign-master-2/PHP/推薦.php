<!DOCTYPE html>
<html>

<head>
    <title>推薦</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../CSS/css.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/推薦.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/搜尋.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/星星.css" />
</head>

<body>
<?php
    require_once('connect.php');
    session_start();
    checksession();
    ?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a href="首頁.php" class="navbar-brand">Projectxx2020</a>
        <button class="navbar-toggler" type="button" data-target="#navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                <?php
                        echo "<a href=\"#\" class=\"nav-link\">Welcome $_SESSION[user]</a>";
                    ?>
                </li>
                <li class="nav-item">
                    <a href="個人訊息.php" class="nav-link">我的首頁 |</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="搜尋.php" class="nav-link">搜尋 |</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">推薦 |</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav navbar-right">
            <li>
                <a href="登出.php" class="nav-link">登出</a>
            </li>
        </ul>
    </nav>
    <!------- 搜尋結果 ----------->
    
    <?php
    header("Content-Type: text/html; charset=utf8");
    $con = create_connection();

    $sql = "SELECT MovieTitle, Classification, Introduction, Cover
            FROM movies
            WHERE Classification IN (SELECT Classification
                                    FROM member_watchhistory,movies
                                    WHERE  WatchHistory = MovieTitle) ORDER BY Classification DESC ";   
            $result = execute_sql($con, $sql);
    ?>
    
    <br><br><br><br><br>
    <h2 style="padding-left: 200px; font-family:Microsoft JhengHei;"><b>為您推薦</b></h2>
    <hr style="width:75%; border-bottom: 1px solid grey;">
    <div class="container">
        <div class="col-sm-9">
            <?php
            $count = 0;
            while($row = mysqli_fetch_assoc($result)){
                $sql_grade = "SELECT AVG(Grade)
            FROM comment
            WHERE Title = '$row[MovieTitle]'";
            $result_grade = execute_sql($con, $sql_grade);
            $row_grade = mysqli_fetch_assoc($result_grade);
                if($count % 2 != 0){
                    echo
                    "<div class=\"bs-calltoaction bs-calltoaction-primary\">
                        <div class=\"row\">
                            <div class=\"col-md-6 cta-contents\">
                                <div class=\"cta-desc\">";
                                    $moviename = $row['MovieTitle'];
                                    printf("<a href=\"電影內容.php?movie=$moviename\" style=\"color:black;\"><h2 class=\"cta-title\">%s</h2></a><br>", $row['MovieTitle']);
                                    $grade = $row_grade['AVG(Grade)']*20;
                                echo "<div class=\"ratings\">
                                    <div class=\"empty_star\" style=\"font-size:30px;\">★★★★★</div>
                                    <div class=\"full_star\" style = \"width: $grade%; font-size:30px;\">★★★★★</div>
                                </div>";
                                    printf("<p>%s<br><br>%s</p>",$row['Classification'], $row['Introduction']);
                                    $temp = "data:image/jpeg;base64,".$row['Cover'];
                                
                                echo
                                "</div>
                            </div>
                            <div class=\"col-md-3 cta-button\">
                                <img src=\""; echo $temp; echo "\" alt=\"\" style = \"weight: 250px; height: 250px;\">
                            </div>
                        </div>
                    </div>";
                }
                else{
                    echo
                    "<div class=\"bs-calltoaction bs-calltoaction-default\">
                        <div class=\"row\">
                            <div class=\"col-md-6 cta-contents\">
                                <div class=\"cta-desc\">";
                                    $moviename = $row['MovieTitle'];
                                    printf("<a href=\"電影內容.php?movie=$moviename\" style=\"color:black;\"><h2 class=\"cta-title\">%s</h2></a><br>", $row['MovieTitle']);
                                    $grade = $row_grade['AVG(Grade)']*20;
                                echo "<div class=\"ratings\">
                                    <div class=\"empty_star\" style=\"font-size:30px;\">★★★★★</div>
                                    <div class=\"full_star\" style = \"width: $grade%; font-size:30px;\">★★★★★</div>
                                </div>";
                                    printf("<p>%s<br><br>%s</p>",$row['Classification'], $row['Introduction']);
                                    $temp = "data:image/jpeg;base64,".$row['Cover'];
                                
                                echo
                                "</div>
                            </div>
                            <div class=\"col-md-3 cta-button\">
                                <img src=\""; echo $temp; echo "\" alt=\"\" style = \"weight: 250px; height: 250px;\">
                            </div>
                        </div>
                    </div>";
                }
                $count ++;
            }
            ?>
        </div>
    </div>
    
</body>

</html>