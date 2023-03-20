<?php
include "removeError.php";
$url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url_compo=parse_url($url);
parse_str($url_compo['query'],$par);
$ert=$par['od'];

$conn=mysqli_connect("localhost","root","","bussiness");
$query="select * from ordertable where oid='$ert'";
$res=mysqli_query($conn,$query);
if($res){
    $rew=mysqli_fetch_assoc($res);
    $slect=$rew["sid"];
    
}
$quer="select * from servicetable where sid='$slect'";
$result=mysqli_query($conn,$quer);
if($result){
    $rowing=mysqli_fetch_assoc($result);
}
$stat="";
if($rew["status"]=="cancel"){
    $stat="d-none";
}
if(isset($_POST["cancl"])){
    $qwery="update ordertable set status='cancel' where oid='$ert'";
    $rasult=mysqli_query($conn,$qwery);
    if($rasult){
        header("location:landing.php");
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
    <link href="bootstrap/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
   <nav class="navbar alert-success">
       <div class="container-fluid border-bottom">
           <div class="navbar-header">
                <h3>myorder Details</h3>
           </div>

       </div>
   </nav>
   <div class="container-fluid bg-light mb-5">
       <div class="row mt-2 bg-white">
           <div class="col border-bottom">
                <p class="">orderid-<?php echo $par['od'];?></p>
           </div>
       </div>
       <div class="row bg-white">
           <div class="col-8">
               <h5><?php echo $rowing['servicename'];  ?></h5>
               <p class="small text-muted mt-0 mb-0 p-0"><?php echo $rowing['servicepart'];  ?></p>
               <p class="small text-muted m-0 p-0">Engg name</p>
               <h5 class="mt-2"><?php echo $rowing['price']; ?></h5>
               <p class="mb-1">order date:-<?php echo $rew["dates"];?></p>
               <p>expected service date</p>
           </div>
           <div class="col-2">
               <?php echo "<img src=\"..\\images\\$rowing[img]\" class=\"img-thumbnail\" alt=\"\">";?>
           </div>
           <div class="col-2"></div>
       </div>
       <form action="" method="post">
       <div class="row bg-white <?php echo $stat; ?>">
           <div class="col-6 ">
               <button name="cancl" type="submit" class="btn  border border-2 form-control">cancel order</button>
           </div>
           <div class="col-6 ">
               <button class="btn border border-2  form-control">view bill</button>
           </div>
       </div>
       </form>
       <div class="row  bg-white mt-4">
           <div class="col-12 border-bottom">
               <p class="text-muted p-2 m-0">shipping details</p>
           </div>
            <div class="col">
                <h5><?php echo $rew['name'];  ?></h5>
                <p class="m-0"><?php echo $rew['address'];  ?></p>
                <p class="m-0"><?php echo $rew['pin'];  ?></p>
                <p class="m-0"><?php echo $rew['email'];  ?></p>
                <p class="m-0"><?php echo $rew['phone'];  ?></p>
            </div>
       </div>
       <div class="row bg-white mt-4">
           <div class="col-12 border-bottom">
               <p class="text-muted p-2 m-0">price details</p>
           </div>
            <div class="col">
                <h5>product price</h5>
                <p class="m-0">shipping price</p>
                <p class="m-0">taxes</p>
                <p class="m-0">discount</p>
                <p class="m-0">Total price</p>
            </div>
            <div class="col">
                <h5><?php echo $rowing['price'];  ?></h5>
                <p class="m-0">$100</p>
                <p class="m-0">taxes</p>
                <p class="m-0">discount</p>
                <p class="m-0">Total price</p>
            </div>
       </div>
   </div>
</body>
</html>