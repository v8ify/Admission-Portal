<?php
    session_start();

    if (!$_SESSION["prn"])
    {
      header("location: ./home.php");
      exit();
    }

    require_once 'inc_con.php';
    require_once 'inc_function.php';

    $prn = $_SESSION["prn"];

    $row = studentRecord($conn,$prn);

    if ($row == false)
    {
        header("location: ./dashboard.php?error=recordNotFound");
        exit();
    }

    $student_auth = studentAuth($conn, $prn);

    $payment_done = false;

    if ($student_auth["payment_done"] == 1)
    {
        $payment_done = true;
    }

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
        <?php if ($payment_done): ?>
            <form action="./payment_approval.php" method="post">
                <button type="submit">Approve Fee Payment</button>
           </form>
        <?php else: ?>
           <form action="./fee_category_approval.php" method="post">
                <div>
                    <label for="fee_category">Fee Paying Category</label>
                    <input type="text" name="fee_category" id="fee_category" value="<?php echo $row["fee_paying_category"]; ?>" />
                </div>
                
                
                <button type="submit">Approve Fee Paying Category</button>
            </form>
        <?php endif; ?>

    </div>
</body>
</html>