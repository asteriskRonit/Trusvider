<?php
//include "removeError.php";
$url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url_compo=parse_url($url);
parse_str($url_compo['query'],$par);
$conn=mysqli_connect("localhost","root","","bussiness");
$query="select * from servicetable where servicepart='$par[name]'";
$res=mysqli_query($conn,$query);
$num=mysqli_num_rows($res)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Showservice</title>
</head>
<body>
    <header class="container d-flex flex-wrap justify-content-center gap-3 py-3 mb-4 border-bottom">
        <a href="#" class="d-flex align-items-center me-md-auto text-dark text-decoration-none" style="opacity: 0.8;">
            <img src="assets/img/logo.png" style="width: 54px;" class="img-fluid me-3" alt="Logo">
            <h3 class="fw-bold m-0">
                Trusvider
            </h3>
        </a>

        <ul class="nav nav-pills small d-flex align-items-center">
            <li class="nav-item"><a href="landing.php" class="nav-link" aria-current="page"><i class="bi bi-house-fill"></i>Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link active">Service</a></li>
            <li class="nav-item"><a href="book.php" class="nav-link">My Booking</a></li>
            <li class="nav-item"><a hlref="#" class="nav-link">Teams</a></li>
        </ul>
    </header>    
    <div class="container bg-light text-dark ">
   <?php
      while($rowed=mysqli_fetch_assoc($res)){
        $pic=$rowed["img"];
        echo "
        <div class=\"row border-bottom\">
            <div class=\"col-md-2 m-0 bg-white p-0\">
            <i class=\"fa fa-camera-retro fa-lg\"></i>
            </div>
            <div class=\"col-md-8 m-0 bg-white  text-left justify-content-center fw-sm-bold\">
                <h4 class=\"fw-bold\">$rowed[servicename]</h4>
                <h5>Estimated price: $rowed[price]</h5>
            </div> 
            <div class=\"col-sm-2 col-xs-12 bg-white\">
            <a class=\"btn btn-success just mt-4 mb-4 pl-5 pr-5\" href=\"choose.php?id=$rowed[sid]\">BOOK SERVICE</a>
            </div>
        </div>";
      }
   ?>
    </div>
</body>
</html>