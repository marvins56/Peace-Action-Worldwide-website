<?php
include 'database.php';
 include 'head.php'; ?>
 <section class="section bg-home" style="background-image: url('images/home/bg-home-7.jpg'); width:100%;">
     <div class="bg-overlay"></div>
     <div class="home-center">
         <div class="home-desc-center">
             <div class="container">
                 <div class="row justify-content-center">
                     <div class="col-lg-12">
                         <div class="page-next-level text-white">
                             <h4 class="text-uppercase">reports</h4>
                             <div class="page-next"> <a href="index.php">Home</a> <i class="mdi mdi-chevron-right"></i> &nbsp;<a href="#">reports</a> <i class="mdi mdi-chevron-right"></i> &nbsp;<span>Blog</span> </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
<section class="section">
    <div class="container">
        <div class="row">


              <?php


              $sql = "SELECT *  from reports";
              $res = mysqli_query($conn,$sql);
              if($res){
                while($row = mysqli_fetch_assoc($res)){
    $preview = $row['preview'];
                $status = $row['status'];
                  $header = $row['header'];
                    $content = $row['content'];



echo '
  <div class="col-md-4">
<article class="post blog-post">
<div class="post-content">
    <p class="text-muted">PREVIEW:'.substr($preview,0,50).'....</p>
</div>

    <div class="post-header">
        <h4 class="post-title"><a href="structure.php?programid='.$status.'">'.$header.'</h4>
        <ul class="post-meta">
            <li><i class="mdi mdi-calendar"></i> <small>'.$status.'</small></li>
            <li><i class="mdi mdi-tag-text-outline"></i>

        </ul>

        <div class="post-content">
            <p class="text-muted">'.substr($content,0,50).'....</p>
        </div>

        <span class="bar"></span>

        <div class="post-footer">

            <div class="post-more"><a href="structure.php?programid='.$status.'">Read More <i class="mdi mdi-arrow-right"></i></a></div>
        </div>
    </div>    </div>
</article>
';




              }
              }

               ?>








        </div>

    </div>
</section>



      <?php include 'footer.php'; ?>
