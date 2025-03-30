<?php session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbluser where  Email='$email' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['detsuid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
		echo "<script>alert('Invalid Details.');</script>";
    // $msg="Invalid Details.";
    }
  }
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Expense Tracker - Login</title>
	<!-- <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet"> -->
	<link rel="shortcut icon" href="rupee.jpg" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
	
</head>
<body>
	<div class="main">
        <div class="form">
            <form role="form" action="" method="post" id="" name="login">
                    <h2>Login</h2>
                    <input type="email" name="email" placeholder="email..." data-form-field="username" class="form-control display-7" value="" id="email-formbuilder-1j">
                    <input type="password" name="password"placeholder="Password" data-form-field="password" class="form-control display-7" value="" id="password-formbuilder-1j">
                    <button class="btnn" type="submit" value="login" name="login" class="btn btn-primary">
						<em>Login</em>
					</button>

                    <p class="link">Don't have an account<br> 
                    <a href="register.php">Sign up</a> here</p>
					<a href="forgot-password.php">Forgot Password?</a>
            </form>
        </div>
    <div>

	<!-- <div class="main">
		<div class="form">
			<p style="font-size:16px; color:red" align="center"> <?php if($msg){echo $msg;}?> </p>
			<form role="form" action="" method="post" id="" name="login">
				<fieldset>
					<div class="form-group">
						<input placeholder="E-mail" name="email" type="email" autofocus="" required="true" placeholder="Username" data-form-field="username" class="form-control display-7" value="" id="email-formbuilder-1j">
					</div>
					<a href="forgot-password.php">Forgot Password?</a>
					<div class="form-group">
						<input placeholder="Password" name="password" type="password"  required="true" data-form-field="password" class="form-control display-7" value="" id="password-formbuilder-1j">
					</div>
					<button class="btnn" type="submit" value="login" name="login" class="btn btn-primary"><em>Login</em></button>

                    <p class="link">Don't have an account<br> 
                    <a href="register.php">Sign up</a> here</p>
					<div class="checkbox">
						<button type="submit" value="login" name="login" class="btn btn-primary">login</button><span style="padding-left:250px">
						<a href="register.php" class="btn btn-primary">Register</a></span>
					</div>
					</fieldset>
			</form>
		</div>
	</div> -->

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
