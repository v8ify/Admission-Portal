<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
<<<<<<< HEAD
=======
    <div>
        
        <form action="inc_login.php" method="post">
            <label for="PRN">PRN</label>
            <input type="text" name="PRN"/><br>
            <label for="Password">Password</label>
            <input type="text" name="Password"/><br>
            <a href="./Change_password_display.php">Change Password</a><br>
            <input type="submit" value="Login" name="studentLogin">
        </form>
>>>>>>> e00008c01834a1aaedcd1fbddabf8f16d866f550


<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
          <form action="inc_login.php" method="post">
                <h3 class="mb-5">Sign in</h3>

                <div class="form-outline mb-4">
                <input type="text" id="prn" name="PRN" class="form-control form-control-lg" placeholder="PRN" />
                
                </div>

                <div class="form-outline mb-4">
           
                <input type="text" class="form-control form-control-lg"  placeholder="Password" name="Password"/>
                </div>

            
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Login" name="studentLogin">
                
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
        <br>
            <a href="./Change_password_display.php"  class="link-secondary">Change Password</a><br>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>




    <div>
        
        <!-- <form action="inc_login.php" method="post">
            <label for="PRN">PRN</label>
            <input type="text" name="PRN"/><br>
            <label for="Password">Password</label>
            <input type="text" name="Password"/><br>
            <a href="./Change_password_display.php">Change Password</a><br>
            <input type="submit" value="Login" name="studentLogin">
        </form> -->



       













        

    </div>
</body>

</html>