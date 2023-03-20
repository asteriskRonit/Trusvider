<?php
//include "removeError.php";
$conn=mysqli_connect("localhost","root","","bussiness");
if(!$conn->connect_error){
    $query="select * from servicetable";
    $resoli=mysqli_query($conn,$query);
    if($resoli){
        $number=mysqli_num_rows($resoli);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
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
            <li class="nav-item"><a href="book.php " class="nav-link">My Booking</a></li>
            <li class="nav-item"><a hlref="#" class="nav-link">Teams</a></li>
        </ul>
    </header>
    <div class="container bg-white p-4 text-dark border ">
        <div class="mb-2 border-bottom">
            <h4 class="fw-bold ">we provide you</h4>
        </div>  
        <div class="row p-3">
            <?php
                  $value=array();
                  function check_unc($string,$rt){
                    $C_k=0;
                    for($i=0;$i<count($string);$i++){
                         if($string[$i]==$rt){
                             return 1;
                         }
                    }
                    if($C_k==0){
                        return -1;
                    }
                  }
                  $count=0;
                  while($rowing=mysqli_fetch_assoc($resoli)){
                    if($count==0||check_unc($value,$rowing['servicepart'])==-1){
                        $value[$count]=$rowing["servicepart"];
                        $pht=$rowing["servicepart"].".jpg";
                        $count++;
                        echo "<a href=\"serviceshow.php?name=$rowing[servicepart]\" style=\"text-decoration: none;width: 150px;\">
                        <div class=\"col bg-light pb-1 rounded-3 shadow\">
                           
                            <h6 class=\"text-center text-primary fw-bold\">$rowing[servicepart]</h6>
                        </div>
                        </a>";
                       }
                    }
               
            ?>
        
         
         
                  
        </div>

    
    
    </div>
</body>
</html>