

<section class="section-two bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 p-0">
              <div class="slider autoplay">
                  <div><img src="images/client/partner-1.png" style="width:50%; height:auto;"class="mx-auto d-block img-fluid" alt="img-missing"></div>
                  <div><img src="images/client/partner-2.png" style="width:50%; height:auto;"class="mx-auto d-block img-fluid" alt="img-missing"></div>
                  <div><img src="images/client/partner-3.png" style="width:50%; height:auto;" class="mx-auto d-block img-fluid" alt="img-missing"></div>
                  <div><img src="images/client/partner-4.png" style="width:50%; height:auto;" class="mx-auto d-block img-fluid" alt="img-missing"></div>
                  <div><img src="images/client/partner-5.png" style="width:50%; height:auto;" class="mx-auto d-block img-fluid" alt="img-missing"></div>
                  <div><img src="images/client/partner-1.png" style="width:50%; height:auto;" class="mx-auto d-block img-fluid" alt="img-missing"></div>
                  <div><img src="images/client/partner-2.png"  style="width:50%; height:auto;" class="mx-auto d-block img-fluid" alt="img-missing"></div>
                  <div><img src="images/client/partner-3.png"  style="width:50%; height:auto;" class="mx-auto d-block img-fluid" alt="img-missing"></div>
                  <div><img src="images/client/partner-4.png" style="width:50%; height:auto;" class="mx-auto d-block img-fluid" alt="img-missing"></div>
                  <div><img src="images/client/partner-5.png" style="width:50%; height:auto;" class="mx-auto d-block img-fluid" alt="img-missing"></div>
              </div>
            </div>
        </div>
    </div>
</section>
<!-- PARTNER END -->
        <footer class="footer">
            <div class="section-two">
                <div class="container">
                    <!--Footer Info -->
                    <div class="row footer-info">
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <div class="">
                                <a href="index.php" class="logo">
                                    <img src="images/logo.png" alt="missing_logo" height="60">
                                </a>
                            </div>
                            <p class="text-footer-clr mt-3">These cases are perfectly simple and easy to free hour, when nothing prevents distinguish.</p>
                            <div>
                                <ul class="list-unstyled social-icon">
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-apple"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4">
                            <div class="footer-head">
                                <h5 class="text-light">Company</h5>
                            </div>
                            <div class="footer-item mt-3">
                                <ul class="list-unstyled">
                                    <li><a href="#"><i class="fas fa-chevron-right mr-2"></i> About us</a></li>
                                    <li><a href="#"><i class="fas fa-chevron-right mr-2"></i> Services</a></li>
                                    <li><a href="#"><i class="fas fa-chevron-right mr-2"></i> Portfolio</a></li>
                                    <li><a href="#"><i class="fas fa-chevron-right mr-2"></i> News</a></li>
                                    <li><a href="#"><i class="fas fa-chevron-right mr-2"></i> FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4">
                            <div class="footer-head">
                                <h5 class="text-light">Useful</h5>
                            </div>
                            <div class="footer-item mt-3">
                                <ul class="list-unstyled">
                                    <li><a href="#"><i class="fas fa-chevron-right mr-2"></i> Accounts</a></li>
                                    <li><a href="#"><i class="fas fa-chevron-right mr-2"></i> Sales & Support</a></li>
                                    <li><a href="#"><i class="fas fa-chevron-right mr-2"></i> Orders Track</a></li>
                                    <li><a href="#"><i class="fas fa-chevron-right mr-2"></i> Download Center</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4">
                            <div class="footer-head">
                                <h5 class="text-light">Additional</h5>
                            </div>
                            <div class="footer-item mt-3">
                                <ul class="list-unstyled">
                                    <li><a href="#"><i class="fas fa-chevron-right mr-2"></i> Portfolio</a></li>
                                    <li><a href="#"><i class="fas fa-chevron-right mr-2"></i> Contact Us</a></li>
                                    <li><a href="#"><i class="fas fa-chevron-right mr-2"></i> Blog</a></li>
                                    <li><a href="#"><i class="fas fa-chevron-right mr-2"></i> Help Center</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="footer-head">
                                <h5 class="text-light">Newsletter</h5>
                            </div>
                            <div class="footer-news mt-3">
                                <p class="text-footer-clr">Subscribe to our email newsletter to receive useful articles and special offers.</p>
                                <div class="subscribed-form">
                                    <div class="subcribed-form">
                                      <?php

                                                    if(isset($_POST['subs'])){

                                                    $email = $_POST['email'];

                                                    if(empty($email)){
                                                      echo '
                                                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                                        <strong>please enter Email</strong>
                                                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>';
                                                    }else{
                                                    $sql = "INSERT into emais (email) values ('$email')";
                                                    $results = mysqli_query($conn,$sql);
                                                    if($results){
                                                      echo '
                                                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                                        <strong>thanks for subscribing</strong>
                                                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>';
                                                    }else{
                                                      echo '
                                                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                                        <strong> server error</strong>
                                                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>';
                                                    }

                                                    }
                                                    }

                                                       ?>
                                        <form action="" method="post">
                                            <input name="email" type="email" placeholder="Your Email" id="email" required="">
                                            <button type="submit" name="subs" class=""><span class="fab fa-telegram-plane"></span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Footer Info -->
                </div>
            </div>
            <hr>


        </footer>
        <!-- FOOTER END -->

        <!-- Back to top -->
        <a href="#" class="back-to-top" id="back-to-top">
            <i class="mdi mdi-chevron-up"> </i>
        </a>
        <!-- Back to top -->

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
        AOS.init();
        </script>
        <!-- Portfolio -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/isotope.js"></script>
        <script src="js/portfolio-filter.js"></script>
        <!-- Carousel -->
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/owlcarousel.init.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/slick.init.js"></script>
        <!-- VIDEO ICON -->
        <script src="js/magnific.init.js"></script>


        <!-- COUNTER -->
        <script src="js/counter.init.js"></script>
        <!--custom script-->
        <script src="js/app.js"></script>
        <script>
            // script for tab steps
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

                var href = $(e.target).attr('href');
                var $curr = $(".process-model  a[href='" + href + "']").parent();

                $('.process-model li').removeClass();

                $curr.addClass("active");
                $curr.prevAll().addClass("visited");
            });
        // end  script for tab steps
        </script>
        <script src="js/typed.js"></script>
        <script src="js/typed.init.js"></script>
        <script>
        window.replainSettings = { id: '73ca6c5b-421c-423e-9879-b59f3415ecde' };
        (function(u){var s=document.createElement('script');s.async=true;s.src=u;
        var x=document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);
        })('https://widget.replain.cc/dist/client.js');
        </script>
<script>(function(d){var s = d.createElement("script");s.setAttribute("data-account", "ohASbIuXm1");s.setAttribute("src", "https://cdn.userway.org/widget.js");(d.body || d.head).appendChild(s);})(document)</script><noscript>Please ensure Javascript is enabled for purposes of <a href="https://userway.org">website accessibility</a></noscript>
    </body>


<!-- business-4.html 42:42-->
</html>
