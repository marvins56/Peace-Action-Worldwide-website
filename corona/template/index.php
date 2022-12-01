<?php include 'header.php';
include 'database.php';
?>
        <div class="main-panel">
          <div class="content-wrapper">

            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">
                            <?php
                                      $query = "SELECT COUNT(username) FROM users";
                                  $result = mysqli_query($conn,$query);
                                  $rows = mysqli_fetch_row($result);
                                  $total1=  $rows[0];
                                  echo $total1;
                                  ?>

                          </h3>

                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="">users</span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">users joined the community</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">
                            <?php
                                      $query = "SELECT COUNT(status) FROM donate where status = 'successful'";
                                  $result = mysqli_query($conn,$query);
                                  $rows = mysqli_fetch_row($result);
                                  $totalt=  $rows[0];
                                  echo $totalt;
                                  ?>
                          </h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span >transactions</span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">successfull transactions</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">                      <?php
                                                          $query = "SELECT count(DISTINCT(status)) FROM reports";
                                                      $result = mysqli_query($conn,$query);
                                                      $rows = mysqli_fetch_row($result);
                                                      $total2=  $rows[0];
                                                      echo $total2;
                                                      ?>
</h3>

                          <p class="text-danger ml-2 mb-0 font-weight-medium">reports</p>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-danger">
                          <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">available reports</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0">
                            <?php
                                      $query = "SELECT count(DISTINCT(program)) FROM programs";
                                  $result = mysqli_query($conn,$query);
                                  $rows = mysqli_fetch_row($result);
                                  $total3=  $rows[0];
                                  echo $total3;
                                  ?>

                          </h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span >programs</span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted text-danger font-weight-normal">
                  programs

                    </h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">donation transaction</h4>

                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Tranfers from fluterwave</h6>

                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0"> shs..
                          <?php
                                    $query = "SELECT sum(amount) FROM donate";
                                $result = mysqli_query($conn,$query);
                                $rows = mysqli_fetch_row($result);
                                $total4=  $rows[0];
                                echo $total4;
                                ?>


                        </h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title mb-1">report details</h4>
                      <p class="text-muted mb-1">reports comfigs</p>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="preview-list">


                          <?php
$sqlprog = "SELECT * FROM reports limit 4";
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
                                <p class="text-muted mb-0"><?php echo substr($rowsprog['status'],0,80); ?>..</p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p  class="badge badge-outline-danger"><a href="deletereport.php?deleteid=<?php echo $rowsprog['id'] ?>">delete</a></p>
                                <p class="badge badge-outline-success"><a href="#report.php?updateid=<?php echo $rowsprog['id'] ?>" style="a{
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
            <div class="row">
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>image categories</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">

                            <?php
                                      $query = "SELECT count(DISTINCT(category)) FROM galley";
                                  $result = mysqli_query($conn,$query);
                                  $rows = mysqli_fetch_row($result);
                                  $total5=  $rows[0];
                                  echo $total5;
                                  ?>
                          </h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium"><?php echo $total5; ?> categories</p>
                        </div>
                        <h6 class="text-muted font-weight-normal">image categories</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>images</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">
                            <?php
                                      $query = "SELECT count(DISTINCT(name)) FROM galley";
                                  $result = mysqli_query($conn,$query);
                                  $rows = mysqli_fetch_row($result);
                                  $total6=  $rows[0];
                                  echo $total6;
                                  ?>
                          </h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium"><?php echo $total6; ?> images</p>
                        </div>
                        <h6 class="text-muted font-weight-normal"> all gallery images on the site</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5> subscribers</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">subscriptions</h2>
                          <p class="text-danger ml-2 mb-0 font-weight-medium">                        <?php
                                                            $query34 = "SELECT count(DISTINCT(email)) FROM emais";
                                                        $result34 = mysqli_query($conn,$query34);
                                                        $rows34= mysqli_fetch_row($result34);
                                                        $total634=  $rows34[0];

                                                        ?></p>
                        </div>
                        <h6 class="text-muted font-weight-normal"><?php echo $total634; ?></h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">transaction history(<?php
                                $query45 = "SELECT count(DISTINCT(name)) FROM donate";
                            $result45 = mysqli_query($conn,$query45);
                            $rows45 = mysqli_fetch_row($result45);
                            $total65=  $rows45[0];
                            echo $total65;
                            ?>)</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>

                            <th> Client Name </th>
                            <th> email</th>
                            <th> amount</th>
                            <th> trans_id</th>
                            <th> status</th>

                              <th>reason</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php
$sql = "SELECT * FROM donate limit 5";
$res = mysqli_query($conn,$sql);
if($res){
  while ($rows = mysqli_fetch_assoc($res)) {

?>

<tr>

  <td>

    <span class="pl-2"><?php echo $rows['name']; ?></span>
  </td>
  <td> <?php echo $rows['email']; ?></td>
  <td>shs <?php echo $rows['amount']; ?></td>
  <td> <?php echo $rows['trans_id']; ?></td>
  <td>
    <div class="badge badge-outline-success"><?php echo $rows['status']; ?></div>
  </td>
  <td> <?php echo $rows['comments']; ?> </td>

</tr>

<?php
    // code...
  }

}else {
  echo '   <div class="alert alert-danger" role="aert">
       database connection failed
     </div>';
}

                         ?>



                        </tbody>
                      </table>
                      <td>
                        <p class="badge badge-outline-secondary"><a href="alltransactions.php">loadmore</a> </p>
                      </td>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">paw community</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>

                                <th> user image</th>
                            <th> Name </th>
                            <th> email</th>

                          </tr>
                        </thead>
                        <tbody>

                          <?php
