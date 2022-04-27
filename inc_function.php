<?php


function unidExists($conn,$var,$sql_quer)
{
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql_quer)){
        header("location: ./ home.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $var);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData))
    {
        return $row;
    }
    else{
        $result = false;
        return false;
    }
    mysqli_stmt_close($stmt);
}

function InValidEmail($email)
{
    $result=true;
    if (!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $result=true;
    }
    else{
        $result=false;

    }

    return $result;
}

function InValidMob($mob)
{
    $result=true;
    if (strlen($mob)<10 || strlen($mob)>11)
    {
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

function emptyInput($var)
{
    $result=true;

    if (empty($var))
    {
        $result = true;
    }
    else{
        $result = false;

    }
    return $result;
}





function emptyInputLogin($prn, $pwd)
{
    $result=true;

    if (empty($prn) || empty($pwd))
    {
        $result = true;
    }
    else{
        $result = false;

    }
    return $result;
}

function loginUser($conn, $prn, $pwd){
    $sql_query = " SELECT * FROM student_auth WHERE  prn = ?;";
    $Exits = unidExists($conn,$prn,$sql_query);
    
    if ($Exits === false){
        header("location: ./student_login.php?error=wronglogin");
        exit();
    }

    $pwdHasded = $Exits["password"];

    $checkPwd= password_verify($pwd, $pwdHasded);
  
    if ($pwd !== $pwdHasded)
    {
        // echo "went";
        header("location: ./student_login.php?error=wronglogin");
        exit();
    }
    else 
    {
        
        session_start();
        $_SESSION["prn"] = $Exits["prn"];
        echo $_SESSION["prn"];
        header("location: ./display.php");
        exit();
    }
   
}

function loginAdmin($conn, $username, $pwd)
{
    $sql_query=" SELECT * FROM superuser where email=?; ";
    $Exits = unidExists($conn,$username,$sql_query);
    
    if ($Exits === false){
        header("location: ./admin_login.php?error=wronglogin");
        exit();
    }

    $pwdHasded = $Exits["password"];

    
  
    if ($pwd !== $pwdHasded)
    {
        // echo "went";
        header("location: ./admin_login.php?error=wronglogin");
        exit();
    }
    else 
    {
        
        session_start();
        $_SESSION["username"] = $Exits["username"];
        // echo $_SESSION["username"];
        header("location: ./dashboard.php");
        exit();
    }
}

function studentRecord($conn,$prn)
{
    $sql_quer = " SELECT * FROM student_data WHERE  prn = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql_quer)){
        header("location: ./student_login.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $prn);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData))
    {
        return $row;
    }
    else{
        $result = false;
        return false;
    }
    mysqli_stmt_close($stmt);
}

function update_record($conn,$prn,$line1,$line2,$line3,$state,$district,$taluka,$village,$pinCode,$mob,$email,$yoe,$divi,$acy, $fee_category)
{
    $q=" UPDATE student_data set line_1='$line1',line_2='$line2', line_3='$line3', state='$state',  district='$district', taluka='$taluka', village='$village' ,pincode='$pinCode',  mobile_number='$mob', email_address='$email', year_of_engineering='$yoe', division='$divi', admission_calendar_year='$acy', fee_paying_category = '$fee_category' WHERE prn='$prn' " ;
    
    if ($result=mysqli_query($conn,$q))
    {
        header("location: ./anti-ragging.php");
    }
    else{
        header("location: ./display.php?error=failedtoupdate");
    }
}

function studentAuth($conn, $prn)
{
    $sql_quer = " SELECT * FROM student_auth WHERE  prn = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql_quer)){
        header("location: ./student_login.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $prn);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData))
    {
        return $row;
    }
    else{
        $result = false;
        return false;
    }
    mysqli_stmt_close($stmt);
}

