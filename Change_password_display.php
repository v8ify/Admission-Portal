<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
<<<<<<< HEAD
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
          <form action="./change_pwd.php" method="POST">
                <h3 class="mb-5">Sign in</h3>

                <div class="form-outline mb-4">
          
                <input type="text"  class="form-control form-control-lg" placeholder="PRN" name="prn"/>
                </div>
                <div class="form-outline mb-4">
               
                <input type="text" class="form-control form-control-lg" placeholder="Current Password" name="current_password"/>
                </div>
                <div class="form-outline mb-4">
                <input type="text" class="form-control form-control-lg"  placeholder="New Password" name="new_password"/>
                </div>
                <div class="form-outline mb-4">
                <input type="Password" class="form-control form-control-lg"  placeholder="Confirm Password" name="confirm_password"/>
                </div>
                
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Submit" name="submit">
    
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
            else if(isset($_GET["true"]))
            {
                echo '<br><p>Password is Updated</p>';
                echo '<form action="./home.php">  <input type="submit" class="btn btn-success"  value="Home" name="submit"></form>';
            }
    
    ?>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>

</html>