
<?php
    session_start();
    if (!$_GET["prn"])
    {
      header("location: ./home.php?");
      exit();
    }
    require_once 'inc_con.php';
    require_once 'inc_function.php';    
    
    $prn = $_GET["prn"];
    $row = getStudentFees($conn,$prn);

    if ($row==false)
    {
        header("location: ./home.php?error=recordNotFound");
        exit();
    }

    
   
    
    
    
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .pay-display {
            margin: 200px auto 0px;
            width: 500px;
            text-align: center;
        }

        .pay-warn {
            margin: 30px auto;
            color: orange;
            width: 500px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 class="pay-display">Your total fee is: <?php echo $row["fee"] ?> </h1>

    <div class="pay-warn">
        Before doing the payment, get your fee paying category approved from college.
    </div>
</body>
</html>