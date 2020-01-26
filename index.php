<?php
error_reporting(0);
ini_set('max_execution_time', 300);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Email Reader</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="lib/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="lib/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="lib/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lib/css/util.css">
	<link rel="stylesheet" type="text/css" href="lib/css/main.css">
<!--===============================================================================================-->
</head>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			    <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" 
                action="#" method="post">
					<span class="login100-form-title">
						Email Details
					</span>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="email" name="username" placeholder="Email">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
					
						</span>

					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Submit
						</button>
					</div>
				</form>
				<center><?php
					if(isset($_POST['username']) && (!empty($_POST['pass']))){
					 		include_once('lib/class.imap.php');
					 		$check = new Imap();
 							$hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';
 							$connect=$check->connect($hostname,$_POST['username'],$_POST['pass']);
 							if($connect){
	 							$_SESSION['id'] = TRUE;
	 							$_SESSION['mailuser'] = $_POST['username'];
	 							$_SESSION['mailpass'] = $_POST['pass'];
						 		$_SESSION['testing'] = time();
						 		$newurl = "http://localhost/fetchemail/view.php";
						 		header('Location: '.$newurl); 
	 							}
 							else{ $_SESSION['msg']="<span style='color:red'>".imap_last_error()."</span>"; }
  						 		
					 	}  
					else { }
					if(isset($_SESSION['msg'])) { echo $_SESSION['msg']; 
					session_unset();     // unset $_SESSION variable for this page
	    			session_destroy(); }?></center>	
			</div>
			
		</div>
	</div>

<!--===============================================================================================-->
<script src="lib/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="lib/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="lib/vendor/bootstrap/js/popper.js"></script>
	<script src="lib/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="lib/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="lib/vendor/daterangepicker/moment.min.js"></script>
	<script src="lib/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="lib/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="lib/js/main.js"></script>

</body>
</html>
