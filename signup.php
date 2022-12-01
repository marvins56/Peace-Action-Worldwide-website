<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['username'])&& isset($_SESSION['location'])){
  header('location:blank-page.php');
}


include 'database.php';

   $username= "";
   $email= "";
   $password= "";
    $password1= "";
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


                                     if($password1 != $password1)
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

   //if it doent exist register teh user
     // checking for errors
     // Finally, register user if there are no errors in the form
                 if (count($errors) == 0) {


                   $maxsize = 5242880; // 5MB

                             $name = $_FILES['file']['name'];
                             $target_dir = "profile_images/";
                             $target_file = $target_dir . $_FILES["file"]["name"];

                             // Select file type
                             $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                             // Valid file extensions
                             $extensions_arr = array("jpg","png","jpeg","gif");
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
header("location:login.php");
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


<!-- signup14-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive Multipurpose HTML5 Business Template">
    <meta name="author" content="Shreethemes">

    <link rel="shortcut icon" href="images/favicon.ico">

    <title>Peace And Action WorldWide</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Poppins" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Magnificpopup Css -->
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">

    <!-- Bootstrap core CSS -->
    <link href="css/materialdesignicons.min.css" rel="stylesheet">
    <link href="css/fontawesome.css" rel="stylesheet">
    <link href="css/pe-icon-7-stroke.css" rel="stylesheet">

    <!--Slider-->
        <link rel="stylesheet" href="css/slick.css"/>
    <link rel="stylesheet" href="css/slick-theme.css"/>

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <link href="css/default.css" rel="stylesheet">

</head>

    <body>
        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>

        <!-- Navigation Bar-->
        <section class="bg-home" style="background-image: url('images/home/bg-login.jpg');">
            <div class="bg-overlay"></div>
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-lg-4">
                                <div class="bg-white p-30 rounded box-shadow">
                                    <div class="text-center">
                                        <h4><a href="index.php"><img src="images/logo.png" height="60" alt="logo"></a></h4>
                                        <div class="spacer-15"></div>
                                    </div>
                                    <form class="login-form" method="POST" enctype="multipart/form-data">
                                    <em class="text-danger">   <?php include 'errors.php' ?></em>
                                        <div class="row">
                                            <div class="col-lg-12 mt-2">

                                                <label class="">First name</label>
                                                <input type="text" name="username" class="form-control" placeholder="Your Name"  required="" <?php echo $username; ?>>
                                            </div>
                                            <div class="col-lg-12 mt-2">
                                                    <label class="">Email</label>
                                                <input type="email" name="email"class="form-control" placeholder="Email" required="" value="<?php echo $email; ?>">
                                            </div>
                                            <div class="col-lg-12 mt-2">
                                                    <label class="">Password</label>
                                                <input type="password"  name="password"class="form-control" placeholder="Password" required="" value="<?php echo $password; ?>">
                                            </div>
                                            <div class="col-lg-12 mt-2">
                                                    <label class="">Confirm Password</label>
                                                <input type="password"  name="password1"class="form-control" placeholder="Confirm Password" required="" value="">
                                            </div>
                                            <div class="col-lg-12 mt-2">
                                                    <label class="">upload image</label>
                                                <input type="file" name="file" class="form-control"  required="">
                                            </div>

                                            <div class="col-lg-12 mt-4 mb-3">
                                                <input type="submit" class="btn btn-custom w-100" value="Register" name="register">
                                            </div>
                                            <div class="mx-auto">
                                                <p class="mb-0 mt-2"><small class="text-dark mr-2">Already have an account ?</small> <a href="login.php" class="text-dark font-weight-bold">Sign in</a></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- HOME END-->

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Portfolio -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/isotope.js"></script>
        <!-- Carousel -->
        <script src="js/slick.min.js"></script>
        <script src="js/slick.init.js"></script>
        <!--custom script-->
        <script src="js/app.js"></script>

    </body>


<!-- signup14-->
</html>
