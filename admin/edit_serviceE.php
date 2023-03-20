<?php
$count=0;
session_start();
$conn=mysqli_connect("localhost","root","",'bussiness');
$query="";
$num="";
if(!$conn->connect_error){
    $query="select * from addoser";
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
    header("location: form2.php");
  }
}
function delete_by_id($id){
  $con=mysqli_connect("localhost","root","",'bussiness');
  $valid=$id;
  $q="delete from addoser where eid='$valid'";
  $r=mysqli_query($con,$q);
  if($r){
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
                $pic="../images/".$row["img"];
                echo "<div class=\"col-md-6 mb-3\">
                <div class=\"row\">
                    <div class=\"col-6 p-0 bg-white\" style=\"background-image: url($pic); height: 200px; background-size: 200px; background-repeat: no-repeat; background-position: left\" >
                  
                    </div>
                    <div class=\"col-6 bg-white text-left p-2\">
                        <p class=\"fw-bold mb-0\">Engg name: $row[name]</p>
                        <input type=\"hidden\" name=$s value=$row[eid]>
                        <p class=\"fw-bold mb-0\">phone number: $row[phone]</p>
                        <p class=\"fw-bold mb-0\">email:  $row[email]</p>
                        <p class=\"fw-bold mb-3\">gender:  $row[gender]</p>
                        <button name=$b type=\"submit\" class=\"btn btn-primary mb-2\">Edit</button>
                        <button name=$k class=\"btn btn-danger mb-2\">delete</button>
                    </div>
                 </div>
               </div>";
               $count++;
             }
           }
           else{
               echo "no record";
           }
        ?>
        </div>
    </div>
    </form>
         <div class="row">
           <div class="col-6" >
             
           </div>
         </div>
      
  </main>    
</body>
</html>
