<?php

//This function is to check user is exist in our database or not if yes then it return its record.
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

//Validation for Email address.
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

//Validation for Mobile number;
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

//Validation for checking any empty input
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

//Validation for checking empyt input in login page
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

// This function logged in user to their account.
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
// This function logged in Admin to their account.
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

//This function return the student according to their prn number.
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

// This function updata student data
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

// This function returns a row from fee_matrix table to which this
// user with prn belongs to
function getStudentFees($conn, $prn)
{
    $sql_quer = "SELECT * FROM fee_matrix WHERE year = (SELECT YEAR(admission_date) FROM student_data as sd WHERE sd.prn = ?)
          AND category = (SELECT fee_paying_category FROM student_data as sd WHERE sd.prn = ?)";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql_quer)) {
        header("location: ./student_login.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $prn, $prn);
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


// This function approves the fee category of a student
// Used by admin
function approveFeeCategory($conn, $prn)
{
    $q = "UPDATE student_auth set fee_category_approved = 1 WHERE prn='$prn'";
    
    if ($result = mysqli_query($conn, $q))
    {
        header("location: ./dashboard.php?success=FeeCategoryApproved");
    }
    else{
        header("location: ./dashboard.php?error=failedtoupdate");
    }
}

// This function approves the fee category of a student
// Used by admin
function approveFeePayment($conn, $prn)
{
    $q = "UPDATE student_auth set payment_done = 1 WHERE prn='$prn'";
    
    if ($result = mysqli_query($conn, $q))
    {
        header("location: ./dashboard.php?success=FeePaymentApproved");
    }
    else{
        header("location: ./dashboard.php?error=failedtoupdate");
    }
}

// This function updates the status of the antiragging form upload
// Used by user
function handleAntiRaggingForm($conn, $prn, $filePath)
{
    $q = "UPDATE student_auth set antiragging_uploaded = 1, antiragging_file_path = '$filePath' WHERE prn='$prn'";
    
    if ($result = mysqli_query($conn, $q))
    {
       return true;
    }
    else
    {
        return false;
    }
}

function change_pwd($conn,$prn,$curr_pwd,$new_pwd,$conf_new_pwd )
{
    $query="SELECT *FROM student_auth where prn=?";
    $row = unidExists($conn,$prn,$query);
    if ($row === false)
    {
        header("location: ./Change_password_display.php?error=wrongprn");
    }
    if ($new_pwd !== $conf_new_pwd)
    {
        header("location: ./Change_password_display.php?error=new_passwordIsnotsameasconfirmpassword");
        exit();
    }
    if ($new_pwd === $curr_pwd)
    {
        header("location: ./Change_password_display.php?error=newpasswordshouldnotbesameascurrentpassword");
    }
    if ($row["password"]!==$curr_pwd)
    {
        header("location: ./Change_password_display.php?error=incorrectcurrentpassword");
        exit();
    }

    $update_query="UPDATE student_auth SET password=? where prn=? and password=? ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $update_query)) {
        header("location: ./student_login.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sss",$new_pwd ,$prn, $curr_pwd);
    mysqli_stmt_execute($stmt);
    $row2 = unidExists($conn,$prn,$query);
 

    header("location: ./Change_password_display.php?true",);


}


// This function returns a row from fee_matrix table to which this
// user with prn belongs to
function get_roll_call($conn, $calendar_year, $year, $course_name, $division)
{
    $sql_quer = "SELECT prn, name FROM student_data WHERE admission_calendar_year = ?
                 AND year_of_engineering = ? AND division = ? AND course_name = ? ";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql_quer)) {
        header("location: ./student_login.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssss", $calendar_year, $year, $division, $course_name);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if ($resultData -> num_rows > 0)
    {
        return $resultData;
    }
    else {
        $result = false;
        return false;
    }

    mysqli_stmt_close($stmt);
}