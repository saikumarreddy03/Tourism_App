<?php
session_start();
include_once 'dbconnect.php';
//$res="SELECT * FROM users WHERE id='".$_SESSION['user']."'";
$res = "SELECT * FROM user";
$result=$conn->query($res);
 $userRow=$result->fetch_assoc();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tourism Application</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
  <!--  <link href="assets/css/font-awesome.css" rel="stylesheet" /> -->
        <!-- CUSTOM STYLES-->
   <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top"  style="background:#cc0066">
            <div class="adjust-nav">
                <div class="navbar-header">
                   <h1><font color='#ffffff'>Tourism Application</font></h1>
                </div>
                <div id="content" align="right">
         <b><a href="logout.php?logout" style="color:#000000">Sign Out</a></b><br>
		 <b><a href="changepasswd.php" style="color:#000000">Change Password</a></font></b>
	 </div>
              </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
					 <li>
                        <a href="home.php">Home</a>
                    </li>
                 	<li class="active-link">
                        <a href="nearby_destinations.php">Nearby Destinations</a>
                    </li>
                   <li>
                        <a href="message_history.php">My Messages</a>
                    </li>
                     <li>
                        <a href="ticket_history.php">My Tickets</a>
                    </li>
                         
                     </ul>
                           
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style="min-height:468px">
            <div id="page-inner" style="min-height:468px;">
                <div class="row">
                    <div class="col-md-12">
                     
                    </div>
                </div>
                <h3>Click the button to get your Previous Ticket History</h3>
				<button onclick="window.location.href='/DB/ticket_results.php'">Click</button>
				<?php
				$res = "select td.City, td.State, td.Country, t.DepartureDate, t.ReturnDate
						from
							TouristDestination td
						join
							Ticket t
						where
							td.TouristDestinationId = t.TouristDestinationId
							and
							t.PurchaserId = 4
							and
							t.DepartureDate <= current_timestamp()";
				//$res = "select city as ct,state as st,country as cunt from touristdestination";
				$result=$conn->query($res);
				 ?>
				 <br/>
						<table border="1">
						<tr>
						<th>City</th>
						<th>State</th>
						<th>Country</th>
						<th>DepartureDate</th>
						<th>ReturnDate</th>
						</tr>
				<?php
				while($row = $result->fetch_array())
				{
					echo "<br /><tr><td>".$row['City']."</td><td>".$row['State']."</td><td>".$row['Country']."</td><td>".$row['DepartureDate']."</td><td>".$row['ReturnDate']."</td></tr>";
				}
				?>
				</table>
                
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
             <div class="row">
                <div class="col-lg-12" >
                    &copy;  Heavy Weight Group 1. All Rights Reserved.
                </div>
        </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
