<?php include 'head.php';
include 'database.php';
$search;
 ?>
<!-- HOME START-->
<section class="bg-home" style="background-image: url('images/home/bg-home-7.jpg');">
    <div class="bg-overlay"></div>
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="title-heading text-center">

                              <h1 ><span class="element" data-elements="Our gallery, our projects...  "></span></h1>

                            <p class="text-white">
Working towards ensuring a life free from inequality and discrimination among the vulnerable.
                            </p>
                            <div class="mt-3">

                                <a href="login.php" class="btn btn-outline-white">JOIN OUR COMMUNITY</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="business-home-shape">
                        <img src="images/shape-b4.png" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- HOME END-->

<section class="section">
<div class="container">
    <div class="row">
        <div class="col-md-8">

                <div class="port portfolio-masonry">
                    <div class="portfolioContainer row">
                      <?php

                       $sqlgalley = "SELECT *  from galley order by rand() ";
                      $resgalley = mysqli_query($conn,$sqlgalley);
                      if($resgalley){
                        while($rowgalley = mysqli_fetch_assoc($resgalley)){
                       ?>
                        <div class="col-6  col-lg-4  col-lg-3  col-md-5 p-10">
                            <div class="portfolio-box p-10">
                                <a class="mfp-image" href="corona/template/<?php echo $rowgalley['location']; ?>" title="<?php echo $rowgalley['category']; ?>" data-toggle="tooltip" data-placement="top" title="<?php echo $rowgalley['category']; ?>">
                                    <img src="corona/template/<?php echo $rowgalley['location']; ?>" class="img-fluid" alt="<?php echo $rowgalley['category']; ?>" >
                                </a>
                            </div>
                        </div>

<?php }} ?>
                    </div>
                </div>

        </div>
        <div class="col-lg-4 col-md-4">
                              <div class="ml-lg-4">
                                  <h4 class="text-uppercase">OUR GALLERY</h4>
                                  <span class="bar"></span>
                                  <div class="element-sidebar">
                                      <ul class="list-unstyled">


<?php

                 $sqlsearch = "SELECT distinct(category) FROM galley";
                 $ressearch = mysqli_query($conn,$sqlsearch);
                 if($res){
while($rowssearch = mysqli_fetch_assoc($ressearch)){

 echo '<li><a href="gallery_search.php?searchid='.$rowssearch['category'].'">
   <b class="mdi mdi-chevron-right"></b>'.$rowssearch['category'].'</a></li>';

}

} ?>

                                      </ul>
                                  </div>
                              </div>
                          </div>
    </div>

</div>
</section>
<!--  -->
<?php include 'footer.php'; ?>
