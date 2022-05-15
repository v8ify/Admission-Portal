<?php
    session_start();

    require_once 'inc_con.php';
    require_once 'inc_function.php';

    $time = time();

    $prn = $_SESSION["prn"];
    $query=" Select *from student_data where prn=?; ";
    $row = unidExists($conn,$prn, $query);
    $class=$row["year_of_engineering"];
    $div=$row["division"];
    $dpt=$row["course_name"];
    $ACY=$row["admission_calendar_year"];
    $path="./Antiragging/".$class.'/'.$div;

    if (!file_exists("./StudentDocuments/"))
    {
        mkdir("./StudentDocuments/");
        
    }
    if (!file_exists("./StudentDocuments/".'/'.$ACY))
    {
        mkdir("./StudentDocuments/".'/'.$ACY);
    
    }
    if (!file_exists("./StudentDocuments/".'/'.$ACY.'/'.$dpt))
    {
        mkdir("./StudentDocuments/".'/'.$ACY.'/'.$dpt);
    
    }
    if (!file_exists("./StudentDocuments/".'/'.$ACY.'/'.$dpt.'/'.$class))
    {
        mkdir("./StudentDocuments/".'/'.$ACY.'/'.$dpt.'/'.$class);
    
    }
    if (!file_exists("./StudentDocuments/".'/'.$ACY.'/'.$dpt.'/'.$class.'/'.$div))
    {
        mkdir("./StudentDocuments/".'/'.$ACY.'/'.$dpt.'/'.$class.'/'.$div);
    
    }
    if (!file_exists("./StudentDocuments/".'/'.$ACY.'/'.$dpt.'/'.$class.'/'.$div.'/'.$prn))
    {
        mkdir("./StudentDocuments/".'/'.$ACY.'/'.$dpt.'/'.$class.'/'.$div.'/'.$prn);
    
    }

    
   
    
    $info1 = pathinfo($_FILES['anti-ragging']['name']);
    
    $info2 = pathinfo($_FILES['income-certificate']['name']);
    
    $ext1 = $info1['extension']; // get the extension of the file
    $ext2 = $info2['extension']; // get the extension of the file
    if ($ext2)
    {
        $newname2 = $prn."_".$time."_IncomeCertificate".".".$ext2;
        $target2 = './StudentDocuments/'.'/'.$ACY.'/'.$dpt.'/'.$class.'/'.$div.'/'.$prn.'/'.$newname2;
        $success2 = move_uploaded_file( $_FILES['income-certificate']['tmp_name'], $target2);
    }
    
    $newname1 = $prn."_".$time."_Antiragging".".".$ext1; 
    
    $target1 = './StudentDocuments/'.'/'.$ACY.'/'.$dpt.'/'.$class.'/'.$div.'/'.$prn.'/'.$newname1;
    
    $success = move_uploaded_file( $_FILES['anti-ragging']['tmp_name'], $target1);
    
 
    if (($success))
    {
        $result = handleAntiRaggingForm($conn, $prn, $target1);

        if ($result)
        {
    
            $q = "UPDATE student_data set anti_ragging_upload_date=NOW() WHERE prn='$prn'";
            mysqli_query($conn, $q);
            header("location: ./payment_display.php?prn=".$prn);
        }
        else
        {
            header("location: ./anti-ragging.php?error=FailedToUpload");
        }

    }
    else
    {
        header("location: ./anti-ragging.php?error=FailedToUpload1");
    }
?>