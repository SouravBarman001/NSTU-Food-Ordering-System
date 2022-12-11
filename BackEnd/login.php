<?php
  include('connect.php');
  session_start();
  $type=$_SESSION['type'];
  //echo "$bar";
  if(isset($_POST['submituser'])){
    $email= $_POST['user_email']; 
    $password= $_POST['user_password'];
    if(empty($email) ||empty($password) ){
      echo "<script>
      alert('Please Enter All Data');
      window.location.href='Food.php';
      </script>";
    }
    else{
      if( $_SESSION['type']=="customer"){
      $user_exist_query= "SELECT * FROM customer where email ='$email' AND userpassword = '$password' AND is_validate='1';"; 
      $result=mysqli_query($conn,$user_exist_query);
      if(mysqli_num_rows($result)>0){
        $_SESSION['email']=$email;
        echo $_SESSION['email'];
          echo "<script>
          alert('Successful Login');
          window.location.href='../Pages/Customer_page.php';
          </script>";
      }
      else{
        echo "<script>
          alert('Please Register');
          window.location.href='../Pages/Food.php?type=$type';
          </script>";
      }
      }
      else{
        $user_exist_query= "SELECT * FROM vendor where email ='$email' AND V_password = '$password' AND is_validate='1';"; 
        $result=mysqli_query($conn,$user_exist_query);
        if(mysqli_num_rows($result)>0){
           $row = mysqli_fetch_array($result);
           $_SESSION['vendorName']=$row['V_name'];
           $_SESSION['vendorId']=$row['Vendor_id'];
            echo "<script>
            alert('Successful Login');
           window.location.href='../Pages/VendorProfile.php';
            </script>";
        }
        else{
          echo "<script>
            alert('Please Register');
            window.location.href='../Pages/Food.php?type=$type';
            </script>";
        }
      }

    }
}

?>