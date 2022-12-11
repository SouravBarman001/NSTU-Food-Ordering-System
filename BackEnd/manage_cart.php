<?php
    include('connect.php');
    session_set_cookie_params(0);
    session_start();
    include('connect.php');
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  
  function sendMail($email){
      require ("../BackEnd/phpMailer/Exception.php");
      require ("../BackEnd/phpMailer/PHPMailer.php");
      require ("../BackEnd/phpMailer/SMTP.php");

      $mail= new PHPMailer(true);
      try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'piashpiash222@gmail.com';                     //SMTP username
        $mail->Password   = 'djsumdlwrnewvkrf';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('piashpiash222@gmail.com', 'Order Confirmation');
        $mail->addAddress($email);     //Add a recipient
        $mail->From = 'piashpiash222@gmail.com';
        $mail->Sender = $email;

    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification';
        $mail->Body    = "Thanks for Your Order!<br>
        Your Order will arrive in 30 minute.....
        ";
    
        $mail->send();
        echo "<script>
        alert('Please Register');
        window.location.href='../Pages/table.php';
        </script>";
       return true;
    } catch (Exception $e) {
        return false;
    }

  }
    if($_SERVER["REQUEST_METHOD"]=="POST");
    {
        if(isset($_POST['Add_To_Cart'])){
            if(isset($_SESSION['cart'])){
                print_r($_SESSION['cart']);
                $myItems=array_column($_SESSION['cart'],'Item_Name');
                if(in_array($_POST['Item_Name'],$myItems)){
                    echo"<script> alert('Item Already Added')
                 window.location.href='../Pages/Customer_page.php';
                    </script>";
                }
                else{
                    echo "else";
                $count=  count($_SESSION['cart']);
                $_SESSION['cart'][$count]=array('Item_Name'=>$_POST['Item_Name'],'Price'=>$_POST['Price'],'Quantity'=>1,'id'=>$_POST['Id'],'email'=>$_POST['email']);
                print_r($_SESSION['cart']);}
            }
            else{
                echo "IF else";
                $_SESSION['cart'][0]=array('Item_Name'=>$_POST['Item_Name'],'Price'=>$_POST['Price'],'Quantity'=>1,'id'=>$_POST['Id'],'email'=>$_POST['email']);
                print_r($_SESSION['cart']);
            }
        }
        if(isset($_POST['Remove_Item']))
        {
            foreach($_SESSION['cart'] as $key=>$value){
                if($value['Item_Name']==$_POST['Item_Name']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo "<script>
                alert('Please Register');
                window.location.href='../Pages/table.php';
                </script>";
            }
        }
        }
        if(isset($_POST['Remove_Item_V']))
        {
          $value=$_POST['order_id'];
          $name=$_POST['Item_Name'];
          $q=$_POST['Price'];
          $data="DELETE FROM `user_order` WHERE order_id='$value'  AND Item_Name='$name' AND Price='$q'";
          $result= mysqli_query($conn,$data);
          echo "<script>
                alert('Please Register');
                window.location.href='../Pages/mycart.php';
                </script>";
        }
        if(isset($_POST['accepted']))
        {
          $value=$_POST['order_id'];
          $name=$_POST['Item_Name'];
          $q=$_POST['Price'];
        $email=$_POST['email'];

          $data="DELETE FROM `user_order` WHERE order_id='$value'  AND Item_Name='$name' AND Price='$q'";
          $result= mysqli_query($conn,$data)  && sendMail($email);

        }
}


?>