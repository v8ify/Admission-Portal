<?php 

require_once 'inc_con.php';
require_once 'inc_function.php';
session_start();
if (isset($_POST['submit']))
{
    $prn=$_SESSION["prn"];
    
    $line1=$_POST["ad1"];
    $line2=$_POST["ad2"];
    $line3=$_POST["ad3"];
    $state=$_POST["state"];
    $district=$_POST["district"];

    $taluka=$_POST["taluka"];
    $village=$_POST["village"];
    $pinCode=$_POST["pinCode"];
    
    $email=$_POST["email"];
    $mob=$_POST["mobnumber"];
    $yoe=$_POST["yoe"];
    $div=$_POST["divi"];
    $acy=$_POST["acy"];
    $fee_category = $_POST["fee_paying_category"];

    if (emptyInput($line1) || emptyInput($line2) || emptyInput($pinCode) || emptyInput($yoe) || emptyInput($div) || emptyInput($acy))
    {
        header("location: ./display.php?error=emptyinput");
    }
    if (InValidEmail($email))
    {
        header("location: ./display.php?error=invalidemail");
    }
    if (InValidmob($mob))
    {
        header("location: ./display.php?error=invalidmob");
    }
    update_record($conn,$prn,$line1,$line2,$line3,$state,$district,$taluka,$village,$pinCode,$mob,$email,$yoe,$div,$acy, $fee_category);
    

   
}
    
