<?php include("navbar_template.php") ?>
<?php

    if (!isset($_SESSION["prn"]))
    {
      header("location: ./student_login.php?");
      exit();
    }
    require_once 'inc_con.php';
    require_once 'inc_function.php';    
    
    $prn = $_SESSION["prn"];
    $row = studentAuth($conn,$prn);

    if ($row==false)
    {
        header("location: ./home.php?error=recordNotFound1");
        exit();
    }

    $antiragging_uploaded = ($row["antiragging_uploaded"] == 1);
    $fee_category_approved = ($row["fee_category_approved"] == 1);
    $payment_done = ($row["payment_done"] == 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    

    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong border-4" style="border-radius: 1rem;">
                    <h2 class="card-header text-center">
                        Status for <?php echo $_SESSION["prn"] ?>
                    </h2>
                    <div class="card-body p-5 text-center">
                        <div class="row border py-4">
                            <h4 class="col">Antiragging upload</h4>
                            <h4 class="col">
                                <?php if ($antiragging_uploaded): ?>
                                    Done ✅
                                <?php else: ?>
                                    Pending ⌛
                                <?php endif; ?>
                            </h4>
                            </div>

                        <div class="row border py-4">
                            <h4 class="col">Fee category approval</h4>
                            <h4 class="col">
                                <?php if ($fee_category_approved): ?>
                                    Done ✅
                                <?php else: ?>
                                    Pending ⌛
                                <?php endif; ?>
                            </h4>
                        </div>

                        <div class="row border py-4">
                            <h4 class="col">Fee payment approval</h4>
                            <h4 class="col">
                                <?php if ($payment_done): ?>
                                    Done ✅
                                <?php else: ?>
                                    Pending ⌛
                                <?php endif; ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>