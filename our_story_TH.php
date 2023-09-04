<?php 
session_start();
if (empty($_SESSION["username"]))
{
    $_SESSION["username"] = "";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>แรงบันดาลใจของเรา - AlzApp</title>
        <!-- Bootstrap core CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Custom styles for this template -->
        <!--<link href="navbar.css" rel="stylesheet"> -->
        <style>
        body {
            background-color: #f8f9fa;
            font-family: din alternate;
        }
        .card-title{
            font-family: din alternate;
        }
        .navbar-custom{
            background-color: #4B5C7B;
        }
        a,h4:hover,a:hover,.mb-0,#navbarDropdown,.nav-link,#Demo{
            color:white;
            text-decoration: none;
        }
       .row{
        padding-left:20%;
        padding-top: 5%;
        padding-right: 20%;
        }
        .col-sm-6{
            padding-top: 5%;
        }
        #toggleMenu{
            border-color: white;
        }
        </style>
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-custom">
            <a class="navbar-brand mb-0 h1" href="index.php" style="color: white">AlzApp</a>
            <button class="navbar-toggler"type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" id="toggleMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fa fa-bars" aria-hidden="true" style="color:#e6e6ff"></i>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          บริการ
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="medical_records_TH.php">บันทึกสุขภาพ</a>
                            <a class="dropdown-item" href="To_do_list_TH.php">สี่งที่ต้องทำ</a>
                            <a class="dropdown-item" href="calendar/index_TH.php">ตารางเวลา</a>
                            <a class="dropdown-item" href="games_TH.php">เกมส์</a>
                       
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        เกี่ยวกับเรา
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="our_story_TH.php">แรงบันดาลใจของเรา</a>
                          <a class="dropdown-item" href="feedback_TH.php">แบบสอบถามความพึงพอใจ</a>
                    </li>
                </ul>
                
                <ul class="navbar-nav">
                    <li class="nav-item"></li>
                        <a class="nav-link" style="color: white">สวัสดี <?php echo htmlspecialchars($_SESSION["username"]); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id = "Demo"></a>
                    </li>
                    <li class="nav-item">
                        <?php
                            if (empty($_SESSION["username"]))
                            {
                                echo '<a class="nav-link" href="login_TH.php">เข้าสู่ระบบ</a>';
                            }
                            else{
                                echo '<a class="nav-link" href="logout_TH.php">ออกจากระบบ</a>';
                            }
                        ?>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="our_story_TH.php" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-th"> </span> ไทย</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown09">
                            <a class="dropdown-item" href="our_story.php"><span class="flag-icon flag-icon-us"> </span>  อังกฤษ</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- body -->
        <div class="row">
            <div class="col-sm-6">
                <h4>เกี่ยวกับเรา</h4>
                <br>
                <h1 style="font-weight: bold">เรื่องราวของ AlzApp</h1>
                <br>
                    <h6 style="line-height: 2;">
                        แรงบัลดาลใจในการทำงานชิ้นนี้ เกิดจากคุณยายเป็นผู้ป่วยอัลไซเมอร์ จึงมีความตั้งใจที่จะพัฒนาเว็บไซต์นี้สำหรับบุคคลที่จะมาดูแลผู้ป่วย เพื่อให้เป็นแนวทางในการปฏิบัติ ในการดูแลผู้ป่วยอัลไซเมอร์ ด้วยความรัก และความเข้าใจ อันจะเกิดประโยชน์ต่อทั้งผู้ป่วย และผู้ดูแล
                    </h6>
                <br>
                <p style="color: #4B5C7B">ปรานต์ แต้ไพสิฐพงษ์</p>
                <p style="color: #4B5C7B">ติดต่อ: termt222@gmail.com</p>
                <p style="color: #4B5C7B">กิตติกรรมประกาศ</p>
                <p>ผู้จัดทำขอขอบพระคุณผู้ที่เกี่ยวข้องกับการจัดทำผลงาน ไว้ ณ ที่นี้</p>
                <ol>
                    <li>รศ.นพ. สุขเจริญ ตั้งวงษ์ไชย</li>
                    <li>คุณ วิภาดา เด่นดี</li>
                    <li>คุณ ชมพูนิกข์ แต้ไพสิฐพงษ์</li>
                    <li>คุณ จิราพร แต้ไพสิฐพงษ์</li>
                </ol>
                
            </div>
        <div class="col-sm-6">
        
        <img src="img/logo.png">

          </div>
        </div>

        </body>

        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script>
        var d = new Date();
        var months = ["มกราคม","กุมภาพันธุ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"];
        var days = ["ZERO","๑","๒","๓","๔","๕","๖","๗","๘","๙","๑o","๑๑","๑๒","๑๓","๑๔","๑๕","๑๖","๑๗","๑๘","๑๙","๒o","๒๑","๒๒","๒๓","๒๔","๒๕","๒๖","๒๗","๒๘","๒๙","๓o","๓๑"];
        document.getElementById("Demo").innerHTML = days[d.getDate()] + " " + months[d.getMonth()];
        </script>
    
</html>