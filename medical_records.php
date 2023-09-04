<?php 
session_start();
ob_start();
require 'db_conn.php';
if (empty($_SESSION["username"]))
{
    // Redirect user to log in page
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Medical Records - AlzApp</title>
        <!-- Bootstrap core CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        
        <!-- table -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>-->
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
        .card-title{
            font-family: Taviraj;
        }
        .table-wrapper {
            width: 1100px;
            margin-top: 30px;
            background: #f8f9fa;
            padding: 20px; 
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }
        .table-title h2 {
            margin: 6px 0 0;
            font-size: 22px;
        }
        .table-title .add-new {
            float: right;
            height: 30px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 50px;
            border-radius: 50px;
            line-height: 13px;
            background-color: #4B5C7B;
        }
        .table-title .add-new i {
            margin-right: 4px;
        }
        table.table {
            table-layout: auto;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }
        table.table th:last-child {
            width: 50px;
        }
        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 0px;
        }    
        table.table td a.add {
            color: #27C46B;
        }
        table.table td a.edit {
            color: #FFC107;
        }
        table.table td a.delete {
            color: #E34724;
        }
        table.table td i {
            font-size: 19px;
        }
        table.table td a.add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }    
        table.table .form-control {
            height: 32px;
            line-height: 32px;
            box-shadow: none;
            border-radius: 2px;
        }
        table.table .form-control.error {
            border-color: #f50000;
        }
        table.table td .add {
            display: none;
        }
        a{
            text-decoration: none;
            color: white;
        }
        #toggleMenu{
            border-color: white;
        }
        </style>
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
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="medical_records.php" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-us"> </span> English</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown09">
                            <a class="dropdown-item" href="medical_records_TH.php"><span class="flag-icon flag-icon-th"> </span>  Thai</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        
        <!-- table -->
        <div class="container-lg">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8"><h2>Patient's Medical Records</h2></div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-info add-new" data-toggle="modal" data-target="#recordModal"><i class="fa fa-plus"></i> New Record</button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th style="width:350px">Date & Time</th>
                                <th style="width:250px">Temperature (°C)</th>
                                <th style="width:350px">Blood Pressure (mmHg)</th>
                                <th style="width:350px">Pulse (BPM)</th>
                                <th style="width:250px">RR</th>
                                <th style="width:350px">DTX (mg%)</th>
                                <th style="width:450px">Notes/Symptoms</th>
                                <th style="width:350px">Action</th>
                            </tr>
                        </thead>
                        <!--Add Items-->
                        <div id="recordModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <form method="post">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add a New Record</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="item_name">Date & Time:</label>
                                                <input type="datetime-local" class="form-control" id="DateTime" name="DateTime" value="<?php date_default_timezone_set("Asia/Bangkok"); echo date('d-m-Y H:i',strtotime($todo['date_time'])); ?>"placeholder="Date - Day-Month-Year; Time - HH:MM" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="item_name">Temperature (°C):</label>
                                                <input type="text" class="form-control" id="Temperature" name="Temperature" placeholder="Temperature (°C)" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="item_name">Blood Pressure (mmHg):</label>
                                                <input type="text" class="form-control" id="BloodPressure" name="BloodPressure" placeholder="Systolic/Diastolic" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="item_name">Pulse (BPM):</label>
                                                <input type="text" class="form-control" id="Pulse" name="Pulse" placeholder="Pulse (BPM, beats per minute)"required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="item_name">RR:</label>
                                                <input type="text" class="form-control" id="RR" name="RR" placeholder="Respiratory Rate (breaths per minute)"required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="item_name">DTX (mg%):</label>
                                                <input type="text" class="form-control" id="DTX" name="DTX" placeholder="Dextrostix (mg%)" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="item_name">Notes/Symptoms:</label>
                                                <input type="text" class="form-control" id="Notes" name="Notes" placeholder="Notes/Symptoms" >
                                                <label for="item_name"> For Example: Medication Taken (time), Medication not prescribed (herbs, non-routine medication, etc), Symptons (physical, mental, behavioural), COVID (Time outside house, people the patient meets, etc) </label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="add_item" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <?php
                         //Add Item        
                            if(isset($_POST['add_item'])){
                                $DateTime = "'".$_POST['DateTime']."'";
                                $Temperature = "'".$_POST['Temperature']."'";
                                $BloodPressure = "'".$_POST['BloodPressure']."'";
                                $Pulse = "'".$_POST['Pulse']."'";
                                $RR = "'".$_POST['RR']."'";
                                $DTX = "'".$_POST['DTX']."'";
                                $Notes = "'".$_POST['Notes']."'";
                                $sql = "INSERT INTO MedicalRecordDB (DateTime,Temperature,BloodPressure,Pulse,RR,DTX,Notes,User)VALUES ($DateTime,$Temperature,$BloodPressure,$Pulse,$RR,$DTX,$Notes,'".$_SESSION["username"]."')";
                                if ($conn->query($sql)) {
                                    header("Location: medical_records.php");							
                                    exit();
                                }
                            }
                        ?>

                        <tbody>
                            <?php
                                $count = 1;
                                $sql = "SELECT MedicalRecordID, DateTime, Temperature, BloodPressure, Pulse, RR, DTX, Notes, User FROM MedicalRecordDB WHERE User='".$_SESSION["username"]."'";
                                $result = $conn->query($sql);
                                if ($result->rowCount() > 0) {
                                    // output data of each row
                                    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                        $id = $row['MedicalRecordID'];
                                        $DateTime = $row['DateTime'];
                                        $Temperature = $row['Temperature'];
                                        $BloodPressure = $row['BloodPressure'];
                                        $Pulse = $row['Pulse'];
                                        $RR = $row['RR'];
                                        $DTX = $row['DTX'];
                                        $Notes = $row['Notes'];
                            

                            ?>
                            <!-- display records -->
                            <tr>
                            <td>
                                <?php echo $count; ?>
                            </td>
                            <td>
                                <?php echo date('d-m-Y H:i',strtotime($DateTime)); ?>
                            </td>
                            <td>
                                <?php echo $Temperature; ?>
                            </td>
                            <td>
                                <?php echo $BloodPressure; ?>
                            </td>
                            <td>
                                <?php echo $Pulse; ?>
                            </td>
                            <td>
                                <?php echo $RR; ?>
                            </td>
                            <td>
                                <?php echo $DTX; ?>
                            </td>
                            <td>
                                <?php echo $Notes; ?>
                            </td>
                            <td>
                                
                                <button type='button' class='btn btn-warning btn-sm' style="width: 50px;"><a href="#edit<?php echo $id;?>" data-toggle="modal">Edit</a></button>
                                <button type='button' class='btn btn-danger btn-sm' style="width: 60px;justify-content: center;"> <a href="#delete<?php echo $id;?>" data-toggle="modal">Delete</a></button>
                                
                            </td>
                            <!--Edit Item Modal -->
                            <div id="edit<?php echo $id; ?>"  class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <form method="post">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update a Record</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="edit_item_id" value="<?php echo $id; ?>">
                                                <div class="form-group">
                                                    <label for="item_name">Date & Time:</label>
                                                    <input type="datetime-local" class="form-control" id="DateTime" name="DateTime" placeholder="Date - Day-Month-Year; Time - HH:MM" value="<?php echo date('d-m-Y H:i',strtotime($todo['date_time'])); ?>"required autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label for="item_name">Temperature (°C):</label>
                                                    <input type="text" class="form-control" id="Temperature" name="Temperature" placeholder="Temperature (°C)" value="<?php echo $Temperature; ?>"required autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label for="item_name">Blood Pressure (mmHg):</label>
                                                    <input type="text" class="form-control" id="BloodPressure" name="BloodPressure" placeholder="Systolic/Diastolic" value="<?php echo $BloodPressure; ?>" required autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label for="item_name">Pulse (BPM):</label>
                                                    <input type="text" class="form-control" id="Pulse" name="Pulse" placeholder="Pulse (BPM, beats per minute)"value="<?php echo $Pulse; ?>" required autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label for="item_name">RR:</label>
                                                    <input type="text" class="form-control" id="RR" name="RR" placeholder="Respiratory Rate (breaths per minute)" value="<?php echo $RR; ?>" required autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label for="item_name">DTX (mg%):</label>
                                                    <input type="text" class="form-control" id="DTX" name="DTX" placeholder="Dextrostix (mg%)" value="<?php echo $DTX; ?>" required autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label for="item_name">Notes/Symptoms:</label>
                                                    <input type="text" class="form-control" id="Notes" name="Notes" placeholder="Notes/Symptoms" value="<?php echo $Notes; ?>"required autofocus>
                                                    <label for="item_name"> *(Medication Taken (time), Medication not prescribed (herbs, non-routine medication, etc), Symptons (physical, mental, behavioural), COVID (Time outside house, people the patient meets, etc) </label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO</button>
                                                    <button type="submit" name="edit_item" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--Delete Modal -->
                            <div id="delete<?php echo $id; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <form method="post">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                                                <div class="alert alert-danger">Are you sure you want to delete?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO</button>
                                                    <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </tr>
                        <?php
                        $count = $count + 1;
                                }
                                //Delete Item
                                if(isset($_POST['delete'])){
                                    $delete_id = $_POST['delete_id'];
                                    $sql = "DELETE FROM MedicalRecordDB WHERE MedicalRecordID='".$delete_id."'";
                                    if ($conn->query($sql)) {
                                        header("Location: medical_records.php");							
                                        exit();
                                    }
                                }
                                //Edit Item
                                if(isset($_POST['edit_item'])){
                                    $edit_item_id = $_POST['edit_item_id'];
                                    $DateTime = "'".$_POST['DateTime']."'";
                                    $Temperature = "'".$_POST['Temperature']."'";
                                    $BloodPressure = "'".$_POST['BloodPressure']."'";
                                    $Pulse = "'".$_POST['Pulse']."'";
                                    $RR = "'".$_POST['RR']."'";
                                    $DTX = "'".$_POST['DTX']."'";
                                    $Notes = "'".$_POST['Notes']."'";
                                    $sql = "UPDATE MedicalRecordDB SET 
                                        DateTime = $DateTime,
                                        Temperature = $Temperature,
                                        BloodPressure = $BloodPressure,
                                        Pulse = $Pulse,
                                        RR = $RR,
                                        DTX = $DTX,
                                        Notes = $Notes
                                        WHERE MedicalRecordID=$edit_item_id";
                                    if ($conn->query($sql)) {
                                        header("Location: medical_records.php");							
                                        exit();
                                    }
                                }
                            } ?>

                        
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
        </script>
    
</html>