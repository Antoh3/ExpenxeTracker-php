<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['name'];
    $mobno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' ");
    $result=mysqli_fetch_array($ret);
    if($result>0){
		echo "<script>alert('This email  associated with another account');</script>";
		// $msg="This email  associated with another account";
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FullName, MobileNumber, Email,  Password) value('$fname', '$mobno', '$email', '$password' )");
    if ($query) {
		echo "<script>alert('You have successfully registered');</script>";
    // $msg="You have successfully registered";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Expense Tracker - Signup</title>
	<!-- <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet"> -->
	<link rel="shortcut icon" href="rupee.jpg" type="image/x-icon">
    <link rel="stylesheet" href="style2.css">
	<script type="text/javascript">
	function checkpass()
	{
	if(document.signup.password.value!=document.signup.repeatpassword.value)
	{
	alert('Password and Repeat Password field does not match');
	document.signup.repeatpassword.focus();
	return false;
	}
	return true;
	} 

</script>
<body>

	<div class="main">
        <div class="form">
            <form role="form" action="" method="post" id="" name="signup" onsubmit="return checkpass();">>
                    <h2>Sign up Here</h2>
                    <input type="text" name="name" placeholder="Fullname" data-form-field="username" class="form-control display-7" value="" id="email-formbuilder-1o">
                    <input name="email" type="email" placeholder="email" data-form-field="username" class="form-control display-7" value="" id="email-formbuilder-1o">
                    <input  id="mobilenumber" name="mobilenumber" placeholder="phonenumber" data-form-field="username" class="form-control display-7" value="" id="email-formbuilder-1o">
                    <input type="password" name="password" type="password"  placeholder="Password" data-form-field="password" class="form-control display-7" value="" id="password-formbuilder-1o">
                    <input type="password" id="repeatpassword" name="repeatpassword"placeholder="Confirm Password" data-form-field="password" class="form-control display-7" value="" id="password1-formbuilder-1o">
                    <button class="btnn"  type="submit" value="submit" name="submit" class="btn btn-primary"><em>Sign up</em></button>

                    <p class="link">Already have an account<br> 
                     <a href="index.php">Sign in</a> here</p>
            </form>
        </div>
    <div>
	<!-- <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">Sign Up</div>
			<div class="panel-body">
				<form role="form" action="" method="post" id="" name="signup" onsubmit="return checkpass();">
					<p style="font-size:16px; color:red" align="center"> <?php if($msg){
echo $msg; } ?> </p>
					<fieldset>
						<div class="form-group">
							<input class="form-control" placeholder="Full Name" name="name" type="text" required="true">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="E-mail" name="email" type="email" required="true">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" maxlength="10" pattern="[0-9]{10}" required="true">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Password" name="password" type="password" value="" required="true">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="repeatpassword" name="repeatpassword" placeholder="Repeat Password" required="true">
						</div>
						<div class="checkbox">
							<button type="submit" value="submit" name="submit" class="btn btn-primary">Register</button><span style="padding-left:250px">
							<a href="index.php" class="btn btn-primary">Login</a></span>
						</div>
							</fieldset>
				</form>
			</div>
		</div>
	</div> -->
	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
