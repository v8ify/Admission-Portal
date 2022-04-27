<?php
    session_start();

    require_once 'inc_con.php';
    require_once 'inc_function.php';

    if (!isset($_POST["prn"]))
    {
        header("location: ./dashboard.php?error=InvalidInput");
        exit();
    }

    $prn = $_POST["prn"];

    approveFeeCategory($conn, $prn);
?>