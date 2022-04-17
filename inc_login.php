<?php
    require_once 'inc_con.php';
    require_once 'inc_function.php';
    session_start();    
    if (isset($_POST["studentLogin"])){
        $prn = $_POST["PRN"];
        $pwd = $_POST["Password"];

        if (emptyInputLogin($prn,$pwd ) !== false)
        {
            header("location:./student_login.php?error=emptyinput");
            exit();
        }
        
        loginUser($conn, $prn, $pwd);

        


    }
    else if (isset($_POST["adminLogin"])){
        $userName = $_POST["username"];
        $pwd = $_POST["Password"];


        
        

        if (emptyInput($userName) || emptyInput($pwd ))
        {
            header("location:./admin_login.php?error=emptyinput");
            exit();
        }
        if (InValidEmail($userName))
        {
            header("location:./admin_login.php?error=invalidEmail");
            exit();
        }
        echo $userName," ",$pwd;
        loginAdmin($conn, $userName, $pwd);

    
    }
    else
    {
        header("location: ./home.php");
        exit();
    }
