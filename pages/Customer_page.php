<?php
   session_start();
   $mail=$_SESSION['email'];
   require('../Backend/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <link rel="stylesheet" href="../CSS/customerStyle.css">
</head>
<body>
    <div class="hero">
        <nav>
          <img src="../img/food_logo.jpg" class="logo_image">
          <ul>
              <li><a href="" class="btn">Search Vendor</a></li>
              <li><a href="" class="btn">Search Item</a></li>
              <li><a href="mycart.php" class="btn">Cart</a></li>
          </ul>
        </nav>
          </div >
    <section class="dishes" id="dishes">
        <h1 class="heading">Popular dishes</h1>
<div class="box-container">
 <?php
      $sql= "SELECT * FROM fooditeam";
      $result=mysqli_query($conn,$sql);
      if( mysqli_num_rows($result)>0 ){
        while($row = mysqli_fetch_array($result)){
            ?>
            <div class="box">
            <img src="../BackEnd/uploads/<?php echo $row['foodImg']?>">
            <div class="overlay">
                <div class="hovertext">
                    <h3><?php echo $row['foodName']?></h3>
                    <span><?php echo $row['foodPrice']?></span>
                    <form action="../BackEnd/manage_cart.php" method="POST">
                    <button type="submit" name="Add_To_Cart" class="btn_cart">Add to cart</button>
                    <input type="hidden" name="Item_Name" value= <?php echo $row['foodName'] ?> >
                    <input type="hidden" name="Price" value= <?php  echo $row['foodPrice'] ?>>
                    <input type="hidden" name="Id" value= <?php  echo $row['vendor_id'] ?>>
                    <input type="hidden" name="email" value= <?php  echo $mail ?>>
                    </form>
                </div>
              </div>
        </div>
       <?php }
      }
      else{
        echo "Nothing to Show";
      }
  ?>
</div>
    </section>
</body>
</html>