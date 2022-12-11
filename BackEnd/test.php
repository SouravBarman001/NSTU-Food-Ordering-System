<?php

include('connect.php');

if (isset($_POST['deletebtn']))
{

$id = $_POST['deleteid'];
$img = $_POST['deleteimg'];

$sql = "DELETE FROM fooditeam WHERE foodId ='$id'";
$query_run = mysqli_query($conn, $sql);

if($query_run){
    unlink("uploades/".$img);
    header("location: ../pages/VendorProfile.php");
}else{
        header("location: error.php");

}




// $sql  = "SELECT foodImg FROM fooditeam";
// $imageresult1 = mysqli_query($con, $sql);

//     while($rows= mysqli_fetch_assoc($imageresult1))
//     {
//         $image = $rows['foodImg'];
//         <img src="./uploads/".$image >
 


//         echo "<br>";
//     } 






}



?>

