
<?php

 include 'head.php';
include 'database.php';
?>







      <?php

      $idprog = $_GET['programid'];
      if(isset($idprog)){
      $sql = "SELECT *  from programs where program = '$idprog' order by rand() limit 1 ";
      $res = mysqli_query($conn,$sql);
      if($res){
        $row = mysqli_fetch_assoc($res);
        $program = $row['program'];
          $header = $row['header'];
            $content1 = $row['content'];

        $location = $row['location'];
?>
<section class="section bg-home" style="background-image: url('<?php echo $location; ?>'); width:100%;">
    <div class="bg-overlay"></div>
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="page-next-level text-white">
                            <h4 class="text-uppercase">PROGRAM / REPORT</h4>
                            <div class="page-next"> <a href="index.php">Home</a> <i class="mdi mdi-chevron-right"></i> &nbsp;<a href="#">program / report</a> <i class="mdi mdi-chevron-right"></i> &nbsp;<span>Blog</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- HOME END-->


<?php


      }
      }else {
        echo  '<div class="alert alert-warning "role="alert">
          INVALID  PROGRAM / EVENT ID..
        </div>';
      }
       ?>



<section>
<h2 class="text-center">DETAILED PROGRAM CONTENT</h2>
</section>

<section>
<div class="row justify-content-center">


    <?php
      $sql1 = "SELECT *  from programs where program = '$idprog'";
    $res1 = mysqli_query($conn,$sql1);
    if($res1){
      while($rows = mysqli_fetch_assoc($res1)){
$id12  = $rows['id'];
  $program1 = $rows['program'];
        $header1 = $rows['header'];
          $content2 = $rows['content'];

      $location1 = $rows['location'];
echo '
<div class="col">
                              <div class="btn-group mt-2 mr-2">
                                <button type="button" class="btn btn-outline-white btn-rounded btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample'.$id12.'" aria-expanded="false" aria-controls="collapseExample" >'.substr($content2,0,20).'....</button>
                                <button type="button" data-toggle="dropdown" class="btn btn-buttons btn-default dropdown-toggle"><span class="caret"></span></button>
                              </div>



</p>
<div class="collapse" id="collapseExample'.$id12.'">
<!-- ABOUT US START -->
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-6">
                <div class="about-section text-right mr-lg-3">
                    <h4 class="text-uppercase">'.$header1.'</h4>
                    <div class="spacer-15"></div>
                    <p class="text-muted">'.$content1.'</p>

                </div>
            </div>

            <div class="col-lg-5 col-md-6">
                <div class="about-pic mt-sm-30">
                    <img src="'.$location1.'" class="img-fluid" alt="" style = "width:100%;height:70%;">
                </div>
            </div>
        </div>
    </div>
</section>

</div>
</div>
';

    }}
      ?>


</div>


</section>


            <!-- RESUME START -->
            <section class="section bg-light" id="resume">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="section-title">
                                <h3>our reports</h3>
                                <div class="spacer-15"></div>
                                <p class="text-muted mb-0">Donec sodales sagittis magna. Excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi.</p>
                                <div class="spacer-30"></div>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-4">
                                <div class="history mt-30">

                                  <?php
$sqlq = "SELECT * from programs  limit 10";
$res5 = mysqli_query($conn,$sqlq);
while ($rows = mysqli_fetch_assoc($res5)) {
  $program3 = $rows['program'];
  ?>

<div class="history-box">
    <i class="icon fas fa-graduation-cap"></i>
    <label class=""><?php echo $rows['program']; ?></label>

    <h5><?php echo $rows['header']; ?></h5>

    <?php
    $query = "SELECT * from reports where status = '$program3' ";
    $results3 = mysqli_query($conn,$query);
  while ($rows3 = mysqli_fetch_assoc($results3)) {
  $prev = $rows3['preview'];
  $id3 = $rows3['id'];
  }
echo '<p class="text-muted mb-0">'.$prev.'</p>
';
echo '<a href="reports.php?reportid='.$id3.'">view more..</a>';
  ?>

</div>

<?php }  ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- RESUME END -->


      <?php include 'footer.php'; ?>
