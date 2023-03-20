<?php
session_start();
//include "removeError.php";
unset($_SESSION["uid"]);
header("location:landing.php");
?>