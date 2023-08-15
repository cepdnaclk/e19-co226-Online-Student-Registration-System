<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
?>
<?php

// Check if the user is logged in
if (!isset($_SESSION['user_login'])) {
  header('Location: login.php');
  exit();
}

require_once 'db_con.php'; // Include your database connection

// Handle course add form submission
if (isset($_POST['add_course'])) {
  $showuser = $_SESSION['user_login'];
  $haha = mysqli_query($db_con,"SELECT * FROM `users` WHERE `username`='$showuser';");
  $showrow=mysqli_fetch_array($haha);

  
  $student_id =$showrow['id']; // Get the student's ID from the session
  $course_id = $_POST['course_id'];   // Get the selected course ID from the form

  // Check if the student is already enrolled in the selected course
  $check_query = "SELECT * FROM enrollments WHERE student_id = $student_id AND course_id = $course_id";
  $check_result = mysqli_query($db_con, $check_query);

  if (mysqli_num_rows($check_result) > 0) {
    $error_message = "You are already enrolled in this course.";
  } else {
    // Insert the enrollment record into the database
    $insert_query = "INSERT INTO enrollments (student_id, course_id) VALUES ($student_id, $course_id)";
    $insert_result = mysqli_query($db_con, $insert_query);

    if ($insert_result) {
      $message = "Course added successfully.";
    } else {
      $error_message = "Failed to add the course. Please try again.";
    }
  }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Drop Course</title>
  <!-- Include your CSS stylesheets here -->
</head>
<body>
  <!-- Include your navigation/header here -->

  <div class="container">
    <h2>Add Courses</h2>
    <?php
    if (isset($message)) {
      echo '<div class="alert alert-success">' . $message . '</div>';
    } elseif (isset($error_message)) {
      echo '<div class="alert alert-danger">' . $error_message . '</div>';
    }
    ?>
    <form method="POST">
      <div class="form-group">
        <label for="course_id">Select Course to Add:</label>
        <select class="form-control" name="course_id" required>
          <option value="" disabled selected>Select Course</option>
          <option value="1">History</option>
          <option value="2">Geography</option>
          <option value="3">Political Science</option>
          <option value="4">Psychology</option>
          <option value="5">Drama</option>
          <option value="6">Music</option>
          <option value="7">Mathematics</option>
          <option value="8">Anatomy</option>
        </select>
      </div>
      <button type="submit" name="add_course" class="btn btn-success">Add Course</button>
    </form>
  </div>

  <!-- Include your JavaScript scripts here -->
</body>
</html>
