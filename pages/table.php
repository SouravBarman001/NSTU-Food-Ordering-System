<?php
session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NSTU Food Ordering System</title>
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="assets/materialize/css/materialize.min.css" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css"> 
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand waves-effect waves-dark" href="VendorProfile.php"><i class="large material-icons">track_changes</i> <strong>NSTU FOS</strong></a>				
		<div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
            </div>

            <ul class="nav navbar-top-links navbar-right"> 
				  <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b><?php echo $_SESSION['vendorName']?></b> <i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </nav>
		<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">

<li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
</li>
</ul>  
	   <!--/. NAV TOP  -->
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="VendorProfile.php" class="waves-effect waves-dark"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                    <li>
                        <a href="#" class="active-menu waves-effect waves-dark"><i class="fa fa-table"></i> Order list</a>
                    </li>
                    <li>
                        <a href="form.php" class="waves-effect waves-dark"><i class="fa fa-edit"></i> Add Food Iteam </a>
                    </li>


                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                            Order List
                        </h1>

									
		</div>
		
            <div id="page-inner"> 
               
            <div class="row" >
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="card">
                        <div class="card-content">
                            <div class="table-responsive">


<?php
                    // Include config file
                        require_once '../BackEnd/connect.php';
                        $ss=$_SESSION['vendorId'];
                      // Attempt select query execution
                     $sql = "SELECT order_manager.order_id,order_manager.Full_Name,order_manager.Phone_No,order_manager.Address,user_order.Item_Name,user_order.Price,user_order.Quantity ,user_order.user_mail
                     FROM user_order JOIN order_manager
                     ON user_order.order_id=order_manager.order_id AND user_order.vendor_id='$ss';"; 

                      if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Name</th>";
                                        echo "<th>Phone number</th>";
                                        echo "<th>Address</th>";
                                        echo "<th>Food Items</th>";
                                        echo "<th>Quentity</th>";
                                        echo "<th>Price</th>";
                                        echo "<th>Accept</th>";
                                        echo "<th>Reject</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['Full_Name'] . "</td>";
                                        echo "<td>" . $row['Phone_No'] . "</td>";
                                        echo "<td>" . $row['Address'] . "</td>";
                                        echo "<td>" . $row['Item_Name'] . "</td>";
                                        echo "<td>" . $row['Quantity'] . "</td>";
                                        echo "<td>" . $row['Price'] . "</td>";
                                        echo "<td>";
                                        echo "
                                        <form action='../BackEnd/manage_cart.php'  method='post'>
                                        <button name='accepted' class='Remove btn'> <i class='fa fa-check-square-o' aria-hidden='true'></i> </button>
                                        <input type='hidden' name='order_id' value=".$row['order_id']." >
                                        <input type='hidden' name='Item_Name' value=".$row['Item_Name']." >
                                        <input type='hidden' name='Price' value=".$row['Price']." >
                                        <input type='hidden' name='email' value=".$row['user_mail']." >
                                        </form>
                                        ";

                                       // echo '<a href="../database/delete.php?id='. $row['order_id'] .'" class="mr-3" title="Delete item" data-toggle="tooltip"><span><i class="fa fa-check-square-o" aria-hidden="true"></i></span></a>';

                                    echo "</td>";
                                    echo "<td>";
                                    echo"
                                    <form action='../BackEnd/manage_cart.php'  method='post'>
                                        <button name='Remove_Item_V' class='Remove btn'> <i class='fa fa-times' aria-hidden='true'></i> </button>
                                        <input type='hidden' name='order_id' value=".$row['order_id']." >
                                        <input type='hidden' name='Item_Name' value=".$row['Item_Name']." >
                                        <input type='hidden' name='Price' value=".$row['Price']." >
                                        </form>
                                        ";
                                    echo "</td>";

                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                      // Close connection
                          mysqli_close($conn);
                    ?>


<!---------------table data fetch form data base -------->

                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
            
                <!-- /. ROW  -->
        
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
 

    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
	
	<!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/materialize/js/materialize.min.js"></script>
	
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
	
	
	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>
	
	 <script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>
	 <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script> 
 

</body>

</html>
