<?php include 'header.php'; ?>
<?php include 'database.php'; ?>
<div class="main-panel">
  <div class="content-wrapper">
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
$sql = "SELECT * FROM donate";
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
echo ' <div class="alert alert-danger" role="aert">
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
</div>
</div>


<?php include 'footer.php'; ?>
