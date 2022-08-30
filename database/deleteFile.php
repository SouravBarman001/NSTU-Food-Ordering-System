<?php

include('../database/config.php');

// echo trim($_GET["id"]); 


$Id = trim($_GET["id"]);

$sql = "DELETE FROM fooditeam WHERE foodId =".$Id."' ";

$img = "SELECT foodImg from fooditeam WHERE foodId ='".$Id."' ";


if(mysqli_query($con, $img))

    $path = "uploads/$img";
    if(!unlink($path)){
        echo "you have an error!";
    }else{
       echo "error";
    }


if(mysqli_query($con, $sql)){
    echo "Records were deleted successfully.";
    header("location: ../pages/VendorProfile.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 
// Close connection
mysqli_close($con);



?>