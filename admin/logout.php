<?php
session_start();
unset($_SESSION["etype"]);
header("location:index.php");

?>