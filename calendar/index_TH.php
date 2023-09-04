<?php 
session_start();
if (empty($_SESSION["username"]))
{
    // Redirect user to log in page
    header("location: ../login_TH.php");
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
<title>ตารางเวลา - ALzApp</title>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/th.min.js"></script>

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
                    url: "delete-event_TH.php",
                    data: "&id=" + event.id,
                    success: function (response) {
                        //add the below record
                        window.location.href = "delete-event_TH.php?id="+ event.id;
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
        <a class="navbar-brand mb-0 h1" href="../index.php" style="color: white">AlzApp</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample09">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      บริการ
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../medical_records_TH.php">บันทึกสุขภาพ</a>
                        <a class="dropdown-item" href="../To_do_list_TH.php">สี่งที่ต้องทำ</a>
                        <a class="dropdown-item" href="index_TH.php">ตารางเวลา</a>
                        <a class="dropdown-item" href="../games_TH.php">เกมส์</a>
                   
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    เกี่ยวกับเรา
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="../our_story_TH.php">แรงบันดาลใจของเรา</a>
                      <a class="dropdown-item" href="../feedback_TH.php">แบบสอบถามความพึงพอใจ</a>
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
                    <a class="nav-link" href="../logout.php">ออกจากระบบ</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="index_TH.php" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-th"> </span> ไทย</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown09">
                        <a class="dropdown-item" href="index.php"><span class="flag-icon flag-icon-us"> </span>  อังกฤษ</a>
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
</script>
</html>