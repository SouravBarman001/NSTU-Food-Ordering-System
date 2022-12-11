<?php
   session_set_cookie_params(0);
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../CSS/mycart.css">
</head>
<body>
<div class="hero">
        <nav>
          <!-- <img src="drawer.jpg" class="drawer_image"> -->
          <img src="../img/food_logo.jpg" class="logo_image">
          <ul>
              <li><a href="" class="btn_Home">Home Page</a></li>
          </ul>
        </nav>
</div >
    <div class="container">
        <div class="row">
            <div class="First_header">
                <h1>MY CART</h1>
            </div>
            <div class="item-table">
            <table>
  <tr>
    <th>Item</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total</th>
    <th style="text-align:center">Action</th>
  </tr>
  <tbody>
  <?php
  if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $key=>$value){ 
            echo"
             <tr>
                <td>$value[Item_Name]</td>
                <td>$value[Price] <input type='hidden' class='iprice' value='$value[Price]'></td>
               <td><input type='number' onchange='subTotal()'class='iquantity' value='$value[Quantity]'  min='1' max='10'</td>
               <td class='itotal'>1</td>
               <td class='Removebtn'>
               <form action='../BackEnd/manage_cart.php'  method='post'>
               <button name='Remove_Item' class='Remove btn'> Remove </button>
               <input type='hidden' name='Item_Name' value='$value[Item_Name]' >
               </form>
               </td>
            </tr>
    ";
        }
    } 
  ?>
  </tbody>
  </table>
            </div>
        </div>
        <div class="total">
            <h3>Grand Total</h3>
            <h5 id='gtotal'></h5>
            <form action='../BackEnd/purchase.php'  method='post'>
                <input type="text" name="fullName" id="" placeholder="Enter Full Name" required>
                <input type="text" name="address" id="" placeholder="Address" required>
                <input type="number" name="phoneNumber" id="" placeholder="Enter Phone Number Name" required>
               <button name='Purchase' class='Purchase'> PURCHASE </button>
               <input type='hidden' name='Purchase' value='1' >
         </form>
        </div>
    </div>

<script>
    var gt=0;
    var iprice=document.getElementsByClassName('iprice');
    var iquantity=document.getElementsByClassName('iquantity');
    var itotal=document.getElementsByClassName('itotal');
    var gtotal=document.getElementById('gtotal');

    function subTotal(){
        gt=0;
        for(i=0;i<iprice.length;i++)
        {
            
            itotal[i].innerText=(iprice[i].value)* (iquantity[i].value);
            gt= gt+((iprice[i].value)* (iquantity[i].value));
            
        }
        console.log(gt);
        gtotal.innerText=gt;
    }

    subTotal();

</script>
</body>
</html>
