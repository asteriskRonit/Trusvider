<?php
$connector=mysqli_connect("localhost","root","",'bussiness');

function status_value($val){
    global $connector;
    $query="SELECT * FROM `ordertable` WHERE `status` = '$val'";
    $res=mysqli_query($connector,$query);
    $row=mysqli_num_rows($res);
    return $row;
}
?>