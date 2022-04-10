<?php
include('dbConnection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Insert</title>
</head>
<body>
    <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="name" class="form-control" placeholder="Author Name" required>
                    <br>

                    <textarea name="description" cols="30" rows="5" class="form-control" required placeholder="Description"></textarea>
                    <br>

                    <input type="date" name="date" required class="form-control">
                    <br>

                    <input type="text" name="title" class="form-control" placeholder="Title" required>
                    <br>

                    <input type="file" name="image" required>
                    <br>

                    <input type="submit" value="Add" class="btn btn-info btn-block" name="BtnAdd">
                    <br>
                </form>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['BtnAdd']))
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $title = $_POST['title'];
  
      
        $image_name = $_FILES['image']['name'];
        $image_temp_name = $_FILES['image']['tmp_name'];
        $image_type = $_FILES['image']['type'];
        $image_size = $_FILES['image']['size'];
  
     
      $folder = "images/";
      if(strtolower($image_type)=="image/png" || strtolower($image_type)=="image/jpg" || strtolower($image_type)=="image/jpeg")
      {
          if($image_size<=1000000)
          {
              $folder = $folder . $image_name;
              $query = "insert into empolyees values(Null,'$name','$description','$date','$title','$folder')";
              $exec = mysqli_query($con,$query);
              if($exec==true)
              {
                  echo "<script>alert('Data Inserted!')</script>";
  
                  move_uploaded_file($image_temp_name,$folder);
              }
              else
              {
                  echo "<script>alert('Data not inserted!')</script>";
              }
          }
          else
          {
              echo "<script>alert('Image size should be less than 1MB')</script>";
          }
      }
      else
      {
          echo "<script>alert('Image format not supported!')</script>";
      }
  
  
    }
    ?>
</body>
</html>