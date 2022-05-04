
<?php
    session_start();
    if (!$_SESSION["prn"])
    {
      header("location: ./home.php?");
      exit();
    }
    require_once 'inc_con.php';
    require_once 'inc_function.php';    
    
    $prn = $_SESSION["prn"];
    $row = studentRecord($conn,$prn);

    if ($row==false)
    {
        header("location: ./home.php?error=recordNotFound");
        exit();
    }

    
   
    
    
    
   
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='assets/css/login.css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      body{
        text-align: center;
      }
    </style>
</head>

<body>


<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
          <form action="./update_record.php"  method="POST">
            <h6>Application Id</h6>
            <div>
             
              <input type="text" name="Ayear"  placeholder="application Id" value="<?php echo $row["application_id"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            

            <h6>Prn</h6>
            <div>
              <input type="text" name="prn"  placeholder="Prn"  value="<?php echo $row["prn"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            
            <h6>Name</h6>
            <div>
              <input type="text" name="name"  placeholder="Name"  value="<?php echo $row["name"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            

            <h6>Category</h6>
            <div>
              <input type="text" name="cat"  placeholder="category"  value="<?php echo $row["category"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            

          
            <h6>Gender</h6>
            <div>
              <input type="text" name="grnder"  placeholder="Gender"  value="<?php echo $row["gender"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
           

            <h6> Fathers Name</h6>
            <div>
              <input type="text" name="fname"  placeholder="Fathers Name"  value="<?php echo $row["fathers_name"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            
            
            <h6> Mothers Name</h6>
            <div >
              <input type="text" name="Mname"  placeholder="Mothers Name"  value="<?php echo $row["mothers_name"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            


            <h6>Date Of Birth</h6>
            <div >
              <input type="date" name="dob"  placeholder="DOB"  value="<?php echo $row["date_of_birth"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            

            <h6>Religion</h6>
            <div>
              <input type="text" name="rel"  placeholder="Religion"  value="<?php echo $row["religion"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            

            <h6>Region</h6>
            <div>
              <input type="text" name="reg"  placeholder="Region"  value="<?php echo $row["region"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            
            

            <h6> Mother Toungue</h6>
            <div>
              <input type="text" name="mt"  placeholder="Mother Tounge"  value="<?php echo $row["mother_tongue"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            

            

            <h6>Annual Income </h6>
            <div>
              <input type="text" name="ai"   placeholder="Annual Income "  value="<?php echo $row["annual_income_start"],"-",$row["annual_income_end"];?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            

            <h6>Address Line 1</h6>
            <div>
              <input type="text" name="ad1" id="line_1"  placeholder="Address Line 1"  value="<?php echo $row["line_1"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>

            <h6>Address Line 2</h6>
            <div>
              <input type="text" name="ad2" id="line_2"  placeholder="Address Line 2" value="<?php echo $row["line_2"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>

            <h6>Address Line 3</h6>
            <div>
              <input type="text" name="ad3"  id="line_3"  placeholder="Address Line 3" value="<?php echo $row["line_3"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>

            <h6>State</h6>
            <div>
              <input type="text" name="state" id="state"   placeholder="State" value="<?php echo $row["state"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>

            <h6>District</h6>
            <div>
              <input type="text" name="district" id="district"  placeholder="District" value="<?php echo $row["district"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            
            <h6>Taluka</h6>
            <div>
              <input type="text" name="taluka" id="taluka"  placeholder="taluka" value="<?php echo $row["taluka"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>

            <h6>Village</h6>
            <div>
              <input type="text" name="village" id="village"  placeholder="village" value="<?php echo $row["village"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>

            <h6>Pin Code</h6>
            <div>
              <input type="number" name="pinCode" id="pincode"  placeholder="Pin Code" value="<?php echo $row["pincode"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>

            <h6>Phone Number</h6>
            <div>
              <input type="number" name="mobnumber" id="mob"  placeholder="Phone Number" value="<?php echo $row["mobile_number"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly  >
            </div><br><br>
            

    

            <h6>Email Id</h6>
            <div>
              <input type="email" name="email" id="email"  placeholder="Email Id"  value="<?php echo $row["email_address"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly >
            </div><br><br>
            

            <h6>PH Type</h6>
            <div>
              <input type="text" name="ph"  placeholder="PH type " value="<?php echo $row["physically_handicapped"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            

            <h6>Linguistic Minority</h6>
            <div>
              <input type="text" name="lm"  placeholder="Linguistic Minority " value="<?php echo $row["linguistic_minority"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            

            <h6>Religious Minority</h6>
            <div>
              <input type="text" name="rm"  placeholder="Religious Minority " value="<?php echo $row["religious_minority"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            

            <h6>SSC Board </h6>
            <div>
              <input type="text" name="sb"  placeholder="SSC Board " value="<?php echo $row["ssc_board"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            

            <h6>SSC Passing Year </h6>
            <div>
              <input type="number" name="spy"  placeholder="SSC Passing Year " value="<?php echo $row["ssc_passing_year"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
           

            <h6>SSC Marks </h6>
            <div>
              <input type="number" name="sm"  placeholder="SSC Marks " value="<?php echo $row["ssc_total_percentage"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            
            <h6>Qualifying Exam </h6>
            <div>
              <input type="text" name="qualifying_exam"  placeholder="Qualifying Exam " value="<?php echo $row["qualifying_exam"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>

            <h6>HSC Board </h6>
            <div>
              <input type="text" name="hb"  placeholder="HSC Board " value="<?php echo $row["hsc_board"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            

            <h6>HSC Passing Year </h6>
            <div>
              <input type="number" name="hpy"  placeholder="HSC Passing Year " value="<?php echo $row["hsc_passing_year"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            

            <h6>HSC Physics Marks </h6>
            <div>
              <input type="number" name="hpm"  placeholder=" Marks " value="<?php echo $row["physics_percentage"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            

            <h6>HSC Chemistry Marks </h6>
            <div>
              <input type="number" name="hcm"  placeholder=" Marks "  value="<?php echo $row["chemistry_percentage"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
           

            <h6>HSC Maths Marks </h6>
            <div>
              <input type="number" name="hmm"  placeholder=" Marks "  value="<?php echo $row["math_percentage"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            

            <h6>HSC Total Marks </h6>
            <div>
              <input type="number" name="hm"  placeholder="HSC Marks "  value="<?php echo $row["hsc_total_percentage"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            

            <h6>Eligibility Percentage</h6>
            <div>
              <input type="number" name="ep"  placeholder="Eligibility Percentage "  value="<?php echo $row["eligibility_percentage"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            

            <h6>CET Percentile</h6>
            <div>
              <input type="number" name="cp"  placeholder="CET Percentile "  value="<?php echo $row["cet_percentile"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            

            <h6>JEE Percentile</h6>
            <div>
              <input type="number" name="jp"  placeholder="JEE Percentile "  value="<?php echo $row["jee_percentile"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            

            <h6>Merit Number</h6>
            <div>
              <input type="number" name="mn"  placeholder="Merit Number "  value="<?php echo $row["merit_no"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br>
            

            <h6>Merit Marks</h6>
            <div>
              <input type="number" name="mm"  placeholder="Merit Marks "  value="<?php echo $row["merit_marks"]?>" aria-label="Username"
                aria-describedby="basic-addon1" required readonly>
            </div><br><br> 

            <h6>Branch</h6>
            <div>
              <input type="text" name="branch"  placeholder="Branch"   value="<?php echo $row["course_name"]?>" aria-label="Username"
                aria-describedby="basic-addon1"  readonly>
            </div><br><br>

            
            <!-- <h6>Fees Paid</h6>
            <div>
              <input type="number" name="fees"  placeholder="Fees Paid" aria-label="Username"
                aria-describedby="basic-addon1" required>
            </div><br><br> -->
            

            
            <h6>Admission Date</h6>
            <div >
              <input type="date" class="editable"  value="<?php echo $row["admission_date"]?>" aria-label="Username"
                aria-describedby="basic-addon1"  readonly>
            </div><br><br>
            
            <h6>Year of Engineering</h6>
            <div>
              <select name="yoe" id="yoe">
                <option value="SE">SE</option>
                <option value="TE">TE</option>
                <option value="BE">BE</option>
                </select>
            </div><br><br>

            <h6>Division</h6>
            <div>
              <select name="divi" id="divi">
              
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="SS">SS</option>
                </select>
            </div><br><br>

            <h6>Admission Calendar Year</h6>
            <div>
              <input type="text" name="acy" id="acy"   placeholder="Admission Calender Year" value="" aria-label="Username"
                aria-describedby="basic-addon1" required >
            </div><br><br>

            <h6>Fee paying category</h6>
            <div>
              <select name="fee_paying_category" id="fee_paying_category">
                <option value="OPEN">OPEN</option>
                <option value="OBC">OBC</option>
                <option value="SEBC">SEBC</option>
                <option value="EWS">EWS</option>
                <option value="EBC">EBC</option>
                <option value="VJNT">VJNT</option>
                <option value="TFWS">TFWS</option>
                <option value="SC">SC</option>
                <option value="ST">ST</option>
                <option value="J & K">J & K</option>
                <option value="GOI">GOI</option>
                <option value="JKSSS">JKSSS</option>
              </select>
            </div><br><br>

            <input type="submit" class="btn btn-outline-primary" name="submit" id="submit">
            <button type="button"  class="btn btn-outline-primary" value="logout" id="logout" name="logout">Logout</button>
            <button type="button"  class="btn btn-outline-primary" id="edit" name="edit">edit</button>
          </form>
          
        </div>
      </div>
      <?php
        
            if (isset($_GET["error"]))
            {
                if ($_GET["error"] == "emptyinput")
                {
                    echo "<p>Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "invalidemail")
                {
                  echo "<p>Invalid Email address!</p>";
                }
                else if ($_GET["error"] == "invalidmob")
                {
                  echo "<p>Invalid Mobile Number!</p>";
                }
                else if ($_GET["error"] == "failedtoupdate")
                {
                  echo "<p>Failed to update profil</p>";
                }
                
                
            }
        
        ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



  
  
        


</body>
<script>
            document.getElementById("edit").onclick = function() 
            {
                document.getElementById('line_1').readOnly=false;
                document.getElementById('line_2').readOnly=false;
                document.getElementById('line_3').readOnly=false;
                document.getElementById('state').readOnly=false;
                document.getElementById('district').readOnly=false;
                document.getElementById('village').readOnly=false;
                document.getElementById('pincode').readOnly=false;
                document.getElementById('mob').readOnly=false;
                document.getElementById('email').readOnly=false;
            };
            document.getElementById("logout").onclick = function () {
            location.href = "./logout.php";
            };
</script>

</html>