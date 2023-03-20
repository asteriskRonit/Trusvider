<?php
$count=0;
session_start();
$conn=mysqli_connect("localhost","root","",'bussiness');
$query="";
$num="";
if(!$conn->connect_error){
    $query="select * from servicetable";
    $result=mysqli_query($conn,$query);
    $num=mysqli_num_rows($result);
}
for($i=0;$i<$num;$i++){
  if(isset($_POST["c".$i])){
      delete_by_id($_POST["id".$i]);
  }
}
for($i=0;$i<$num;$i++){
  if(isset($_POST["b".$i])){
    $_SESSION["id"]=$_POST["id".$i];
    header("location: form.php");
  }
}
function delete_by_id($id){
  $con=mysqli_connect("localhost","root","",'bussiness');
  $valid=$id;
  echo "<script>alert(\"$valid\")</script>";
  $upq="delete from servicetable where sid='$valid'";
  $r=mysqli_query($con,$upq);
  $re=mysqli_query($con,$upq);
  if($re){
    header("Refresh:1");
  }
}
include("header.php");
include("footer.php");
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
  <body id="iu">
  <form action="" method="post">
    <div id="u" class="container p-3">  
        <div class="row bg-light p-2">
           <?php
           $count=0;
           $s="";
           $b="";
           $k="";
           if($num>0){
            while($row=mysqli_fetch_assoc($result)){
                $s="id".$count;
                $b="b".$count;
                $k="c".$count;
                if($row["price"]!="-1"){
                  echo "<div class=\"col-md-6 mb-3\">
                  <div class=\"row\"> 
                      <div class=\"col-11 bg-white text-left p-3\">
                          <p class=\"fw-bold mb-0\">SERVICE ID: $row[sid]</p>
                          <input type=\"hidden\" name=$s value=$row[sid]>
                          <p class=\"fw-bold mb-0\">SERVICE PART: $row[servicepart]</p>
                          <p class=\"fw-bold mb-0\">SERVICE NAME:  $row[servicename]</p>
                          <p class=\"fw-bold mb-3\">PRICE:  $row[price]</p>
                          <button name=$b type=\"submit\" class=\"btn btn-primary form-control mb-2\">Edit</button>
                          <button name=$k class=\"btn form-control btn-danger mb-2\">delete</button>
                      </div>      
                   </div>
                 </div>";
                 $count++;
                }
             }
           }
           else{
               echo "no record";
           }
        ?>
        </div>
    </div>
    </form>

  </main>    
</body>
</html>
