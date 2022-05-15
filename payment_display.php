
<?php
    
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
</head>
<body>
    <?php include("navbar_template.php") ?>
    <section>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card p-4 shadow-2-strong border-3" style="border-radius: 1rem;">
                        <h3 class="card-header text-center">Your total fee is: <?php echo $row["fee"] ?> </h3>
                        <div class="text-danger text-center">
                            Before doing the payment, get your fee paying category approved from college.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>