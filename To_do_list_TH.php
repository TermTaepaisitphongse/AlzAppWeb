<?php 
require 'db_conn.php';
session_start();
ob_start();
if (empty($_SESSION["username"]))
{
    // Redirect user to log in page
    header("location: login_TH.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Date picker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.th.min.js" integrity="sha512-cp+S0Bkyv7xKBSbmjJR0K7va0cor7vHYhETzm2Jy//ZTQDUvugH/byC4eWuTii9o5HN9msulx2zqhEXWau20Dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<title>สี่งที่ต้องทำ - AlzApp</title>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        html,body {
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
        .add-section,.show-todo-section {
            background-color: #f8f9fa;
        }
        #bold-text {
            font-family: cs prajad;
        }
        #toggleMenu{
            border-color: white;
        }
        </style>
	</style>
</head>
<body>
  <!-- Homescreen -->
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
                    <a class="nav-link" href="logout.php">ออกจากระบบ</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="To_do_list_TH.php" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-th"> </span> ไทย</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown09">
                        <a class="dropdown-item" href="To_do_list.php"><span class="flag-icon flag-icon-us"> </span>  อังกฤษ</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <br>
    <h1 style="text-align: center; font-weight: bold;">รายการสิ่งที่ต้องทำ</h1>
    
    <div class="main-section">
       <div class="add-section">
          <form action="app/add_TH.php" method="POST" autocomplete="off">
             <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                <input type="text" 
                     name="title" 
                     style="border-color: #4B5C7B"
                     placeholder="ต้องกรอกข้อมูลในช่องนี้" />
                <input type="text" id="datepicker" name="datepicker" data-date-language="th-th" value=<?php echo date('d-m-Y H:i',strtotime(date('d-m-Y H:i')."+543 years")); ?>>
            	<input type="time" id="timepicker" name="timepicker" value=<?php date_default_timezone_set("Asia/Bangkok"); echo date('H:i',strtotime(date('d-m-Y H:i')."+543 years"));?>>
            	<script type="text/javascript">
            		var date_start = new Date();
            		var d = new Date();
            	    var year = d.getFullYear();
            	    var month = d.getMonth();
            	    var day = d.getDate();
                	var date_start = new Date(year + 543, month, day);
            		$('#datepicker').datepicker({
            			format:'dd-mm-yyyy',
            			language:'th',
            			clearBtn:true,
            		}
            		);
            	</script>
              <button type="submit" style="background-color: #4B5C7B">เพิ่ม</button>

             <?php }else{ ?>
              <input type="text" 
                     name="title" 
                     style="border-color: #4B5C7B"
                     placeholder="สี่งที่ต้องทำ..." />
                <input type="text" id="datepicker" name="datepicker" data-date-language="th-th" value=<?php echo date('d-m-Y H:i',strtotime(date('d-m-Y H:i')."+543 years")); ?>>
            	<input type="time" id="timepicker" name="timepicker" value=<?php date_default_timezone_set("Asia/Bangkok"); echo date('H:i',strtotime(date('d-m-Y H:i')."+543 years"));?>>
            	<script type="text/javascript">
            		var date_start = new Date();
            		var d = new Date();
            	    var year = d.getFullYear();
            	    var month = d.getMonth();
            	    var day = d.getDate();
                	var date_start = new Date(year + 543, month, day);
            		$('#datepicker').datepicker({
            			format:'dd-mm-yyyy',
            			language:'th',
            			clearBtn:true,
            		}
            		);
            	</script>
              <button type="submit" style="background-color: #4B5C7B">เพิ่ม</button>
             <?php } ?>
          </form>

          <!-- quick action -->
          <div style="text-align: center">
            <br>
            <a href="app/add_medicine_TH.php"><img src="img/todo_img1.jpg"></img></a>
            <a href="app/add_eat_TH.php"><img src="img/todo_img2.jpg"></img></a>
            <a href="app/add_exercise_TH.php"><img src="img/todo_img3.jpg"></img></a>
            <a href="app/add_shower_TH.php"><img src="img/todo_img4.jpg"></img></a>
          </div>

       </div>
       <?php
          $sqlquery = "SELECT * FROM ToDoListDB where users='".$_SESSION["username"]."' ORDER BY id DESC";
          $todos = $conn->query($sqlquery);
       ?>
       <div class="show-todo-section">
            <?php if($todos->rowCount() <= 0){ ?>
                <div class="todo-item">
                    <div class="empty">
                        <img src="img/f.png" width="100%" />
                        <img src="img/Ellipsis.gif" width="80px">
                    </div>
                </div>
            <?php } ?>

            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <span id="<?php echo $todo['id']; ?>"
                          class="remove-to-do">x</span>
                    <?php if($todo['checked']){ ?> 
                        <input type="checkbox"
                               class="check-box"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               checked />
                        <h2 class="checked"><?php echo $todo['title'] ?></h2>
                    <?php }else { ?>
                        <input type="checkbox"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               class="check-box" />
                        <h2><?php echo $todo['title'] ?></h2>
                    <?php } ?>
                    <br>
                    <small>สร้างเมื่อ: <?php echo date('d-m-Y H:i',strtotime($todo['date_time']."+543 years")); ?></small> 
                </div>
            <?php } ?>
       </div>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.remove-to-do').click(function(){
                const id = $(this).attr('id');
                
                $.post("app/remove.php", 
                      {
                          id: id
                      },
                      (data)  => {
                         if(data){
                             //alert("Deleted successfully");
                             $(this).parent().hide(1000);
                             location.reload();
                         }
                         else{
                             alert("Deleted unsuccessfully");
                         }
                      }
                );
            });

            $(".check-box").click(function(e){
                const id = $(this).attr('data-todo-id');
                
                $.post('app/check.php', 
                      {
                          id: id
                      },
                      (data) => {
                          if(data != 'error'){
                              const h2 = $(this).next();
                              if(data === '1'){
                                  h2.removeClass('checked');
                              }else {
                                  h2.addClass('checked');
                              }
                          }
                      }
                );
            });
        });
    </script>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
var d = new Date();
var months = ["มกราคม","กุมภาพันธุ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"];
var days = ["ZERO","๑","๒","๓","๔","๕","๖","๗","๘","๙","๑o","๑๑","๑๒","๑๓","๑๔","๑๕","๑๖","๑๗","๑๘","๑๙","๒o","๒๑","๒๒","๒๓","๒๔","๒๕","๒๖","๒๗","๒๘","๒๙","๓o","๓๑"];
document.getElementById("Demo").innerHTML = days[d.getDate()] + " " + months[d.getMonth()];

</script>
</body>
</html>