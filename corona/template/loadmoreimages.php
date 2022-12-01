<?php include 'header.php'; ?>
<?php include 'database.php'; ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row ">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">paw images((  <?php
                        $query45 = "SELECT count(DISTINCT(category)) FROM galley";
                    $result45 = mysqli_query($conn,$query45);
                    $rows45 = mysqli_fetch_row($result45);
                    $total65=  $rows45[0];
                    echo $total65;
                    ?>))</h4>
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
$sqlga = "SELECT * FROM galley ";
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


<?php include 'footer.php'; ?>
