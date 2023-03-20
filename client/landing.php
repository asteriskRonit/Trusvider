<?php
session_start();


$visi1="";
$visi2="";

if(isset($_SESSION["uid"])){
    $visi1="d-none";
    $visi2="";
   // echo $_SESSION["uid"];
}
else{
    $visi1="";
    $visi2="d-none";
}
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Trusvider</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Collapsible-sidebar-left-or-right--Content-overlay.css">
    <link rel="stylesheet" href="assets/css/Off-Canvas-Sidebar-Drawer-Navbar.css">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/Ultimate-Sidebar-Menu-BS5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>
<body>
    
    <div class="sidebar bg-white">
        <div class="dismiss" style="transform: rotate(180deg);"><i class="fa fa-caret-left"></i></div>
        <div class="brand border-bottom"><a class="navbar-brand text-dark" href="index.html">All services</a></div>
        <nav class="navbar navbar-dark navbar-expand" style="height: calc(100% - 80px); overflow-y: scroll; align-items: flex-start;">
            <div class="container-fluid">
                <?php
                    $class="overlay";
                    if($number!=0){
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
                              $count++;
                              $pn=$rowing["servicepart"].".jpg";
                              echo "<a href=\"serviceshow.php?name=$rowing[servicepart]\" class=\"text-decoration-none \">
                              <div class=\"row bg-white  text-dark border-bottom\">
                                  <div class=\"col-6 pt-3 py-2\">
                                      <img src=\"..\\imags\\$pn\" class=\"img-thumbnail\" style=\"border: none;\"> 
                                  </div>
                                  <div class=\"col-6 pt-3 text-left\">
                                  <h5>$rowing[servicepart]</h5>
                                  </div>
                              </div>
                              </a>";
                          }
                 
                        }
                    }
                    else{
                       $class="";
                    }
                  
                ?>
            </div>
        </nav>
    </div>
    <div class=<?php echo $class; ?>></div>
