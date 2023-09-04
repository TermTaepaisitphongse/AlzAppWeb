<?php 
session_start();
if (empty($_SESSION["username"]))
{
    // Redirect user to log in page
    header("location: ../login.php");
}
?>

<?php
    require_once "db.php";

    $json = array();
    $sqlQuery = "SELECT * FROM CalendarDB where users = '".$_SESSION["username"]."'";

    $result = mysqli_query($conn, $sqlQuery);
    $eventArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($eventArray, $row);
    }
    mysqli_free_result($result);

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
<title>Calendar - ALzApp</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Bootstrap core CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">
<link rel="stylesheet" href="fullcalendar/fullcalendar.min.css">

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="fullcalendar/lib/jquery.min.js"></script>
<script src="fullcalendar/lib/moment.min.js"></script>
<script src="fullcalendar/fullcalendar.min.js"></script>

<script>
$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: <?php echo json_encode($eventArray)?>,
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Event Title:');
            var session = "<?php echo $_SESSION['username'];?>";

            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                $.ajax({
                    url: 'add-event.php',
                    type: "POST",
                    success: function (data) {
                        displayMessage("Added Successfully");
                        //add the below record
                        window.location.href = "add-event.php?title=" + title + "&start=" + start + "&end=" + end + "&users=" + session;
                    }
                });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true
                        );
            }
            calendar.fullCalendar('unselect');
        },
        
        editable: true,
        eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'edit-event.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                },
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");

            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "delete-event.php",
                    data: "&id=" + event.id,
                    success: function (response) {
                        //add the below record
                        window.location.href = "delete-event.php?id="+ event.id;
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            
                        }
                    }
                });
            }
            location.reload();
        }

    });
});

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}
</script>
</head>
<style>
body {
    background-color: #f8f9fa;
    font-family: din alternate;
    margin-top: 0px;
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
#calendar {
    width: 700px;
    margin: 0 auto;
}
.response {
    height: 60px;
}
.success {
    background: #cdf3cd;
    padding: 10px 60px;
    border: #c3e6c3 1px solid;
    display: inline-block;
}
. carousel-inner img{
    height: 500px;
    object-fit: fill;
}
.card img{
    width: 100%;
    height: 50%;
}
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand mb-0 h1" href="../homescreen.php" style="color: white">AlzApp</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample09">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Services
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../medical_records.php">Medical Records</a>
                        <a class="dropdown-item" href="../To_do_list.php">To Do List</a>
                        <a class="dropdown-item" href="index.php">Schedule</a>
                        <a class="dropdown-item" href="../games.php">Brain Games</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    About Us
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="../our_story.php">Our Story</a>
                      <a class="dropdown-item" href="../feedback.php">Feedback</a>
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
                    <a class="nav-link" href="../logout.php">Log Out</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="index.php" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-us"> </span> English</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown09">
                        <a class="dropdown-item" href="index_TH.php"><span class="flag-icon flag-icon-th"> </span>  Thai</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="w3-container">
        <div class="response" style="margin-top: -40px; text-align: center; "></div>
        <div id='calendar'></div>  
    </div>
</body>
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
  </script>
</html>