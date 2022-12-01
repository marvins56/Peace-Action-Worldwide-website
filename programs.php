<?php
include 'database.php';
 include 'head.php'; ?>

<section class="section">
    <div class="container">
        <div class="row">


              <?php


              $sql = "SELECT *  from programs";
              $res = mysqli_query($conn,$sql);
              if($res){
                while($row = mysqli_fetch_assoc($res)){

                $program = $row['program'];
                  $header = $row['header'];
                    $content = $row['content'];

                $location = $row['location'];

echo '
  <div class="col-md-4">
<article class="post blog-post">
    <div class="post-preview">
        <a href="structure.php?programid='.$program.'"><img src="'.$location.'" alt="" class="img-fluid mx-auto d-block" style="width:100%; height:20rem;"></a>
    </div>

    <div class="post-header">
        <h4 class="post-title"><a href="structure.php?programid='.$program.'">'.$header.'</h4>
        <ul class="post-meta">
            <li><i class="mdi mdi-calendar"></i> <small>'.$program.'</small></li>
            <li><i class="mdi mdi-tag-text-outline"></i>

        </ul>

        <div class="post-content">
            <p class="text-muted">'.substr($content,0,100).'....</p>
        </div>

        <span class="bar"></span>

        <div class="post-footer">

            <div class="post-more"><a href="structure.php?programid='.$program.'">Read More <i class="mdi mdi-arrow-right"></i></a></div>
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
