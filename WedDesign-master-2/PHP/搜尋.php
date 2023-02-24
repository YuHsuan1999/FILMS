<!DOCTYPE html>
<html>

<head>
    <title>搜尋</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../CSS/搜尋.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/css.css" />
</head>

<body>
<?php
    require_once('connect.php');
    session_start();
    checksession();
    if($_SESSION['user'] == NULL){
        $sign = "Sign In";
    }
    else{
        $sign = "Welcome $_SESSION[user]";
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a href="../PHP/首頁.php" class="navbar-brand">Projectxx2020</a>
        <button class="navbar-toggler" type="button" data-target="#navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                <?php
                        echo "<a href=\"#\" class=\"nav-link\">$sign</a>";
                    ?>
                </li>
                <li class="nav-item">
                    <a href="../PHP/個人訊息.php" class="nav-link">我的首頁 |</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link">搜尋 |</a>
                </li>
                <li class="nav-item">
                    <a href="../PHP/推薦.php" class="nav-link">推薦 |</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav navbar-right">
            <li>
                <a href="../PHP/登出.php" class="nav-link">登出</a>
            </li>
        </ul>
    </nav>
    <section class="search-sec" style="padding-top: 50px;">
        <div class="container">
            <form action="../PHP/搜尋結果.php" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <select required="required" class="form-control search-slt" id="exampleFormControlSelect1" name="select">
                                    <option value="" disabled selected hidden>Select</option>
                                    <option value="search">Movie Title</option>
                                    <option value="searchclassification">Classification</option>
                                    <option value="searchcharacters">Character</option>
                                    <option value="searchdirectors">Director</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <input required type="text" class="form-control search-slt" placeholder="輸入關鍵字" name = "search">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <button type="submit" class="btn btn-danger wrn-btn">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>