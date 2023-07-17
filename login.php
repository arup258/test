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
    
 <title>Hello</title>
 

  </head>
  <body>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Test.com</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="student.php">Student</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      
      
    </ul>
  </div>
</nav>


   
<div class="container mt-5">
    <h1>Login User</h1>
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
<div class="container mt-5">
<div class="links">
don't have an account? <a href="register.php"> sign up now</a>

<?php
include('dbcon.php');
if (isset($_POST['login'])) {

		$email=$_POST['email'];		
		$password=$_POST['password'];

		$query="SELECT * FROM user1 where email='$email' and password='$password' and isadmin='admin'";
		$sql=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($sql);
		if (is_array($row)) {
			
			$_SESSION["id"]=$row['id'];
			$_SESSION["name"]=$row['name'];
      
			
			//print_r($_SESSION); exit();
			//echo $_SESSION["id"]; exit();
			
			header('location:student.php');
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