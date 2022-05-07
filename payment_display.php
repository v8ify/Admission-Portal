
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Payment Display</title>

    <style>
        .pay-display {
            margin: 0px auto 0px;
            width: 500px;
            text-align: center;
            padding-top: 100px;
            color: white;
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
    <?php include("navbar_template.php") ?>
    <section style="background-color: #508bfc; height: 100vh">
        <h1 class="pay-display">Your total fee is: <?php echo $row["fee"] ?> </h1>

        <div class="pay-warn">
            Before doing the payment, get your fee paying category approved from college.
        </div>
    </section>
</body>
</html>