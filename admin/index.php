<?php 
include('./dbcon.php');
	session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Admin</title>
  </head>
  <body>

  <div class="container mt-5">
    <h1>Admin login</h1>
        <form action="" method="post">
        
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email">
        </div>
        
        <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" class="form-control" id="exampleInputEmail1" name="password">
        </div>

        <button type="submit" class="btn btn-primary" name="login">login</button>
        </form>
</div>

<?php
include('dbcon.php');
if (isset($_POST['login'])) {

		$email=$_POST['email'];		
		$password=$_POST['password'];

		$query="SELECT * FROM user1 where email='$email' and password='$password'and isAdmin='admin'";
		$sql=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($sql);
		if (is_array($row)) {
			
			$_SESSION["id"]=$row['id'];
			$_SESSION["isAdmin"]=$row['isAdmin'];
      
			
			//print_r($_SESSION); exit();
			//echo $_SESSION["id"]; exit();
			
			header('location:dashboard.php');
        echo "<script> alert('login successful')</script>";

			
		}
		else{
		echo "<script> alert('login failed')</script>";
		}
	
	
  }


?>




    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>