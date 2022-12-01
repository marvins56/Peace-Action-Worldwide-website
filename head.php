<?php
 session_start();
 include 'database.php';
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$search;
?>
<!DOCTYPE html>
<html lang="en">


<!-- business-4.html 42:40-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Peace And Action WorldWide">
    <meta name="author" content="Shreethemes">

    <link rel="shortcut icon" href="images/favicon.ico">

    <title>Peace And Action WorldWide </title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Poppins" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="link.css">

    <!-- Magnificpopup Css -->
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">

    <!-- Bootstrap core CSS -->
    <link href="css/materialdesignicons.min.css" rel="stylesheet">
    <link href="css/fontawesome.css" rel="stylesheet">
    <link href="css/pe-icon-7-stroke.css" rel="stylesheet">

    <!--Slider-->
    <link rel="stylesheet" href="css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="css/owl.theme.css"/>
    <link rel="stylesheet" href="css/owl.transitions.css"/>
    <link rel="stylesheet" href="css/slick.css"/>
    <link rel="stylesheet" href="css/slick-theme.css"/>

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <link href="css/default.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

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
        <div class="tagline hidden-md">
            <div class="container">
                <div class="float-left">
                    <div class="phone">
                        <i class="fas fa-mail-bulk"></i> paw@gmail.com
                    </div>
                </div>
                <div class="float-right">
                    <ul class="top_socials">
                        <li><a href="#"><i class="fas fa-phone" data-placement="bottom" title="*********"></i></a> </li>

                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <!-- Navigation Bar-->
        <header id="topnav" class="defaultscroll fixed-top navbar-sticky sticky">
            <div class="container">
                <!-- Logo container-->
                <div>
                    <a href="index.php" class="logo">
                        <img src="images/logo.png" alt="missing_logo" height="50" data-toggle="tooltip" data-placement="bottom" title="Peace & Action WorldWide">
                    </a>
                </div>
                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>

                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">
                        <li class="has-submenu">
                            <a href="index.php">Home</a><span class="menu-arrow"></span>
                        </li>

                        <li class="has-submenu">
                            <a href="#programs">Our Programs</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                              <?php
$queries = "SELECT DISTINCT(program) from programs";
$res = mysqli_query($conn,$queries);
if($res){
  while($rows = mysqli_fetch_assoc($res)){

    $program1 = $rows['program'];
      $_SESSION['program'] = $program1;

echo '<li><a href="index.php#programs">'.$program1.'</a></li>
';

    }
  }else {
    echo 'connection failed to database';
  }
                               ?>

                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="index.php#events">EVENTS</a><span class="menu-arrow"></span>
                        </li>
                        <li class="has-submenu">
                            <a href="#">jobs</a><span class="menu-arrow"></span>
                        </li>
                        <li class="has-submenu">
                            <a href="about.php">About</a><span class="menu-arrow"></span>
                        </li>
                        <li class="has-submenu">
                            <a href="about.php">


<?php

if(isset($_SESSION['id']) && isset($_SESSION['username'])&& isset($_SESSION['location'])){
$image = $_SESSION['location'];
$username = $_SESSION['username'];
echo '<img src="'.$image.'" alt="" style="width:60px;border-radius:50%; margin-top:-20px;" data-toggle="tooltip" data-placement="bottom" title="'.$username.'"> ';
}
 ?>

                            </a>


                        </li>
<li>
  <?php

  if(isset($_SESSION['id']) && isset($_SESSION['username'])&& isset($_SESSION['location'])){
    echo '  <a href="logout.php"><i class="fas fa-sign-out-alt" style="margin-top:-20px;" data-toggle="tooltip" data-placement="bottom" title="logout"></i></a>';
  }else {

    echo ' <a href=login.php><i class="fas fa-user-circle fa-4x" style="margin-top:-20px;" data-toggle="tooltip" data-placement="bottom" title="user Not logged in"></i> </a>';


  }

   ?>



</li>

                    </ul>
                    <!-- End navigation menu-->
                </div>
            </div>
        </header>
        <!-- End Navigation Bar-->
