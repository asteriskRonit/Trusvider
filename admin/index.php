<?php
session_start();
$sh="";
$em1="";
if(isset($_SESSION["etype"])){
    header("location: dash.php");
}
$conn=mysqli_connect("localhost","root","","bussiness");
if(!$conn->connect_error){
  
   if(isset($_POST["s1"])){
      if(!empty($_POST["e1"])&&!empty($_POST["p1"])){
          $type=$_POST["typo"];
          $id=trim($_POST["e1"]);
          $mail=trim($_POST["p1"]);
          //echo $id;
          if($type=="Engg"){
            $query="SELECT * FROM `addoser` where `email` = '$mail' and `eid` = '$id'";
            $result=mysqli_query($conn,$query);
            $num=mysqli_num_rows($result);
            if($num==1){
              //session_start();
              $_SESSION["etype"]="engg";
              $_SESSION["eoid"]=$id;
              header("location:dash.php");               
        }
        else{
          $stat="alert-danger";
          $sh="insert data properly";;
        }
    }
    else{
        if($id==112 && $mail=="abc@gmail.com"){
            //session_start();
            $_SESSION["etype"]="admin";
             echo "hello";
            header("location:dash.php");
        }
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
                <p class="small text-muted">Enter your ID and Valid email</p>
            </div>
            <div class="form-group mb-2">
                <label for="txtEmail"  class="form-label">Select type: </label>
               <select name="typo" id="" class="form-control">
                <option value="Engg">Engineer</option>
                <option value="admin">admin</option>
               </select>
            </div>
            <div class="form-group mb-2">
                <label for="txtEmail"  class="form-label">ID : </label>
                <input type="text" name="e1" class="form-control" id="txtEmail" placeholder="Id">
            </div>
            <div class="form-group mb-3">
                <label for="txtEmailRe"  class="form-label">Email :</label>
                <input type="email" name="p1" class="form-control" id="txtPass" placeholder="enter your email" autocomplete="off">
            </div>
            <button class="btn btn-lg btn-primary w-100 mt-2" name="s1" type="submit">Login</button>
        
        </form>
    </div>
    <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>