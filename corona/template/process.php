
<?php include 'database.php';


$content= "";
$header= "";
$content1= "";
$header1= "";
$preview= "";
$program= "";
$status= "";

$file = "";
$errors = array();

if(isset($_POST['programsubmit'])){

  // receive all input values from the form to preventig injection
  $content = mysqli_real_escape_string($conn, $_POST['content']);
  $header = mysqli_real_escape_string($conn, $_POST['header']);
$program = mysqli_real_escape_string($conn, $_POST['program']);

          //errors for the form
          if(empty($content))
          {array_push($errors,"content required or invalid content length");}
          if(empty($program))
          {array_push($errors,"program required or invalid program length");}

          if(empty($header))
          {array_push($errors,"header required ");}
  // Finally, register user if there are no errors in the form
              if (count($errors) == 0) {


                $maxsize = 5242880; // 5MB

                          $name = $_FILES['file']['name'];
                          $target_dir = "assets/images/";
                          $target_file = $target_dir . $_FILES["file"]["name"];

                          // Select file type
                          $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                          // Valid file extensions
                          $extensions_arr = array("jpg","png","jpeg","gif");
                          // Check extension
                                    if( in_array($videoFileType,$extensions_arr) ){

                                        // Check file size
                                        if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {

echo '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <strong>File too large. File must be less than 5MB</strong>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>';

                                        }else{
                                            // Upload
                                            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                                                // Insert record

                                                $query = "INSERT INTO programs(content,header,name,location,program)
                                                 VALUES('$content','$header','".$name."','".$target_file."','$program')";

                                            $res =     mysqli_query($conn,$query);
                                                if($res){


echo '
<div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <strong>data upload successfull!</strong>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
';
                                                }
                                              else{
                                            array_push($errors,"database connection failed");
                                                }
                                            }else{
                                            array_push($errors,"upload failed");
                                            }
                                        }

                                    }else
                                    {
                                        array_push($errors,"Invalid file extension.");
                                    }

              }

}



if(isset($_POST['reportsubmit'])){

  // receive all input values from the form to preventig injection
  $header1 = mysqli_real_escape_string($conn, $_POST['header']);
  $preview1 = mysqli_real_escape_string($conn, $_POST['preview']);
  $content1 = mysqli_real_escape_string($conn, $_POST['content']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);
          //errors for the form
          if(empty($header1))
          {array_push($errors,"report header required ");}
          if(empty($preview1))
          {array_push($errors,"report preview required ");}

          if(empty($content1))
          {array_push($errors,"content required");}
          if(empty($status))
          {array_push($errors,"report status required");}

  if (count($errors) == 0) {
  $query = "INSERT into reports (header,content,status,preview) values
   ('$header1','$content1','$status','$preview1')";
  $result = mysqli_query($conn, $query);

  if ($result) {
echo 'successfully entred';
} else {
array_push($errors,"database connection failed");
}

  }

}


if(isset($_POST['galleyupload'])){

  // receive all input values from the form to preventig injection
  $category = mysqli_real_escape_string($conn, $_POST['category']);


          if(empty($category))
          {array_push($errors,"category required ");}
  // Finally, register user if there are no errors in the form
              if (count($errors) == 0) {
                $maxsize = 5242880; // 5MB

                          $name = $_FILES['file']['name'];
                          $target_dir = "assets/gallery/";
                          $target_file = $target_dir . $_FILES["file"]["name"];

                          // Select file type
                          $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                          // Valid file extensions
                          $extensions_arr = array("jpg","png","jpeg","gif","JPG","JPEG","PNG");
                          // Check extension
                                    if( in_array($videoFileType,$extensions_arr) ){

                                        if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {

                                          echo '
                                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                            <strong>File too large. File must be less than 5MB</strong>
                                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>';
                                        }else{
                                            // Upload
                                            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                                                // Insert record

                                                $query = "INSERT INTO galley(category,name,location)
                                                 VALUES('$category','".$name."','".$target_file."')";

                                            $res = mysqli_query($conn,$query);
                                                if($res){


                                                  echo '
                                                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                                    <strong>data upload successfull!</strong>
                                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                  ';
                                                }
                                              else{
                                            array_push($errors,"database connection failed");
                                                }
                                            }else{
                                            array_push($errors,"upload failed");
                                            }
                                        }

                                    }else
                                    {
                                        array_push($errors,"Invalid file extension.");
                                    }

              }

}


 ?>

<?php include 'header.php'; ?>
<!-- partial -->
    <div class="container-scroller">
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> USER PAGE DATA ENTRY</h3>
              <?php include 'errors.php'; ?>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">UPLOAD PROGRAMS HERE</a></li>
                  <li class="breadcrumb-item active" aria-current="page">PAW programs </li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

                    <h4 class="card-title">PAW reports</h4>
                    <p class="card-description">upload paw reports here </p>

                    <form class="forms-sample" method="post" >

                      <div class="form-group">
                        <label for="exampleInputUsername1">report header</label>
                        <input type="text" class="form-control"  placeholder="report header" name="header">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">report name</label>
                        <input type="text" class="form-control"  placeholder="report name" name="status">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">report preview</label>
                        <input type="text" class="form-control"  placeholder="report preview" name="preview">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">report content</label>
                        <textarea class="form-control"  rows="4" name="content" name="content"></textarea>
                      </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn-primary mr-2"  name="reportsubmit">
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">PAW programs</h4>
                    <p class="card-description">upload paw programs here </p>
                    <form class="forms-sample" method="post" enctype="multipart/form-data" >

                      <div class="form-group">
                        <label for="exampleInputUsername1">program name</label>
                        <input type="text" class="form-control"  placeholder="program name" name="program">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">program header</label>
                        <input type="text" class="form-control"  placeholder="program header" name="header">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">program content</label>
                        <textarea class="form-control"  rows="4" name="content"></textarea>
                      </div>

                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="file" class="form-control">

                      </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn-primary mr-2"  name="programsubmit">

                      </div>

                    </form>
                  </div>
                </div>
              </div>
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">GALLEY IMAGE UPLOADS</h4>
                    <p class="card-description"> UPLOAD IMAGES TO GALLERY </p>
                    <form class="forms-sample"  enctype="multipart/form-data" method="post">
                      <div class="form-group">
                        <label for="exampleInputName1">category</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="category like..plating" name ="category">
                      </div>

                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="file" >

                      </div>

                      <input type="submit" class="btn btn-primary mr-2" name="galleyupload">

                    </form>
                  </div>
                </div>
              </div>


            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->

          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
</div>


<?php include 'footer.php'; ?>
