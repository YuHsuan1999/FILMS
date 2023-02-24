<!DOCTYPE html>
<html>

<head>
    <title>個人訊息</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../CSS/css.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/個人訊息.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/推薦.css" />
</head>

<body>
    
    <!----------------------上方選單-------------------------->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a href="首頁.html" class="navbar-brand">Projectxx2020</a>
        <button class="navbar-toggler" type="button" data-target="#navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="../HTML/登入.html" class="nav-link">Sign In </a>
                </li>
                
                <li class="nav-item">
                    <a href="個人訊息.php" class="nav-link">我的首頁 |</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="../HTML/搜尋.html" class="nav-link">搜尋 |</a>
                </li>
                <li class="nav-item">
                    <a href="推薦.php" class="nav-link">推薦 |</a>
                </li>
                
            </ul>
        </div>
    </nav>
    <?php
        require_once('connect.php');
        session_start();
        header("Content-Type: text/html; charset=utf8");
        $con = create_connection();
        $sql = "SELECT Fname, Lname, M_Account 
                FROM member, user 
                WHERE '$_SESSION[user]' = M_Account AND Ssn = M_Ssn";
        $result = execute_sql($con, $sql);
        $size = 4;
        $row = mysqli_fetch_assoc($result);
    ?>
<div class="page-wrapper chiller-theme toggled">
  <nav id="sidebar" class="sidebar-wrapper" style="padding-top: 75px;">
    <div class="sidebar-content">
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
            alt="User picture">
        </div>
        <div class="user-info">
            <?php
                echo "<font><b>" . $row["Fname"]. " ". $row["Lname"].
                 "</b></font><br>" . $row["M_Account"]. "<br>";
            ?>
        </div>
      </div>
      <!-- sidebar-header  -->
      <div class="sidebar-menu">
        <ul>
            <li class="header-menu">
                <span>選單</span>
            </li>
            <li>
                <a href="個人訊息.php">
                    <i class="far fa-gem"></i>
                    <span>個人訊息</span>
                </a>
            </li>
            <li>
                <a href="個人_觀看紀錄.php">
                    <i class="fa fa-tachometer-alt"></i>
                    <span>觀看紀錄</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>我的評論</span>
                </a>
            </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <?php
        $sql = "SELECT MovieTitle, Cover
            FROM movies, member_watchhistory
            WHERE M_Account = '$_SESSION[user]'
                AND WatchHistory = MovieTitle";
        $result = execute_sql($con, $sql);
        $temp;
    ?>
  </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content" style="padding-top: 75px;">
        <div class="container-fluid">
        <h2>觀看紀錄</h2>
      <hr style="background-color: rgb(182, 181, 181);">
        <div class="col-sm-9">
            <div class="bs-calltoaction bs-calltoaction-default">
                <div class="row">
                    <div class="col-md-6 cta-contents">
                        <div class="cta-desc">
                        <?php
                        if($row = mysqli_fetch_assoc($result)){
                            printf("<h2 class=\"cta-title\">%s</h2><br>", $row['MovieTitle']);
                            $temp = "data:image/jpeg;base64,".$row['Cover'];
                        }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-3 cta-button">
                    <img src="<?php echo $temp;?>" alt="" style = "weight: 100px; height: 100px;">
                    </div>
                </div>
            </div>
            <!--  第二項搜尋  -->
            <div class="bs-calltoaction bs-calltoaction-primary">
            <div class="row">
                    <div class="col-md-6 cta-contents">
                        <div class="cta-desc">
                        <?php
                        if($row = mysqli_fetch_assoc($result)){
                            printf("<h2 class=\"cta-title\">%s</h2><br>", $row['MovieTitle']);
                            $temp = "data:image/jpeg;base64,".$row['Cover'];
                        }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-3 cta-button">
                    <img src="<?php echo $temp;?>" alt="" style = "weight: 100px; height: 100px;">
                    </div>
                </div>
            </div>
            <!-- 搜尋結果3 -->
            <div class="bs-calltoaction bs-calltoaction-info">
            <div class="row">
                    <div class="col-md-6 cta-contents">
                        <div class="cta-desc">
                        <?php
                        if($row = mysqli_fetch_assoc($result)){
                            printf("<h2 class=\"cta-title\">%s</h2><br>", $row['MovieTitle']);
                            $temp = "data:image/jpeg;base64,".$row['Cover'];
                        }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-3 cta-button">
                        <img src="<?php echo $temp;?>" alt="" style = "weight: 100px; height: 100px;">
                    </div>
                </div>
            </div>
        </div>
        </main>
    </div>
        <!-- page-content" -->
    </div>
    
</body>

</html>