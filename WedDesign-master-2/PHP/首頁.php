<!DOCTYPE html>
<html>

<head>
    <title>首頁</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../CSS/css.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
    <?php
    require_once('connect.php');
    session_start();
    if($_SESSION['user'] == NULL){
        $sign = "Sign In";
    }
    else{
        $sign = "Welcome $_SESSION[user]";
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a href="#" class="navbar-brand">Projectxx2020</a>
        <button class="navbar-toggler" type="button" data-target="#navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="../HTML/登入.html" class="nav-link"><?php echo $sign;?></a>
                </li>
                <li class="nav-item">
                    <a href="../PHP/個人訊息.php" class="nav-link">我的首頁 |</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="搜尋.php" class="nav-link">搜尋 |</a>
                </li>
                <li class="nav-item">
                    <a href="../PHP/推薦.php" class="nav-link">推薦 |</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="w3-display-container" style="margin-top:45px; padding-top:20px; font-family:Microsoft JhengHei;">
        <img src="../Picture/Dune.jpg" style="width:95%; height:500px; margin-left: 30px;">
        <div class="w3-display-bottomright w3-container w3-amber w3-hover-orange w3-hide-small" style="bottom:10%;opacity:0.7;width:70%">
            <h2><b>4 Good Reasons<br>For travelling with us</b></h2>
        </div>
    </div>

    <div class="w3-row w3-container" style="margin:90px 20px ;font-family:Microsoft JhengHei;">
        <div class="w3-third w3-container">
            <div style="border-right:10px solid rgba(78, 78, 78, 0.582)" class="w3-panel">
                <img src="../Picture/狗狗史酷比!.jpg" style="width:80%">
                <h2>狗狗史酷比!</h2>
                <p>Scooby and the gang face their most challenging mystery ever: a plot to unleash the ghost dog Cerberus upon the world. As they race to stop this dogpocalypse, the gang discovers that Scooby has an epic destiny greater than anyone imagined.</p>
            </div>
        </div>
        <div class="w3-third w3-container">
            <div style="border-right:10px solid rgba(78, 78, 78, 0.582)" class="w3-panel">

                <img src="../Picture/復仇者聯盟：無限之戰.jpg" style="width:80%">
                <h2>復仇者聯盟 : 無限之戰</h2>
                <p>The Avengers and their allies must be willing to sacrifice all in an attempt to defeat the powerful Thanos before his blitz of devastation and ruin puts an end to the universe.</p>

            </div>
        </div>
        <div class="w3-third w3-container">
            <div style="border-right:10px solid rgba(78, 78, 78, 0.582)" class="w3-panel ">

                <img src="../Picture/駭客任務.jpg" style="width:80%">
                <h2>駭客任務</h2>
                <p>Full vacation control from your cell phone.</p>

            </div>
        </div>
    </div>

    <div class="w3-row w3-container" style="margin-left:50px; font-family:Microsoft JhengHei;">
        <div class="w3-half w3-container">
            <div style="border-right:10px solid rgba(78, 78, 78, 0.582)" class="w3-panel">
                <img src="../Picture/1917.jpg" style="width:80%">
                <h2>1917</h2>
                <p>A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.</p>
            </div>
        </div>

        <div class="w3-half w3-container">
            <div style="border-right:10px solid rgba(78, 78, 78, 0.582)" class="w3-panel">
                <img src="../Picture/深海終劫站.jpg" style="width:80%">
                <h2>深海終劫站</h2>
                <p>A crew of oceanic researchers working for a deep sea drilling company try to get to safety after a mysterious earthquake devastates their deepwater research and drilling facility located at the bottom of the Mariana Trench.</p>
            </div>
        </div>
    </div>

    <div class="w3-row w3-container" style="margin:90px 20px; font-family:Microsoft JhengHei;">
        <div class="w3-third w3-container">
            <div style="border-right:10px solid rgba(78, 78, 78, 0.582)" class="w3-panel">
                <img src="../Picture/猛禽小隊：小丑女大解放.jpg" style="width:80%">
                <h2>猛禽小隊 : 小丑女大解放</h2>
                <p>After splitting with the Joker, Harley Quinn joins superheroes Black Canary, Huntress and Renee Montoya to save a young girl from an evil crime lord.</p>
            </div>
        </div>
        <div class="w3-third w3-container">
            <div style="border-right:10px solid rgba(78, 78, 78, 0.582)" class="w3-panel">

                <img src="../Picture/決殺令.jpg" style="width:80%">
                <h2>決殺令</h2>
                <p>With the help of a German bounty hunter, a freed slave sets out to rescue his wife from a brutal Mississippi plantation owner.</p>

            </div>
        </div>
        <div class="w3-third w3-container">
            <div style="border-right:10px solid rgba(78, 78, 78, 0.582)" class="w3-panel">

                <img src="../Picture/黑魔女2.jpg" style="width:80%">
                <h2>黑魔女2</h2>
                <p>Maleficent and her goddaughter Aurora begin to question the complex family ties that bind them as they are pulled in different directions by impending nuptials, unexpected allies and dark new forces at play.</p>

            </div>
        </div>
    </div>
    <div class="w3-display-container" style="margin-top:45px; padding-top:20px; padding-left:30px; font-family:Microsoft JhengHei;">
        <div class="w3-display-bottom w3-container w3-amber w3-orange w3-hide-small" style="bottom:10%;opacity:0.7;width:98%">
            <div class="w3-half w3-container">
                <div style="border-right:5px solid rgba(78, 78, 78, 0.582); height: 135px; padding-top: 10px;" class="w3-panel">
                    <h2><b>Connect Us</b></h2>
                    <p><b>1316 C16</b></p>
                </div>
            </div>
            <div class="w3-half w3-container">
                <div style="border-right:5px solid rgba(78, 78, 78, 0.582); padding-top: 10px;" class="w3-panel">
                    <h2><b>Connect Us</b></h2>
                    <p><b>楊依辰 劉俞萱 蘇弈瑄</b></p>
                    <p><b>游卓妍 林崇婕</b></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>