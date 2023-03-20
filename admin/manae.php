<?php
include "header.php";
include "footer.php";
include "connector.php";
$eid="";
$sql="";
session_start();
$_SESSION["eid"]=null;
if(isset($_POST["vb"])){
    if(!empty($_POST["tet"])){
        $_SESSION["eid"]=$_POST["tet"]; 
        $eid=$_SESSION["eid"];
        $sql="SELECT * FROM `ordertable`  WHERE `engg` = '$eid'";
    }
}
if($_SESSION["eid"]==null){
    $sql="SELECT * FROM `ordertable`";
}

$inder=mysqli_query($connector,$sql);
if($inder){
    $num_rows=mysqli_num_rows($inder);
    echo $num_rows;
}
unset($_SESSION["eid"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Engg</title>
    
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="bootstrap/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="css/version1.css">
  <link rel="stylesheet" href="css/version2.css">
  <link rel="stylesheet" href="lsty.css">
</head>
<body id="bd">
    <main id="main" class="main">
       <div class="container bg-white mt-3">
            <form class="" action="" method="POST">
                   <input name="tet" id="sb" class="form" type="search" placeholder="search by id">
                   <button name="vb" id="bu"  class="btn btn-primary ">click</button>
            </form>
            <div class="tb ">
             <table class="table table-hover ">
              <thead class="bg-dark text-white" >
                  <tr>
                    <th>customer name</th>
                    <th>phone number</th>
                    <th>email</th>
                    <th>address</th>
                    <th>service</th>
                    <th>date</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                   while($rowing=mysqli_fetch_assoc($inder)){
                      echo "
                        <tr>
                            <td>$rowing[name]</td>
                            <td>$rowing[phone]</td>
                            <td>$rowing[email]</td>
                            <td>$rowing[address]</td>
                            <td>computer</td>
                            <td>$rowing[dates]</td>
                         </tr>
                      ";
                   }
                ?>
              </tbody>
           </table>
           </div> 
       </div>
    </main>    
</body>
</html>