<?php
include("header.php");
include('footer.php');
$conn=mysqli_connect("localhost","root","",'bussiness');
if(isset($_POST["add"])){
    if(!empty($_POST["name"])&&!empty($_POST["phone"])&&!empty($_POST["mail"])&&!empty($_POST["gender"])){
        $n=$_POST["name"];
        $p=$_POST["phone"];
        $p2=$_POST["phone2"];
        $g=$_POST["gender"];
        $m=$_POST["mail"];
        $pic=$_FILES['fili']['name'];
        $ei=$n[0].rand(1000,9999);
        $query="INSERT INTO `addoser`(`eid`, `name`, `phone`, `phone2`, `email`,`gender`,`img`) VALUES ('$ei','$n','$p','$p2','$m','$g','$pic')";
        $result=mysqli_query($conn,$query);
        if($result){
          echo "<script>alert(\"service engineer added\")</script>";
          move_uploaded_file($_FILES['fili']['tmp_name'],"..\\images\\".$pic);
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
        <h2 class="mb-3 fw-bold">Add services Engineer</h2>
        <div class="mb-3">
          <label for="txt1" class="form-label">NAME</label>
          <input type="text" name="name" class="form-control" id="txt1" placeholder="name">
        </div>
        <div class="mb-3">
          <label for="txt2" class="form-label">GENDER  </label>
          <input type="radio" name="gender" id="male" value="male">
          <label for="male">male</label>
          <input type="radio" name="gender" id="female" value="female">
          <label for="female">female</label>
        </div>
        <div class="mb-3">
          <label for="txt2" class="form-label">PHONE NUMBER</label>
          <input type="tel" name="phone" class="form-control" id="txt2" placeholder="phone number">
        </div>
        <div class="mb-3">
          <label for="txt2" class="form-label">PHONE NUMBER</label>
          <input type="tel" name="phone2" class="form-control" id="txt2" placeholder="*phone number">
        </div>
        <div class="mb-3">
          <label for="txt3" class="form-label">EMAIL</label>
          <input type="email" name="mail" class="form-control" id="txt3" placeholder="RAM UPGRADE etc">
        </div>
       <div class="mb-3">
         <label for="" class="form-label">Choose an image</label>
         <input type="file" name="fili">
        
       </div>
        <button class="btn btn-primary mt-3" name="add" type="submit">Add S/E</button>
        <img src="imgs/<?php echo $img; ?>" alt="">
      </form>
      
    </div>
  </main>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>


</body>

</html>