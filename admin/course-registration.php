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
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_login'])) {
  header('Location: login.php');
  exit();
}

require_once 'db_con.php'; // Include your database connection

// Handle course drop form submission
if (isset($_POST['drop_course'])) {
  $student_id = $_SESSION['user_id']; // Get the student's ID from the session
  $course_id = $_POST['course_id'];   // Get the course ID from the form

  // Delete the enrollment record from the database
  $delete_query = "DELETE FROM enrollments WHERE student_id = $student_id AND course_id = $course_id";
  $result = mysqli_query($db_con, $delete_query);

  if ($result) {
    $message = "Course dropped successfully.";
  } else {
    $error_message = "Failed to drop the course. Please try again.";
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
    <h2>Drop Course</h2>
    <?php
    if (isset($message)) {
      echo '<div class="alert alert-success">' . $message . '</div>';
    } elseif (isset($error_message)) {
      echo '<div class="alert alert-danger">' . $error_message . '</div>';
    }
    ?>
    <form method="POST">
      <div class="form-group">
        <label for="course_id">Select Course to Drop:</label>
        <select class="form-control" name="course_id" required>
          <option value="">Select Course</option>
          <!-- Populate this dropdown with the student's enrolled courses -->
          <!-- You can fetch enrolled courses for the logged-in student from the database -->
        </select>
      </div>
      <button type="submit" name="drop_course" class="btn btn-danger">Drop Course</button>
    </form>
  </div>

  <!-- Include your JavaScript scripts here -->
</body>
</html>
