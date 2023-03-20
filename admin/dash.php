<?php
include "connector.php";
include "header.php";
include "footer.php";

$query="SELECT * FROM `addoser`";
$quero="select * from ordertable where status='pending'";

$rs=mysqli_query($connector,$query);
$tink=mysqli_query($connector,$quero);
$num=mysqli_num_rows($tink);
$d="";
if($num==0){
  $d="hidden";
}
$result="";
$no_row="";
session_start();
$display="";
if($_SESSION["etype"]=="engg"){
  $i=$_SESSION["eoid"];
  $sql="SELECT * FROM `ordertable` where `engg`='$i'";
  $result=mysqli_query($connector,$sql);
  $no_row=mysqli_num_rows($result); 
  $display="hidden";
}
else{
 // echo $_SESSION["etype"];
 $sql="SELECT * FROM `ordertable`";
 $result=mysqli_query($connector,$sql);
 $no_row=mysqli_num_rows($result); 
  $display="";
}

//echo status_value("pending");
?>
<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link href="bootstrap/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Paper Dashboard 2 by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="css/version1.css">
  <link rel="stylesheet" href="css/version2.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
</head>

<body class="">
  <main id="main" class="main">
           <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Trusvider</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="javascript:;">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="javascript:;">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">total-orders</p>
                      <h1 class="card-title"><?php echo $no_row;  ?></h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-money-coins text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">service-request</p>
                      <p class="card-title"><?php echo status_value("pending");  ?><p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-vector text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">work-order</p>
                      <p class="card-title"><?php echo $no_row-status_value("pending");  ?><p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-favourite-28 text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers text-left">
                      <p class="card-category text-left">pending-payment</p>
                      <p class="card-title"><?php echo status_value("paid");?><p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row bg-white">
          <h3 class="text-primary">Recent order</h3>
          <div class="col-md-12">
          <table class="table table-striped bg-white">
                  <thead>
                      <tr class="bg-dark text-light">
                          <th>customer name</th>
                          <th>service</th>
                          <th>address</th>
                          <th>phone</th>
                          <td>status</td>
                    
                      </tr>
                  </thead>
                  <?php
                     while($rowed=mysqli_fetch_assoc($result)){
                      echo " <tbody> 
                      <tr>
                          <td>$rowed[name]</td>
                          <td>$rowed[sid]</td>
                          <td>$rowed[address]</td>
                          <td>$rowed[phone]</td>
                          <td>$rowed[status]</td>
                    
                      </tr>
                      
                      </tbody>";

                     }
                  ?>
          </table>        
            
          </div>
        </div>
        <div class="row mt-4 <?php echo $display;  ?>">
          <div class="col-md-4 bg-light">
             <h4 class="text-primary">Service engg</h4>
               <table class="table table-stripped bg-white">
                   <thead class="text-white bg-success">
                    <td>Engg ID</td>
                    <td>Engg name</td>
                    <td>Gender</td>
                   </thead>
                   <?php
                       while($kei=mysqli_fetch_assoc($rs)){
                        echo " <tbody> 
                        <tr>
                            <td>$kei[eid]</td>
                            <td>$kei[name]</td>
                            <td>$kei[gender]</td>                      
                        </tr>
                        
                        </tbody>";
                       }
                   ?>
               </table>
          </div>
          <div class="col-md-8 bg-white <?php echo $d;   ?>">
                <h4>Service Request</h4>
                <table class="table  bg-light text-dark">
                   <thead class="text-white bg-primary">
                    <td>Order ID</td>
                    <td>Customer name</td>
                    <td>Address</td>
                    <td>Service</td>
                   </thead>
        
               <?php
                       while($kei=mysqli_fetch_assoc($tink)){
                        echo " <tbody> 
                        <tr>
                            <td>$kei[oid]</td>
                            <td>$kei[name]</td>
                            <td>$kei[address]</td>      
                            <td>$kei[sid]</td>                
                        </tr>
                        
                        </tbody>";
                       }
                   ?>
               </table>
          </div>
        </div>
      </div>
    
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="./Assetsa/js/core/jquery.min.js"></script>
  <script src="./Assetsa/js/core/popper.min.js"></script>
  <script src="./Assetsa/js/core/bootstrap.min.js"></script>
  <script src="./Assetsa/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="./Assetsa/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./Asseta/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./Assetsa/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="./Assetsa/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
  </main>
</body>

</html>
