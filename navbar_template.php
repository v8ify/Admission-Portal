<?php
    session_start() 
?>


<link rel="stylesheet" href="./css/home.css" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="header shadow">
    <img src="./css/mescoe-logo.png" alt="logo"/>
    <div class="dropdown">
        <a class="dropdown-link btn btn-outline-info" href="./logout.php">Home</a>
        <?php 
            $page = "/Admission-portal-1/check_submit_status.php";
            
          
            if  ( isset($_SESSION["prn"] ) )
            {
                echo '<a class="dropdown-link btn btn-outline-info" href="./check_status.php">Check Status</a>';
            }
            else if ((isset($_SESSION["admin"]) && ( $page!=$_SERVER['REQUEST_URI']) ))  
            {
                echo '<a class="dropdown-link btn btn-outline-info" href="./check_submit_status.php" name="Check_Submit_Status">Check Submit Status</a>';
            }
            
          
        ?>
        <!-- <a class="dropdown-link btn btn-outline-info" href="./check_status.php">Check Status</a> -->
        <a class="dropdown-link btn btn-outline-info" href="http://mescoepune.org/contact-new.php" target="_blank">Contact</a>
    </div>
</div>