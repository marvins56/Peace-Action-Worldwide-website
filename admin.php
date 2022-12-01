<?php include 'database.php';


$content= "";
$header= "";
$content1= "";
$header1= "";
$preview= "";
$program= "";
$report= "";

$file = "";
$errors = array();

if(isset($_POST['submit'])){

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
                          $target_dir = "programs/";
                          $target_file = $target_dir . $_FILES["file"]["name"];

                          // Select file type
                          $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                          // Valid file extensions
                          $extensions_arr = array("jpg","png","jpeg","gif");
                          // Check extension
                                    if( in_array($videoFileType,$extensions_arr) ){

                                        // Check file size
                                        if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                                            echo "File too large. File must be less than 5MB.";
                                        }else{
                                            // Upload
                                            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                                                // Insert record

                                                $query = "INSERT INTO programs(content,header,name,location,program)
                                                 VALUES('$content','$header','".$name."','".$target_file."','$program')";

                                            $res =     mysqli_query($conn,$query);
                                                if($res){


echo '<div class="alert alert-success" role="alert">
successfully entered
</div>';
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



if(isset($_POST['report'])){

  // receive all input values from the form to preventig injection
  $header1 = mysqli_real_escape_string($conn, $_POST['header1']);
    $preview = mysqli_real_escape_string($conn, $_POST['preview']);

  $content1 = mysqli_real_escape_string($conn, $_POST['content1']);
  $report= mysqli_real_escape_string($conn, $_POST['report']);
          //errors for the form
          if(empty($header1))
          {array_push($errors,"report header required ");}
          if(empty($preview))
          {array_push($errors,"report preview required ");}



          if(empty($content1))
          {array_push($errors,"content required");}
          if(empty($report))
          {array_push($errors,"report required");}

  if (count($errors) == 0) {


  $query = "INSERT into reports(header,content,status,preview) values ('$header1','$content1','$report','$preview')";
  $result = mysqli_query($conn, $query);

  if ($result) {
echo 'successfully entred';


} else {
array_push($errors,"content or headers required");
}

  }

}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php include 'errors.php'; ?>
<form   method="post" enctype="multipart/form-data">
  <input type="text" name="header" value="header">
    <input type="text" name="program" value="program">
  <textarea name="content" rows="8" cols="80"></textarea>
  <input type="file" name="file" value="">
  <input type="submit" name="submit" value="submit">
</form>
<p>report entry</p>
<form   method="post" >
  <?php include 'errors.php'; ?>
  <input type="text" name="header1" value="header">
  <input type="text" name="report" value="program">
    <input type="text" name="preview" value="preview">
  <textarea name="content1" rows="8" cols="80"></textarea>

  <input type="submit" name="report" value="submit">

</form>

  </body>
</html>
