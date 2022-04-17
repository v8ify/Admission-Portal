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
            <label for="username">Username</label>
            <input type="text" name="username"/>
            <label for="Password">Password</label>
            <input type="text" name="Password"/>
            <input type="submit" value="Login" name="adminLogin">
        </form>

        <?php
        
            if (isset($_GET["error"]))
            {
                if ($_GET["error"] == "emptyinput")
                {
                    echo "<p>Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "invalidEmail"  )
                {
                    echo "<p>Incorrect Username or password!</p>"; 
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