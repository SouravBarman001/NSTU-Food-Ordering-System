<?php

$hName='localhost'; // host name
$uName='root';   // database user name
$password='';   // database password
$dbName = "nstu"; // database name
$dbCon = mysqli_connect($hName,$uName,$password,"$dbName");
  if(!$dbCon){
      die('Could not Connect MySql Server:' .mysql_error());
  }

// Fetch column's data from the table fooditeam

$query="select foodId,foodName,foodDetails,foodPrice from fooditeam"; 
$result=mysqli_query($dbCon,$query);
?>