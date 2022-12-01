
<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['username'])&& isset($_SESSION['location'])){
header('location:index.php');
}

include 'database.php';

$email= "";

$password = "";


$errors = array();
if(isset($_POST['login'])){

  // receive all input values from the form to preventig injection
  $email = mysqli_real_escape_string($conn, $_POST['email']);

  $password = mysqli_real_escape_string($conn, $_POST['password']);

          //errors for the form
          if(empty($email))
          {array_push($errors,"email required or invalid email length");}



          if(empty($password))
          {array_push($errors,"password required");}


// checking if user exists
$user_check_query = "SELECT * FROM users WHERE email='$email'  LIMIT 1";
$result = mysqli_query($conn, $user_check_query);
$user = mysqli_fetch_assoc($result);

      if ($user) {
         // if user exists
        if ($user['email'] != $email) {
          array_push($errors, "email doesnot exists");
        }



      }

  if (count($errors) == 0) {
$pass = md5($password);
  $query = "SELECT * FROM  users WHERE (email='$email' and password='$pass')";
  $result = mysqli_query($conn, $query);

  if ($row = mysqli_fetch_array($result)) {
		$_SESSION['id'] = $row['id'];
    	$_SESSION['username'] = $row['username'];
	  $_SESSION['email']  = $row['email'];
    	  $_SESSION['location']  = $row['location'];


     header("location:index.php");


} else {
array_push($errors,"Incorrect Email or Password!!!");
}

  }

}









 ?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>paw admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">login</h3>
                <form method="post" >
                  <?php include 'errors.php'; ?>

                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control p_input" name="email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control p_input" name="password">
                  </div>
                  <div class="form-group">

                  <div class="text-center">
                    <input type="submit" class="btn btn-primary btn-block enter-btn" name="login" value="login">
                  </div>


                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>
