<?php
    session_start();

    if (!isset($_POST["prn"]))
    {
      header("location: ./dashboard.php?error=InvalidInput");
      exit();
    }

    require_once 'inc_con.php';
    require_once 'inc_function.php';

    $prn = $_POST["prn"];

    $row = studentRecord($conn,$prn);

    if ($row == false)
    {
        header("location: ./dashboard.php?error=recordNotFound");
        exit();
    }

    $student_auth = studentAuth($conn, $prn);

    $fee_category_approved = false;

    if ($student_auth["fee_category_approved"] == 1)
    {
        $fee_category_approved = true;
    }

    $feeRow = getStudentFees($conn, $prn);

    $student_name = $row["name"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Record</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .form-container {
            width: 600px;
            margin: 40px auto;
        }

        .button {
            padding: 5px 8px;
            margin: 0px auto;
            background-color: skyblue;
            border-color: skyblue;
            border-radius: 4px;
        }

        .button:hover {
            cursor: pointer;
        }

        .button-container {
            width: 250px;
            margin: 0px auto;

        }

        .input-container {
            margin: 40px auto 20px;
            display: flex;
            flex-direction: column;
            align-content: center;
            width: 400px;
        }

        .input-container > input {
            height: 20px;
            font-size: 18px;
            padding: 5px;
        }

        .input-container > label {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 8px;
        }

    </style>
</head>
<body>

    <?php include("navbar_template.php") ?>
    
    <section>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card border-3 shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-left">
                            <?php if ($fee_category_approved): ?>
                                <form action="./payment_approval.php" method="post" class="form">
                                        <h5>Student name: <?php echo $student_name ?> </h5>
                                        <h5>College PRN : <?php echo $prn ?> </h5>
                                        <h5>Class: <?php echo $row["year_of_engineering"] ?> </h5>
                                        <h5>Course Name: <?php echo $row["course_name"] ?> </h5>
                                        <h5>Division: <?php echo $row["division"] ?> </h5>

                                    
                                    <h1>Fee for <?php echo $student_name ?>  PRN <?php echo $prn ?> is Rs. <?php echo $feeRow["fee"] ?> </h1>

                                    <input type="hidden" name="prn" id="prn" value="<?php echo $prn ?>" />
                                    
                                    <div class="button-container">
                                        <button type="submit" class="btn btn-primary mt-5">Approve Fee Payment</button>
                                        
                                    </div>
                                    
                                </form>
                                <?php else: ?>
                                <form action="./fee_category_approval.php" method="post" class="form">
                                    <div class="form-group">
                                        <h4>Student name: <?php echo $student_name ?> </h4>
                                        <h4>College PRN : <?php echo $prn ?> </h4>
                                        <h4>Class: <?php echo $row["year_of_engineering"] ?> </h4>
                                        <h4>Course Name: <?php echo $row["course_name"] ?> </h4>
                                        <h4>Division: <?php echo $row["division"] ?> </h4>

                                        <label for="fee_category">Fee Paying Category</label>
                                        <input readonly class="form-control" type="text" name="fee_category" id="fee_category" value="<?php echo $row["fee_paying_category"]; ?>" />
                                    </div>
                                    
                                    <input type="hidden" name="prn" id="prn" value="<?php echo $prn ?>" />
                                    
                                    <div class="button-container">
                                        <button type="submit" name="approve" class="btn btn-primary mt-5">Approve Fee Paying Category</button>
                                        <input type="submit" class="btn btn-danger" name="disapprove" value="disapprove_fee_category" id="disapprove_fee_category">
                                    
                                    </div>  
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</body>
</html>