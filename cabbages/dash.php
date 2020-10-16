<?php
include 'config.php'; //connect the connection page

if(empty($_SESSION)) // if the session not yet started
   session_start();

if(!isset($_SESSION['username'])) { //if not yet logged in
   header("Location: a.php");// send to login page
   exit();
}
?>
<!DOCTYPE html>
<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="css/a.css">
<body>
<main>
	<?php include('templates/header.php');?>
<div class="container" style="background-image: url('images/garbage.jpg');" >
	<div class="row">
		<div class="col-md-4">
			<div class="dbox dbox--color-1">
				
				<div class="dbox__body">
					<span class="dbox__count">Profile</span>
					<span class="dbox__title">View</span>
				</div>
				<a href="profileview.php">
				<div class="dbox__action">
					<button class="dbox__action__btn">Click</button>
				</div>
				</a>				
			</div>
		</div>
		<div class="col-md-4">
			<div class="dbox dbox--color-2">
				
				<div class="dbox__body">
					<span class="dbox__count">Profile</span>
					<span class="dbox__title">Editing</span>
				</div>
				<a href="profileedit.php">
				<div class="dbox__action">
					<button class="dbox__action__btn">Click</button>
				</div>	
				</a>			
			</div>
		</div>
		<div class="col-md-4">
			<div class="dbox dbox--color-1">
				
				<div class="dbox__body">
					<span class="dbox__count">Add </span>
					<span class="dbox__title">Garbages</span>
				</div>
				
				<div class="dbox__action">
					<button class="dbox__action__btn">Click</button>
				</div>				
			</div>
		</div>
		<div class="col-md-4">
			<div class="dbox dbox--color-2">
				
				<div class="dbox__body">
					<span class="dbox__count">Check</span>
					<span class="dbox__title">Notifications</span>
				</div>
				
				<div class="dbox__action">
					<button class="dbox__action__btn">Click</button>
				</div>				
			</div>
		</div>
		
	</div>
</div>
<?php include('templates/footer.php');?>

</main>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
</body>
</html>