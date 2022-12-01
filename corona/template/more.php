<?php include 'header.php'; ?>
<?php include 'database.php'; ?>
<div class="main-panel">
  <div class="content-wrapper">
<div class="row">
  <div class="col-md-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
          <h4 class="card-title mb-1">reports details ((  <?php
                      $query45 = "SELECT count(DISTINCT(status)) FROM reports";
                  $result45 = mysqli_query($conn,$query45);
                  $rows45 = mysqli_fetch_row($result45);
                  $total65=  $rows45[0];
                  echo $total65;
                  ?>)) categories</h4>
          <p class="text-muted mb-1">report comfigs</p>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="preview-list">


              <?php
$sqlprog = "SELECT * FROM reports";
$resprog = mysqli_query($conn,$sqlprog);
if($resprog){
while ($rowsprog = mysqli_fetch_assoc($resprog)) {

?>
<div class="preview-item border-bottom">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-primary">
                    <i class="mdi mdi-file-document"></i>
                  </div>
                </div>
                <div class="preview-item-content d-sm-flex flex-grow">
                  <div class="flex-grow">
                    <h6 class="preview-subject"><?php echo $rowsprog['header'] ?></h6>
                    <p class="text-muted mb-0"><?php echo substr($rowsprog['preview'],0,50)?>..</p>
                  </div>
                  <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                    <p  class="badge badge-outline-danger"><a href="delete.php?deleteid=<?php echo $rowsprog['id'] ?>">delete</a></p>
                    <p class="badge badge-outline-success"><a href="delete.php?updateid=<?php echo $rowsprog['id'] ?>" style="a{
                      text-decoration: none;
                      color:white;
                      }">edit</a></p>
                  </div>
                </div>
              </div>
<?php
}}
?>
<p class="badge badge-outline-success"> <a href="more.php"> load more</a>  </p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<?php include 'footer.php'; ?>
