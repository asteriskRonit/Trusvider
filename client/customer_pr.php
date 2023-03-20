
<?php
session_start();
include "removeError.php";
if(!isset($_SESSION["uid"])){
      header("location:log.php");
}
$url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url_compo=parse_url($url);
parse_str($url_compo['query'],$par);
$id=$par['id'];
//echo $par['id'];
//echo "<br>";
$dt=date("d-m-y");
//echo $dt;


$conn=mysqli_connect("localhost","root","","bussiness");

if(isset($_POST["add"])){
    if(!empty($_POST["name"])&&!empty($_POST["address"])&&!empty($_POST["email"])&&!empty($_POST["phone"])&&!empty($_POST["pin"])){
       $oid="OiD".rand(1000,200000);
       $uid=$_SESSION["uid"];
       $name=$_POST["name"];
       $add=$_POST["address"];
       $email=$_POST["email"];
       $phone=$_POST["phone"];
       $phone2=$_POST["phone2"];
       $pin=$_POST["pin"];
       $pt=$_POST["gty"];
       

       $query="INSERT INTO `ordertable`(`oid`, `uid`, `sid`, `name`, `address`, `phone`, `phone2`, `email`, `pin`, `dates`, 
       `payment_type`, `status`) VALUES ('$oid','$uid','$id','$name','$add','$phone','$phone2','$email',
       '$pin','$dt','$pt','pending')";

       $result=mysqli_query($conn,$query);

       if($result){
           header("location:book.php");
       }
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Service Request</title>

  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="bootstrap/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="css/version1.css">
  <link rel="stylesheet" href="css/version2.css">
</head>
<body>
    <div class="container mt-5 mb-5">
      <form class="border p-4 bg-white rounded " method="post" action=" ">
        <h2 class="mb-3 fw-bold">Request for service</h2>
        <div class="mb-3">
          <label for="txt1" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="txt1" placeholder="your name">
        </div>
        <div class="mb-3">
          <label for="txt2" class="form-label">Phone</label>
          <input type="text" name="phone" class="form-control" id="txt2" placeholder="primary phone number">
        </div>
        <div class="mb-3">
          <label for="txt3" class="form-label">*Phone</label>
          <input type="text" name="phone2" class="form-control" id="txt3" placeholder="secondary phone number">
        </div>
        <div class="mb-3">
            <label for="txt4" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="txt4" placeholder="your email address">
        </div>
        <div class="mb-3">
            <label for="txt5" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="txt5" placeholder="your address">
        </div>
        <div class="mb-3">
            <label for="txt5" class="form-label">pin code</label>
            <input type="text" name="pin" class="form-control" id="txt5" placeholder="your pin code">
        </div>
   
        <div class="mb-3">
           <label for="" class="form-label">payment type</label>
            <select name="gty" class="form-control">
                <option value="cod">cash on delivery</option>
                <option value="debit card">debit card</option>
                <option value="credit card">credit card</option>
        </select>
        </div>

        <button class="btn btn-primary" name="add" type="submit">order service</button>
      </form>
    </div>
  </main>




</body>

</html>