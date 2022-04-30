<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
</head>

<body>
    <div>
        
        <form action="inc_login.php" method="post">
            <label for="PRN">PRN</label>
            <input type="text" name="PRN"/><br>
            <label for="Password">Password</label>
            <input type="text" name="Password"/><br>
            <a href="./Change_password_display.php">Change Password</a><br>
            <input type="submit" value="Login" name="studentLogin">
        </form>

        <?php
        
            if (isset($_GET["error"]))
            {
                if ($_GET["error"] == "emptyinput")
                {
                    echo "<p>Fill in all fields!</p>";
                }
                
                else if ($_GET["error"] == "wronglogin"  )
                {
                    echo "<p>Incorrect prn or password!</p>"; 
                }
                else if ( $_GET["error"] == "stmtfailed")
                {
                    echo "<p>Something went wrong!</p>"; 
                }
            }
        
        ?>

    </div>
</body>

</html>