

<?php
session_start();
include 'database.php';
   $username= "";
   $email= "";
   $password= "";
   $file = "";
   $errors = array();

   if(isset($_POST['register'])){

     // receive all input values from the form to preventig injection
     $username = mysqli_real_escape_string($conn, $_POST['username']);
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $password = mysqli_real_escape_string($conn, $_POST['password']);
       $password1 = mysqli_real_escape_string($conn, $_POST['password1']);

             //errors for the form
             if(empty($username))
             {array_push($errors,"username required or invalid username length");}

             if(empty($email) || !preg_match("/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $email))
             {array_push($errors,"email required or invalid email format");}

             if(empty($password) )
             {array_push($errors,"enter password");}

                         if(empty($password1) )
                         {array_push($errors,"re enter password");}


                                     if($password != $password1)
                                     {array_push($errors," password missmatch");}

   // checking if user exists
   $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
   $result = mysqli_query($conn, $user_check_query);
   $user = mysqli_fetch_assoc($result);

         if ($user) { // if user exists
           if ($user['username'] === $username) {
             array_push($errors, "Username already exists");
           }
           if ($user['email'] === $email) {
             array_push($errors, "email already exists");
           }

         }


                 if (count($errors) == 0) {
                   //encrypt the password before saving in the database

                   $maxsize = 5242880; // 5MB

                             $name = $_FILES['file']['name'];
                             $target_dir = "assets/profile_images/";
                             $target_file = $target_dir . $_FILES["file"]["name"];

                             // Select file type
                             $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                             // Valid file extensions
                             $extensions_arr = array("jpg","png","jpeg");
                             // Check extension
                                       if( in_array($videoFileType,$extensions_arr) ){
 $passwordhash = md5($password1);
                                           // Check file size
                                           if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                                               echo "File too large. File must be less than 5MB.";
                                           }else{
                                               // Upload
                                               if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                                                   // Insert record
                                                   $query = "INSERT INTO users(username,email,password,name,location)
                                                    VALUES('$username','$email','$passwordhash','".$name."','".$target_file."')";

                                               $res =     mysqli_query($conn,$query);
                                                   if($res){


echo '<div class="alert alert-success" role="alert">
  registration successfull please login
</div>';
                                                     }
                                                 else{
                                               array_push($errors,"database connection failed");
                                                   }
                                               }else{
                                               array_push($errors,"upload failed");
                                               }
                                           }

                                       }else
                                       {
                                           array_push($errors,"Invalid file extension.");
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
                <h3 class="card-title text-left mb-3">Register</h3>
                <form method="post" enctype="multipart/form-data">
                  <?php include 'errors.php'; ?>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control " name="username">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control " name="email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control " name="password">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control " name="password1">
                  </div>
                  <div class="form-group">
                    <label>Profile images</label>
                    <input type="file" class="form-control " name="file">
                  </div>
                  <div class="text-center">
                    <input type="submit" class="btn btn-primary btn-block enter-btn" name="register" value="register">
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
