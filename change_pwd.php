<?php
if (isset($_POST["submit"]))
    require_once 'inc_con.php';
    require_once 'inc_function.php';
    $prn = $_POST["prn"];
    $curr_pwd = $_POST["current_password"];
    $new_pwd = $_POST["new_password"];
    $conf_new_pwd = $_POST["confirm_password"];
    if (emptyInput($prn) || emptyInput($curr_pwd) || emptyInput($new_pwd) || emptyInput($conf_new_pwd))
    {
        header("location: ./Change_password_display.php?error=emptyinput");
        exit();
    }
    if (studentAuth($conn,$prn)===false)
    {
        header("location: ./Change_password_display.php?error=wrongprn");
        exit();
    }
    change_pwd($conn,$prn,$curr_pwd,$new_pwd,$conf_new_pwd );

    
    