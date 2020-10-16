<?php
include('config.php');
// if(isset($_GET['submit'])){
// 	echo $_GET ['title'];
// 	echo $_GET ['email'];
// 	echo $_GET ['features'];
// }
$username = $email = $password =$password1=$errors=$name1=$name2='';
$errors = array('email'=>'','username'=>'','password'=>'','password1'=>'','errors'=>'','name1'=>'','name2'=>'');
if(isset($_POST['submit'])){
	// echo htmlspecialchars( $_POST ['email']);
	// echo htmlspecialchars( $_POST ['title']);
	// echo htmlspecialchars( $_POST ['features']);
	if (empty($_POST['email'])) {
		$errors['email'] =  "<p style='color:red'>email is required! </p>";
	}else{
      $email = $_POST['email'];
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      	$errors['email'] = "<p style='color:red'>email is invalid !</p>";
      }
	}
	if (empty($_POST['username'])) {
		$errors['username'] = "<p style='color:red'>username is required <br/></p>";
	}else{
		      $username = $_POST['username'];
		      if (!preg_match('/^[a-zA-Z\s]+$/', $username)) {
		      	  $errors['username'] = "<p style='color:red'>invalid username!</p>";

		      }

	}
	if (empty($_POST['name1'])) {
		$errors['name1'] = "<p style='color:red'>first name is required <br/></p>";
	}else{
		      $name1 = $_POST['name1'];
		      if (!preg_match('/^[a-zA-Z\s]+$/', $name1)) {
		      	  $errors['name1'] = "<p style='color:red'>invalid username!</p>";

		      }

	}
	if (empty($_POST['name2'])) {
		$errors['name2'] = "<p style='color:red'>second name is required <br/></p>";
	}else{
		      $name2 = $_POST['name2'];
		      if (!preg_match('/^[a-zA-Z\s]+$/', $name2)) {
		      	  $errors['name2'] = "<p style='color:red'>invalid username!</p>";

		      }

	}
	if (empty($_POST['password'])) {
				$errors['password'] = "<p style='color:red'>password is required </p>";

	}else{
		$password = $_POST['password'];
		      if (!preg_match('/^[0-9.,!@#$%&*()+-_a-zA-Z\s]+$/', $password)) {
		      	  $errors['password'] = "<p style='color:red'>invalid password!</p>";

		      }
	}
	if (empty($_POST['password1'])) {
				$errors['password1'] = "<p style='color:red'>confirm password is required </p>";

	}else{
		$password1 = $_POST['password1'];
		      if (!preg_match('/^[0-9.,!@#$%&*()+-_a-zA-Z\s]+$/', $password1)) {
		      	  $errors['password1'] = "<p style='color:red'>invalid password!</p>";

		      }
	}
	if($password !== $password1){
	$errors['errors'] = "<p style='color:red'>First password isn't matching the Second<br/></p>";
	}
	
	if (array_filter($errors)) {
	
	}else{
		$email= mysqli_real_escape_string($conn, $_POST['email']);
		$name1= mysqli_real_escape_string($conn, $_POST['name1']);
		$name2= mysqli_real_escape_string($conn, $_POST['name2']);
		$username= mysqli_real_escape_string($conn, $_POST['username']);
		$password= mysqli_real_escape_string($conn, $_POST['password']);
		$password=sha1($password);
				
$query = mysqli_query($conn, "SELECT * FROM clients WHERE username = '".$username. "'");
if(mysqli_num_rows($query) > 0){
$errors['username'] = "<p style='color:red'>username already exist!</p>";
}else{
    $query = mysqli_query($conn, "SELECT * FROM clients WHERE username = '".$username. "'");
  if(mysqli_num_rows(  $query) > 0){
$errors['username'] = "<p style='color:red'>username already exist!</p>";
}else{
    $sql = "INSERT INTO clients (email, username, password,first_name,second_name) VALUES ('$email', '$username', '$password','$name1','$name2')";
    if ($conn->query($sql) === TRUE) {
        header("Location: loginC.php");
    } 
  }
}

   
	



	



	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Bootstrap Simple Login Form with Blue Background</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
<style>
body {
	color: #fff;
	background: orange;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 41px;
	background: #f2f2f2;
	box-shadow: none !important;
	border: none;
}
.form-control:focus {
	background: #e2e2e2;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 400px;
	margin: 30px auto;
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form h2  {
	color: #333;
	font-weight: bold;
	margin-top: 0;
}
.signup-form hr  {
	margin: 0 -30px 20px;
}    
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;
	background: #3598dc;
	border: none;
	min-width: 140px;
}
.signup-form .btn:hover, .signup-form .btn:focus {
	background: #2389cd !important;
	outline: none;
}
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #3598dc;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}
.signup-form .hint-text  {
	padding-bottom: 15px;
	text-align: center;
}
</style>
</head>
<body>
<div class="signup-form">
    <form action="signupC.php" method="post">
		<h2>Client Sign Up</h2>
		<p>Please fill in this form to create an account!</p>
		<hr>
        <div class="form-group">
			    <div class="red-text"><?php echo $errors['errors']; ?></div>
				<input type="text" class="form-control" name="name1" placeholder="First Name" >
				<div class="red-text"><?php echo $errors['name1']; ?></div>
			</div>
        <div class="form-group">

				<input type="text" class="form-control" name="name2" placeholder="Second Name" >
				<div class="red-text"><?php echo $errors['name2']; ?></div>
			       	
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="username" placeholder="username" >
        	<div class="red-text"><?php echo $errors['username']; ?></div>
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" >
        	<div class="red-text"><?php echo $errors['email']; ?></div>
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" >
            <div class="red-text"><?php echo $errors['password']; ?></div>
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password1" placeholder="Confirm Password">
            <div class="red-text"><?php echo $errors['password1']; ?></div>
        </div>        
        <div class="form-group">
			<label class="form-check-label"><input type="checkbox" hidden=""> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="submit">Sign Up</button>
        </div>
    </form>
	<div class="hint-text">Already have an account? <a href="loginC.php">Login here</a></div>
</div>
</body>
</html>