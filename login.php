<?php session_start();
if(isset($_SESSION['id']) && isset($_SESSION['username'])&& isset($_SESSION['location'])){
header('location:blank-page.php');
if(isset($_SESSION['url'])){
$backlink =  $_SESSION['url'];
header("location:$backlink");

}else{

header('location:index.php');
}


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

        if(isset($_SESSION['url'])){
        $backlink =  $_SESSION['url'];
     header("location:$backlink");
   }else{
     header("location:index.php");
   }

} else {
array_push($errors,"Incorrect Email or Password!!!");
}

  }

}









 ?>



<!DOCTYPE html>
<html lang="en">


<!-- login14-->

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
                                    <form class="login-form" method="post">
                                      <em class="text-danger"> <?php include 'errors.php'; ?></em>
                                        <div class="row">
                                          <div class="col-lg-12 mt-2">
                                                  <label class="">Email</label>
                                              <input type="email" name="email"class="form-control" placeholder="Email" required="" value="<?php echo $email; ?>">
                                          </div>
                                          <div class="col-lg-12 mt-2">
                                                  <label class="">Password</label>
                                              <input type="password"  name="password"class="form-control" placeholder="Password" required="" value="<?php echo $password; ?>">
                                          </div>

<div class="col-lg-12 mt-4 mb-3">
    <input type="submit" class="btn btn-custom w-100" value="sigin" name="login">
</div>

                                            <div class="mx-auto">
                                                <p class="mb-0 mt-2"><small class="text-dark mr-2">Don't have an account ?</small> <a href="signup.php" class="text-dark font-weight-bold">Sign Up</a></p>
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


<!-- login14-->
</html>
