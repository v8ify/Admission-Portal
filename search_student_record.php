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

    $feeRow = getStudentFees($conn, $prn)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Record</title>

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
    <div class="form-container">
        <?php if ($fee_category_approved): ?>
            <form action="./payment_approval.php" method="post" class="form">
                
                <h1>Fee for PRN <?php echo $prn ?> is Rs. <?php echo $feeRow["fee"] ?> </h1>

                <input type="hidden" name="prn" id="prn" value="<?php echo $prn ?>" />
                
                <div class="button-container">
                    <button type="submit" class="button">Approve Fee Payment</button>
                </div>
           </form>
        <?php else: ?>
           <form action="./fee_category_approval.php" method="post" class="form">
                <div class="input-container">
                    <label for="fee_category">Fee Paying Category</label>
                    <input type="text" name="fee_category" id="fee_category" value="<?php echo $row["fee_paying_category"]; ?>" />
                </div>
                
                <input type="hidden" name="prn" id="prn" value="<?php echo $prn ?>" />
                
                <div class="button-container">
                    <button type="submit" class="button">Approve Fee Paying Category</button>
                </div>  
            </form>
        <?php endif; ?>

    </div>
</body>
</html>