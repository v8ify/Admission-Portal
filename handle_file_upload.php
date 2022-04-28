<?php
    session_start();

    require_once 'inc_con.php';
    require_once 'inc_function.php';

    $time = time();

    $prn = $_SESSION["prn"];

    $info = pathinfo($_FILES['anti-ragging']['name']);

    $ext = $info['extension']; // get the extension of the file
    $newname = $prn."_".$time.".".$ext; 

    $target = './Antiragging/'.$newname;

    $success = move_uploaded_file( $_FILES['anti-ragging']['tmp_name'], $target);

    if ($success)
    {
        $result = handleAntiRaggingForm($conn, $prn, $target);

        if ($result)
        {
            header("location: ./payment_display.php?prn=".$prn);
        }
        else
        {
            header("location: ./anti-ragging.php?error=FailedToUpload");
        }

    }
    else
    {
        header("location: ./anti-ragging.php?error=FailedToUpload");
    }
?>