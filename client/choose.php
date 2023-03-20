<?php
session_start();
//include "removeError.php";
if(!isset($_SESSION["uid"])){
    header("location:log.php");
}
$url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url_compo=parse_url($url);
parse_str($url_compo['query'],$par);
$id=$par['id'];
//echo $par['id'];
$id=$par['id'];
$u=$_SESSION["uid"];
$id=$par['id'];
$conn=mysqli_connect("localhost","root","","bussiness");
if(!$conn->connect_error){
    $query="select * from ordertable where uid='$u' ";
    $qury="select * from servicetable where sid='$par[id]' ";
    $resoli=mysqli_query($conn,$query);
    $result=mysqli_query($conn,$qury);
    $er=mysqli_fetch_assoc($result);
    if($resoli){
        $number=mysqli_num_rows($resoli);
        if($number==0){
           header("location:customer_pr.php?id=$id");
        }
    }
}

if(isset($_POST["add"])){
    if(!empty($_POST["f"])){
        $r=$_POST["f"];
        $wkey="select * from ordertable where oid='$r'";
        $rt=mysqli_query($conn,$query);
        $ty=mysqli_fetch_assoc($rt);
        $oid="OiD".rand(1000,200000);
        $name=$ty["name"];
        echo $name;
        $add=$ty["address"];
        $email=$ty["email"];
        $phone=$ty["phone"];
        $phone2=$ty["phone2"];
        $pin=$ty["pin"];
        $pt=$ty["payment_type"];
        $dt=date("d/m/y");
 
        $quety="INSERT INTO `ordertable`(`oid`, `uid`, `sid`, `name`, `address`, `phone`, `phone2`, `email`, `pin`, `dates`, 
        `payment_type`, `status`) VALUES ('$oid','$u','$id','$name','$add','$phone','$phone2','$email',
        '$pin','$dt','$pt','pending')";

         $re=mysqli_query($conn,$quety);

         if($re){
            header("location:book.php");
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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <title>Document</title>
</head>
<body class="bg-light">
    <div class="container  mt-5 ">
       <div class="row ">
       <div class="col-md-4  text-white">
              <div class="col-12 p-2 bg-success">
                  <h3 class="">service details</h3>
              </div>
              <div class="col-12  p-2  text-dark bg-white">
                  <h5>service name: <?php echo $er["servicename"]; ?></h5>
                  <h5>service part: <?php echo $er["servicepart"]; ?></h5>
                  <h5>service price: <?php echo $er["price"]; ?></h5>
              </div>
           </div>
           <div class="col-md-7 text-white ">
               
               <div class="col-12 p-2 bg-primary">
                <h3>Choose your location</h3>
               </div>
               <form action="" method="post"> 
                 <?php
                  $value=array("");
                   function check_val($s,$r){
                        for($i=0;$i<count($r);$i++){
                            if($s==$r[$i]){
                                return -1;
                            }
                        }
                        return 1;

                   }
                   $count=0;
                   while($row=mysqli_fetch_assoc($resoli)){
                       if($count==0){
                        echo "<div class=\"col-12 p-3 bg-white text-dark\">
                        <input type=\"radio\" name=\"f\" value=\"$row[oid]\">
                          $row[name],$row[phone],$row[email]  $row[address],$row[pin]
                         </div>";
                           $value[$count]=$row["address"].$row["pin"];
                           $count++;
                       }
                       if(check_val($row["address"].$row["pin"],$value)==1){
                        echo "<div class=\"col-12 p-3 bg-white text-dark\">
                        <input type=\"radio\" name=\"f\" value=\"$row[oid]\">
                          $row[name],$row[phone],$row[email]  $row[address],$row[pin]
                         </div>";
                         $value[$count]=$row["address"].$row["pin"];
                         $count++;
                       }
                
                   }
 
                 ?>
                 <div class="col-12 bg-white p-3">
                    <a name="sert" href="customer_pr.php?id=<?php echo $id; ?>" class="btn border form-control">+Add new request</a>
                </div>
                 <div class="col-12 bg-white p-3">
                     <button name="add" class="btn btn-danger form-control">Deliver here</button>
                 </div>
                </form>
                 
          
           </div>
    
       </div>
    </div>
</body>
</html>