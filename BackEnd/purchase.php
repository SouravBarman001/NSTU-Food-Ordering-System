<?php
  require('connect.php');

    session_set_cookie_params(0);
    session_start();
    if($_SERVER["REQUEST_METHOD"]=="POST");
    {
        if(isset($_POST['Purchase']))
        {
         $query1= "INSERT INTO `order_manager`(`Full_Name`, `Phone_No`, `Address`) VALUES ('$_POST[fullName]','$_POST[phoneNumber]','$_POST[address]');";  
         if(mysqli_query($conn,$query1)){
            $order_id=mysqli_insert_id($conn);
            $query2="INSERT INTO `user_order`(`order_id`, `Item_Name`, `Price`, `Quantity`,`vendor_id`,`user_mail`) VALUES (?,?,?,?,?,?);";
            $stmt=mysqli_prepare($conn,$query2);
            echo "In here";
            if($stmt)
            {
                mysqli_stmt_bind_param($stmt,"isiiss",$order_id,$Item_Name,$Price,$Quantity,$id,$mail);
                foreach($_SESSION['cart'] as $key => $value)
                {
                    $Item_Name=$value['Item_Name'];
                    $Price=$value['Price'];
                    $Quantity=$value['Quantity'];
                    $id=$value['id'];
                    $mail=$value['email'];
                    echo "In here-2";
                    mysqli_stmt_execute($stmt);
                }
                unset($_SESSION['cart']);
                echo "Order Placed";
            }
            else{
                // echo " Not Prepared";
                // mysqli_stmt_bind_param($stmt,"isiis",$order_id,$Item_Name,$Price,$Quantity,$id);
                // foreach($_SESSION['cart'] as $key => $value)
                // {
                //     $Item_Name=$value['Item_Name'];
                //     $Price=$value['Price'];
                //     $Quantity=$value['Quantity'];
                //     $id=$value['Id'];
                //     echo "In here-2";
                //     mysqli_stmt_execute($stmt);
                // }
                // unset($_SESSION['cart']);
                // echo "Order Placed";
                echo "Not prepared";
            }
         } 
         else{
            echo "Error";
         }

        }
    }
    ?>