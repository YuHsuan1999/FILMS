<!DOCTYPE html>
<html>

<head>
    <title>電影詳情</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../CSS/css.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/電影內容.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/推薦.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/評論.css" />
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
                    <a href="推薦.php" class="nav-link">推薦 |</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav navbar-right">
            <li>
                <a href="登出.php" class="nav-link">登出</a>
            </li>
        </ul>
    </nav>

    <?php
    header("Content-Type: text/html; charset=utf8");
    $con = create_connection();
    $movie = $_GET['movie'];
    $sql = "SELECT MovieTitle, Classification, Introduction, Cover
            FROM movies
            WHERE MovieTitle = '$movie'";
    $sql_C = "SELECT C_name
                FROM `character`
                WHERE C_MovieTitle LIKE '%$movie%'";
    $sql_D = "SELECT Dname
            FROM director
            WHERE MovieTitle LIKE '%$movie%'";
    $result = execute_sql($con, $sql);
    $resultC = execute_sql($con, $sql_C);
    $resultD = execute_sql($con, $sql_D);
    $temp;
    ?>

    <div class="container" style="width:160%; height: 300px; padding-left:30px;margin-left:10%;">
        <div class="col-sm-10">
            <div class="bs-calltoaction bs-calltoaction-default">
                <div class="row">
                    <div class="col-md-10 cta-contents">
                        <div class="cta-desc">
                        <strong class="d-inline-block mb-2">
                        <?php
                          if($row = mysqli_fetch_assoc($result)){
                            $moviename = $row['MovieTitle'];
                            $_SESSION['getMovieTitle'] = $moviename;
                            printf("<h2 class=\"cta-title\">%s</h2>", $row['MovieTitle']);
                            $temp = "data:image/jpeg;base64,".$row['Cover'];

                            }
                        ?>
                        </strong>
                        <h6 class="mb-0">
                       <?php
                           if($rowC = mysqli_fetch_assoc($resultC)){
                            printf("<br><br>Casts : ");
                              printf("%s", $rowC['C_name']);
                          }
                           while($rowC = mysqli_fetch_assoc($resultC)){
                                printf(",&emsp;%s", $rowC['C_name']);
                            }
                        ?>
                        <br>
                     <h6 class="mb-0">
                        <?php
                         if($rowD = mysqli_fetch_assoc($resultD)){
                            printf("Director : ");
                             printf("%s", $rowD['Dname']);
                            }
                          while($rowD = mysqli_fetch_assoc($resultD)){
                            
                             printf(",&emsp;%s", $rowD['Dname']);
                           }
                        ?>
                        </div>
                        <h5 class="mb-0">
                        <?php

                            printf("Genre : %s<br><br><br><br>%s",$row['Classification'], $row['Introduction']);
                            $temp = "data:image/jpeg;base64,".$row['Cover'];
            
                        ?>
                    </div>
                    <div class="col-md-3 cta-button">
                        <img src="<?php echo $temp;?>" alt="" style = "weight: 320px; height: 350px;">
                    </div>
                </div>
                <a class="btn btn-outline-dark btn-sm" role="button" href="電影播放.php">Watch Now</a>
                <?php
                    $title = $row['MovieTitle'];
                    $queryWH = "INSERT INTO member_watchhistory VALUES ('$title', '$_SESSION[user]')";
                    $resultWH = execute_sql($con, $queryWH);
                ?>
            </div>
            <br><br>
        <?php
            $sql_comment = "SELECT Grade,Content,M_Account
                            FROM comment
                            WHERE Title = '$title'";
                            
            $result_comment = execute_sql($con, $sql_comment);
        ?>
        <h2><b>所有評論</b></h2><br>
        <div style="border-top:4px solid rgba(78, 78, 78, 0.582); height: 15px;width:130%" class="w3-panel"></div>
        <div style = "margin-left:10px;">
                <div class="row">
                    <div class="col-md-10 cta-contents">
                        <div class="cta-desc">
                        <strong class="d-inline-block mb-2">
                        <?php
                          while($row_comment = mysqli_fetch_assoc($result_comment)){
                              printf("<h4><b>%s</b>&emsp;&emsp;", $row_comment['M_Account']);
                              $grade = $row_comment['Grade']*20;
                                echo "<div class=\"ratings\">
                                    <div class=\"empty_star\" style=\"font-size:30px;\">★★★★★</div>
                                    <div class=\"full_star\" style = \"width: $grade%; font-size:30px;\">★★★★★</div>
                                </div>";
                                printf("</h4></p><p>%s</p><br>" , $row_comment['Content']);
                              echo"<div style=\"border-top:2px solid rgba(78, 78, 78, 0.582); height: 15px;width:155%\" class=\"w3-panel\"></div>";
                            }
                        ?>
                        </strong>
                    </div>
                </div>
            </div>
        </div>
            <!-- 評論 -->
            <div class="bs-calltoaction bs-calltoaction-default" style="width:100%; height:500px;">
                <div class="row">
                    <div class="col-md-6 cta-contents">
                        <div class="cta-desc">
                <form action="./個別評論.php" method="POST">
                <div class="row">
                    <div class="col-md-1" style="font-size: large;">
                        <span style="color: black;">評分</span>
                    </div>
                    <div class="col-md-5 btn-group"><span>
                        <div class="abgne-menu-20140101-1">
                            <input required type="radio" id="one" name="grade" value = "one">
                            <label for="one">1</label>
                            <input type="radio" id="two" name="grade" value = "two">
                            <label for="two">2</label>
                            <input type="radio" id="three" name="grade" value = "three">
                            <label for="three">3</label>
                            <input type="radio" id="four" name="grade" value = "four">
                            <label for="four">4</label>
                            <input type="radio" id="five" name="grade" value = "five">
                            <label for="five">5</label>
                        </div>
                        </span></div>
                </div>
                <div class="row">
                    <div class="col-md-1" style="font-size: large;">
                        <span style="color: black;">內文</span>
                    </div>
                    <div class="col-md-11 form-group" style="padding-right: 75px;">
                        <textarea required name="content" id="" style="height: 275px;" class="form-control content" placeholder="content"></textarea>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-7 form-group">
                        <input type="submit" value="submit" class="btn float-right login_btn b">
                    </div>
                </div>
                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>