<?php 
include('./dbcon.php');
	session_start();

   if (!isset($_SESSION['id'])) {
     header('location:login.php');
  }
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Hello</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Home, Welcome to home page</a>
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
      <!-- <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li> -->

      <!-- <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li> -->

      <li class="nav-item">
      <?php
      if (isset($_SESSION['id'])) {
        $name=explode(' ', $_SESSION['name']);
        echo "<span>Welcome:&nbsp".strtoupper($name[0]);
      }
      else{
      ?>
      <a href="register.php"><span class="nav-link"></span> Register</a>
    <?php } ?>
    
      </li>
      <li>
        <?php
        if (isset($_SESSION['id'])) {?>
        <a href="logout.php" class="nav-link">Logout</a>
        <?php } else{?>
      </li>

      <li><a href="login.php"><span class="nav-link"></span> Login</a>
        <?php } ?>
      </li>
      
      
    </ul>
  </div>
</nav>


   
<div class="container mt-5">
    <h1>User Data</h1><br>
    <a href="add_student.php" class="btn btn-success">Add User</a>
    <table class="table mt-2">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col"> Name</th>
      <th scope="col"> Email</th>
      <th scope="col"> Phone</th>
      <th scope="col">City</th>
      <th scope="col">address</th>
      <th scope="col">Image</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include('./dbcon.php');
    $query="select * from user";
    $sql=mysqli_query($conn,$query);
    ?>
    <?php while($row=mysqli_fetch_assoc($sql)) { ?>
    <tr>
      <th scope="row"><?php echo $row['id']?></th>
      <td class=""><?php echo $row['name']?></td>
      <td class=""><?php echo $row['email']?></td>
      <td class=""><?php echo $row['phone']?></td>
      <td class=""><?php echo $row['city']?></td>
      <td class=""><?php echo $row['address']?></td>
      <td><img src="upload/<?php echo $row['image'];?>" alt=""height="60px" width="50px"></td>
      
      
      <td class=""><a href="update.php?id=<?= $row['id'];?>" class="btn btn-success">Update</a></td>
      <td class=""><a href="delete.php?delete=<?= $row['id'];?>" class="btn btn-danger">Delete</a></td>
      
    </tr>
    <?php } ?>
  </tbody>
</table>
   
</div>

 



<script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
 </body>
</html>