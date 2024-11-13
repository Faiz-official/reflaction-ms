<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['bpmsaid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>RMS Admin | Login Page </title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		
		<!-- main content start-->
		<div style="height: 625px; 
					background-size: cover;   
					background-image: url('http://localhost/beatuty-parlour-management/rms/admin/images/admin-login-background-1.jpg');">
			<div class="main-page login-page "><br>
			  <h3 class="title1" style="font-weight: bold; 
										font-size: 40px; 
										color: #1d2069; 
										text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">Admin Login</h3>

				<div class="widget-shadow">
					<div class="login-top">
						<h3 style=" font-weight: bold;">Welcome back to Reflection Makeup Studio's AdminPanel ! </h3>
					</div>
					<div class="login-body">
						<form role="form" method="post" action="">
							<p style="font-size:16px; color:red" align="center"> <?php if($msg){echo $msg;}?></p>
							<input type="text" class="user" name="username" placeholder="Username" required="true">
							<div>
    							<input type="password" name="password" class="lock" placeholder="Password" required="true">
    							<i class="fas fa-eye eye-icon" id="eyeIcon"></i>
							</div>
							<input type="submit" name="login" value="Sign In" style="border-radius: 20px; 
																						padding: 10px 20px; font-size: 16px; 
																						background-color: #1d2069; 
																						color: white; 
																						border: none; 
																						cursor: pointer;">
							<div class="forgot-grid">
								
								<div class="forgot">
									<a href="../index.php">Back to Home</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="forgot-grid">
								
								<div class="forgot">
									<a href="forgot-password.php">forgot password?</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</form>
					</div>
				</div>
				
				
			</div>
		</div>
		
	</div>
	<?php include_once('includes/footer.php');?>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
   <script>
    const eyeIcon = document.getElementById('eyeIcon');
    const passwordField = document.querySelector('input[name="password"]');

    eyeIcon.addEventListener('click', function() {
        // Toggle the password visibility
        if (passwordField.type === "password") {
            passwordField.type = "text"; // Show password
            eyeIcon.classList.add('clicked'); // Add highlight effect
        } else {
            passwordField.type = "password"; // Hide password
            eyeIcon.classList.remove('clicked'); // Remove highlight effect
        }
    });
</script>


   <style>
        .password-container {
            position: relative;
            width: 100%;
            max-width: 300px;
            margin: 20px auto;
        } 

        .lock {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .eye-icon {
            position: absolute;
            right: 505px;
            top: 48%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .eye-icon.clicked {
            color: #007BFF; /* Change color when clicked */
        }
    </style>

</body>
</html>