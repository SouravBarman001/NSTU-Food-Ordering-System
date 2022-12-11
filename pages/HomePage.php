<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NSTU Food Ordering System</title>
    <link rel="stylesheet" href="../CSS/Student_home.css">
</head>
<body>
    <div class="hero">
  <nav>
    <!-- <img src="drawer.jpg" class="drawer_image"> -->
    <img src="../img/food_logo.jpg " class="logo_image">
    <ul>
        <li><a href="Food.php? type=customer" class="btn">Student Sign In</a></li>
        <li><a href="Food.php? type=vendor" class="btn">Vendor Sign In</a></li>
    </ul>
  </nav>
    </div >
    <div class="main-body">

    
    <div class="text">
        <h3 class="animate-charcter"> Welcome To NSTU Food Ordering System</h3>
        <h3 class="body_text">We as a platform gives you the opportunity to have home made food in your university area. Also we have young entrepours to be a successful business person</h3>
      </div>
    <div class="Slider">
        
        <div class="wrapper">
            <img src="../img/food_image_1.jpg">
            <img src="../img/food_image_2.jpg">
            <img src="../img/food_image_3.jpg">
            <img src="../img/food_image_4.webp">

        </div>
    </div>
    
    </div>
    </div>


  <script>
    function goVendor(){
      window.location.href='Food.php';
    }
    function goStudent(){
      window.location.href='Food.php';
    }

  </script>
</body>
</html>