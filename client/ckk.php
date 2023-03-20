<?php
session_start();
include "removeError.php";
$sh="";
$conn=mysqli_connect("localhost","root","","bussiness");
if(!$conn->connect_error){
  
   if(isset($_POST["s1"])){
      if(!empty($_POST["e1"])&&!empty($_POST["p1"])){
          $eml=trim($_POST["e1"]);
          $p11=trim($_POST["p1"]);
          echo $eml."  ".$p11;
          $query="SELECT * FROM `usertable` WHERE `password`='$p11'";
          $result=mysqli_query($conn,$query);
          if($result){
                /*$id=$orw['userId'];
                $_SESSION["uid"]=$id;**/
                echo "sucess";
              //  header("location:landing.php");
            }
            else{
                $stat="alert-danger";
                $sh="enter password properly";;

            }
        
    }
  } 
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Management</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/version2.css">
</head>

<body class="container">
<div class='alert text-center <?php echo $stat; ?>'>
         <?php echo $sh;?>
         </div>
    <div class="row align-items-center startupForm">
        <form class="form-control col-md-4 col-md-offset-4 p-4 mx-auto border-0 shadow" action="" method="post">
            <div class="heading mb-4">
                <h1 class="text-primary">Login</h1>
                <p class="small text-muted">Enter your valid email and related password...</p>
            </div>
            <div class="form-group mb-2">
                <label for="txtEmail"  class="form-label">Email address : </label>
                <input type="email" name="e1" class="form-control" id="txtEmail" placeholder="yourname@example.com">
            </div>
            <div class="form-group mb-3">
                <label for="txtEmailRe"  class="form-label">Password :</label>
                <input type="password" name="p1" class="form-control" id="txtPass" placeholder="••••••••" autocomplete="off">
            </div>
            <button class="btn btn-lg btn-primary w-100 mt-2" name="s1" type="submit">Login</button>
            <button class="btn btn-sm btn-outline-success w-100 mt-2 btn-opaLess"
                onclick="location.href = 'sign.php'" type="button">
                Don't have an account? Create now
            </button>
        </form>
    </div>
    <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>