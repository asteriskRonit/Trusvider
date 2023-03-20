<?php
session_start();
include "removeError.php";
$display="";
echo $_SESSION["etype"];
if($_SESSION["etype"]=="engg"){
  $display="hidden";
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
  <header id="header" class="header fixed-top d-flex align-items-center header_d">
    <i class="bi bi-list toggle-sidebar-btn d-block d-xl-none"></i>
    <p class="d-block d-xl-none m-0 mx-2 fw-bold fs-6">Service Management</p>
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
          <a class="button button" href="logout.php">Logout</a>
      </form>
    </div>
  </header>
  <aside id="sidebar" class="sidebar side_d">
    <i class="bi bi-tools bgIcon"></i>
    <div class="d-flex align-items-center justify-content-between">
      <a href="dashboard.html" class="logo d-flex align-items-center asideLogoCont">
        <i class="bi bi-tools me-3"></i>
        <p class="d-none d-lg-block m-0 fw-bold fs-5">Service Management</p>
      </a>
    </div>

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item active">
        <a class="nav-link " href="dash.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      
      <li class="nav-item <?php echo $display; ?>">
        <a class="nav-link " href="add_service.php">
          <i class="bi bi-plus-circle"></i>
          <span>Add Services</span>
        </a>
      </li>
      <li class="nav-item <?php echo $display; ?>">
        <a class="nav-link " href="edit_se.php">
          <i class="bi bi-pen"></i>
          <span>Edit Services</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link " href="table.php">
          <i class="bi bi-people"></i>
          <span>Work order</span>
        </a>
      </li>
      <li class="nav-item <?php echo $display; ?>">
        <a class="nav-link " href="workord.php">
          <i class="bi bi-credit-card-2-front"></i>
          <span>Service Request</span>
        </a>
      </li>
      <li class="nav-item <?php echo $display; ?>">
        <a class="nav-link collapsed" data-bs-target="#Engineers-nav" data-bs-toggle="collapse">
          <i class="bi bi-tools"></i><span>Service Engineers</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Engineers-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="add_se.php">
              <i class="bi bi-plus-circle"></i><span>Add</span>
            </a>
          </li>
          <li>
            <a href="edit_serviceE.php">
              <i class="bi bi-pencil-square"></i><span>Edit</span>
            </a>
          </li>
          <li>
            <a href="manae.php">
              <i class="bi bi-pencil-square"></i><span>Manage</span>
            </a>
          </li>
        </ul>
      </li>

    </ul>

  </aside>
</body>
</html>