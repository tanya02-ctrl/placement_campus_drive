<?php include '../db.php'; ?>

<?php

if(isset($_POST['submit'])){

$dept=trim($_POST['dept']);
$password=trim($_POST['password']);
$email=trim($_POST['email']);




$error=[

'dept'=>'',
'email'=>'',
'password'=>''


];


if($dept=='')	{
	$error['dept']="dept is Empty";
}
if($password=='')	{
	$error['password']="Password is Empty";
}
if($email=='')	{
	$error['email']="Email is Empty";
}






foreach ($error as $key => $value) {

if(empty($value)){


	unset($error[$key]);


}

}


if(!empty($error)){


?>
<script>
	alert('Incomplete Credentials');
</script>
<?php


}else{
	$the_password=crypt($password,'123abc');
	$query="INSERT INTO admin(dept,email,password) VALUES('{$dept}','{$email}','{$the_password}')";
	$result=mysqli_query($connection,$query);
	header("Location:./login.php");

	if(!$result){

			die('Query Failed '.mysqli_error($connection));
		}
}

} 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Registration</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="css/bootstrapmin.css" rel="stylesheet">
    <link href="css/dashboard-style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  </head>
  
  
  <body class="bg-light" style="background: url('../back.jpg') no-repeat center center fixed; background-size: cover;">

<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="col-md-6 col-lg-5 shadow p-4 rounded bg-white">
	<header class="text-center mb-4">
	  <h1 class="h4">Admin Register</h1>
	</header>
	        <form method="POST" class="templatemo-login-form" action="register.php">

			<div class="mb-3">
		<div class="input-group">
		  <span class="input-group-text">@</span>
		  <input type="email" name="email" class="form-control" placeholder="Email" required>
		</div>
	  </div>
				<div class="mb-3">
	        		<div class="input-group">
		        		<span class="input-group-text">Semester</span>
		              	<input type="number" name="sem" class="form-control" placeholder="Student's Semester" >
		          	</div>
	        	</div>
				<div class="mb-3">
	        		<div class="input-group">
		        		<span class="input-group-text">Total Students</span>
		              	<input type="number" name="totalstud" class="form-control" placeholder="No. of Students" >
		          	</div>
	        	</div>
				<div class="mb-3">
	        		<div class="input-group">
		        		<span class="input-group-text">Placement Cell</span>
		              	<input type="text" name="$placeincharge" class="form-control" placeholder="Placement Head" >
		          	</div>
	        	</div>
				<div class="mb-3">
		<div class="input-group">
		  <span class="input-group-text"><i class="fa fa-key"></i></span>
		  <input type="password" name="password" class="form-control" placeholder="******" required>
		</div> 
      </div>
		<div class="mb-3">
		<select class="form-select" name="dept" required>
		  <option value="select">Select Department</option>
		  <option value="MCA">Master of Computer Application (MCA)</option>
		  <option value="MBA">Master of Business Administration (MBA)</option>
		  <option value="BCA">Bachelor of Computer Application (BCA)</option>
		  <option value="BBA">Bachelor of Business Administration (BBA)</option>
		</select>
	  </div>


				 <div class="d-grid gap-2 mb-3">
		<button type="submit" name="submit" class="btn btn-primary">Register</button>
	  </div>
	</form>
	<div class="text-center">
	  <p>Already have an account? <a href="login.php" class="text-decoration-none">Sign in here!</a></p>
	</div>
  </div>
</div>

    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
