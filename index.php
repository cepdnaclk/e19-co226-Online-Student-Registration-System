<?php require_once 'admin/db_con.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>homepage</title>
  </head>
  <body style="background-image: url('./admin/images/background.jpg'); background-size: cover; background-position: center center; background-repeat:no-repeat; background-color: rgba(0, 0, 0, 0.5);" >
    <div 
    class="container" 
    ><br>
      <a class="btn btn-primary float-right" href="admin/login.php">Login</a>
          <h1 class="text-center">Welcome to Student Registration  System  ...EduPro...!</h1><br>

          <div class="row">
            <div class="col-md-4 offset-md-4">
              <form method="POST">
            <table class="text-center infotable bg-white">
              <tr>
                <th colspan="2">
                  <p class="text-center">Student Information</p>
                </th>
              </tr>
              <tr>
                <td>
                   <p>Choose Academic Year</p>
                </td>
                <td>
                   <select class="form-control" name="choose">
                     <option value="">
                       Select
                     </option>
                     <option value="1st">
                       1st
                     </option>
                     <option value="2nd">
                       2nd
                     </option>
                     <option value="3rd">
                       3rd
                     </option>
                     <option value="4th">
                       4th
                     </option>
                     <option value="5th">
                       5th
                     </option>
                   </select>
                </td>
              </tr>

              <tr>
                <td>
                  <p><label for="roll">Admission No</label></p>
                </td>
                <td>
                  <input class="form-control" type="text" pattern="[0-9]{6}" id="roll" placeholder="Admission No.." name="roll">
                </td>
              </tr>
              <tr>
                <td colspan="2" class="text-center">
                  <input class="btn btn-danger" type="submit" name="showinfo">
                </td>
              </tr>
            </table>
          </form>
            </div>
          </div>
        <br>
        <?php if (isset($_POST['showinfo'])) {
          $choose= $_POST['choose'];
          $roll = $_POST['roll'];
          if (!empty($choose && $roll)) {
            $query = mysqli_query($db_con,"SELECT * FROM `student_info` WHERE `roll`='$roll' AND `class`='$choose'");
            if (!empty($row=mysqli_fetch_array($query))) {
              if ($row['roll']==$roll && $choose==$row['class']) {
                $stroll= $row['roll'];
                $stname= $row['name'];
                $stclass= $row['class'];
                $city= $row['city'];
                $photo= $row['photo'];
                $pcontact= $row['pcontact'];
                $datetime=$row['datetime'];
              ?>
        <div class="row">
          <div class="col-sm-6 offset-sm-3">
            <table class="text-center infotable bg-white">
              <tr>
                <td rowspan="6"><h3>Student Info</h3><img class="img-thumbnail" src="admin/images/<?= isset($photo)?$photo:'';?>" width="250px"></td>
                <td>Name</td>
                <td><?= isset($stname)?$stname:'';?></td>
              </tr>
              <tr>
                <td>Admission No</td>
                <td><?= isset($stroll)?$stroll:'';?></td>
              </tr>
              <tr>
                <td> Academic Year</td>
                <td><?= isset($stclass)?$stclass:'';?></td>
              </tr>
              <tr>
                <td>City</td>
                <td><?= isset($city)?$city:'';?></td>
              </tr>
              <tr>
                <td>Contact No</td>
                <td><?= isset($pcontact)?$pcontact:'';?></td>
              </tr>
              <tr>
                <td>Registered Date</td>
                <td><?= isset($datetime)?$datetime:'';?></td>
              </tr>
            </table>
          </div>
        </div>  
      <?php 
          }else{
                echo '<p style="color:red;">Please Input Valid Roll & Email</p>';
              }
            }else{
              echo '<p style="color:red;">Your Input Doesn\'t Match!</p>';
            }
            }else{?>
              <script type="text/javascript">alert("Data Not Found!");</script>
            <?php }
          }; ?>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>