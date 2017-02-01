<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title></title>
    
    
    
    
        <link rel="stylesheet" href="css/style1.css">

    
    
    
  </head>

  <body>
	<?php 
							
							if(empty($_SESSION)) 
								session_start();
							if(isset($_SESSION['customer_email'])) {
								$email = $_SESSION['customer_email'];
								$customer_id = $_SESSION['customer_id'];
								$name = $_GET['name'];
								$amt = $_GET['amt'];
								if(isset($_GET['chk'])) {
								
																	
										$dbhost = 'localhost';
										$dbuser = 'root'; 
										$dbpass = 'root'; 
										$conn = mysql_connect($dbhost, $dbuser, $dbpass  );

										if(! $conn ) 
										{ 
											die('Could not connect: ' . mysql_error()); 
										}  
										
										mysql_select_db( 'mummys_kitchen', $conn );

										$querry = "SELECT mess_id FROM customer where customer_id = $customer_id ";
										$ret  = mysql_query($querry, $conn);

										if ($ret) {
											$count =($ret ? mysql_affected_rows($conn): 0);
											$row = mysql_fetch_array($ret, MYSQL_NUM);
											
											if($row[0] != NULL) {
												$querry2 = "update customer set bill = bill - $amt where customer_id = $customer_id "; 
												$ret  = mysql_query($querry2, $conn);
												echo "<h4>Bill Paid !</h4>";
												echo "<br>You will be automatically redirected in 5 seconds !</h4>";
												header( "refresh:5;url=customer_homepage.php" );
									
											}
											else {
													echo "<h4>Order Placed !</h4>";
													echo "<br>You will be automatically redirected in 5 seconds !</h4>";
													header( "refresh:5;url=customer_homepage.php" );
									
											
											}

										} 
										else {
											echo " Couldn't get data. ";
										}

										mysql_close($conn);
										
										
								
								}
								else{
									
									echo "<form action='single_order.php?chk=1&name= $name&amt=$amt' method=POST>
										<div class=form-container>
										  <div class=personal-information>
											<h1>Payment Information</h1>
										  </div> <!-- end of personal-information -->
										  
										  <input id=input-field type=text name=amount required=required value='Payable Amount : $amt' disabled/>
										
										<div class=card-wrapper></div>
										  <input id=column-left type=text name=first-name placeholder='First Name'>
										  
										  <input id=column-right type=text name=last-name placeholder='Surname'>
										  
										  <input id=input-field type=text name=number placeholder='Card Number'>
										 
										  <input id=column-left type=text name=expiry placeholder='MM / YYYY'>
											
										  <input id=column-right type=text pattern='[0-9]{3}' title='Enter three digit CCV Number' name=cvc placeholder='CCV'>
										
										  <input id=input-button type=submit value=Submit>
										</form><div class=body-text>Try to write your name in the name fields. Also try to write your card number. This plugin identifies your card and shows the right graphics. By clicking CCV field card will turn.</div>";
									
									
									
									
									
									
								}
							}
							else{
								echo "<h4>Please login before you continue. Click <a href='customer_login.php'>Here</a> to login.</h4>";
							}
							
		?>
     
  
  </div> <!-- end of form-container -->
</body>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/card.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/jquery.card.js'></script>

        <script src="js/index1.js"></script>

    
    
    
  </body>
</html>
