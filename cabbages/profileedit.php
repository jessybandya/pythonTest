<?php 

$conn =mysqli_connect('localhost','images','images','images');

$sql = "SELECT * FROM clients";
$records =mysqli_query($conn,$sql);

 ?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>
<body>
	<?php include('templates/header.php'); ?>
<h1>Edit Here</h1>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class=" ">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src=""></span><span class="text-black-50"></span><span> </span></div>
        </div>
        <div class=col-md-5 border-right >
            <div class=p-3 py-5>
                <div class=d-flex justify-content-between align-items-center mb-3>
                    <h4 class=text-right>Profile Editting</h4>
                </div>
 <?php 
   while ($row = mysqli_fetch_array($records)) {
    echo "<form action=action.php  method=post>";
       
     echo "<div style='float right' style='border-radius:200px'>";
        echo "<img style='width:200px;height:200px:border-radius:200px' src=src='".$row['image']."'></div>";
        echo "</div>";
       

        echo "<div class=row mt-2>";    
        echo "<div class=col-md-6><label class=labels>First Name</label>
                    <input type=text name=id_no class=form-control value='".$row['first_name']."'></div>"; 
        
        echo "<div class=col-md-6><label class=labels>Second Name</label>
                    <input type=text class=form-control name=country value='".$row['second_name']."'></div>";
        echo "<div class=col-md-6><label class=labels>Phone</label>
                    <input type=text class=form-control name=city value='".$row['phone']."'></div>";
         echo "<div class=col-md-6><label class=labels>ID No.</label>
                    <input type=text class=form-control name=company value='".$row['id_no']."'></div>";            
       
                    echo "</div";  
        echo "<div class=row mt-3>";
        
        
        echo "</div>";
         echo "<div class=row mt-2>";    
        echo "<div class=col-md-6><label class=labels>Email</label>
                    <input type=text name=email class=form-control value='".$row['email']."'></div>"; 
        echo "<div class=col-md-6><label class=labels>Username</label>
                    <input type=text class=form-control name=phone value='".$row['phone']."'></div>"; 
        echo "<div class=col-md-6><label class=labels>Username</label>
                    <input type=text class=form-control name=username value='".$row['username']."'></div>"; 
        
                    echo "<div class=col-md-6><label class=labels>Password</label>
                    <input type=text name=password class=form-control value='".$row['password']."'></div>"; 
        
                    

        echo "</div>";
        echo "</div>";
            echo "<input type=hidden name=id value='".$row['id']."'> ";
            echo "<div class=mt-5 text-center ><button name=save class=btn btn-primary profile-button type=submit>Save Profile</button></div>";
            echo "            <div style='margin-top:20px' class=col-md-6><label class=labels>Change/Add Photo</label><input class=file btn form-control  type='file' name='file' ></div>       
";
            
echo "</form>";
   }


  ?>


  
</div>
</div>
	<?php include('templates/footer.php'); ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
</body>
</html>