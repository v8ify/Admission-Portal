


<link rel="stylesheet" href="./css/home.css" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php include("navbar_template.php") ?>
<section style="margin-top: 3rem;">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">PRN</th>
      <th scope="col">Name</th>
      <th scope="col">Year Of engineering</th>
      <th scope="col">Division</th>
      <th scope="col">Course Name</th>
      <th scope="col">Category</th>
      <th scope="col">Fee Paying Category</th>
      <th scope="col">Admission Calendar Year</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <tr>
          <td></td>
      </tr>
    <?php
        require_once 'inc_con.php';
        require_once 'inc_function.php';
        $result = list_of_student_submitted($conn);
        $count=1;
        if ($result)
        {
          while ($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            echo "<td>",$row[0],"</td>";
            echo "<td>",$row[1],"</td>";
            echo "<td>",$row[2],"</td>";
            echo "<td>",$row[3],"</td>";
            echo "<td>",$row[4],"</td>";
            echo "<td>",$row[5],"</td>";
            echo "<td>",$row[6],"</td>";
            echo "<td>",$row[7],"</td>";
            echo '<td>
              <form action="fee_category_approval.php" method="post">
              <input class="form-control mt-3" type="text" name="prn" value="';echo $row[0],'" id="prn" hidden placeholder="Enter PRN..." />
              <input type="submit" class="btn btn-success" name="approve_fee_category" value="Approve Fee Category" id="approve_fee_category">
              </form>
              <form action="disapprove_fee_paying_category.php" method="post">
              <input class="form-control mt-3" type="text" name="prn" value="';echo $row[0],'" id="prn" hidden placeholder="Enter PRN..." />
              <input type="submit" class="btn btn-danger" name="approve_fee_category" value="Cancel Form" id="disapprove_fee_category">
              </form>
             </td>';
            echo "</tr>";
    
          }
        }
        
    
    
    ?>
  </tbody>
</table>

</section>
