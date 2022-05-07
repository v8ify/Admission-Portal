<html>

<head>
    <title>
            Home
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<?php include("navbar_template.php") ?>

<div class="container py-5 h-50">
    <div class="row d-flex justify-content-center align-items-center  h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                <form action="./inc_home.php" method="POST">
                    <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="studentLogin" value="Student Login">
                    <input type="submit" class="btn btn-primary" name="adminLogin" value="Admin Login">
                    
                </form>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row d-flex justify-content-center align-items-center h-100">


    

</div>

    

</body>
</html>