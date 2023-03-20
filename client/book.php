<?php
session_start();
//include "removeError.php";
if(!isset($_SESSION["uid"])){
   header("location:log.php");
}
$uiid=$_SESSION["uid"];
$connection=mysqli_connect("localhost","root","","bussiness");
$query="select * from ordertable where uid='$uiid'";
$result=mysqli_query($connection,$query);
if($result){
    //echo "success";
    $num=mysqli_num_rows($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <header class="container d-flex flex-wrap justify-content-center gap-3 py-3 mb-4 border-bottom">
        <a href="#" class="d-flex align-items-center me-md-auto text-dark text-decoration-none" style="opacity: 0.8;">
            <img src="assets/img/logo.png" style="width: 54px;" class="img-fluid me-3" alt="Logo">
            <h3 class="fw-bold m-0">
                Trusvider
            </h3>
        </a>

        <ul class="nav nav-pills small align-items-center">
            <li class="nav-item"><a href="ss.php" class="nav-link ">Service</a></li>
            <li class="nav-item"><a href="#" class="nav-link active ">My Booking</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Teams</a></li>
        </ul>
    </header>
    <?php
          if($num>0){
            $bk="";
            $tk="";
            while($row=mysqli_fetch_assoc($result)){
               
                if($row["status"]=="pending"){
                    $bk="alert-primary";
                    $tk="text-danger";       
                }
                elseif($row["status"]=="active"){
                 $bk="alert-warning";
                 $tk="text-primary";   
                }
                elseif($row["status"]=="cancel"){
                 $bk="alert-danger";
                 $tk="text-danger";   
                }
                else{
                 $bk="alert-success";
                 $tk="text-primary";  
                }
                 $quary="select * from servicetable where sid='$row[sid]'";
                 $resoli=mysqli_query($connection,$quary);
     
                 $fed=mysqli_fetch_assoc($resoli);
                
                    echo " <div class='container mt-2 p-2 $bk'>
                    <a href='ck_details.php?od=$row[oid]' style='text-decoration: none;'>
                    <div class='row border-bottom mb-3'>
             
                            <div class='col-3 $bk'>
                                <img src='..\\images\\$fed[img]' class='img-fluid' alt=''>
                            </div>
                            <div class='col-md-9 p-2 col-sm-10 col  text-dark '>
                                <h6>service name:- $fed[servicename]</h6>
                                <p class='mb-1'>order id: $row[oid]</p>
                                <p class='m-0'>customer name: $row[name]</p> 
                                <h6 class='mb-1 $tk'>status: $row[status]</h6>
                                <p class='m-0'>Address: $row[address]</p>   
                            </div>
                        </div>
                        </a>
                </div>";
                } 
            }
          else{
              echo "
                <h3 class=\"text-center text-primary\">No booking </h3>
              ";
          }
    ?>

    
   
</body>
</html>