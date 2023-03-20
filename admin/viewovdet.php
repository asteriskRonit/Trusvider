<?php
$url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url_compo=parse_url($url);
parse_str($url_compo['query'],$par);
$conn=mysqli_connect("localhost","root","","bussiness");
$query="select * from ordertable where oid='$par[oid]'";
$result=mysqli_query($conn,$query);
$ftch=mysqli_fetch_assoc($result);
$qwery="select * from servicetable where sid='$par[sid]'";
$resolt=mysqli_query($conn,$qwery);
$ftchs=mysqli_fetch_assoc($resolt);

$qkery="select * from addoser";
$wert=mysqli_query($conn,$qkery);
$visible="";
$visible2="d-none";
if($ftch["status"]!="pending"){
     $visible="d-none";
     $visible2="";
}

if(isset($_POST["upd"])){ 
    if($_POST["tank"]!="null"){
        echo $_POST["tank"];
        $rty=$_POST["tank"];
        $rtyx=explode("-",$rty);
        $q[0]="update ordertable set engg='$rtyx[0]' where oid='$par[oid]'";
        $q[1]="update ordertable set status='active' where oid='$par[oid]'";
        $r[0]=mysqli_query($conn,$q[0]);
        $r[1]=mysqli_query($conn,$q[1]); 
        header("location:table.php");
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
    <title>Details</title>
    <body class="bg-light">
    </head>
    <h3>Customer Details</h3>
    <form action="" method="post">
    <div class="container mt-5 bg-white">
       <div class="row text-left p-2 text-primary">
       </div>
       <div class="row p-2 text-dark">
          <h5>Name: <?php echo $ftch['name'];  ?></h5>
          <h5>Primary phone: <?php echo $ftch['phone'];  ?></h5>
          <h5>Alternative phone: 1222111</h5>
          <h5>Email: <?php echo $ftch['email'];  ?></h5>
          <h5>Address: <?php echo $ftch['address'];  ?></h5>
          <h5>Pin number: <?php echo $ftch['pin'];  ?></h5>
          <h5>Date: <?php echo $ftch['dates'];  ?></h5>
          <h5>TIme: 12.11 am</h5>
          <h5>Service part:<?php echo $ftchs['servicepart'];  ?></h5>
          <h5>Service name: <?php echo $ftchs['servicename'];  ?></h5>
          <h5>Service price: <?php echo $ftchs['price'];  ?></h5>
          <h5>Payment mode: <?php echo $ftch['payment_type'];  ?></h5>
          <h5 class="<?php echo $visible2;  ?>">Engg details: <?php echo $ftch['engg'];  ?></h5>

          
          <div class="col-4 mt-2 <?php echo $visible;  ?>">
          <h5>Allocate service enggineer:</h5>
          </div>
          <div class="col-6 mt-2 <?php echo $visible;  ?>">
              <select class="form-control" name="tank" id="">
                  <option value="null">null</option>
                  <?php
                     while($ro=mysqli_fetch_assoc($wert)){   
                         echo "<option>$ro[eid]-$ro[name]</option>";
                     }
                  ?>
              </select>
          </div>
       </div>
       <button name="upd" class="btn btn-primary m-2 pl-3 pr-3 <?php echo $visible; ?>">Update</button>
       
    </div>
    </form>
</body>
</html>