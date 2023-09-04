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
                        <a class="nav-link dropdown-toggle" href="homescreen.php" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-us"> </span> English</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown09">
                            <a class="dropdown-item" href="index.php"><span class="flag-icon flag-icon-th"> </span>  Thai</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="p-3 mb-2 text-dark">

            <img src="img/homescreen_banner.jpg" id="image-home" class="img-responsive center-block d-block mx-auto">


            <div class="w3-row-padding">
            
            <div class="w3-third" id="card-padding">
                <div class="card" id="card-style" onclick="document.getElementById('HealthInfoModal').style.display='block'">
                    <img src="img/homescreen_healthInfo.svg" id="img-padding" alt="Card image">
                    <div class="card-body" style="text-align: center;">
                      <h4 class="card-title" id="text-style">Health Info</h4>
                    </div>
                </div>
            </div>
            
            <div class="w3-third" id="card-padding">
                <div class="card" id="card-style" onclick="document.getElementById('OurServicesModal').style.display='block'">
                    <img src="img/homescreen_ourServices.svg" id="img-padding" alt="Card image">
                    <div class="card-body" style="text-align: center;">
                      <h4 class="card-title" id="text-style">Our Services</h4>
                    </div>
                </div>
            </div>
              

            <div class="w3-third" id="card-padding">
                <div class="card" id="card-style" onclick="document.getElementById('AboutUsModal').style.display='block'">
                    <img src="img/homescreen_aboutUs.svg" id="img-padding" alt="Card image">
                    <div class="card-body" style="text-align: center;">
                      <h4 class="card-title" id="text-style">About Us</h4>
                    </div>
                </div>
            </div>

            </div>

        </div>

    </head>

    <div id="HealthInfoModal" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">

        <header class="w3-container w3-center w3-padding-32" id="title-color"> 
            <h2 class="w3-wide" style="color: white;"><i class="w3-margin-right"></i>Categories</h2>
            <span onclick="document.getElementById('HealthInfoModal').style.display='none'" class="w3-button w3-display-topleft">x</span>
        </header>

      <div class="w3-container">
        <div class="w3-row-padding">
            
        <div class="w3-quarter" id="card-padding">
            <div class="card" style="border-color: lightcoral;" id="card-style" onclick="document.getElementById('HealthInfoModal1').style.display='block'">
                <img src="img/homescreen_healthInfo.svg" id="img-padding" alt="Card image">
                <div class="card-body" style="text-align: center;">
                  <h4 class="card-title" id="text-style">Common Changes in Personality and Behavior</h4>
                </div>
            </div>
        </div>
        
        <div class="w3-quarter" id="card-padding">
            <div class="card" style="border-color: khaki;" id="card-style" onclick="document.getElementById('HealthInfoModal2').style.display='block'">
                <img src="img/homescreen_healthInfo.svg" id="img-padding" alt="Card image">
                <div class="card-body" style="text-align: center;">
                  <h4 class="card-title" id="text-style">How to Cope with Patients with Alzheimer's</h4>
                </div>
            </div>
        </div>

        <div class="w3-quarter" id="card-padding">
            <div class="card" style="border-color: thistle;" id="card-style" onclick="document.getElementById('HealthInfoModal3').style.display='block'">
                <img src="img/homescreen_healthInfo.svg" id="img-padding" alt="Card image">
                <div class="card-body" style="text-align: center;">
                  <h4 class="card-title" id="text-style">Ways to Slow Down Alzheimer's<br></h4>
                </div>
            </div>
        </div>

        <div class="w3-quarter" id="card-padding">
            <div class="card" style="border-color: mediumseagreen;" id="card-style" onclick="document.getElementById('HealthInfoModal4').style.display='block'">
                <img src="img/homescreen_healthInfo.svg" id="img-padding" alt="Card image">
                <div class="card-body" style="text-align: center;">
                  <h4 class="card-title" id="text-style">Diagnosis of Alzheimer’s<br></h4>
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
            <h2 class="w3-wide" style="color: white;"><i class="w3-margin-right"></i>Services</h2>
            <span onclick="document.getElementById('OurServicesModal').style.display='none'" class="w3-button w3-display-topleft">x</span>
        </header>

      <div class="w3-container">
        <div class="w3-row-padding">
            
        <div class="w3-quarter" id="card-padding">
            <a href="medical_records.php">
                <div class="card" id="card-style">
                    <img src="img/medical_records.png" style="border-radius: 50%" id="img-padding" alt="Card image">
                    <div class="card-body" style="text-align: center;">
                      <h4 class="card-title" id="text-style">Medical Records</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="w3-quarter" id="card-padding">
            <a href="To_do_list.php">
                <div class="card" id="card-style">
                    <img src="img/homescreen_ourServices.svg" id="img-padding" alt="Card image">
                    <div class="card-body" style="text-align: center;">
                      <h4 class="card-title" id="text-style">To-Do List</h4>
                    </div>
                </div>
            </a>
        </div>
          

        <div class="w3-quarter" id="card-padding">
            <a href="calendar/index.php">
                <div class="card" id="card-style">
                    <img src="img/calendar.png" style="border-radius: 50%" id="img-padding" alt="Card image">
                    <div class="card-body" style="text-align: center;">
                      <h4 class="card-title" id="text-style">Schedule</h4>
                    </div>
                </div>
            </a>
        </div>

        <div class="w3-quarter" id="card-padding">
            <a href="games.php">
                <div class="card" id="card-style">
                    <img src="img/games.png" style="border-radius: 50%" id="img-padding" alt="Card image">
                    <div class="card-body" style="text-align: center;">
                      <h4 class="card-title" id="text-style">Games</h4>
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
            <h2 class="w3-wide" style="color: white;"><i class="w3-margin-right"></i>About Us</h2>
            <span onclick="document.getElementById('AboutUsModal').style.display='none'" class="w3-button w3-display-topleft">x</span>
        </header>

      <div class="w3-container">
        <div class="w3-row-padding">
            
        <div class="w3-half" id="card-padding">
            <a href="our_story.php">
                <div class="card" id="card-style">
                    <img src="img/homescreen_aboutUs.svg" id="img-padding" alt="Card image">
                    <div class="card-body" style="text-align: center;">
                      <h4 class="card-title" id="text-style">Our Story</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="w3-half" id="card-padding">
            <a href="feedback.php">
                <div class="card" id="card-style">
                    <img src="img/homescreen_aboutUs.svg" id="img-padding" alt="Card image">
                    <div class="card-body" style="text-align: center;">
                      <h4 class="card-title" id="text-style">Give Feedback!</h4>
                    </div>
                </div>
            </a>
        </div>

        </div>
      </div>
    </div>
    </div>




    <!-- Ticket Modal 1-->
    <div id="HealthInfoModal1" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">

      <header class="w3-container w3-center w3-padding-32" style="background-color: lightcoral;"> 
        <h2 class="w3-wide" style="color: white;"><i class="w3-margin-right"></i>Common Changes in Personality and Behavior</h2>
        <span onclick="document.getElementById('HealthInfoModal1').style.display='none'" class="w3-button w3-display-topleft"><</span>
      </header>

      <div class="w3-container">
        </br>
        <ul>
            <li>Women are about twice as likely as men to develop Alzheimer’s disease</li>
            <li>Getting upset, worried, and angry more easily</li>
            <li>Acting depressed or not interested in things</li>
            <li>Feeling sadness, fear, stress, confusion, or anxiety</li>
            <li>Misunderstanding what he or she sees or hears</li>
            <li>Imagining things that aren’t there</li>
            <li>Hiding things or believing other people are hiding things</li>
            <li>Wandering away from home</li>
            <li>Pacing a lot</li>
            <li>Showing unusual sexual behavior</li>
            <li>Hitting you or other people</li>
            <li>Stops caring about how he or she looks, stops bathing, and wants to wear the same clothes every day</li>
            <li>Personality changes due to health-related problems, including illness, pain, new medications, or lack of sleep</li>
            <li>Personality changes due to physical issues like infections, constipation, hunger or thirst, or problems seeing or hearing</li>
            </br>
            <img src="img/database_img1.jpg" class="w3-round" style="width: 100%;">
            <p>ref: https://www.nia.nih.gov/health/managing-personality-and-behavior-changes-alzheimers</p>
        </ul>
      </div>
    </div>
    </div>

    <!-- Ticket Modal 2-->
    <div id="HealthInfoModal2" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">

      <header class="w3-container w3-center w3-padding-32" style="background-color: khaki;"> 
        <h2 class="w3-wide" style="color: white;"><i class="w3-margin-right"></i>How to Cope with Patients with Alzheimer's</h2>
        <span onclick="document.getElementById('HealthInfoModal2').style.display='none'" class="w3-button w3-display-topleft"><</span>
      </header>

      <div class="w3-container">
        </br>
        <ul>
            <li>Reassure the person that he or she is safe and you are there to help</li>
            <li>Have a daily routine, so the person knows when certain things will happen</li>
            <li>Keep things simple. Ask or say one thing at a time</li>
            <li>Don’t argue or try to reason with the person</li>
            <li>Use humor when you can</li>
            <li>Give person who pace a lot a safe place to walk. Provide comfortable, sturdy shoes. Give them light snacks to eat as they walk, so they don’t lose too much weight, and make sure they have enough to drink</li>
            <li>Focus on his or her feelings rather than the words said. For example, say, “You seem worried.”</li>
            <li>Try using music, singing, or dancing to distract the person</li>
            <li>Ask for help with chores. For instance, say, “Let’s set the table” or “I need help folding the clothes.”</li>
            <li>Try not to show your frustration or anger. If you get upset, take deep breaths and count to 10. If it’s safe, leave the room for a few minutes</li>
            </br>
            <img src="img/database_img2.jpg" class="w3-round" style="width: 100%; margin-left: 10px">
        </ul>
        <p>ref: https://www.nia.nih.gov/health/managing-personality-and-behavior-changes-alzheimers</p>
      </div>
    </div>
    </div>

    <!-- Ticket Modal 3 -->
    <div id="HealthInfoModal3" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">

      <header class="w3-container w3-center w3-padding-32" style="background-color: thistle;"> 
        <h2 class="w3-wide" style="color: white;"><i class="w3-margin-right"></i>Ways to Slow Down Alzheimer's</h2>
        <span onclick="document.getElementById('HealthInfoModal3').style.display='none'" class="w3-button w3-display-topleft"><</span>
      </header>

      <div class="w3-container">
        </br>
        <ul>
          <li>Have a healthy lifestyle</li>
          <li><a style="font-weight: bold">Regular Exercise</a></li>
          <ul><li>Exercise protects against Alzheimer’s and other types of dementia by stimulating the brain’s ability to maintain old connections as well as make new ones</li></ul>
          <ul><li>Regular physical exercise can reduce your risk of developing Alzheimer’s disease by up to 50 percent</li></ul>
          <ul><li>At least 150 minutes of moderate intensity exercise each week</li></ul>
          <ul><ul><li>A combination of cardio exercise and strength training</li></ul></ul>
          <ul><ul><li>Balance and coordination exercises</li></ul></ul>
          <br>
          <img src="img/database_img3.jpg" class="w3-round" style="width: 100%; margin-left: 10px">
          </br></br>

          <li><a style="font-weight: bold">Social Engagement</a></li>
          <ul><li>Staying socially engaged may even protect against Alzheimer’s disease and dementia in later life</li></ul>
          <ul><ul><li>Volunteer</li></ul></ul>
          <ul><ul><li>Join a club or social group</li></ul></ul>
          <ul><ul><li>Visit your local community center or senior center</li></ul></ul>
          <ul><ul><li>Take group classes (such as at the gym or a community college)</li></ul></ul>
          <ul><ul><li>Get to know your neighbors</li></ul></ul>
          <ul><ul><li>Make a weekly date with friends</li></ul></ul>
          <ul><ul><li>Get out (go to the park, museums, and other public places)</li></ul></ul>
          </br>
          <img src="img/database_img4.jpg" class="w3-round" style=" width: 100%; margin-left: 10px">
          </br></br>

          <li><a style="font-weight: bold">Healthy Diet</a></li>
          <ul><li>Inflammation and insulin resistance injure neurons and inhibit communication between brain cells. Alzheimer’s is sometimes described as “diabetes of the brain,” and a growing body of research suggests a strong link between metabolic disorders and the signal processing systems</li></ul>
          <ul><ul><li>Manage your weight</li></ul></ul>
          <ul><ul><li>Cut down on sugar and refined carbohydrates</li></ul></ul>
          <ul><ul><ul><li>They can lead to dramatic spikes in blood sugar which inflame your brain</li></ul></ul></ul>
          <ul><ul><li>Enjoy a Mediterranean diet</li></ul></ul>
          <ul><ul><ul><li>dramatically reduces the risk of cognitive impairment and Alzheimer’s disease</li></ul></ul></ul>
          <ul><ul><ul><li>plenty of vegetables, beans, whole grains, fish and olive oil—and limited processed food</li></ul></ul></ul>
          <ul><ul><li>Get plenty of omega-3 fats</li></ul></ul>
          <ul><ul><ul><li>DHA found in these healthy fats may help prevent Alzheimer’s disease and dementia by reducing beta-amyloid plaques</li></ul></ul></ul>
          <ul><ul><ul><li>Food sources of DHA include cold-water fish such as salmon, tuna, trout, mackerel, seaweed, and sardines. You can also supplement with fish oil</li></ul></ul></ul>
          <ul><ul><li>Stock up on fruit and vegetables. </li></ul></ul>
          <ul><ul><ul><li>The more the better. Eat up across the color spectrum to maximize protective antioxidants and vitamins</li></ul></ul></ul>
          <ul><ul><li>Cook at home often. </li></ul></ul>
          <ul><ul><ul><li>You can ensure that you’re eating fresh, wholesome meals that are high in brain-healthy nutrients and low in sugar, salt, unhealthy fat, and additives</li></ul></ul></ul>
          <ul><ul><li>Drink only in moderation. </li></ul></ul>
          <ul><ul><ul><li>Heavy alcohol consumption can dramatically raise the risk of Alzheimer’s and accelerate brain aging</li></ul></ul></ul>
          <br>
          <img src="img/database_img5.jpg" class="w3-round" style=" width: 100%; margin-left: 10px">
          <br></br>

          <li><a style="font-weight: bold">Mental Stimulation</a></li>
          <ul><li>Those who continue learning new things and challenging their brains throughout life are less likely to develop Alzheimer’s disease and dementia</li></ul>
          <ul><li>Activities involving multiple tasks or requiring communication, interaction, and organization</li></ul>
          <ul><li>‘Use it or lose it’</li></ul>
          <ul><ul><li>Learn something new</li></ul></ul>
          <ul><ul><li>Raise the bar for an existing activity</li></ul></ul>
          <ul><ul><li>Practice memorization techniques</li></ul></ul>
          <ul><ul><ul><li>Creating rhymes and patterns can strengthen your memory connections</li></ul></ul></ul>
          <ul><ul><li>Enjoy strategy games, puzzles, and riddles</li></ul></ul>
          <ul><ul><ul><li>Brain teasers and strategy games provide a great mental workout and build your capacity to form and retain cognitive associations</li></ul></ul></ul>
          <ul><ul><li>Follow the road less traveled</li></ul></ul>
          <ul><ul><ul><li>Take a new route or eat with your non-dominant hand. Vary your habits regularly to create new brain pathways</li></ul></ul></ul>
          <br>
          <img src="img/database_img6.jpg" class="w3-round" style=" width: 100%; margin-left: 10px">
          <br></br>

          <li><a style="font-weight: bold">Quality Sleep</a></li>
          <ul><li>There are a number of links between poor sleep patterns and the development of Alzheimer’s and dementia</li></ul>
          <ul><li>Studies emphasize the importance of quality sleep for flushing out toxins in the brain. </li></ul>
          <ul><li>Studies linked poor sleep to higher levels of beta-amyloid in the brain, a sticky protein that can further disrupt the deep sleep necessary for memory formation</li></ul>
          <ul><ul><li>Establish a regular sleep schedule</li></ul></ul>
          <ul><ul><ul><li>Going to bed and getting up at the same time reinforces your natural circadian rhythms</li></ul></ul></ul>
          <ul><ul><li>Set the mood</li></ul></ul>
          <ul><ul><ul><li>Reserve your bed for sleep, and ban television and computers from the bedroom (both are stimulating and may lead to difficulties falling asleep)</li></ul></ul></ul>
          <ul><ul><li>Create a relaxing bedtime ritual</li></ul></ul>
          <ul><ul><ul><li>Take a hot bath, do some light stretches, listen to relaxing music, or dim the lights. As it becomes a habit, your nightly ritual will send a powerful signal to your brain that it’s time for deep restorative sleep</li></ul></ul></ul>
          <ul><ul><li>Quiet your inner chatter</li></ul></ul>
          <ul><ul><ul><li>When stress, anxiety, or worrying keeps you awake, get out of bed. Try reading or relaxing in another room for twenty minutes then hop back in</li></ul></ul></ul>
          <ul><ul><li>Get screened for sleep apnea</li></ul></ul>
          <ul><ul><ul><li>If you’ve received complaints about your snoring, you may want to get tested for sleep apnea, a potentially dangerous condition where breathing is disrupted during sleep. Treatment can make a huge difference in both your health and sleep quality</li></ul></ul></ul>
          <br>
          <img src="img/database_img7.jpg" class="w3-round" style=" width: 100%; margin-left: 10px">
          <br></br>

          <li><a style="font-weight: bold">Stress Management</a></li>
          <ul><li>Chronic or persistent stress can take a heavy toll on the brain, leading to shrinkage in a key memory area, hampering nerve cell growth, and increasing the risk of Alzheimer’s disease and dementia</li></ul>
          <ul><li>simple stress management tools can minimize its harmful effects</li></ul>
          <ul><ul><li>Breathe!</li></ul></ul>
          <ul><ul><ul><li>Quiet your stress response with deep, abdominal breathing. Restorative breathing is powerful, simple, and free!</li></ul></ul></ul>
          <ul><ul><li>Schedule daily relaxation activities</li></ul></ul>
          <ul><ul><ul><li>Keeping stress under control requires regular effort. Learning relaxation techniques such as meditation, progressive muscle relaxation, or yoga can help you unwind and reverse the damaging effects of stress</li></ul></ul></ul>
          <ul><ul><li>Nourish inner peace</li></ul></ul>
          <ul><ul><ul><li>Regular meditation, prayer, reflection, and religious practice may immunize you against the damaging effects of stress</li></ul></ul></ul>
          <ul><ul><li>Make fun a priority</li></ul></ul>
          <ul><ul><ul><li>All work and no play is not good for your stress levels or your brain. Make time for leisure activities that bring you joy, whether it be stargazing, playing the piano, or working on your bike</li></ul></ul></ul>
          <ul><ul><li>Keep your sense of humor</li></ul></ul>
          <ul><ul><ul><li>This includes the ability to laugh at yourself. The act of laughing helps your body fight stress</li></ul></ul></ul>
          <br>
          <img src="img/database_img8.jpg" class="w3-round" style=" width: 100%; margin-left: 10px">
          <br></br>

          <li><a style="font-weight: bold">Vascular Health</a></li>
          <ul><li>What’s good for your heart is also good for your brain</li></ul>
          <ul><li>Maintaining your cardiovascular health can be crucial in lowering your risk for different types of dementia, including Alzheimer’s disease and vascular dementia</li></ul>
          <ul><li>Addressing heart-health issues can also help you to lower your risk for a future heart attack or stroke</li></ul>
          <ul><ul><li>Control your blood pressure</li></ul></ul>
          <ul><ul><ul><li>high blood pressure is strongly associated with an increased risk of dementia</li></ul></ul></ul>
          <ul><ul><ul><ul><li>High blood pressure can damage tiny blood vessels in the parts of the brain responsible for cognition and memory</li></ul></ul></ul></ul>
          <ul><ul><ul><ul><li>The DASH diet for lowering blood pressure (Dietary Approaches to Stop Hypertension)</li></ul></ul></ul></ul>
          <ul><ul><ul><li>Don’t ignore low blood pressure</li></ul></ul></ul>
          <ul><ul><ul><ul><li>Symptoms such as dizziness, blurred vision, and unsteadiness when standing</li></ul></ul></ul></ul>
          <ul><ul><li>Watch your cholesterol levels</li></ul></ul>
          <ul><ul><ul><li>Studies also suggests there may be a connection between high cholesterol and the risk for Alzheimer’s and dementia</li></ul></ul></ul>
          <ul><ul><li>Stop smoking. </li></ul></ul>
          <ul><ul><ul><li>Smoking is one of the most preventable risk factors for Alzheimer’s disease and dementia</li></ul></ul></ul>
          <br>
          <img src="img/database_img9.jpg" class="w3-round" style=" width: 100%; margin-left: 10px">
          <br>
        </ul>
        <p>ref: https://www.helpguide.org/articles/alzheimers-dementia-aging/preventing-alzheimers-disease.htm</p>
      </div>
    </div>
    </div> 

    <!-- Ticket Modal 4 -->
    <div id="HealthInfoModal4" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">

      <header class="w3-container w3-center w3-padding-32" style="background-color: mediumseagreen;"> 
        <h2 class="w3-wide" style="color: whitesmoke;"><i class="w3-margin-right"></i>Diagnosis of Alzheimer’s</h2>
        <span onclick="document.getElementById('HealthInfoModal4').style.display='none'" class="w3-button w3-display-topleft"><</span>
      </header>

      <div class="w3-container">
          </br>
        <ul>
            <li>There is no single diagnostic test that can determine if a person has Alzheimer’s disease. Although physicians can almost always determine if a person has dementia, it may be difficult to identify the exact cause</li>
            <li>If you are uncertain whether your loved one has dementia or Alzheimer’s disease, please visit your physician as soon as possible</li>
        </ul>
        <p>ref: https://www.alz.org/alzheimers-dementia/diagnosis/medical_tests#:~:text=Genetics%20and%20Alzheimer's.-,Brain%20imaging,Alzheimer's%20but%20require%20different%20treatment.</p>
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

        var HealthInfoModal = document.getElementById('HealthInfoModal');
        var OurServicesModal = document.getElementById('OurServicesModal');
        var AboutUsModal = document.getElementById('AboutUsModal');
        var HealthInfoModal1 = document.getElementById('HealthInfoModal1');
        var HealthInfoModal2 = document.getElementById('HealthInfoModal2');
        var HealthInfoModal3 = document.getElementById('HealthInfoModal3');
        var HealthInfoModal4 = document.getElementById('HealthInfoModal4');
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
        }
</script>
    </body>
</html>