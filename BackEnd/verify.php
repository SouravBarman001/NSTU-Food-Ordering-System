<?php
   require ('connect.php');
   session_start();
   $type=$_SESSION['type'];
   if(isset($_GET['email']) && isset($_GET['v_code'])){
    $url_email=$_GET['email'];
    $url_link=$_GET['v_code'];
    if($type=='customer'){
    $query = " SELECT * FROM customer WHERE email='$url_email' AND v_code='$url_link';";
     $result=mysqli_query($conn,$query);
    if($result){
        if(mysqli_num_rows($result)==1){
             $result_fetch=mysqli_fetch_assoc($result);
             if($result_fetch['is_validate']==0){
                     $temp_email=$result_fetch['email'];
                     $update="UPDATE customer SET is_validate='1' WHERE email='$temp_email';";
                     if(mysqli_query($conn,$update)){
                         echo "<script>
                         alert(' Verified');
                          window.location.href='../Pages/Food.php?type=$type';
                         </script>";
                     }
                     else{
                         echo "<script>
                         alert('Not  Verified');
                         window.location.href='../Pages/Food.php?type=$type';
                         </script>"; 
                     }
             }
             else{
                 echo "<script>
           alert('User Already Verified');
           window.location.href='../Pages/Food.php?type=$type';
           </script>";
             }
        }
     }
     else{
            
        echo "<script>
        alert('Server Down');
        window.location.href='../Pages/Food.php?type=$type';
        </script>"; 
   }
}
    
    else{
        $query = " SELECT * FROM vendor WHERE email='$url_email' AND v_codee='$url_link';";
        $result=mysqli_query($conn,$query);
        if($result){
            if(mysqli_num_rows($result)==1){
                 $result_fetch=mysqli_fetch_assoc($result);
                 if($result_fetch['is_validate']==0){
                         $temp_email=$result_fetch['email'];
                         $update="UPDATE vendor SET is_validate='1' WHERE email='$temp_email';";
                         if(mysqli_query($conn,$update)){
                             echo "<script>
                             alert(' Verified');
                              window.location.href='../Pages/Food.php?type=$type';
                             </script>";
                         }
                         else{
                             echo "<script>
                             alert('Not  Verified');
                             window.location.href='../Pages/Food.php?type=$type';
                             </script>"; 
                         }
                 }
                 else{
                     echo "<script>
               alert('User Already Verified');
               window.location.href='../Pages/Food.php?type=$type';
               </script>";
                 }
            }
         }
         else{
            
                echo "<script>
                alert('Server Down');
                window.location.href='../Pages/Food.php?type=$type';
                </script>"; 
           }
    }
   
}
?>