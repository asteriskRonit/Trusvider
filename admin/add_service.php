<?php
include "header.php";
include "footer.php";
$conn=mysqli_connect("localhost","root","",'bussiness');
if(isset($_POST["add"])){
  $dt=strtoupper($_POST["dt"]);
  echo $dt."jpg";
  if(!empty($_POST["dt"])&&!empty($_POST["dp"])&&!empty($_POST["ser"])){

    $dp=$_POST["dp"];
    $se=$_POST["ser"];
  
    $id=$dt.rand(10000,20000);
    $query="INSERT INTO `servicetable`(`sid`, `servicepart`, `servicename`, `price`,`img`) VALUES ('$id','$dt','$dp','$se','$pic')";
    $result=mysqli_query($conn,$query);
    if($result){
      echo "<script>alert(\"service added\")</script>";
     // move_uploaded_file($_FILES['fili']['tmp_name'],"..\\images\\".$pic);
      if(!empty($pic_pr)){
        echo "<br>";
        echo "hello";
        move_uploaded_file($_FILES['new_pr']['tmp_name'],"..\\images\\".$dt.".jpg");
      }
    }
    else{
      echo "<script>alert(\"failed to added\")</script>";
    }
  }
  else{
    echo "<script>alert(\"fill-up the form\")</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Service Management | Dashboard</title>
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="bootstrap/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="css/version1.css">
  <link rel="stylesheet" href="css/version2.css">
</head>
<body>
  <main id="main" class="main">
    <div class="container py-2 d-flex flex-column align-items-center justify-content-center">
      <form class="border p-4 bg-white rounded w-100" method="post" action=" " enctype="multipart/form-data">
        <h2 class="mb-3 fw-bold">Add services</h2>
        <div class="mb-3">
          <label for="txt1" class="form-label">DEVICE PART</label>
          <input type="text" name="dt" class="form-control" id="txt1" placeholder="ram,cpu">
        </div>
        <div class="mb-3">
          <label for="txt2" class="form-label">SERVICE NAME</label>
          <input type="text" name="dp" class="form-control" id="txt2" placeholder="ram upgrade...">
        </div>
        <div class="mb-3">
          <label for="txt3" class="form-label">SERVICE COSTING</label>
          <input type="text" name="ser" class="form-control" id="txt3" placeholder="RAM UPGRADE etc">
        </div>
     
        <button class="btn btn-primary mt-3" name="add" type="submit">Add this service</button> 
      </form>
    </div>
  </main>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
</body>
</html>