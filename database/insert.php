<?php
include("./config.php");
$uploadOk = 1;


if(isset($_POST['upload'])){

// others field
        $food_name = $_REQUEST['food_name'];
		$food_details = $_REQUEST['food_details'];
		$price = $_REQUEST['price'];
	



    // $sql1 = "INSERT INTO fooditeam (foodName, foodDetails,foodPrice) VALUES ('$food_name',
    // '$food_details','$price')";

// if(mysqli_query($con, $sql1)){
//     echo "<h3>data stored in a database successfully."
//         . " Please browse your localhost php my admin"
//         . " to view the updated data</h3>";
// }
 
  $name = $_FILES['file']['name'];
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

     // Check if file already exists
     if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }
  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif","webp");

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else{
      // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
     // Upload file
     if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
        // Insert record
       // $query = "insert into fooditeam(foodImg) values('".$name."')";

       $query = "INSERT INTO fooditeam (foodName, foodDetails,foodPrice,foodImg) values('$food_name',
       '$food_details','$price','".$name."')";

        mysqli_query($con,$query);
        echo "Food item added successfully";
     }

  }
  }


 
}
?>