<?php
//include "removeError.php";
$k=0;
$ma="";
$ot='';
$exisb1="";
$stat="hidden";
$trouble=0;
$exisb0="hidden";
$exisb2="hidden";
$conn=mysqli_connect("localhost","root","","bussiness");
$query="select * from usertable";
$result=mysqli_query($conn,$query);
$num=mysqli_num_rows($result);
if(isset($_POST["b11"])){
    if(!empty($_POST["email"])){
        $trouble=0;
        $ma=trim($_POST["email"]);
        echo '<br>';
        if($num>0){
            while($row=mysqli_fetch_assoc($result)){
                if($ma==$row['email']){
                    $trouble=1;
                }
            }
        }
        if($trouble==1){
            $sh="looks like you have an acocunt";
            $stat="alert-danger";
        }
        else{
            $k=1;
            $sh="we have sent an otp to your email";
            $stat="alert-success";
            $exisb1="hidden";
            $exisb2="hidden";
            $exisb0="";
        }
    }
    else{
        $sh="PLEASE ENTER YOUR EMAIL";
        $stat="alert-danger";
    }
}
if(isset($_POST["b22"])){
    if(!empty($_POST["otp"])){
         $ma=$_POST["email"];
         $ot=$_POST["otp"];
         $k=2;
         $exisb1="hidden";
         $exisb0="hidden";
         $exisb2="";
    }
    else{
        $ma=trim($_POST["email"]);
        $sh="PLEASE ENTER YOUR OTP";
        $stat="alert-danger";
        $k=1;
        $exisb1="hidden";
        $exisb2="hidden";
        $exisb0="";
    }
}
if(isset($_POST["b33"])){
    if(!empty($_POST["pass"])){
         $p=$_POST["pass"];
         $trouble=0;
         $ma=trim($_POST["email"]);
         $ot=$_POST["otp"];
         echo '<br>';
         if($num>0){
             while($row=mysqli_fetch_assoc($result)){
                 if($p==$row['password']){
                     $trouble=1;
                 }
             }
         }
         if($trouble==1){
            $sh="same password exist";
            $stat="alert-danger";
            $exisb1="hidden";
            $exisb2="";
            $k=2;
            $exisb0="hidden";
         }
         else{
             $ra=rand(100,1000);
             $quer="INSERT INTO `usertable`(`userId`, `email`, `password`) VALUES ('$ra','$ma','$p')";
             $er=mysqli_query($conn,$quer);
             if($er){
                $sh="Inserted suceesfully";
                $stat="alert-success";
                header("location:landing.php");
             }
             else{
                $sh="Not inserted";
                $stat="alert-danger";
             }
             $k=2;
             $exisb1="hidden";
             $exisb0="hidden";
             $exisb2="";
         }
    }
    else{
        $ma=trim($_POST["email"]);
        $ot=$_POST["otp"];
        $sh="PLEASE ENTER YOUR PASSWORD";
        $stat="alert-danger";
        $k=2;
        $exisb1="hidden";
        $exisb2="";
        $exisb0="hidden";
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

<body class="container.fluid">
    <div class='alert text-center <?php echo $stat; ?>'>
         <?php echo $sh;?>
         </div>
    <div class="row align-items-center startupForm">
        <form class="form-control col-md-4 col-md-offset-4 p-4 mx-auto border-0 shadow" action="" method="post">
            <div class="heading mb-4">
                <h1 class="text-primary">Create an account</h1>
                <p class="small text-muted">Please enter your details to make a new account...</p>
            </div>
            <div class="form-group mb-2">
                <label for="txtEmail" class="form-label">Email address : </label>
                <input name="email" type="email" class="form-control" id="txtEmail" value="<?php  echo $ma; ?>" placeholder="yourname@example.com">
            </div>
            <?php
               if($k>0){
                   echo "<div class=\"form-group mb-2\" id=\"otpField\">
                   <label for=\"txtEmail\" class=\"form-label\">One Time Password (OTP) : </label>
                   <input name=\"otp\" type=\"number\" class=\"form-control\"
                       id=\"txtEmail\" value=$ot
                       placeholder=\"723 534\" autocomplete=\"off\">
               </div>";
               }
               if($k>1){
                   echo  "<div class=\"form-group mb-3 \" id=\"passField\">
                   <label for=\"txtEmailRe\" class=\"form-label\">Password :</label>
                   <input name=\"pass\" type=\"password\" class=\"form-control\" id=\"txtPass\" placeholder=\"••••••••\" autocomplete=\"off\">
                    <p class=\"text-muted\"></p>
               </div>";
               }
            ?>
            <button name="b11" class="btn btn-lg btn-primary w-100 mt-2 <?php echo $exisb1;  ?>" id="b1"  type="submit">Create account</button>
            <button name="b22" class="btn btn-lg btn-primary w-100 mt-2  <?php echo $exisb0;  ?>" id="b2" type="submit">verify otp</button>
            <button name="b33" class="btn btn-lg btn-primary w-100 mt-2 <?php echo $exisb2;?>" id="b3" type="submit">Finalize</button>
            <button class="btn btn-sm btn-outline-success w-100 mt-2 btn-opaLess" type="button"
                onclick="location.href = 'Log.php'">Already have an account? Login now</button>
        </form>
    </div>
    <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>