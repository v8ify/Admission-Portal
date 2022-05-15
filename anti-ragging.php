<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php include("navbar_template.php") ?>

    <section class="vh-100" style="background-color: #508bfc; height: 100vh">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <form action="handle_file_upload.php" method="post" enctype='multipart/form-data'>
                                <label>anti-ragging</label>
                                <input class="form-control" type="file" name="anti-ragging" />
                                <br><br>
                                <label>Income Certificate <p>(optional for those students who are not eligible for scholarship)</p></label>
                                <input class="form-control" type="file" name="income-certificate"/>
                                <br><br>
                                <button type="Submit" name="studentLogin" class="btn btn-primary">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>