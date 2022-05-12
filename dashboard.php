<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>

    <?php include("navbar_template.php") ?>

    <section>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong border-3" style="border-radius: 1rem;">
                        <h3 class="card-header text-center">Search for student by PRN</h3>
                        <div class="card-body p-5 text-center">
                            <form action="./search_student_record.php" method="post">
                                <div class="form-group">
                                    <label for="prn">PRN</label>
                                    <input class="form-control mt-3" type="text" name="prn" id="prn" placeholder="Enter PRN..." />
                                </div>
                                <div class="form-group mt-3">
                                    <button class="btn btn-primary" type="submit">Search</button>

                                    <?php
                                        if (isset($_GET["success"]))
                                        {
                                            if ($_GET["success"] == "FeeCategoryApproved")
                                            {
                                                echo "<h4>Fee Category Approved</h4>";
                                            }
                                            
                                            else if ($_GET["success"] == "FeePaymentApproved"  )
                                            {
                                                echo "<h4>Fee Payment Approved</h4>"; 
                                            }
                                        }
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="card shadow-2-strong border-3" style="border-radius: 1rem;">
                                <h3 class="card-header text-center">Download Roll Call List</h3>
                                <div class="card-body p-5 text-center">
                                    <form action="./download_rollcall.php" method="get">
                                        <div class="form-group">
                                            <label for="calendar_year">Academic Year</label>
                                            <input class="form-control mt-3" type="number" name="calendar_year" id="calendar_year" placeholder="Enter academic year..." />
                                        </div>
                                        <div class="form-group">
                                            <label for="year">Year</label>
                                            <select class="form-select form-control" name="year" id="year">
                                                <option value="SE">SE</option>
                                                <option value="TE">TE</option>
                                                <option value="BE">BE</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="dept">dept</label>
                                            <select class="form-select form-control" name="dept" id="dept">
                                                <option value="Mechanical Engineering">Mechanical Engineering</option>
                                                <option value="Computer Engineering">Computer Engineering</option>
                                                <option value="Electronics and Telecommunications Engineering">Electronics and Telecommunications Engineering</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="prn">Search for student by PRN</label>
                                            <select class="form-select form-control" name="div" id="div">
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="SS">SS</option>
                                            </select>
                                        </div>
                                        <div class="form-group mt-3">
                                            <button class="btn btn-primary" type="submit">Download</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>