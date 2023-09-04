<?php 
require 'db_conn.php';
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
        <title>AlzApp</title>
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
        
        .carousel-inner img{
            height: 500px;
            object-fit: fill;
        }
        .card img{
            width: 100%;
            height: 50%;
        }
        .card-title{
            font-family: din alternate;
        }
        
        .navbar-custom,#title-color{
            background-color: #4B5C7B;
        }
        a,h4:hover,a:hover,.mb-0,#navbarDropdown,#navDemo,.nav-link,#Demo{
            color:white;
            text-decoration: none;
        }
        
        #image-home{
            width:100%;
            max-width:924px;
            height:440px;
            margin-top:20px;
            margin-bottom:20px;
        }

        #card-padding{
            padding-left: 2%; 
            padding-right: 2%; 
            padding-top: 2%; 
            padding-bottom: 2%;
        }
        #card-style{
            width:100%; 
            background-color: lightgrey;
        }
        #img-padding{
            margin-top: 15%; 
            margin-bottom: 5%;
            margin-left: 25%; 
            margin-right: 15%; 
            width: 50%; 
            height: 50%;

        }
        #text-style{
            font-size: 20px; 
            text-align: center; 
            color: grey
        }
        .navbar-toggler{
            color:white;
        }
        #toggleMenu{
            border-color: white;
        }
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
                        <a class="nav-link dropdown-toggle" href="index.php" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-th"> </span> ไทย</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown09">
                            <a class="dropdown-item" href="homescreen.php"><span class="flag-icon flag-icon-us"> </span>  อังกฤษ</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="p-3 mb-2 text-dark">

            <img src="img/homescreen_banner_TH.png" id="image-home" class="img-responsive center-block d-block mx-auto">


            <div class="w3-row-padding">
            
            <div class="w3-third" id="card-padding">
                <div class="card" id="card-style" onclick="document.getElementById('HealthInfoModal').style.display='block'">
                    <img src="img/homescreen_healthInfo.svg" id="img-padding" alt="Card image">
                    <div class="card-body" style="text-align: center;">
                      <h4 class="card-title" id="text-style">ข้อมูลสุขภาพ</h4>
                    </div>
                </div>
            </div>
            
            <div class="w3-third" id="card-padding">
                <div class="card" id="card-style" onclick="document.getElementById('OurServicesModal').style.display='block'">
                    <img src="img/homescreen_ourServices.svg" id="img-padding" alt="Card image">
                    <div class="card-body" style="text-align: center;">
                      <h4 class="card-title" id="text-style">บริการของเรา</h4>
                    </div>
                </div>
            </div>
              

            <div class="w3-third" id="card-padding">
                <div class="card" id="card-style" onclick="document.getElementById('AboutUsModal').style.display='block'">
                    <img src="img/homescreen_aboutUs.svg" id="img-padding" alt="Card image">
                    <div class="card-body" style="text-align: center;">
                      <h4 class="card-title" id="text-style">เกี่ยวกับเรา</h4>
                    </div>
                </div>
            </div>

            </div>

        </div>

    </head>

    <div id="HealthInfoModal" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">

        <header class="w3-container w3-center w3-padding-32" id="title-color"> 
            <h2 class="w3-wide" style="color: white;"><i class="w3-margin-right"></i>ข้อมูลสุขภาพ</h2>
        </header>

      <div class="w3-container">
        <div class="w3-row-padding">
            
        <div class="w3-quarter" id="card-padding">
            <div class="card" style="border-color: lightcoral;" id="card-style" onclick="document.getElementById('HealthInfoModal1').style.display='block'">
                <img src="img/homescreen_healthInfo.svg" id="img-padding" alt="Card image">
                <div class="card-body" style="text-align: center;">
                  <h4 class="card-title" id="text-style">อุบัติการณ์และความชุก</h4>
                </div>
            </div>
        </div>
        
        <div class="w3-quarter" id="card-padding">
            <div class="card" style="border-color: khaki;" id="card-style" onclick="document.getElementById('HealthInfoModal2').style.display='block'">
                <img src="img/homescreen_healthInfo.svg" id="img-padding" alt="Card image">
                <div class="card-body" style="text-align: center;">
                  <h4 class="card-title" id="text-style">การตรวจประเมินภาวะสมองเสื่อม</h4>
                </div>
            </div>
        </div>

        <div class="w3-quarter" id="card-padding">
            <div class="card" style="border-color: thistle;" id="card-style" onclick="document.getElementById('HealthInfoModal3').style.display='block'">
                <img src="img/homescreen_healthInfo.svg" id="img-padding" alt="Card image">
                <div class="card-body" style="text-align: center;">
                  <h4 class="card-title" id="text-style">การแบ่งระยะของโรคอัลไซเมอร์<br></h4>
                </div>
            </div>
        </div>

        <div class="w3-quarter" id="card-padding">
            <div class="card" style="border-color: mediumseagreen;" id="card-style" onclick="document.getElementById('HealthInfoModal4').style.display='block'">
                <img src="img/homescreen_healthInfo.svg" id="img-padding" alt="Card image">
                <div class="card-body" style="text-align: center;">
                  <h4 class="card-title" id="text-style">วิธีการดูแลผู้ป่วยอัลไชเมอร์<br></h4>
                </div>
            </div>
        </div>

        <div class="w3-quarter" id="card-padding">
            <div class="card" style="border-color: lightcoral;" id="card-style" onclick="document.getElementById('HealthInfoModal5').style.display='block'">
                <img src="img/homescreen_healthInfo.svg" id="img-padding" alt="Card image">
                <div class="card-body" style="text-align: center;">
                  <h4 class="card-title" id="text-style">กิจกรรมที่เหมาะกับคนไข้อัลไซเมอร์</h4>
                </div>
            </div>
        </div>
        
        <div class="w3-quarter" id="card-padding">
            <div class="card" style="border-color: khaki;" id="card-style" onclick="document.getElementById('HealthInfoModal6').style.display='block'">
                <img src="img/homescreen_healthInfo.svg" id="img-padding" alt="Card image">
                <div class="card-body" style="text-align: center;">
                  <h4 class="card-title" id="text-style">กินอย่างไรให้ ห่างไกลสมองเสื่อม</h4>
                </div>
            </div>
        </div>

        <div class="w3-quarter" id="card-padding">
            <div class="card" style="border-color: thistle;" id="card-style" onclick="document.getElementById('HealthInfoModal7').style.display='block'">
                <img src="img/homescreen_healthInfo.svg" id="img-padding" alt="Card image">
                <div class="card-body" style="text-align: center;">
                  <h4 class="card-title" id="text-style">ผู้สูงอายุแข็งแรง ไม่ซีด สมองดี<br></h4>
                </div>
            </div>
        </div>

        <div class="w3-quarter" id="card-padding">
            <div class="card" style="border-color: mediumseagreen;" id="card-style" onclick="document.getElementById('HealthInfoModal8').style.display='block'">
                <img src="img/homescreen_healthInfo.svg" id="img-padding" alt="Card image">
                <div class="card-body" style="text-align: center;">
                  <h4 class="card-title" id="text-style">เมนูอาหาร...ห่างไกลสมองเสื่อม<br></h4>
                </div>
            </div>
        </div>

        </div>
      </div>
    </div>
    </div>



    <div id="OurServicesModal" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">

        <header class="w3-container w3-center w3-padding-32" id="title-color"> 
            <h2 class="w3-wide" style="color: white;"><i class="w3-margin-right"></i>บริการของเรา</h2>
        </header>

      <div class="w3-container">
        <div class="w3-row-padding">
            
        <div class="w3-quarter" id="card-padding">
            <a href="medical_records_TH.php">
                <div class="card" id="card-style">
                    <img src="img/medical_records.png" style="border-radius: 50%;"id="img-padding" alt="Card image">
                    <div class="card-body" style="text-align: center;">
                      <h4 class="card-title" id="text-style">บันทึกสุขภาพ</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="w3-quarter" id="card-padding">
            <a href="To_do_list_TH.php">
                <div class="card" id="card-style">
                    <img src="img/homescreen_ourServices.svg" id="img-padding" alt="Card image">
                    <div class="card-body" style="text-align: center;">
                      <h4 class="card-title" id="text-style">รายชื่อสี่งที่ต้องทำ</h4>
                    </div>
                </div>
            </a>
        </div>
          

        <div class="w3-quarter" id="card-padding">
            <a href="calendar/index_TH.php">
                <div class="card" id="card-style">
                    <img src="img/calendar.png" style="border-radius: 50%;" id="img-padding" alt="Card image">
                    <div class="card-body" style="text-align: center;">
                      <h4 class="card-title" id="text-style">ตารางเวลา</h4>
                    </div>
                </div>
            </a>
        </div>

        <div class="w3-quarter" id="card-padding">
            <a href="games_TH.php">
                <div class="card" id="card-style">
                    <img src="img/games.png" style="border-radius: 50%;" id="img-padding" alt="Card image">
                    <div class="card-body" style="text-align: center;">
                      <h4 class="card-title" id="text-style">เกมส์</h4>
                    </div>
                </div>
            </a>
        </div>

        </div>
      </div>
    </div>
    </div>



    <div id="AboutUsModal" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">

        <header class="w3-container w3-center w3-padding-32" id="title-color"> 
            <h2 class="w3-wide" style="color: white;"><i class="w3-margin-right"></i>เกี่ยวกับเรา</h2>
        </header>

      <div class="w3-container">
        <div class="w3-row-padding">
            
        <div class="w3-half" id="card-padding">
            <a href="our_story_TH.php">
                <div class="card" id="card-style">
                    <img src="img/homescreen_aboutUs.svg" id="img-padding" alt="Card image">
                    <div class="card-body" style="text-align: center;">
                      <h4 class="card-title" id="text-style">เรื่องราวของ AlzApp</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="w3-half" id="card-padding">
            <a href="feedback_TH.php">
                <div class="card" id="card-style" href="feedback_TH.php">
                    <img src="img/homescreen_aboutUs.svg" id="img-padding" alt="Card image">
                    <div class="card-body" style="text-align: center;">
                      <h4 class="card-title" id="text-style">แบบสอบถามความพึงพอใจ</h4>
                    </div>
                </div>
            </a>
        </div>

        </div>
      </div>
    </div>
    </div>


    <!-- Health info modals-->
    <div id="HealthInfoModal1" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">

      <header class="w3-container w3-center w3-padding-32" style="background-color: lightcoral;">
        <h2 class="w3-wide" style="color: white;"><i class="w3-margin-right"></i>อุบัติการณ์และความชุก</h2>
        <span onclick="document.getElementById('HealthInfoModal1').style.display='none'" class="w3-button w3-display-topleft"><</span>
      </header>

      <div class="w3-container">
        <p>
            <h5>ภาวะสมองเสื่อม</h5>
            <ul style="list-style-type:disc">
                <li>ภาวะสมองเสื่อม (dementia) มีแนวโน้มสูงขึ้นตามโครงสร้างประชากรที่เปลี่ยนแปลงมีผู้สูงอายุเพิ่มขึ้นอย่างรวดเร็ว</li>
                <li>โรคอัลไซเมอร์ (Alzheimer’s disease; AD) เป็นสาเหตุที่พบบ่อยที่สุด</li>
                <li>ผู้ป่วยมีความบกพร่องด้านสมรรถภาพสมองหลายด้านและมีผลต่อการดำรงชีวิตประจำวันอาการเหล่านี้ได้แก่:</li>
                <ul style="list-style-type:circle">
                    <li>การรู้คิดถดถอย ได้แก่ ความจำ สมาธิเชิงซ้อน ความสามารถบริหารจัดการ การใช้ภาษา การรับรู้ทักษะการเคลื่อนไหว การเข้าสังคม</li>
                    <li>การเปลี่ยนแปลงของพฤติกรรม บุคลิกภาพ และอารมณ์</li>
                    <li>ทักษะในการดำรงชีวิตประจำวันบกพร่อง</li>
                    <li>อาการมักเกิดขึ้นช้าๆ ค่อยเป็นค่อยไป การประเมินและวินิจฉัยที่ถูกต้องจึงมีความสำคัญมากในการดูแลรักษาผู้ป่วยเหล่านี้</li>
                </ul>
            </ul>

            <h5>อุบัติการณ์ของภาวะสมองเสื่อม</h5>
            <ul style="list-style-type:disc">
                <li>อุบัติการณ์ของภาวะสมองเสื่อมและโรคอัลไซเมอร์สูงขึ้นเรื่อยๆ</li>
                <li>จำนวนผู้ป่วยทั่วโลกจะเพิ่มเป็น 2 เท่าทุก 20 ปี จนถึง 81.1 ล้านคนในปี พ.ศ. 2583 ส่วนใหญ่อยู่ในประเทศกำลังพัฒนาในทวีปเอเชีย</li>
                <li>ในประเทศไทยมีการสำรวจในชุมชนพบประมาณร้อยละ 3.4 ในประชากรอายุมากกว่า 60 ปี</li>
                <li>โรคสมองเสื่อมร้อยละ 90 จะเกิดกับวัยสูงอายุ 65 ปี และมักพบในเพศหญิงมากกว่าเพศชาย</li>
                <li>สมองเสื่อมชนิดเกิดในคนอายุน้อย พบได้ร้อยละ 10  คือพบในผู้ป่วยที่อายุน้อยกว่า 65 ปี  มักเกิดจากโรคสมองเสื่อมชนิดกลีบสมองส่วนหน้าและกลีบขมับฝ่อ (frontotemporal dementia; FTD) หรือโรคสมองเสื่อมอัลไซเมอร์ (Alzheimer’s disease; AD) ที่มักมีประวัติการป่วย หลายคนในครอบครัวเนื่องจากมีการกลายพันธุ์ในระดับยีนบางตำแหน่ง</li>
                <li>ผู้ป่วยและผู้ดูแลอาจมีความเครียดสูงเมื่อมีการถดถอยทางสมองมากขึ้นและส่งผลกระทบต่อความสามารถในการดำเนินชีวิต</li>
            </ul>

            <h5>สถานการณ์ภาวะสมองเสื่อม</h5>
            <p>ประมาณการว่าประเทศไทยมีผู้ป่วยสมองเสื่อมในปี พ.ศ.2564 ประมาณ 6-8 แสนคน</p>

            <h6>ความชุกของภาวะสมองเสื่อมเพิ่มตามอายุ</h6>
            <ul style="list-style-type:disc">
                <li>ความชุกน้อยที่สุดในกลุ่มอายุ 60-69 ปีร้อยละ 1</li>
                <li>ระดับสูงสุดในกลุ่ม 90 ปีขึ้นไปหญิงร้อยละ 30</li>
            </ul>

            <h6>คนอ้วนเสี่ยงสมองเสี่อม</h6>
            <ul style="list-style-type:disc">
                <li>เมื่อเทียบกับคนที่มีดัชนีมวลกายปกติ</li>
                <li>ผู้ที่มีภาวะอ้วน (body mass index = 25-29 kg/m<sup>2</sup>) มีความเสี่ยงเพิ่มขึ้น 25%</li>
                <li>ผู้ที่มีภาวะอ้วนอันตราย (body mass index ≥ 30 kg/m<sup>2</sup>) มีความเสี่ยงเพิ่มขึ้น 48%</li>
            </ul>

            <h5>สาเหตุของภาวะสมองเสื่อม</h5>
            <ol>
                <li>โรคอัลไซเมอร์ ที่พบได้เป็นสัดส่วนร้อยละ 60-70 ของผู้ป่วยสมองเสื่อมทั้งหมด โดยในช่วงแรกมักมีปัญหาทางด้านความจำก่อน โดยเฉพาะความจำเกี่ยวกับเหตุการ์ณใหม่ๆที่พึ่งผ่านไป (episodic memory) เมื่ออาการรุนแรงต่อมาจึงจะมีปัญหาความจำระยะยาว  โดยมีอาการเสื่อมถอยแบบค่อยเป็นค่อยไป ผู้ป่วยส่วนใหญ่อาจจะมีอาการอื่นๆ ด้านจิตเวช เช่น ซึมเศร้า วิตกกังวล มีอารมณ์เปลี่ยนแปลงง่าย ประสาทหลอน หวาดระแวง เฉยเมยไม่สนใจสิ่งแวดล้อม  บางคนเกิดอาการด้านจิตเวชตั้งแต่ระยะแรกและอาการจะชัดเจนรุนแรงมากขึ้นเมื่ออาการเสื่อมถอยมากขึ้น  ซึ่งในระยะอาการรุนแรง ผู้ป่วยจะสูญเสียสามารถในการทำกิจวัตรประจำวันมากขึ้น จนอาจจะพูดหรือสื่อสารไม่ได้ กลืนอาหารไม่ได้ เคลื่อนไหวลำบากต้องนอนติดเตียง และเสียชีวิตจากโรคแทรกภายในระยะเวลา 3–10 ปี</li>
                <li>ภาวะสมองเสื่อมโรคหลอดเลือดสมอง (vascular dementia) โรคนี้พบได้บ่อยเป็นอันดับสอง รองจาก โรคอัลไซเมอร์ และอาจพบร่วมกับโรคอัลไซเมอร์ได้  (mixed dementia) โดยมักมีอาการตามหลังการเกิดโรคหลอดเลือดสมองไม่ว่าจะเป็นชนิดขาดเลือด (cerebral infarction) หรือหลอดเลือดสมองแตก (cerebral hemorrhage) อาการส่วนใหญ่อาจเกิดขึ้นอย่างเฉียบพลัน  หรือบางคนอาจมีอาการค่อยๆทรุดลงเป็นระยะๆ ผู้ป่วยมักมีปัจจัยเสี่ยงด้านโรคหัวใจและหลอดเลือดอยู่เดิม  ตรวจร่างกายมักพบความผิดปกติของระบบประสาทเฉพาะที่ (focal neurological deficit) อย่างไรก็ตามโรคหลอดเลือดสมองขนาดเล็ก (small vessel disease) ที่ทำให้เกิดการตายของเนื้อสมองเป็นหย่อมๆ โดยเฉพาะความเสียหายที่เกิดขึ้นที่เส้นใยประสาท (white matter) อาจมีอาการเสื่อมถอยแบบค่อยเป็นค่อยไป รอยโรคที่เกิดขึ้นจะไปขัดขวางการทำงานเชื่อมต่อของสมองส่วนต่างๆ ทำให้เกิดความบกพร่องของการรู้คิด   และมีอาการสำคัญอื่นๆ เช่น การคิดและการเคลื่อนไหวช้าลง (slow processing speed) มีความบกพร่องของความสามารถในการบริหารจัดการชัดเจน (executive dysfunction)</li>
                <li>โรคสมองเสื่อมชนิดลิวอี้บอดี้ (dementia with Lewy bodies; DLB) ภาวะนี้เกิดจากการสะสมของสารลิวอี้บอดี้ (Lewy body) ในเซลล์ประสาท ผู้ป่วยมักมีอาการสมองเสื่อมร่วมกับการเคลื่อนไหวผิดปกติคล้ายโรคพาร์กินสัน (parkinsonism) ที่อาจเกิดพร้อมกันหรือเกิดก่อนจะมีความบกพร่องของการรู้คิดไม่เกิน 1 ปี  ลักษณะพิเศษที่พบในผู้ป่วยเหล่านี้คือ  มีภาพหลอน (visual hallucination) มีอาการสับสนที่เปลี่ยนแปลงดีขึ้นแย่ลงเร็วในแต่ละวัน  อาจมีความผิดปกติทางการนอนหลับในช่วงหลับฝัน (REM sleep behavioral disorder) เช่น นอนละเมอ และ มีความยากลำบากในการก้าวเดิน  มีประวัติหกล้มง่าย</li>
                <li>โรคสมองเสื่อมชนิดกลีบสมองส่วนหน้าและกลีบขมับฝ่อ (frontotemporal dementia, FTD) โรคนี้พบได้น้อย อาจพบว่ามีอาการเริ่มต้นในผู้ป่วยวัยกลางคน ชนิดที่สมองกลีบหน้าฝ่อมักมีอาการเริ่มต้นมักเป็นการเปลี่ยนแปลงของบุคลิกภาพ  มีปัญหาในการควบคุมตนเองและการควบคุมอารมณ์ การตัดสินใจบกพร่อง อาจแสดงพฤติกรรมไม่เหมาะสมเวลาในที่สาธารณะ กินมาก ควบคุมการกินไม่ได้ สำหรับผู้ที่มีปัญหาสมองกลีบขมับฝ่อจะมีการใช้ภาษาผิดปกติ เป็นอาการเด่นและไม่มีปัญหาพฤติกรรม</li>
                <li>ภาวะสมองเสื่อมที่อาจรักษาให้กลับเป็นปกติได้ (reversible dementia) อาจเกิดจากปัญหาทางจิตเวชโดยเฉพาะโรคซึมเศร้า  หรือปัญหาโรคทางกายอื่นๆ เช่น ภาวะทุพโภชนาการหรือพร่องวิตามิน เช่น วิตามินบี 1 หรือวิตามิน บี 12 ภาวะพร่องไทรอยด์ (hypothyroidism)  ผลข้างเคียงเรื่อง anticholinergic ของยาแก้แพ้ หรือยาที่มีฤทธิ์ต่อระบบประสาท เกิดอุบัติเหตุที่ศีรษะแล้วมีภาวะเลือดออกใต้เยื่อหุ้มสมองชั้นดูราชนิดเรื้อรัง (chronic subdural hematoma) ภาวะน้ำคั่งในโพรงสมอง(normal pressure hydrocephalus) การติดเชื้อซิฟิลิสหรือ HIV ในระบบประสาท  การบำบัดรักษาปัญหาข้างต้นจะทำให้อาการสมองเสื่อมดีขึ้นได้</li>
            </ol>
        </p>
        <p>เอกสารอ้างอิง หนังสือคู่มือแนวทางการป้องกันภาวะสมองเสื่อม สำนักโภชนาการ กรมอนามัย<br>ปรับปรุงแก้ไข โดย รศ.นพ. สุขเจริญ  ตั้งวงษ์ไชย</p>
      </div>
    </div>
    </div> 

    <div id="HealthInfoModal2" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">

      <header class="w3-container w3-center w3-padding-32" style="background-color: khaki;">
        <h2 class="w3-wide" style="color: white;"><i class="w3-margin-right"></i>การตรวจประเมินภาวะสมองเสื่อม</h2>
        <span onclick="document.getElementById('HealthInfoModal2').style.display='none'" class="w3-button w3-display-topleft"><</span>
      </header>

      <div class="w3-container">
        <p>
            <p>การตรวจนี้จะทำเพื่อยืนยันการวินิจฉัย หาสาเหตุของภาวะสมองเสื่อมที่อาจรักษาให้เป็นปกติได้ แบ่งประเภทของโรค และประเมินภาวะโรคร่วมอื่นๆที่มี   เพื่อปรับลดปัจจัยเสี่ยงของผู้ป่วยและติดตามอาการระหว่างการรักษา โดยแบ่งการตรวจ ประเมินเป็น 3 กลุ่มหลัก ดังนี้</p>
            <ol>
                <li>การประเมินผู้ป่วยในภาพรวมมีประเด็นต่างๆ ที่ควรกระทำในระยะแรก และระหว่างการรักษา โดยการซักประวัติ การตรวจร่างกาย และการตรวจทางห้องปฏิบัติการ</li>
                <ul style="list-style-type:circle">
                    <li>การรู้คิด (cognition) ประเมินความบกพร่องของการรู้คิด 6 ด้าน ได้แก่ ความจำและความสามารถในการเรียนรู้สิ่งใหม่ สมาธิเชิงซ้อน  การใช้ภาษา  ความสามารถในการบริหารจัดการ การรับรู้และทักษะการเคลื่อนไหว  การรู้คิดในการเข้าสังคม  อาจมีการคัดกรองด้วยแบบประเมินที่ใช้แบบ ทดสอบมาตรฐานในการประเมินเบื้องต้นและติดตามการรักษาที่ใช้กันบ่อย ๆ เช่น Mini-Mental State Examination -Thai 2002 (MMSE Thai -2002) หรือ Thai Mental State Examination (TMSE) แต่ในการวินิจฉัยภาวะสมองเสื่อมในระยะที่อาการไม่ชัดเจนหรือมีอาการเล็กน้อย ซึ่งพบได้ในผู้ป่วยที่มีภาวะการรู้คิดบกพร่องเล็กน้อย (Mild Cognitive Impairment, MCI) อาจพิจารณาตรวจด้วยแบบประเมินทางประสาทจิตวิทยาอื่นๆ เช่น MoCA  หรือในผู้ที่มีอาการแต่ยังไม่สามารถตรวจยืนยันด้วยแบบทดสอบข้างต้นอาจจะต้องทำแบบทดสอบทางจิตวิทยาที่ละเอียดมากมากขึ้น</li>
                    <li>ปัญหาพฤติกรรมและอาการทางจิต  ในช่วงแรกผู้ป่วยมักมีอาการน้อย เช่น เฉยเมย ไม่สนใจสิ่งแวดล้อม ซึมเศร้าที่อาจเกิดขึ้นก่อนโรคอัลไซเมอร์ แต่ระหว่างการดำเนินโรคความผิดปกตินี้จะเด่นชัดขึ้น เช่น หลงผิด หูแว่วประสาทหลอน กระวนกระวาย ก้าวร้าว นอนไม่หลับ เดินเพ่นพ่าน ซึ่งจำเป็นต้องบำบัดรักษาด้วยการใช้ยาและไม่ใช้ยาร่วมกัน</li>
                    <li>ความสามารถในการทำกิจวัตรประจำวัน (activities of daily livings) มักจะเริ่มต้นมีความบกพร่องด้านกิจวัตรที่ซับซ้อนก่อน เช่น การรับประทานยา การใช้โทรศัพท์ การใช้เงิน การประกอบอาหาร เป็นต้น เมื่ออาการสมองเสื่อมรุนแรงมากขึ้นจึงจะมีความบกพร่องของกิจวัตประจำวันพื้นฐาน เช่นการขับถ่าย ชำระล้างร่างกาย  ดูแลความสะอาดและสุขลักษณะส่วนตัว อาบน้ำ การแต่งตัว การกินอาหาร เป็นต้น</li>
                </ul>
                <li>การตรวจทางห้องปฏิบัติการพื้นฐาน ซึ่งแพทย์จะทำในผู้ป่วยทุกรายที่สงสัยภาวะสมองเสื่อมได้แก่ การตรวจนับเม็ดเลือด ระดับน้ำตาล อิเล็กโทรไลต์ การทำงานของตับ – ไต ระดับ ฮอร์โมนต่อมไทรอยด์ การติดเชื้อซิฟิลิส การติดเชื้อเอชไอวี ตรวจระดับวิตามินบี 12 การตรวจอื่นๆ ที่แนะนำในรายที่มีข้อบ่งชี้จำเพาะ หรือมีปัจจัยเสี่ยงชัดเจน เช่น การเจาะหลังและตรวจน้ำไขสันหลัง การตรวจคลื่นไฟฟ้าสมอง การตรวจยีน เป็นต้น</li>
                <li>การตรวจประสาทรังสีวิทยาเพื่อช่วยในการประเมินความเสื่อมหรือฝ่อของสมองส่วนต่างๆ ที่มีความจำเพาะต่อโรค  ซึ่งจะช่วยในการวินิจฉัยแยกโรคทางประสาทศัลยศาสตร์ และโรคหลอดเลือดสมองโดยการตรวจดูภาพฉายรังสีทางโครงสร้าง (structural imaging) ของสมอง เช่น CT หรือ MRI ในครั้งแรกที่วินิจฉัย การการตรวจซ้ำภายหลังควรทำในรายที่มีการดำเนินโรคหรืออาการทรุดลงเร็ว   ตรวจพบว่ามีอาการหรือความผิดปกติ เฉพาะที่ในระบบประสาท เช่น แขนขาอ่อนแรง มีอาการของเส้นประสาทสมอง ทรงตัวไม่ดีปวดศีรษะ ซึมลง     ส่วนการตรวจที่ใช้เทคนิคทางเวชศาสตร์นิวเคลียร์ เช่น SPECT หรือ PET scan มักใช้ในรายที่ไม่แน่ใจในการวินิจฉัย หรือคัดกรองผู้ป่วยที่มีประวัติครอบครัวที่มีความเสี่ยงสูง เพื่อนำไปสู่การ วินิจฉัยให้เร็วขึ้นต่อไป<br/> &emsp; &emsp; ในอนาคตมีแนวทางเพื่อให้การวินิจฉัยได้เร็วขึ้น เพื่อชะลอโรคหรือให้การรักษาให้ได้ผลดี  การตรวจวัดการเปลี่ยนแปลงของตัวบ่งชี้ทางชีววิทยา ( biomarkers) อาจจะนำไปสู่การวินิจฉัยโรคให้ได้เร็วขึ้นและสามารถให้การรักษาตั้งแต่ระยะแรกเพื่อป้องกันหรือเปลี่ยนธรรมชาติของโรคตั้งแต่ก่อนมีอาการหรือสงสัยว่าเริ่มมีอาการระยะแรก ตรวจความผิดปกติของตัวชี้วัดที่ยืนยัน ได้แก่ ลักษณะทางกายวิภาคที่ผิดปกติใน MRI ที่พบการฝ่อผิดปกติของ medial temporal lobe  เมแทบอลิซึมของสมองที่ลดลงจากการตรวจด้วย FDG PET sacn (positron emission tomography) การตรวจดูระดับ อะไมรอยด์ และ เทาโปรตีนที่สะสมในสมองโดย amyloid PET และ Tau PET scan หรือเจาะน้ำไขสันหลังดูระดับ อะไมรอยด์ และ เทาโปรตีนที่ผิดปกติในน้ำไขสันหลัง การตรวจหายีนกลายพันธุ์ของโรคในผู้ปวยที่มีอาการตอนอายุน้อยและมีประวัติครอบครัวป่วยหลายคน</li>
            </ol>
        </p>
        <p>เอกสารอ้างอิง หนังสือคู่มือแนวทางการป้องกันภาวะสมองเสื่อม สำนักโภชนาการ กรมอนามัย<br>ปรับปรุงแก้ไข โดย รศ.นพ. สุขเจริญ  ตั้งวงษ์ไชย</p>
      </div>
    </div>
    </div>

    <div id="HealthInfoModal3" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">

      <header class="w3-container w3-center w3-padding-32" style="background-color: thistle;">
        <h2 class="w3-wide" style="color: white;"><i class="w3-margin-right"></i>การแบ่งระยะของโรคอัลไซเมอร์</h2>
        <span onclick="document.getElementById('HealthInfoModal3').style.display='none'" class="w3-button w3-display-topleft"><</span>
      </header>

      <div class="w3-container">
        <p>
            <h5>การแบ่งระยะของโรคอัลไซเมอร์ ตาม The Global Deterioration Scale (GDS) ของ นพ.แบรี่ ไรสเบิร์ก (Barry Reisberg) ผู้เชี่ยวชาญด้านสมองเสื่อมได้เป็น 7 ระยะดังนี้</h5>
            <br>
            <h5>ระยะที่ 1 สมองยังทำงานปกติ ไม่แสดงอาการ</h5>
            <br>
            <h5>ระยะที่ 2 การรู้คิดถดถอยเล็กน้อยมากเช่น</h5> 
            <ul style="list-style-type:square">
                <li>ลืมของที่วางอยู่ในที่เก็บประจำ</li>
                <li>ลืมคำพูดที่เคยพูด</li>
            </ul>
            ระยะนี้จะยังไม่สามารถตรวจพบอาการได้<br>

            <h5>ระยะที่ 3 การรู้คิดถดถอยเล็กน้อย คนรอบข้างเริ่มสังเกตุเห็นความผิดปกติ เช่น</h5>
            <ul style="list-style-type:square">
                <li>ใช้คำพูดไม่ถูกหรือเรียกชื่อคนผิดๆ</li>
                <li>วางแผนงานได้ยากขึ้น</li>
                <li>ลืมเหตุการณ์ที่เพิ่งผ่านมา</li>
                <li>ทำงานร่วมกับผู้อื่นหรือในสังคมได้ยากขึ้น</li>
            </ul>

            <h5>ระยะที่ 4 การรู้คิดถดถอยปานกลาง เข้าสู่ภาวะสมองเสื่อมระยะรุนแรงน้อย</h5>
            <ul style="list-style-type:square">
                <li>ลืมเหตุการณ์ที่เพิ่งเกิดขึ้น</li>
                <li>มีปัญหาเกี่ยวกับการคิดเลข</li>
                <li>อารมณ์หงุดหงิดง่าย</li>
                <li>มีปัญหาในการใช้จ่ายเงินหรือจัดการเรื่องการเงิน</li>
            </ul>

            <h5>ระยะที่ 5 ภาวะสมองเสื่อมระยะรุนแรงปานกลาง</h5>
            <ul style="list-style-type:square">
                <li>สังเกตุเห็นอาการชัดขึ้นเรื่องความจำ</li>
                <li>ความคิด การคิดอ่านช้าลง ต้องการความช่วยเหลือในการทำกิจกรรมต่างๆ</li>
                <li>สับสนเรื่องเวลา วันที่ ที่อยู่</li>
                <li>นับตัวเลขถอยหลังได้ยากขึ้น</li>
                <li>ยังจำรายละเอียดเกี่ยวกับตัวเองและครอบครัวในอดีตได้บ้าง</li>
            </ul>

            <h5>ระยะที่ 6 ภาวะสมองเสื่อมระยะรุนแรง</h5>
            <ul style="list-style-type:square">
                <li>บุคลิกเปลี่ยนไป ความจำแย่ลงไปอีกต้องมีคนช่วยเหลือในกิจวัตรประจำวัน</li>
                <li>ไม่รู้ว่าเกิดอะไรขึ้นกับตัวเอง</li>
                <li>จำชื่อตัวเองได้ แต่จำเรื่องราวของตัวเองไม่ค่อยได้</li>
                <li>จำชื่อคู่ครองหรือผู้ดูแลไม่ได้</li>
                <li>แต่งตัวไม่ได้ ถ้าไม่มีคนช่วย</li>
                <li>วงจรการหลับตื่นผิดปกติมาก  นอนกลางวัน ตื่นกลางคืน ไม่ยอมหลับ</li>
                <li>ควบคุมการขับถ่ายไม่ได้</li>
                <li>บุคลิกและพฤติกรรมเปลี่ยนไปมากหวาดระแวง ชอบปัดมือ หรือ ฉีกกระดาษทิชชู</li>
            </ul>

            <h5>ระยะที่ 7 ภาวะสมองเสื่อมระยะรุนแรงมาก</h5>
            <ul style="list-style-type:square">
                <li>ไม่ตอบสนองต่อสิ่งรอบข้าง ไม่เคลื่อนไหว แต่ยังพูดได้</li>
                <li>ต้องมีคนดูแล ป้อนอาหาร อาบน้ำ พาเข้าห้องน้ำ</li>
                <li>ยิ้มไม่เป็น นั่งเองไม่ได้ กลืนอาหารไม่ได้</li>
            </ul>
        </p>
        <p>เอกสารอ้างอิง หนังสือคู่มือแนวทางการป้องกันภาวะสมองเสื่อม สำนักโภชนาการ กรมอนามัย<br>ปรับปรุงแก้ไข โดย รศ.นพ. สุขเจริญ  ตั้งวงษ์ไชย</p>
      </div>
    </div>
    </div>

    <div id="HealthInfoModal4" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">

      <header class="w3-container w3-center w3-padding-32" style="background-color: mediumseagreen;">
        <h2 class="w3-wide" style="color: white;"><i class="w3-margin-right"></i>วิธีการดูแลผู้ป่วยอัลไชเมอร์</h2>
        <span onclick="document.getElementById('HealthInfoModal4').style.display='none'" class="w3-button w3-display-topleft"><</span>
      </header>

      <div class="w3-container">
        <p>
            <h5>วิธีการดูแลผู้ป่วยอัลไซเมอร์ให้มีสุขภาพแข็งแรง ผู้ดูแลควรรู้ว่าผู้ป่วยมีอาการอยู่ที่ระยะใด โดยปรึกษาแพทย์ผู้เชี่ยวชาญ เพื่อเลือกกิจกรรมที่เหมาะสมกับผู้ป่วยในแต่ละราย</h5>

            <h5>วิธีดูแลผู้ป่วยอัลไซเมอร์</h5>
            <ol>
                <li>ทำตารางกิจวัตรต่างๆที่ต้องทำให้คงเดิม เหมือนเดิมทุกวัน</li>
                <li>ทำทุกกิจกรรมให้เป็นขั้นตอน  เรียบง่าย ไม่ซับซ้อน และทำทีละเรื่อง</li>
                <li>จัดบ้าน เตรียมสิ่งแวดล้อมและเครื่องใช้ในบ้านให้อยู่ได้อย่างปลอดภัยเช่น ห้องที่อยู่มีแสงสว่างเพียงพอ รองเท้าในบ้านใส่สบาย ไม่ลื่น</li>
                <li>ให้ความสำคัญกับความรู้สึกและความต้องการของคนไข้ มากกว่าความถูกต้องของข้อมูล ไม่พยายามชี้แจงความจริง   ใช้เหตุผลหรือโต้แย้งกับคนไข้ในรายละเอียดที่ผู้ป่วยจำไม่ได้หรือทำไม่ได้  </li>
                <li>หลีกเลี่ยงการแสดงอารมณ์รุนแรง โกรธ  ไม่พอใจ ผิดหวังต่อหน้าผู้ป่วย</li>
                <li>พยายามชวนผู้ป่วยพูดคุยในเรื่องที่ผู้ป่วยสนใจ  ยังจำได้  ให้ผู้ป่วยมีอารมณ์แจ่มใส   อาจแทรกมุขตลก</li>
                <li>เปิดเพลง ชวนผู้ป่วยร้องเพลง เต้นรำให้ผู้ป่วยมีอารมณ์ดีอยู่เสมอ</li>
                <li>ชักชวนผู้ป่วยทำกิจกรรม หรือช่วยงานบ้านที่คาดว่าผู้ป่วยยังพอทำได้ เช่น พับผ้า, เก็บเตียง  แม้ว่าจะทำซ้ำๆหรือผู้ป่วยอาจจะทำได้ไม่เรียบร้อยนักก็ตาม การออกกำลังกายสม่ำเสมอจะช่วยลดความรุนแรงของโรคได้ โดยช่วยกระตุ้นการทำงานของสมอง ส่งเสริมให้การสร้างเซลสมองใหม่    สำหรับผู้สูงอายุหรือผูป่วยที่มีอาการระยะแรกควรออกกำลังกายระดับปานกลาง  เน้นการเสริมความแข็งแรงของหัวใจ ฝึกความแข็งแรง สมดุลย์ของกล้ามเนื้อ มีการประสานงานระหว่างอวัยวะต่างๆ    โดยการเดิน  ฝึกโยคะ ฝึกไทเก็ก จี้กง หรือว่ายน้ำ 150 นาที / สัปดาห์ สำหรับผู้ป่วยที่มีอาการมากให้ออกกำลังกายตามความเหมาะสมและสภาพผู้ป่วย ทำให้ผู้ป่วยรู้สึกสนุก เพลิดเพลิน ไม่เกินกำลัง มีการวอร์มอัพร่างกาย เพื่อเสริมความยืดหยุ่น และลดการบาดเจ็บระหว่างการออก กำลังกาย</li>
                <li>ทำกิจกรรมส่งเสริมให้มีส่วนร่วมในสังคม   เช่นเป็นอาสาสมัคร    เป็นสมาชิกในคลับต่างๆ   ออกกำลังกายนอกบ้าน เดินเล่นในสวนสาธารณะ   ฟังดนตรี</li>
                <li>ส่งเสริมให้มีการสังสรรค์และมีปฏิสัมพันธ์กับผู้อื่น   ทำความรู้จักและพูดคุยกับเพื่อนบ้าน  นัดพบกลุ่มเพื่อนเก่า ไปเยี่ยมญาติ   เป็นต้น </li>
            </ol>
        </p>
        <p>เอกสารอ้างอิง หนังสือคู่มือแนวทางการป้องกันภาวะสมองเสื่อม สำนักโภชนาการ กรมอนามัย</p>
      </div>
    </div>
    </div>

    <div id="HealthInfoModal5" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">

      <header class="w3-container w3-center w3-padding-32" style="background-color: lightcoral;">
        <h2 class="w3-wide" style="color: white;"><i class="w3-margin-right"></i>ตัวอย่างกิจกรรมที่เหมาะกับคนไข้อัลไซเมอร์</h2>
        <span onclick="document.getElementById('HealthInfoModal5').style.display='none'" class="w3-button w3-display-topleft"><</span>
      </header>

      <div class="w3-container">
        <p>
            <h5>ตัวอย่างกิจกรรมที่เหมาะกับคนไข้อัลไซเมอร์</h5>
            
            <ol>
                <li>การเดิน เพื่อเพิ่มความเพลิดเพลินให้คนไข้อาจเปิดเพลงหรือพาเดินพร้อมสัตว์เลี้ยง เช่น สุนัข</li>
                <li>การวิ่งเยาะๆ   ปั่นจักรยาน เป็นการออกกำลังแบบแอโรบิค ช่วยเพิ่มความแข็งแรงของหัวใจสำหรับผู้ป่วยที่เคยทำกิจกรรมต่างๆเหล่านี้เป็นประจำอยู่แล้ว และอาการสมองเสื่อมยังไม่รุนแรง </li>
                <li>การว่ายน้ำ เป็นการออกกำลังแบบแอโรบิคดีต่อข้อต่อต่างๆและหัวใจ </li>
                <li>รำไทเก็ก ดีกับข้อต่อ ปรับสมดุลย์จากภายในสู่ภายนอก เพิ่มความยืดหยุ่นของร่างกาย</li>
                <li>การทำงานศิลปะ   ปลูกต้นไม้   เล่นดนตรี    เป็นการกระตุ้นให้ใช้นิ้วมือในการหยิบจับ มีส่วนช่วยกระตุ้นความจำและคลายเครียดได้เป็นอย่างดี</li>
            </ol>
        </p>
        <p>เอกสารอ้างอิง หนังสือคู่มือแนวทางการป้องกันภาวะสมองเสื่อม สำนักโภชนาการ กรมอนามัย</p>
      </div>
    </div>
    </div>

    <div id="HealthInfoModal6" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <div class="w3-container">
        <span onclick="document.getElementById('HealthInfoModal6').style.display='none'" class="w3-button w3-display-topleft"><</span>
        <p>
            <img src="img/health_info_TH_1.png" class="w3-round" style="width: 100%; margin-left: 10px">
            
            <p> <br/>&emsp;&emsp;สมองเป็นอวัยวะที่สำคัญ มีหน้าที่เกี่ยวกับการจดจำ ความคิด การเรียนรู้ ความรู้สึก การมองเห็น การได้ยิน ตลอดจนควบคุมการทำ งานของอวัยวะอื่นๆในร่างกาย โดยลักษณะธรรมชาติของสมองน้ันประกอบ ด้วยน้ำไขมัน โปรตีน และคาร์โบไฮเดรต ดังนั้นสารอาหารหลักท่ีสมองต้องการคือ คาร์โบไฮเดรต โปรตีน และ ไขมัน นอกจากนี้สมองยังต้องการวิตามินและแร่ธาตุเพื่อส่งเสริมการทำงานของสมองให้เกิดประสิทธิภาพ บำรุงสมอง ชะลอความเสื่อมของเซลล์ประสาท <br/> &emsp; &emsp;เพื่อเน้นถึงความสำคัญของธรรมชาติของโรคสมองเสื่อมในภาพรวมเป็นไปในทางที่ดีขึ้นแนวทาง การรักษาในปัจจุบันจึงเน้นในการควบคุมปัจจัยเสี่ยงต่อโรคหลอดเลือดสมอง โรคหัวใจและหลอดเลือด</p>

            <h5 style="color:blue;">กินอย่างไร...ห่างไกลภาวะสมองเสื่อม</h5>
            <ol>
                <li>หมั่นดูแลน้ำหนักให้เหมาะสม ให้มีค่าดัชนีมวลกายอยู่ในเกณฑ์ปกติ (BMI) คือ 18.5-22.9 กิโลกรัม/ตารางเมตร</li>
                <li>ควบคุมปัจจัยเสี่ยงต่อการเกิดโรคหัวใจและหลอดเลือด ปัจจัยเสี่ยงที่สำคัญ คือ ภาวะไขมันในเลือดสูง โรคอ้วน น้ำหนักเกิน โรคความดันโลหิตสูง โรคเบาหวาน การสูบบุหรี่และการดื่มแอลกอฮอล์เป็นประจำ ไม่ออกกำลังกาย</li>

                <ol>
                    <li style="color:mediumseagreen;">รักษาระดับน้ำตาลในเลือดให้อยู่ในระดับปกติ</li>
                    <ul>
                        <li><span style="color:mediumseagreen">เลือก</span> กินอาหารให้เป็นเวลา ในสัดส่วนเหมาะสม</li>
                        <li><span style="color:mediumseagreen">เลือก</span> รับประทานกลุ่ม ข้าว-แป้ง จำกัดจำนวน เลือกแบบที่มีคุณภาพ ใยอาหารสูง เช่น ข้าวกล้อง</li>
                        <li><span style="color:mediumseagreen">เลือก</span> เพิ่มการกินผัก</li>
                        <li><span style="color:red;">ลด</span> การกินอาหารหรือเครื่องดื่มที่มีน้ำตาลสูง เช่น น้ำ อัดลม น้ำ หวาน ชา กาแฟ น้ำผลไม้ ที่เติมน้ำตาลสูง ขนมหวาน ไอศกรีม</li>
                    </ul>
                    <li style="color:mediumseagreen">รักษาความดันโลหิตให้อยู่ในระดับปกติ</li>
                    <ul>
                        <li><span style="color:mediumseagreen">เลือก</span> เพิ่มการกินผัก</li>
                        <li><span style="color:red">เลี่ยง</span> การกินอาหารที่โซเดียมสูง โดย</li>
                        <li><span style="color:mediumseagreen">เลือก</span> อาหารที่ไม่เค็มจัด</li>
                        <li><span style="color:red;">ลด</span> การใช้เครื่องปรุงรสในการประกอบอาหาร ลด การเติมปรุงเพิ่ม</li>
                        <li><span style="color:red">เลี่ยง</span> อาหารสำเร็จรูป อาหารแปรรูป เช่น บะหมี่กึ่งสำเร็จรูป ไส้กรอก อาหารแช่เย็น อาหารแช่แข็ง ขนมกรุบกรอบ</li>
                        <li><span style="color:red;">ลด</span> อาหารมัน ทอด กะทิ เนื้อสัตว์ติดมัน</li>
                    </ul>
                    <li style="color:mediumseagreen">รักษาระดับไขมันในเลือดให้ปกติ</li>
                    <ul>
                        <li><span style="color:mediumseagreen">เลือก</span> รับประทานอาหารที่มีไขมันต่ำ</li>
                        <li><span style="color:red;">ลด</span> การกินอาหารที่มีไขมันอิ่มตัวสูง เช่น ไขมันจากสัตว์ กะทิ</li>
                        <li><span style="color:red">เลี่ยง</span> อาหารทอด เบเกอรี่</li>
                    </ul>
                </ol>

                <li>กินอาหารที่อุดมด้วยโฟเลต วิตามีนบี 6 และวิตามีนบี 12 เพื่อควบคุมระดับโฮโมซิสเตอีน (homocysteine) ที่เป็นสาเหตุของโรคหลอดเลือดและหัวใจ ซึ่งจะเป็นปัจจัยเสี่ยงต่อภาวะสมองเสื่อมได้แก่ เนื้อสัตว์ ตับ ปลา อาหารทะเล เช่น หอยนางรม นมวัว นมถั่วเหลือง ไข่ ถั่วแดง ถั่วเหลือง ธัญพืชไม่ขัดสี เป็นต้น ผักใบเขียว เช่น ตำลึง คื่นช่าย ดอกกุ๋ยช่าย ดลไม้ เช่น ส้ม กล้วย เป็นต้น</li>
                <i class="material-icons" style="color:gold">star</i><span style="color:mediumseagreen">วิตามินบี 6 และโฟเลตไม่ทนความร้อนถูกทำลายได้ด้วยการหุงต้ม</span>
                </br>
                <i class="material-icons" style="color:gold">star</i><span style="color:mediumseagreen">วิตามินบี 12 ไม่มีในพืช</span>
                <li>กินอาหารแบบเมดิเตอร์เรเนียน ได้แก่</li>
                <ul>
                    <li>กินคาร์โบไฮเดรตและธัญพืชที่ไม่ฝ่านการขัดสี</li>
                    <li>กินเนื้อปลาเป้นหลัก และเนื้อสัตว์อื่นเล็กน้อย</li>
                    <li>กินอาหารที่มีส่วนประกอบผัก ผลไม้ ไขมันจากน้ำ มันมะกอก</li>
                </ul>
                <li>กินอาหารให้หลากหลายครบ 5 หมู่ ในสัดส่วนที่เหมาะสม</li>
                <li>กินอาหารครบสามมื้อ มื้อเช้าจะทำให้สมองทำงานได้ดี</li>
                <i class="material-icons" style="color:gold">star</i><span style="color:mediumseagreen">มื้อเช้าควรประกอบด้วยอย่างน้อย ข้าว-แป้งหรือธัญพืช และเนื้อสัตว์ เสริมด้วยผักผลไม้</span>
                <li>กินข้าวกล้องแทนข้าวขาว</li>
                <li>เพิ่ม การกินผัก โดยเฉพาะผักที่มีสีเขียวเข้มและหลากสี กินผลไม้อย่างเหมาะสม ควบคมุการกินผลไม้รสหวาน</li>
                <i class="material-icons" style="color:gold">star</i><span style="color:mediumseagreen">ผักและผลไม้ซึ่งอุดมไปด้วยสารต้านอนุมูลอิสระ ใยอาหาร วิตามินซี และโฟเลต</span>
                <li>กินปลาน้ำจืดสลับกับปลาทะเล ไข่ เนื้อสัตว์ไม่ติดมัน ถั่วเมล็ดแห้งและผลิตภัณฑ์ เป็นประจำ</li>
                <li>หลีกเลี่ยงอาหารไขมันสูง อาหารทอด หวานจัด เค็มจัด</li>
                <li>เลือกใช้น้ำมันพืชที่ดีต่อหัวใจและหลอดเลือด เช่น น้ำมันรำข้าว น้ำมันดอกคาโนลา   อย่างเหมาะสมในการประกอบอาหาร</li>
                <li>ดื่มน้ำสะอาดให้เพียงพอ อย่างน้อยวันละ 8 แก้ว</li>
                <li>กินอาหารปลอดภัย ไม่ปนเปื้อนสารโลหะหนัก สารเคมีต่างๆ ยาฆ่าแมลง ดังนั้นควรกินอาหารให้หลากหลาย</li>
                <li>งดหรือลดเครื่องดื่มแอลกอฮอล์ งดสูบบุหรี่ เลี่ยงอยู่ในที่ๆ มีควันบุหรี่</li>
            </ol>

            <br>

            <h5 style="color:blue">&emsp;&emsp;เลือกวัตถุดิบอย่างไรให้ปลอดภัยใส่ใจสุขภาพ...ห่างไกลสมองเสื่อม</h5>
            <p>ปัจจุบันมีการใช้สารเคมีทางเกษตรเพื่อป้องกันและกำจัดศัตรูพืชกันอย่างแพร่หลายและมีมากมาย หลายชนิด แม้ว่าจะมีหน่วยงานควบคุมดูแลการนำไปใช้ก็ตาม แต่ก็ยังมีเกษตรกรที่ขาดความรู้และความเข้าใจ ที่ถูกต้อง โดยมีการใช้มากเกินปริมาณที่กำหนด หรือใช้ร่วมกันหลายชนิด มีการเก็บผลผลิตก่อนระยะเวลาที่สารเคมีจะสลายตัว หมด ทำให้มีสารเคมีตกค้างอยู่ในผักสด โดยเฉพาะผักที่นิยมบริโภคกันทั่วไป เช่น ผักคะน้า กวางตุ้ง กะหล่ำปลี ถั่วฝักยาว ที่มักตรวจพบสารเคีมตกค้างอยู่เสมอ รวมทั้งอาจมีสารพิษที่ตกค้างอยู่ในดิน และน้ำที่เป็นแหล่งเพาะปลูกอีกด้วย ซึ่งสารเคมีที่ได้รับบางชนิดจะทำลายระบบประสาทส่วนกลาง ทำให้เซลล์ ประสาททำงานผิดปกติ มีอาการชาตามใบหน้า ลิ้น ริมฝีปาก และชักได้    สารเคมีบางชนิดอาจทำลายเอนไซม์ของ ระบบประสาท ทำให้การทำงานของระบบประสาทผิดปกติไป</p>
            <h5 style="color:blue">&emsp;&emsp;อันตรายจากการใช้สารเคมีเติมแต่งผักและผลไม้</h5>
            <p>เกิดจากการใช้สารเคมีที่ไม่อนุญาตให้ปนเปื้อนในอาหารมาใช้เพื่อทำให้ผักลไม้ ดูสด หรือมีสีสันขาว สะอาดน่ารัเบประทาน ทั้งนี้เนื่องจากพ่อค้า แม่ค้า ในตลาดสดพยายามที่จะทำให้ผักสดคงสภาพสดอยู่เสมอ ไม่เหี่ยวหรือเน่าเสีย โดยมีการนำสารเคมีประเภทฟอร์มาลีนหรือบอแรกซ์ผสมน้ำแล้วนำมาราด หรือแช่ผักสด รวมทั้งการใช้สารฟอกขาวที่ห้ามใช้ มาแช่ผักสดประเภทข้าวโพดอ่อน ขิงหั่นฝอย หน่อไม้สดหั่นฝอย เพื่อให้มี สีขาวน่ารับประทาน ซึ่งหากล้างไม่สะอาดเหลือตกค้างในผักสดจะทำให้ผู้บริโภคเกิดอันตรายได้</p>
            <h5 style="color:blue">การเลือกซื้อผัก</h5>
            <ol>
                <li>เลือกซื้อผักสดที่มีรูพรุนเป็นรอยกัดแทะ ของหนอนแมลงอยู่บ้างเพราะหนอนกัดเจาะผักได้ แสดงว่ามีสารพิษกำจัดศัตรูพืชในปริมาณที่ไม่เป็นอันตรายมาก ไม่ควรเลือกซื้อผักที่มีใบสวยงาม</li>
                <li>เลือกซื้อผักสดอนามัยหรือผักกางมุ้ง จากแหล่งเพาะปลูกที่เชื่อถือได้ เช่น โครงการพิเศษของ กรมวิชาการเกษตร กระทรวงเกษตรและสหกรณ์ หรือสับเปลี่ยนแหล่งที่ซื้ออยู่เสมอ</li>
                <li>เลือกกินผักตามฤดูกาล เนื่องจากผักที่ปลูกตามฤดูกาลจะมีโอกาสเจริญเติบโตได้ดีกีว่านอกฤดูกาลทำให้ลดการใช้สารเคมีและปุ๋ยลงได้</li>
                <li>เลือกกินผักพื้นบ้าน เช่น ผักแว่น ผักหวาน ใบย่านาง ใบเหลียง ใบยอ ใบกระถิน ยอดแค หรือ ผักที่สามารถปลูกได้เองง่ายๆ</li></li>
                <li>ไม่กินผักชนิดใดชนิดหนึ่งเป็นประจำ ควรกินให้หลากหลาย สับเปลี่ยนเพื่อหลีกเลี่ยงการรับพิษ สะสมและได้ประโยชน์ทางโภชนาการ</li>
            </ol>
            <h5 style="color:blue">การล้างผักสดและผลไม้</h5>
            <ol>
                <li>ปอกเปลือกหรือลอกเปลือกชั้นนอกของผักสดหรือผลไม้ออกทิ้ง</li>
                <li>ล้างผักด้วยน้ำสะอาดหลายๆ ครั้ง และคลี่ใบถู หรือล้างด้วยการใช้น้ำก๊อกไหลผานผักสดนาน อย่างน้อย 2 นาที หรือใช้สารละลายอื่นๆ ในการล้างดังนี้</li>
                <ol>
                    <li>ใช้ผงโซดาหรือผงฟูที่ใช้ปรุงอาหาร (โซเดียมไบคาร์บอเนต 1 ช้อนโต๊ะต่อน้ำ 4 ลิตร)</li>
                    <li>ใช้น้ำส้มสายชู (น้ำส้มสายชู 1/2 ถ้วยต่อน้ำ 4 ลิตร)</li>
                    <li>ใช้น้ำเกลือ (เกลือ 2 ช้อนโต๊ะพูนต่อน้ำ 4 ลิตร)</li>
                    <li>ใช้น้ำยาล้างผัก (ส่วนผสมตามวิธีผู้ผลิตแนะนำ)</li>
                </ol>
                <li>นำาผักสดมาล้างด้วยน้ำให้สะอาด</li>
            </ol>
            </br>

            <h4 style="color:mediumseagreen">การเก็บรักษาอาหารให้คงคุณภาพ</h4>
            <h5 style="color:mediumseagreen">หลักการเก็บอาหารในตู้เย็น</h5>
            <ul>
                <li>ช่องแช่แข็ง (-18 องศาเซลเซียส) เก็บเนื้อสัตว์สดและผลิตภัณฑ์อาหารอื่นที่ต้องการความเย็นจัด เช่น ไอศกรีม น้ำแข็ง เป็นต้น</li>
                <li>ช่องเย็นที่สุด (0-5 องศาเซลเซียส) สำหรับอาหารที่ต้องการความเย็นมาก แต่ไม่ต้องแช่แข็ง เช่น อาหารพร้อมปรุง น้ำสลัด อาหารปรุงสำเร็จเป็นต้น</li>
                <li>ช่องเย็นธรรมดา (5-7 องศาเซลเซียส) สำหรับอาหารที่ไม่ต้องการความเย็นมาก เช่น นม โยเกิร์ต น้ำผลไม้ ไข่ น้ำดื่ม เป็นต้น</li>
                <li>ช่องเก็บผัก (8-10 องศาเซลเซียส) สำหรับเก็บผัก/ผลไม้</li>
            </ul>
            <h5 style="color:mediumseagreen">อุณหภูมิที่เหมาะสมในการเก็บอาหาร</h5>
            <img src="img/table_TH_img1.png" class="w3-round" style="width: 100%; margin-left: 10px">
            <h5 style="color:mediumseagreen">กํารเลือกซื้ออาหารให้ปลอดสารพิษ</h5>
            <img src="img/table_TH_img2.png" class="w3-round" style="width: 100%; margin-left: 10px">
            <br>

            <h3 style="color: blue";>อาหารบำรุงสมอง</h3>
            <h5 style="color: blue";>ข้าวกล้อง ข้าวไม่ขัดสี ธัญพืชไม่ขัดสี</h5>
            <p>&emsp;&emsp;อุดมไปด้วยคาร์โบไฮเดรตให้พลังงาน สารอาหาร วิตามินและแร่ธาตุที่มีประโยชน์ช่วยให้สุขภาพดี และป้องกันโรคต่างๆ มีวิตามินบี 1 ซึ่งมีส่วนช่วยในการบำรุงสมอง ป้องกันโรคเหน็บชา ปากนกกระจอก ภาวะโลหิตจาง ช่วยเพิ่มสารสื่อประสาท ซีโรโทนินทำให้หลับสบาย มีใยอาหารช่วยลดระดับคอเลสเตอรอล ในเลือด ชะลอการดูดซึมน้ำตาล</p>
            <h5 style="color: blue";>ปลา</h5>
            <p>&emsp;&emsp;ปลา เป็นโปรตีนที่ดี ย่อยง่าย มีไขมันน้อย มีกรดไขมันที่ดี กินปลาแทนเนื้อสัตว์อื่นๆ เป็นประจำจะช่วยลดปริมาณไขมันในเลือด มีประโยชน์ที่เป็นส่วนประกอบสำคัญของสมอง ที่ช่วยพัฒนาเนื้อเยื่อของระบบประสาท เลือกรับประทานปลาหลายชนิดสลับหมุนเวียนกันไป เพื่อป้องกันการได้รับสารพิษตกค้างเกินที่อาจอยู่ในเนื้อปลา เลือกกินปลาแทนเนื้อสัตว์ใหญ่ เป๊นประจำจะช่วยลดปริมาณไขมันในเลือด ในหนึ่งสัปดาห์ควร รับประทานปลาทะเลสลับกับปลาน้ำจืด เช่น ปลาแซลมอน ปลาทูน่า ปลาซาดีน ปลาแมลคอเรล ปลาทู ปลากะพงขาว ปลาจาระเม็ดขาว ปลาสำลี ปลาดุก ปลาช่อน ปลานิล<span style="color:deeppink">อย่างน้อยสัปดาห์ละ 3-5 ครั้ง</span>ทำให้สุกเพื่อป้องกันพยาธิและแบคทีเรียต่างๆ โดยวิธีการปรุงอาหารควรใช้การนึ่ง ต้ม หรือย่าง หลีกเลี่ยงการทอด</p>
            <h5 style="color: blue";>อาหารทะเล</h5>
            <p>&emsp;&emsp;เป็นแหล่งของ ทอรีน สังกะสี วิตามินบี 12 ซึ่งมีผลต่อสมองและจอประสาทตา มีบทบาทช่วยเสริม สร้างการทำงานของระบบประสาท เนื้อสมอง และกล้ามเนื้อส่วนต่างๆ ในร่างกาย นอกจากนี้ยังมีไอโอดีน ซึ่งช่วยป้องกันโรคคอพอก และช่วยในกระบวนการทำงานของสมอง ดังนั้นควรรับประทานอาหารทะเล<span style="color:deeppink;">อย่างน้อยสัปดาห์ละ 3-5 ครั้ง</span></p>
            <h5 style="color: blue";>เนื้อสัตว์</h5>
            <p>&emsp;&emsp;อุดมไปด้วยโปรตีนซึ่งทำหน้าที่ช่วยเป้นสารสื่อระหว่างเซลล์กับเซลล์ นอกจากนี้ในเนื้อสัตว์ยังมี วิตามินบี ทอรีน ธาตุเหล็ก มีบทบาทช่วยเสริมสร้างการทำงานของระบบประสาท เนื้อสมอง การสร้าง ฮีโมโกลบิน และกล้ามเนื้อส่วนต่างๆ ในร่างกาย ควรเลือกรับประทานเนื้อสัตว์ชนิดไม่ติดมัน ปริมาณเนื้อสัตว์ ที่แนะนำต่อวันสำหรับ ผู้สูงอายุวันละ 6-8 ช้อนกินข้าว (ขึ้นอยู่กับกิจกรรม) ผู้สูงอายุควรกินอาหารที่มี ธาตุเหล็ก เช่น ตับ<span style="color:deeppink;">สัปดาห์ละ 3-5 ครั้ง</span></p>
            <h5 style="color: blue";>ไข่</h5>
            <p>&emsp;&emsp;ไข่ไก่ 1 ฟอง มีน้ำหนักเฉลี่ยประมาณ 50 กรัม ให้พลังงาน 80 กิโลแคลอรี โปรตีน 7 กรัม ไข่มี โปรตีนที่มีคุณค่าสูงคือมี high biological value หมายความว่ามีกรดอะมิโนจำเป็นครบถ้วนและปริมาณสูง วิธีการปรุงหรือกินก็ง่าย ควรปรุงให้สุก ไข่แดงอุดมไปด้วยโคลีน ทอรีน โผเลตและวิตามินสำคัญ มีบทบาท ต่อการพัฒนาสมอง และมีประโยชน์อย่างมากต่อระบบความจำ<span style="color:deeppink;">ผู้สูงอายุที่ไม่มีปัญหาสุขภาพกินไข่ได้วันละ 1 ฝอง  ผู้ที่มีปัญหาไขมันในเลือดสูง โรคเบาหวาน โรคความดันโลหิตสูง ควรกินไข่ไม่เกินสัปดาห์ละ 3 ฝอง หรือทำตามคำแนะนำของแพทย์ ที่สำคัญควรปรุงให้สุกทุกครั้ง</span></p>
            <h5 style="color: blue";>ธัญชาติและถั่วเมล็ดแห้ง</h5>
            <p>&emsp;&emsp;เป็นแหล่งอาหารโปรตีนที่ดีอีกชนิดที่หาซื้อได้ง่าย ราคาถูก และมีวิตามินบี 1 ซึ่งมีส่วนช่วยในการ บำรุงสมอง พบมากในงา ข้าวโพด ข้าว ถั่วเหลือง ถั่วเขียว ถั่วดำ ถั่วแดง ถั่วลิสง ผลิตภัณฑ์จากถั่วเมล็ดแห้ง ได้แก่ เต้าหู้ น้ำนมถั่วเหลือง หรือ น้ำเต้าหู้ ตลอดจนขนมที่ทำจากถั่ว ถั่วเหลืองมีสารไฟโตเอสโตรเจนที่สามารถป้องกันโรคมะเร็ง สำหรับผู้สูงอายุหากรับประทานงาแนะนำให้รับประทานงาคั่วบด เพราะจะช่วยให้ย่อยได้ ดีกว่าการรับประทานเป็นเม็ด ควรกินสลับกับเนื้อสัตว์ จะทำให้ร่างกายได้สารอาหารที่ครบถ้วนยิ่งขึ้น</p>
            <h5 style="color: blue";>นม</h5>
            <p>&emsp;&emsp;เป็นแหล่งโปรตีนคุณภาพดี อุดมด้วยแคลเซียม (มีปริมาณมากและดูดซึมได้ดีที่สุด) และฟอสฟอรัส ที่ช่วยให้กระดูกและฟันแข็งแรง นม 1 แก้ว (200 มิลลิลิตร) ให้โปรตีนประมาณ 7 กรัม ผู้สูงอายุแนะนำ<span style="color:deeppink;">ให้ดื่มนมรสจืดวันละ 1-2 แก้ว</span>หากมีปัญหาอ้วน ไขมันในเลือดสูงเลือกสูตรพร่องมันเนย เพื่อให้ได้รับแร่ธาตุ แคลเซียมเพียงพอ ป้องกันภาวะกระดูกพรุน</p>
            <p>&emsp;&emsp;ส่วนในกรณีของการเกิดท้องอืด ท้องเสีย หลังการดื่มนม ไม้ใช่การแพ้ แต่เป็น เรื่องของการขาดเอนไซม์ ที่ชื่อว่า แลกเตส (lactase) ซึ่งเป็นเอนไซม์ไว้สำหรับย่อยน้ำตาลในนม วิธีแก้คือ ค่อยๆ ดื่มทีละน้อย (ไม่เกินครึ้งแก้ว) ต่อครัง ควรดื่มนมหลังอาหารไม่ดื่มนมขณะที่ท้องว่างและเพิ่มเป็นครั้งละหนึ่งแก้วได้ในเวลาประมาณ 1-2 สัปดาห์ ก็จะช่วยให้อาการเบาลงสามารถดื่มนมได้ดีขึ้น หรือกินผลิตภัณฑ์นมที่ผ่านการย่อยนำ้ตาล แลกโตสบางส่วนโดยจุลินทรีย์ เช่น ผลิตภัณฑ์โยเกิร์ต หรือนมที่ปราศจากแลกโตส (lactose)</p>
            <h5 style="color: blue";>ใช้น้ำมันหลากหลายสลับชนิดกันไป เลือกชนิดให้เหมาะกับการประกอบอาหาร</h5>
            <p>&emsp;&emsp;มีความสำคัญในการสร้างเยื่อหุ้มเซลล์ประสาทและเยื่อบุผิวของเนื้อเยื่อสมอง เป็นแหล่ง ของวิตามินอีควรเลือกรับประทานเฉพาะไขมันหรือน้ำมันที่มีไขมันไม่อิ่มตัวสูง เช่น น้ำ มันถั่วเหลือง น้ำมันรำข้าว ข้าวโพด ดอกคำฝอย ทานตะวัน น้ำมันงา น้ำมันมะกอก น้ำมันคาโนลา ฯลฯ สลับชนิดกันไป เพื่อให้ได้รับกรดไขมันที่หลากหลาย ควรใช้น้ำมันที่ปรุงอาหารในปริมาณที่พอเหมาะไม่เกิน 6 ช้อนชาต่อวัน และเลือกใช้ชนิดของน้ำมันให้เหมาะสมกับวิธีการปรุงอาหาร</p>
            <p>&emsp;&emsp;<span style="color: mediumseagreen;">สลัด : </span>น้ำมันมะกอก น้ำมันงา น้ำมันถั่วเหลือง</p>
            <p>&emsp;&emsp;<span style="color: mediumseagreen;">ผัดไฟอ่อนๆ : </span>น้ำมันถั่วเหลือง น้ำมันดอกทานตะวัน น้ำมันดอกคำฝอย น้ำมันข้าวโพด</p>
            <p>&emsp;&emsp;<span style="color: mediumseagreen;">ผัดไหธรรมดา : </span>น้ำมันรำข้าว น้ำมันเมล็ดชา น้ำมันคาโนล่า</p>
            <p>&emsp;&emsp;<span style="color: mediumseagreen;">ทอด : </span>น้ำมันปาล์ม</p>
            <h5 style="color: blue";>ผัก ผลไม้ต่างๆ</h5>
            <p>&emsp;&emsp;ผัก ผลไม้อุดมด้วยวิตามินและแร่ธาตุ เป็นแหล่งของวิตามินเอ ซี อี เบตาแคโรทีน ใยอาหาร และ สารต้านอนุมูลอิสระ ใยอาหารจะช่วยในการขับถ่าย ลดการสะสมของคอเลสเตอรอล ชะลอการดูดซึมน้ำตาล และดูดซัปสารพิษที่ก่อมะเร็งบางชนิด ผักผลไม้เป็นแหล่งวิตามิน และสารต้านอนุมูลอิสระ ช่วยปกป้อง เยื่อสมองจากอนุมูลอิสระที่ทำให้เกิดสมองเสื่อม จึงอาจช่วยป้องกันโรคอัลไซเมอร์ได้ แนะนำให้รับประทานผัก สีเขียวเข้มๆ และหลากหลายสี กินผลไม้หลังอาหารหรือเป็นอาหารว่าง ควบคุมการกินผลไม้รสหวาน ควรเลือกกินผักผลไม้ให้หลากหลายสลับชนิดกันไป การกินผักและผลไม้ปริมาณมากสามารถลดการเกิด โรคสมองเสื่อมได้</p>


        </p>
        <p>เอกสารอ้างอิง หนังสือคู่มือแนวทางการป้องกันภาวะสมองเสื่อม สำนักโภชนาการ กรมอนามัย</p>
      </div>
    </div>
    </div> 

    <div id="HealthInfoModal7" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
        <div class="w3-container">
            <span onclick="document.getElementById('HealthInfoModal7').style.display='none'" class="w3-button w3-display-topleft"><</span>
            <p>
                <img src="img/health_info_TH_2.png" class="w3-round" style="width: 100%; margin-left: 10px">
            </p>
            <p>เอกสารอ้างอิง หนังสือคู่มือแนวทางการป้องกันภาวะสมองเสื่อม สำนักโภชนาการ กรมอนามัย</p>
        </div>
    </div>
    </div> 

    <div id="HealthInfoModal8" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
        <header class="w3-container w3-center w3-padding-32" style="background-color: mediumseagreen;">
        <h2 class="w3-wide" style="color: white;"><i class="w3-margin-right"></i>เมนูอาหาร...ห่างไกลสมองเสื่อม</h2>
        </header>
        <div class="w3-container">
            <span onclick="document.getElementById('HealthInfoModal8').style.display='none'" class="w3-button w3-display-topleft"><</span>
            <p>
                <img src="img/recipe_TH_img1.png" class="w3-round" style="width: 100%; margin-left: 10px">
                <img src="img/recipe_TH_img2.png" class="w3-round" style="width: 100%; margin-left: 10px">
                <img src="img/recipe_TH_img3.png" class="w3-round" style="width: 100%; margin-left: 10px">
                <img src="img/recipe_TH_img4.png" class="w3-round" style="width: 100%; margin-left: 10px">
                <img src="img/recipe_TH_img5.png" class="w3-round" style="width: 100%; margin-left: 10px">
                <img src="img/recipe_TH_img6.png" class="w3-round" style="width: 100%; margin-left: 10px">
                <img src="img/recipe_TH_img7.png" class="w3-round" style="width: 100%; margin-left: 10px">
                <img src="img/recipe_TH_img8.png" class="w3-round" style="width: 100%; margin-left: 10px">
                <img src="img/recipe_TH_img9.png" class="w3-round" style="width: 100%; margin-left: 10px">
            </p>
            <p>เอกสารอ้างอิง หนังสือคู่มือแนวทางการป้องกันภาวะสมองเสื่อม สำนักโภชนาการ กรมอนามัย</p>
        </div>
    </div>
    </div> 


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

    // Used to toggle the menu on small screens when clicking on the menu button
    function myFunction() {
      var x = document.getElementById("navDemo");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else { 
        x.className = x.className.replace(" w3-show", "");
      }
    }

    var HealthInfoModal = document.getElementById('HealthInfoModal');
    var OurServicesModal = document.getElementById('OurServicesModal');
    var AboutUsModal = document.getElementById('AboutUsModal');
    var HealthInfoModal1 = document.getElementById('HealthInfoModal1');
    var HealthInfoModal2 = document.getElementById('HealthInfoModal2');
    var HealthInfoModal3 = document.getElementById('HealthInfoModal3');
    var HealthInfoModal4 = document.getElementById('HealthInfoModal4');
    var HealthInfoModal5 = document.getElementById('HealthInfoModal5');
    var HealthInfoModal6 = document.getElementById('HealthInfoModal6');
    var HealthInfoModal7 = document.getElementById('HealthInfoModal7');
    var HealthInfoModal8 = document.getElementById('HealthInfoModal8');
    window.onclick = function(event) {
        if (event.target == HealthInfoModal) {
            HealthInfoModal.style.display = "none";
        }
        if (event.target == OurServicesModal) {
            OurServicesModal.style.display = "none";
        }
        if (event.target == AboutUsModal) {
            AboutUsModal.style.display = "none";
        }
        if (event.target == HealthInfoModal1) {
            HealthInfoModal1.style.display = "none";
        }
        if (event.target == HealthInfoModal2) {
            HealthInfoModal2.style.display = "none";
        }
        if (event.target == HealthInfoModal3) {
            HealthInfoModal3.style.display = "none";
        }
        if (event.target == HealthInfoModal4) {
            HealthInfoModal4.style.display = "none";
        }
        if (event.target == HealthInfoModal5) {
            HealthInfoModal5.style.display = "none";
        }
        if (event.target == HealthInfoModal6) {
            HealthInfoModal6.style.display = "none";
        }
        if (event.target == HealthInfoModal7) {
            HealthInfoModal7.style.display = "none";
        }
        if (event.target == HealthInfoModal8) {
            HealthInfoModal8.style.display = "none";
        }
    }
    </script>
    </body>
</html>