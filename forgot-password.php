<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from tbluser where  Email='$email' and MobileNumber='$contactno' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
     header('location:reset-password.php');
    }
    else{
		echo "<script>alert('Invalid Details. Please try again.');</script>";
    //   $msg="Invalid Details. Please try again.";
    }
  }
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link rel="shortcut icon" href="rupee.jpg" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main">
        <div class="form">
            <form role="form" action="" method="post" id="" name="login">>
                    <h2>Login </h2>
					<p style="font-size:16px; color:red" align="center"> <?php if($msg){echo $msg;}  ?> </p>
                    <input type="email" name="email" placeholder="Input valid email.." data-form-field="username" class="form-control display-7" value="" id="email-formbuilder-1j">
                    <input placeholder="Mobile Number" name="contactno" type="contactno" value="" data-form-field="password" class="form-control display-7" value="" id="password-formbuilder-1j">
                    <button class="btnn" type="submit" value="" name="submit" class="btn btn-primary"><em>Reset</em></button>

                    
					<p>Don't want to reset password<a href="index.php"> <br>Login</a> </p>
					<a href="forgot-password.php">Forgot Password?</a>
            </form>
        </div>
    <div>

	<!-- <div class="row">
			<h2 align="center">Daily Expense Tracker</h2>
			<hr />
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<p style="font-size:16px; color:red" align="center"> <?php if($msg){echo $msg;}?> </p>
					<form role="form" action="" method="post" id="" name="login">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" required="true">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mobile Number" name="contactno" type="contactno" value="" required="true">
							</div>
							<div class="checkbox">
								<button type="submit" value="" name="submit" class="btn btn-primary">Reset</button>
								<span style="padding-left:250px">
									<a href="index.php" class="btn btn-primary">Login</a>
								</span>
							</div>
							</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>	 -->
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
