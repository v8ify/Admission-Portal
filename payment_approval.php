<?php
    session_start();

    require_once 'inc_con.php';
    require_once 'inc_function.php';

    $prn = $_POST["prn"];

    approveFeePayment($conn, $prn);
?>