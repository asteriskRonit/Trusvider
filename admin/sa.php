<?php
$conn=mysqli_connect("localhost","root","",'bussiness');
if(!$conn->connect_error){
    //$query="drop table servicetab";
    //$query="create table dv(person int primary key,roll int,foreign key(roll) references experiment(roll))";
   //$query="create table serviceTable(sid varchar(20) not null primary key,servicepart varchar(30),servicename varchar(30))";
    //$query="create table usertable(uid varchar(20) not null primary key,username varchar(50),phone varchar(60)";
    //$query="alter table servicetable add column price varchar(20)";
    //$query="create table addoser(eid varchar(20) not null primary key,name varchar(30),phone varchar(10),phone2 varchar(10),email varchar(30),gender varchar(10))";
    $query="delete from servicetable";
    $result=mysqli_query($conn,$query);
    if($result){
        echo "done ";
    }
    else{
        echo "not done ".rand(1,100);
    }
}

?>