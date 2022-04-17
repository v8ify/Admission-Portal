<?php
    if (isset($_POST["studentLogin"]))
    {
        header("location: ./student_login.php");
    }
    else if (isset($_POST["adminLogin"]))
    {
        header("location: ./admin_login.php");
    }