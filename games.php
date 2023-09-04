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
        <title>Brain Games - AlzApp</title>
        <!-- Bootstrap core CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="css/Connect4_style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="js/connect_4.js"></script>
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
        .navbar-custom,#title-color{
            background-color: #4B5C7B;
        }
        a,h4:hover,a:hover,h2,.mb-0,#navbarDropdown,#navDemo,.nav-link,#Demo{
            color:white;
            text-decoration: none;
        }
        .carousel-inner img{
            height: 500px;
            object-fit: fill;
        }
        .card img{
            width: 100%;
            height: 50%;
        }
        #img-padding{
            margin-top: 15%; 
            margin-bottom: 5%;
            margin-left: 25%; 
            margin-right: 15%; 
            width: 50%; 
            height: 50%;
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
        #text-style{
            text-align: center; 
            color: grey
        }
        #toggleMenu{
            border-color: white;
        }
        </style>
    </head>
    <body>
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
                        <?php
                            if (empty($_SESSION["username"]))
                            {
                                echo '<a class="nav-link" href="login.php">Login</a>';
                            }
                            else{
                                echo '<a class="nav-link" href="logout.php">Logout</a>';
                            }
                        ?>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="games.php" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-us"> </span> English</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown09">
                            <a class="dropdown-item" href="games_TH.php"><span class="flag-icon flag-icon-th"> </span>  Thai</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        
        <br>
        <h1 style="text-align: center; font-weight: bold;">Games</h1>

        <div class="p-3 mb-2 text-dark">
            
            <div class="w3-row-padding">

                <div class="w3-third" id="card-padding">
                    <a href="https://www.mentalup.co/samples/game-v2/game24?referrer=blog-brain-games-for-adults&page=desktop" target="_blank" rel="noopener noreferrer">
                        <div class="card" id="card-style">
                            <img src="img/games_cardMatching.png" id="img-padding" alt="Card image">
                            <div class="card-body" style="text-align: center;">
                              <h4 class="card-title" id="text-style">Card Matching Game</h4>
                              <p id="text-style"><b>credit: </b>mentalup.co</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="w3-third" id="card-padding">
                    <a href="https://faculty.washington.edu/chudler/java/simon.html" target="_blank" rel="noopener noreferrer">
                        <div class="card" id="card-style" onclick="document.getElementById('OurServicesModal').style.display='block'">
                            <img src="img/games_simonSays.png" id="img-padding" alt="Card image">
                            <div class="card-body" style="text-align: center;">
                              <h4 class="card-title" id="text-style">Simon Says</h4>
                              <p id="text-style"><b>credit: </b>washington.edu</p>
                            </div>
                        </div>
                    </a>
                </div>
                  

                <div class="w3-third" id="card-padding">
                    <a href="https://eslkidsgames.com/2018/02/esl-odd-one-out.html" target="_blank" rel="noopener noreferrer">
                        <div class="card" id="card-style" onclick="document.getElementById('AboutUsModal').style.display='block'">
                            <img src="img/games_oddOneOut.png" id="img-padding" alt="Card image">
                            <div class="card-body" style="text-align: center;">
                              <h4 class="card-title" id="text-style">Odd One Out</h4>
                              <p id="text-style"><b>credit: </b>eslkidsgames.com</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="w3-third" id="card-padding">
                    <a href="https://www.mentalup.co/samples/game-v2/game11?referrer=blog-brain-games-for-adults&page=desktop" target="_blank" rel="noopener noreferrer">
                        <div class="card" id="card-style">
                            <img src="img/games_spotTheDifference.png" id="img-padding" alt="Card image">
                            <div class="card-body" style="text-align: center;">
                              <h4 class="card-title" id="text-style">Spot the Difference</h4>
                              <p id="text-style"><b>credit: </b>mentalup.co</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="w3-third" id="card-padding">
                    <a onclick="document.getElementById('Connect4Modal').style.display='block'">
                        <div class="card" id="card-style" onclick="document.getElementById('OurServicesModal').style.display='block'">
                            <img src="img/games_connectFour.png" id="img-padding" alt="Card image">
                            <div class="card-body" style="text-align: center;">
                              <h4 class="card-title" id="text-style">Connect 4</h4>
                            </div>
                        </div>
                    </a>
                </div>
                  

                <div class="w3-third" id="card-padding">
                    <a href="https://www.thecolor.com/" target="_blank" rel="noopener noreferrer">
                        <div class="card" id="card-style" onclick="document.getElementById('AboutUsModal').style.display='block'">
                            <img src="img/games_coloring.png" id="img-padding" alt="Card image">
                            <div class="card-body" style="text-align: center;">
                              <h4 class="card-title" id="text-style">Coloring</h4>
                              <p id="text-style"><b>credit: </b>thecolor.com</p>
                            </div>
                        </div>
                    </a>
                </div>
                
        <!-- Connect4Modal -->
        <div id="Connect4Modal" class="w3-modal">
            <div class="w3-modal-content w3-animate-top w3-card-4">
                <header class="w3-container w3-center w3-padding-32" id="title-color"> 
                    <h2 class="w3-wide"><i class="w3-margin-right"></i>Connect Four Dots</h2>
                </header>
                <div class="w3-container">
                    <h3 class="player-turn">Hi Player</h3>
                    <div class="container">
                        <table>
                            <tr>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                            </tr>
                            <tr>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                            </tr>
                            <tr>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                            </tr>
                            <tr>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                            </tr>
                            <tr>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                            </tr>
                            <tr>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                                <td class="slot"></td>
                            </tr> 
                         </table>  
                    </div>
                <div class="start" onclick="main()">Start</div>
                <div class="reset">Reset</div>
                <br>
                <br>    
                
              </div>
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
        var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
        var days = ["ZERO","1st","2nd","3rd","4th","5th","6th","7th","8th","9th","10th","11th","12th","13th","14th","15th","16th","17th","18th","19th","20th","21st","22nd","23rd","24th","25th","26th","27th","28th","29th","30th","31st"]
        document.getElementById("Demo").innerHTML = months[d.getMonth()] + " " + days[d.getDate()];

        // Used to toggle the menu on small screens when clicking on the menu button
        function myFunction() {
          var x = document.getElementById("navDemo");
          if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
          } else { 
            x.className = x.className.replace(" w3-show", "");
          }
        }
        
        // When the user clicks anywhere outside of the modal, close it
        var modal1 = document.getElementById('Connect4Modal');
        window.onclick = function(event) {
        if (event.target == modal1) {
        modal1.style.display = "none";
        }
        }
</script>

</html>