</div>
    <header class="container d-flex flex-wrap justify-content-center gap-3 py-3 mb-4 border-bottom">
        <a href="#" class="d-flex align-items-center me-md-auto text-dark text-decoration-none" style="opacity: 0.8;">
            <img src="assets/img/logo.png" style="width: 54px;" class="img-fluid me-3" alt="Logo">
            <h3 class="fw-bold m-0">
                Trusvider
            </h3>
        </a>
        <ul class="nav nav-pills small ">
            <li class="nav-item"><a href="#" class="nav-link active" aria-current="page"><i class="bi bi-house-fill"></i> Home</a></li>
            <li class="nav-item"><a href="#services" class="nav-link open-menu"><i class="bi bi-tools"></i> Service</a></li>
            <li class="nav-item"><a href="book.php" class="nav-link"><i class="bi bi-book"></i>My Booking</a></li>
            <li class="nav-item <?php echo $visi1;  ?>"><a href="Log.php" class="nav-link"><i class="bi bi-person-circle"></i>Login</a></li>
            <li class="nav-item <?php echo $visi2;  ?>"><a href="Logout.php" class="nav-link"><i class="bi bi-person-circle"></i>Logout</a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-people-fill"></i>Teams</a></li>
        </ul>
    </header> 
    <main class="container '">
        <div class="p-4 p-md-5 pb-0 pb-md-0 mb-4 bg-light rounded-3"
            style="background: url('assets/img/bgImg.jpg') center/cover no-repeat;">
            <div class="container-fluid py-5">
                <h1 class="fw-bold fs-1">
                    <i class="bi bi-tools"></i>
                    Trusvider
                </h1>
                <p class="col-md-8" style="font-weight: 500; opacity: 0.8;">
                    Trusvider Inc. is an American multinational technology company that
                    specializes in consumer electronics, software and online services.
                    Apple is the largest information technology company by revenue
                    and, as of January 2021, it is the world's most valuable company
                </p>
                <button class="btn btn-dark mt-2 py-2 px-3" style="color: #f1f1f1cc; font-weight: 500;" type="button">
                    Get Started
                </button>
            </div>
        </div>
        <div class="container px-4 py-5" id="services">
            <h3 class="px-2 pb-2 border-bottom">We provide the following services</h3>
            <div class="row g-4 gy-5 py-5 row-cols-1 row-cols-lg-3">
                <div class="feature col">
                    <div class="w-100 bg-light hicon">
                        <img src="OIP.jpg" alt="CPU">
                    </div>
                    <h2>CPUs</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, eius numquam. Sapiente quis
                        atque iusto asperiores quo incidunt voluptatem ipsum!
                    </p>
                    <a href="#" class="btn-link small fw-bold">
                        Know more <i class="bi bi-box-arrow-up-right tml"></i>
                    </a>
                </div>
                <div class="feature col">
                    <div class="w-100 bg-light hicon">
                        <img src="d.jpg" alt="">
                    </div>
                    <h2>RAMs</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, eius numquam. Sapiente quis
                        atque iusto asperiores quo incidunt voluptatem ipsum!
                    </p>
                    <a href="#" class="btn-link small fw-bold">
                        Know more <i class="bi bi-box-arrow-up-right tml"></i>
                    </a>
                </div>
                <div class="feature col">
                    <div class="w-100 bg-light hicon">
                    <img src="R.jpg" alt="">
                    </div>
                    <h2>SSDs</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, eius numquam. Sapiente quis
                        atque iusto asperiores quo incidunt voluptatem ipsum!
                    </p>
                    <a href="#" class="btn-link small fw-bold">
                        Know more <i class="bi bi-box-arrow-up-right tml"></i>
                    </a>
                </div>
                <div class="feature col">
                    <div class="w-100 bg-light hicon">
                        <img src="w.jpg" alt="">
                    </div>
                    <h2>Motherboard</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, eius numquam. Sapiente quis
                        atque iusto asperiores quo incidunt voluptatem ipsum!
                    </p>
                    <a href="#" class="btn-link small fw-bold">
                        Know more <i class="bi bi-box-arrow-up-right tml"></i>
                    </a>
                </div>
                <div class="feature col">
                    <div class="w-100 bg-light hicon">
                        <img src="OIP.jpg" alt="">
                    </div>
                    <h2>GPUs</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, eius numquam. Sapiente quis
                        atque iusto asperiores quo incidunt voluptatem ipsum!
                    </p>
                    <a href="#" class="btn-link small fw-bold">
                        Know more <i class="bi bi-box-arrow-up-right tml"></i>
                    </a>
                </div>
            </div>
        </div>
    </main>
    <footer class="container py-5 border-top">
        <div class="row">
            <div class="col-12 col-md">
                <a href="#" class=" me-md-auto text-dark text-decoration-none" style="opacity: 0.8;">
                    <img src="assets/img/logo.png" style="width: 54px;" class="img-fluid " alt="Logo">
                    <h3 class="fw-bold m-0">
                        Trusvider
                    </h3>
                    <small class="d-block mb-3" style="font-weight: 500; opacity: 0.6;">© 1990-2021</small>
                </a>
            </div>
            <div class="col-12 col-md">
                <h5>Newsletter</h5>
                <form class="d-flex flex-column justify-content-center w-75" style="opacity: 0.8;">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label small mb-0">Enter email address</label>
                        <input type="email" class="form-control form-control-sm" id="exampleFormControlInput1"
                            placeholder="username@mail.in">
                        <button type="submit" class="btn btn-sm btn-primary mt-2 w-100">Get updates</button>
                    </div>
                </form>
            </div>
            <div class="col-6 col-md">
                <h5>Resources used</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="https://icons.getbootstrap.com/">Bootstrap Icons</a></li>
                    <li><a class="link-secondary" href="https://unsplash.com/">Unsplash</a></li>
                    <li><a class="link-secondary" href="https://getbootstrap.com/">Bootstrap</a></li>
                    <li><a class="link-secondary" href="https://www.pngwing.com/en/free-png-xxzio">Logo</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="#">Team</a></li>
                    <li><a class="link-secondary"
                            href="https://www.google.com/search?q=nielit+agartala+map&sxsrf=APq-WBs_b4nN_9_mdhqZpE4p-vjJ9FFnIA%3A1643912062203&ei=fhv8YaXoC7OUr7wP2NOkiA0&ved=0ahUKEwiln4nUkeT1AhUzyosBHdgpCdEQ4dUDCA4&uact=5&oq=nielit+agartala+map&gs_lcp=Cgdnd3Mtd2l6EAMyBggAEBYQHjIGCAAQFhAeOgcIIxCwAxAnOgcIABBHELADOgcIABCwAxBDOgoIABDkAhCwAxgAOgwILhDIAxCwAxBDGAE6EgguEMcBEK8BEMgDELADEEMYAToECCMQJzoFCAAQgAQ6BAgAEENKBAhBGABKBAhGGAFQggFY3wRgvQZoAXACeACAAfsBiAG-A5IBBTAuMS4xmAEAoAEByAETwAEB2gEGCAAQARgJ2gEGCAEQARgI&sclient=gws-wiz#"
                            target="_blank">Locations</a></li>
                    <li><a class="link-secondary" href="admin_login.html">Admin Panel</a></li>
                    <li><a class="link-secondary" href="#">Terms</a></li>
                </ul>
            </div>
        </div>
    </footer>


    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="assets/js/Off-Canvas-Sidebar-Drawer-Navbar.js"></script>
    <script src="assets/js/Collapsible-sidebar-left-or-right--Content-overlay.js"></script>
    <script src="assets/js/Off-Canvas-Sidebar-Drawer-Navbar-1.js"></script>
    <script src="assets/js/Ultimate-Sidebar-Menu-BS5.js"></script>
    
</body>

</html>