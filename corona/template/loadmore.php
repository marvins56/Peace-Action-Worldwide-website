<?php include 'header.php'; ?>
<?php include 'database.php'; ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row ">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">programs((  <?php
                        $query45 = "SELECT count(DISTINCT(program)) FROM programs";
                    $result45 = mysqli_query($conn,$query45);
                    $rows45 = mysqli_fetch_row($result45);
                    $total65=  $rows45[0];
                    echo $total65;
                    ?>)) categories</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      <div class="form-check form-check-muted m-0">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input">
                        </label>
                      </div>
                    </th>
                    <th> program image</th>
                    <th> header</th>
                    <th> content preview</th>
                    <th> program category</th>
                    <th> action</th>

                  </tr>
                </thead>
                <tbody>

                  <?php
$sqlpr = "SELECT * FROM programs ";
$respr = mysqli_query($conn,$sqlpr);
if($respr){
while ($rowspr = mysqli_fetch_assoc($respr)) {

?>

<tr>
<td>
<div class="form-check form-check-muted m-0">
<label class="form-check-label">
<input type="checkbox" class="form-check-input">
</label>
</div>
</td>
<td>

<span class="pl-2">     <img class=" rounded-circle " src="../../<?php echo $rowspr['location']; ?>" alt="" style="width:60px;height:60px;">
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
</div>
</div>


<?php include 'footer.php'; ?>
