<?php
session_start();
$conn=mysqli_connect("localhost","root","",'bussiness');
$id=$_SESSION["id"];
$dp="";
$sn="";
$sp="";
$des="";
echo $id;
$query="select * from addoser where eid='$id'";
$quer="select * from addoser where eid='$id'";
$value=mysqli_query($conn,$quer);
$vfet=mysqli_fetch_assoc($value);
$result=mysqli_query($conn,$query);
$r=mysqli_fetch_assoc($result);
$dp=$r["name"];
$sn=$r["phone"];
$sp=$r["phone2"];
$des=$r["email"];



if(isset($_POST["add"])){
    $dp=$_POST["dt"];
    $sn=$_POST["dp"];
    $sp=$_POST["ser"];
    $des=$_POST["mail"];
    $quer="update addoser set name='$dp',phone='$sn',phone2='$sp',email='$des' where eid='$id'";
    $rse=mysqli_query($conn,$quer);
    if($rse){
        echo "<script>alert(\"service updated\")</script>";
        header("location:edit_se.php");
    }
    else{
        echo "<script>alert(\"failed to update\")</script>";
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
    <div class="container mt-2">
      <form class="border p-4 bg-white rounded w-100" method="post" action=" ">
        <h2 class="mb-3 fw-bold">Edit details of services Engineer</h2>
        <div class="mb-3">
          <label for="txt1" class="form-label">Service engg name</label>
          <input type="text" name="dt" class="form-control" id="txt1"  placeholder="ram,cpu" value="<?php echo $dp; ?>">
        </div>
        <div class="mb-3">
          <label for="txt2" class="form-label">Phone number</label>
          <input type="text" name="dp" class="form-control" id="txt2" value=<?php echo $sn;?> placeholder="ram upgrade...">
        </div>
        <div class="mb-3">
          <label for="txt3" class="form-label">*Phone number</label>
          <input type="text" name="ser" class="form-control" id="txt3" value=<?php echo $sp; ?>  placeholder="RAM UPGRADE etc">
        </div>
        <div class="mb-3">
          <label for="txt3" class="form-label">Email address</label>
          <input type="text" name="mail" class="form-control" id="txt3" value=<?php echo $des; ?>  placeholder="RAM UPGRADE etc">
        </div>
        
      
        <button class="btn btn-primary mt-3" name="add" type="submit">Update</button>
      </form>
    </div>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

</body>
</html><