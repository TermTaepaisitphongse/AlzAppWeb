<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to homescreen page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: homescreen.php");
  exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            //session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to homescreen page
                            header("location: homescreen.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/login_style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <style type="text/css">
        body{ 
            
            font-family: din alternate;
            background: rgb(2,0,36);
            background: linear-gradient(30deg, rgba(2,0,36,0.8463760504201681) 0%, rgba(229,229,224,1) 100%, rgba(0,212,255,1) 100%);
        }
        .card-title{
            font-family: din alternate;
        }
        .mainLoginInput::-webkit-input-placeholder { 
            font-family: FontAwesome;
            font-weight: light;
            overflow: visible;
            vertical-align: top;
            display: inline-block !important;
            padding-left: 5px;
            padding-top: 2px;
        }
        input[type=submit] {
            width: 380px
        }
    </style>
</head>
<body>
    <div class="wrapper fadeIndown">
        <div id="formContent">
        <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="img/logo.png" id="icon"/>
            </div>
                
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="padding-top: 30%">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <input type="text" name="username" class="fadeIn second; mainLoginInput" value="<?php echo $username; ?>" placeholder="&#61447; Username" style="text-align: left">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>    
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <input type="password" name="password" class="fadeIn third; mainLoginInput" placeholder="&#61475; Password" style="text-align: left">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                </br>
                <div class="form-group">
                    <input type="submit" class="fadeIn fourth" value="Login" style="background-color: #4B5C7B; box-shadow: none">
                </div>
                             <!-- Remind Passowrd -->
                <div id="formFooter" style="font-size: 14px">
                   <p>Don't have an account? <a style="color: #4B5C7B" href="register.php">Sign up now</a>.</p>
                </div>
            </form>   
        </div>
    </div>   
</body>
</html>