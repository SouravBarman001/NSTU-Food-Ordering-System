<?php
    session_start(); 
?>

<?php
    $type=$_GET['type'];
    $_SESSION['type']=$type;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
    

    src="https://kit.fontawesome.com/64d58efce2.js"
    crossorigin="anonymous"
  ></script>
    <link rel="stylesheet" href="../CSS/Food.css">
    <title>Registration & Login Page</title>
</head>
<body>
    
   <div class="container">
    <div class="forms-cntainer">
        <div class="login-registration">
            <form action="../BackEnd/login.php" class="login-form" method="post">
                <h2 class="title">Login</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="user_email" placeholder="UserEmail">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="user_password" placeholder="Password">
                </div>
                <input type="submit"  name="submituser" value="Login" class="btn solid">
            </form>
            <form action="../BackEnd/Registration.php" class="registration-form" method="post">
                <h2 class="title">Registration</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="user_name" placeholder="Username" required>  
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="user_email" placeholder="Email" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="user_password" placeholder="Password" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-phone"></i>
                    <input type="tel" name="user_number" placeholder="Number" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-address-card"></i>
                    <input type="text" name="user_address" placeholder="Address" required>
                </div>
                <input type="submit" name="submit" class="btn" value="Registration">
            </form>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content" id="need_to_hide">
                <h3>First Time?</h3>
                <p>Welcome to our online food delivary system</p>
                <button class="btn transparent" id="registration-btn">Registration</button>
            </div>
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>One of us ?</h3>
                <p>Thank you</p>
                <button class="btn transparent" id="login-btn">Login</button>
            </div>
 </div>
    </div>
    

   </div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
   <script src="../JS/Food.js"></script>
</body>
</html>