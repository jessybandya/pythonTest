<?php
session_start();
include('config.php');
$message="";
$username = $password=$errors= '';
$errors = array('username'=>'','password'=>'','errors'=>'');
if(count($_POST)>0) {
    $conn = mysqli_connect("localhost","images","images","images");
    $result = mysqli_query($conn,"SELECT * FROM clients WHERE username='" . $_POST["username"] . "' and password = '". sha1($_POST["password"])."'");
    $count  = mysqli_num_rows($result);
    if (empty($_POST['username'])) {
        $errors['username'] = "<p style='color:red'>username is required <br/></p>";
    } else if (empty($_POST['password'])) {
        $errors['password'] = "<p style='color:red'>password is required <br/></p>";
    }
    else if($count==0) {
        $errors['errors'] = "<p style='color:red'>invalid username or password! <br/></p>";
    } else {
        //When count is greater than zero it means password is correct?
        $username = mysqli_fetch_assoc($result)['username'];
        $_SESSION['username'] = $username;
        header('Location: index.php');
    }
}

?>
<!DOCTYPE html>
<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Client Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="loginC.php" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                            	<div class="red-text"><?php echo $errors['errors']; ?>
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                                <div class="red-text"><?php echo $errors['username']; ?>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                                <div class="red-text"><?php echo $errors['password']; ?>
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span></span> <span><input id="remember-me" hidden="" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="signupC.php" class="text-info">sign up here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>