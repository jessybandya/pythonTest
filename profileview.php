<?php
include('config.php');

$conn = mysqli_connect('localhost','images','images','images');
if (!$conn) {
    echo "Connection error: " . mysqli_connect_error();
}
//write querry for all cars

$sql = 'SELECT * FROM  clients';


$result = mysqli_query($conn, $sql);


$cars = mysqli_fetch_all($result, 3);

mysqli_free_result($result);

mysqli_close($conn);





?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/profileview.css">
</head>
<body>
	<?php foreach ($cars as $car) : ?>
    <?php if($car): ?>	

        <?php $image_src = $car['image'];

                     

 ?> 
 <?php 

if(isset($_GET['id'])){
   $id = mysqli_real_escape_string($conn, $_GET['id']);
   //make sql
   $sql = "SELECT * FROM clients WHERE id = $id";
   //get the query result
   $result = mysqli_query($conn, $sql);

   // fetch result in array format
   $car = mysqli_fetch_assoc($result);

   mysqli_free_result($result);
   mysqli_close($conn);

}
  ?>
	<?php include('templates/header.php'); ?>
    <div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img style="height: 100px;width: 100px;border-radius: 200px" src="images/garbage.jpg" class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="f-w-600"><p>Username</p></h6>
                                <p><?php echo htmlspecialchars($car['username']); ?></p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">First Name</p>
                                        <h6 class="text-muted f-w-400"><p><?php echo htmlspecialchars($car['first_name']); ?></p></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Second Name</p>
                                        <h6 class="text-muted f-w-400"><p><?php echo htmlspecialchars($car['second_name']); ?></p></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400"><p><?php echo htmlspecialchars($car['email']); ?></p></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400"><p><?php echo htmlspecialchars($car['phone']); ?></p></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">ID No.</p>
                                        <h6 class="text-muted f-w-400"><p><?php echo htmlspecialchars($car['id_no']); ?></p></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Opened Since</p>
                                        <h6 class="text-muted f-w-400"><p><?php echo htmlspecialchars($car['created_at']); ?></p></h6>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

	<?php include('templates/footer.php'); ?>
	<?php else: ?>
    <h5>No such car exist</h5>
    <?php endif; ?>           
          <?php endforeach ?> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
</body>
</html>