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
</head>
<body>
    <div>
        <?php if ($fee_category_approved): ?>
            <form action="./payment_approval.php" method="post">
                
                <div>Fee for PRN <?php echo $prn ?> is Rs. <?php echo $feeRow["fee"] ?> </div>

                <input type="hidden" name="prn" id="prn" value="<?php echo $prn ?>" />

                <button type="submit">Approve Fee Payment</button>
           </form>
        <?php else: ?>
           <form action="./fee_category_approval.php" method="post">
                <div>
                    <label for="fee_category">Fee Paying Category</label>
                    <input type="text" name="fee_category" id="fee_category" value="<?php echo $row["fee_paying_category"]; ?>" />
                </div>
                
                <input type="hidden" name="prn" id="prn" value="<?php echo $prn ?>" />
                
                <button type="submit">Approve Fee Paying Category</button>
            </form>
        <?php endif; ?>

    </div>
</body>
</html>