$sql1 = "SELECT * FROM users";
$res1 = mysqli_query($conn,$sql1);
if($res1){
  while ($rows1 = mysqli_fetch_assoc($res1)) {

?>

<tr>

  <td>

    <span class="pl-2">     <img class="rounded-circle " src="<?php echo $rows1['location']; ?>" alt="<?php echo $rows1['username']; ?>" style="width:60px;height:60px;">
</span>
  </td>
  <td> <?php echo $rows1['username']; ?></td>
  <td> <?php echo $rows1['email']; ?></td>


</tr>

<?php
    // code...
  }

}else {
  echo '   <div class="alert alert-danger" role="aert">
       database connection failed
     </div>';
}

                         ?>



                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">programs</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>

                            <th> program image</th>
                            <th> header</th>
                            <th> content preview</th>
                            <th> program category</th>
                            <th> action</th>

                          </tr>
                        </thead>
                        <tbody>

                          <?php
$sqlpr = "SELECT * FROM programs limit 5";
$respr = mysqli_query($conn,$sqlpr);
if($respr){
  while ($rowspr = mysqli_fetch_assoc($respr)) {

?>

<tr>

  <td>

    <span class="pl-2">     <img class=" rounded-circle " src="<?php echo $rowspr['location']; ?>" alt="" style="width:60px;height:60px;">
    </span>
  </td>
  <td> <?php echo $rowspr['header']; ?></td>
  <td>
    <div class="badge badge-outline-success"><?php echo $rowspr['program']; ?></div>
  </td>
  <td><?php echo substr($rowspr['content'],0,50); ?>....</td>

<td>
  <div class="mr-auto text-sm-right pt-2 pt-sm-0">
    <p  class="badge badge-outline-danger"><a href="delete.php?deleteid=<?php echo $rowspr['id'] ?>">delete</a></p>
    <p class="badge badge-outline-success"><a href="#updateid=<?php echo $rowspr['id'] ?>" style="a{
      text-decoration: none;
      color:white;
      }">edit</a></p>
  </div>
</td>


</tr>

<?php
    // code...
  }

}else {
  echo '   <div class="alert alert-danger" role="aert">
       database connection failed
     </div>';
}

                         ?>



                        </tbody>
                      </table>
                      <td>
                        <p class="badge badge-outline-secondary"><a href="loadmore.php">loadmore</a> </p>
                      </td>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">paw images</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>

                                <th>  image</th>
                            <th>category </th>
                            <th> action</th>

                          </tr>
                        </thead>
                        <tbody>

                          <?php
$sqlga = "SELECT * FROM galley limit 6";
$resga = mysqli_query($conn,$sqlga);
if($resga){
  while ($rowsga= mysqli_fetch_assoc($resga)) {

?>

<tr>

  <td>

    <span class="pl-2">     <img class="rounded-circle " src="<?php echo $rowsga['location']; ?>" alt="<?php echo $rowsga['category']; ?>" style="width:60px;height:60px;">
</span>
  </td>
  <td> <?php echo $rowsga['category']; ?></td>
  <td>
    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
      <p  class="badge badge-outline-danger"><a href="deleteimages.php?deleteid=<?php echo $rowsga['id'] ?>">delete</a></p>
      <p class="badge badge-outline-success"><a href="#updateid=<?php echo $rowsga['id'] ?>" style="a{
        text-decoration: none;
        color:white;
        }">edit</a></p>
    </div>
  </td>

</tr>

<?php
    // code...
  }

}else {
  echo '   <div class="alert alert-danger" role="aert">
       database connection failed
     </div>';
}

                         ?>



                        </tbody>
                      </table>
                      <td>
                        <p class="badge badge-outline-secondary"><a href="loadmoreimages.php">loadmore</a> </p>
                      </td>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>

            </div>

          </div>
          <div class="main-panel">
            <div class="content-wrapper">


                        <div class="row">
                          <div class="col-12 grid-margin">
              <script>
              window.onload = function () {

              var chart = new CanvasJS.Chart("chartContainer", {
              	animationEnabled: true,
              	title:{
              		text: "peace and action wordwide statistics summary",
              		horizontalAlign: "left"
              	},
              	data: [{
              		type: "doughnut",
              		startAngle: 60,
              	innerRadius: 60,
              		indexLabelFontSize: 17,
              		indexLabel: "{label} - #percent%",
              		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
              		dataPoints: [
              			{ y: <?php echo $total1 ?>, label: "users" },
                    { y: <?php echo $total2 ?>, label: "programs" },
              			{ y: <?php echo  $totalt ?>, label: "donations" },
              			{ y: <?php echo $total3 ?>, label: "programs" },

                    { y: <?php echo $total5 ?>, label: "image categories"},
                    { y: <?php echo  $total6 ?>, label: "gallery"},

              		]
              	}]
              });
              chart.render();

              }
              </script>

              <div id="chartContainer" style="width:100%;"></div>
              <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
          </div>

        </div>
          <?php include 'footer.php'; ?>
