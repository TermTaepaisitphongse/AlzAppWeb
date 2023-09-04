<?php 
require 'db_conn.php';
session_start();
ob_start();
if (empty($_SESSION["username"]))
{
    // Redirect user to log in page
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>To-Do List - AlzApp</title>

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
        .add-section,.show-todo-section {
            background-color: #f8f9fa;
        }
        .todo-item {
            background-color: white;
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
        <a class="navbar-brand mb-0 h1" href="homescreen.php" style="color: white">AlzApp</a>
        <button class="navbar-toggler"type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" id="toggleMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="fa fa-bars" aria-hidden="true" style="color:#e6e6ff"></i>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample09">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Services
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="medical_records.php">Medical Records</a>
                        <a class="dropdown-item" href="To_do_list.php">To Do List</a>
                        <a class="dropdown-item" href="calendar/index.php">Schedule</a>
                        <a class="dropdown-item" href="games.php">Brain Games</a>
                   
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    About Us
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="our_story.php">Our Story</a>
                      <a class="dropdown-item" href="feedback.php">Feedback</a>
                </li>
            </ul>
            
            <ul class="navbar-nav">
                <li class="nav-item"></li>
                    <a class="nav-link" style="color: white">Hi <?php echo htmlspecialchars($_SESSION["username"]); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id = "Demo"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="To_do_list.php" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-us"> </span> English</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown09">
                        <a class="dropdown-item" href="To_do_list_TH.php"><span class="flag-icon flag-icon-th"> </span>  Thai</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    
    <br>
    <h1 style="text-align: center; font-weight: bold; color: #4B5C7B">To-Do List</h1>
    
    <div class="main-section">
       <div class="add-section">
          <form action="app/add.php" method="POST" autocomplete="off">
             <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                <input type="text" 
                     name="title" 
                     style="border-color: #4B5C7B"
                     placeholder="This field is required" />
                <input type="datetime-local" id="createddate" name="createddate" placeholder="When will you do?">
              <button type="submit" style="background-color: #4B5C7B;">Add</button>

             <?php }else{ ?>
                <input type="text" 
                     name="title" 
                     placeholder="What do you need to do?" 
                     style="border-color: #4B5C7B; padding-left: 3%"
                />
                <input type="datetime-local" id="createddate" name="createddate" placeholder="When will you do?">
              <button type="submit" style="background-color: #4B5C7B;">Add</button>
             <?php } ?>
          </form>

          <!-- quick action -->
          <div style="text-align: center">
            <br>
            <a href="app/add_medicine.php"><img src="img/todo_img1.jpg"></img></a>
            <a href="app/add_eat.php"><img src="img/todo_img2.jpg"></img></a>
            <a href="app/add_exercise.php"><img src="img/todo_img3.jpg"></img></a>
            <a href="app/add_shower.php"><img src="img/todo_img4.jpg"></img></a>
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
                    <small>created: <?php echo date('d-M-Y H:i',strtotime($todo['date_time'])) ?></small> 
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
                             $(this).parent().hide(600);
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
var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
var days = ["ZERO","1st","2nd","3rd","4th","5th","6th","7th","8th","9th","10th","11th","12th","13th","14th","15th","16th","17th","18th","19th","20th","21st","22nd","23rd","24th","25th","26th","27th","28th","29th","30th","31st"]
document.getElementById("Demo").innerHTML = months[d.getMonth()] + " " + days[d.getDate()];
</script>
</body>
</html>