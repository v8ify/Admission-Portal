
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
</head>
<body>
    <h1>Your total fee is: <?php echo $row["fee"] ?> </h1>
</body>
</html>