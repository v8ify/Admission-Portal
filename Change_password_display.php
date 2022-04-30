<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
</head>

<body>
    <div>
        <form action="./change_pwd.php" method="POST">
            <label>PRN</label>
            <input type="text" name="prn"/></br></br>
            <label>Current Password</label>
            <input type="text" name="current_password"/></br></br>
            <label>New Password</label>
            <input type="text" name="new_password"/></br></br>
            <label>Confirm Password</label>
            <input type="Password" name="confirm_password"/></br></br>
            <input type="submit" name="submit">
        </form>
        <?php
        
        if (isset($_GET["error"]))
        {
            if ($_GET["error"] == "emptyinput")
            {
                echo "<p>Fill in all fields!</p>";
            }
            else if ($_GET["error"] == "new_passwordIsnotsameasconfirmpassword")
            {
              echo "<p>New password and confirm passwordd should be same!</p>";
            }
            else if  ($_GET["error"] == "unabletochangepassword")
            {
                echo "<p>Current password is wrong!</p>";
            }
            else if ($_GET["error"]=="incorrectcurrentpassword")
            {
                echo "<p>Current password is wrong!</p>";
            }
            else if ($_GET["error"]=="newpasswordshouldnotbesameascurrentpassword")
            {
                echo "<p>New password cannot be same as current password</p>";
            }
        }
    
    ?>
    </div>
</body>

</html>