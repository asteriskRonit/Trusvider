<?php
include('header.php');
include('footer.php');
$conn=mysqli_connect("localhost","root","",'bussiness');
$query="select * from ordertable where status='pending'";
$result=mysqli_query($conn,$query);

$num="";
if($result){
  $num=mysqli_num_rows($result);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Service Management | Dashboard</title>
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="bootstrap/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="css/version1.css">
  <link rel="stylesheet" href="css/version2.css">
</head>
<body>
  <main id="main" class="main">
    <div class="container.fluid">
    <div class="row">
            <div class="col-12">
            <?php
                if($num>0){
                  echo '                
                  <table class="table table-striped">
                  <thead>
                      <tr class="bg-primary text-light">
                          <th>customer name</th>
                          <th>service</th>
                          <th>address</th>
                          <th>phone</th>
                          <td>status</td>
                          <td></td>
                      </tr>
                  </thead>';
                  while($rowed=mysqli_fetch_assoc($result)){
                    $quary="select * from servicetable where sid='$rowed[sid]'";
                    $resalt=mysqli_query($conn,$quary);
                    if($resalt){
                      $nums=mysqli_num_rows($resalt);
                      $frt=mysqli_fetch_assoc($resalt);
                    }
                    echo "
                    <tbody>
                        <tr class=\"text-dark\">
                            <td>$rowed[name]</td>
                            <td>$frt[servicename]</td>
                            <td>$rowed[address]</td>
                            <td>$rowed[phone]</td>
                            <td>$rowed[status]</td>
                            <td><a href=\"viewovdet.php?oid=$rowed[oid]&sid=$rowed[sid]\" class=\"btn bg-danger text-white\">view</a></td>
                        </tr>
                        
                    </tbody>";

                  }
                  echo '</table>';
                }
                else{
                  echo '
                    <h5 class="text-center text-primary">No service request</h5>
                  ';
                }
              ?>
            </div>
        </div>
    </div>
  </main>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
</body>

</html>