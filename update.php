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
  <?php   
include('./dbcon.php');
$update=$_GET['id'];
$query="select * from user where id='$update'";
$sql=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($sql);
?>
<div class="container mt-5">
    <h1>Update user</h1>
        <form action="" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $row['name'];?>" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" value="<?= $row['email'];?>" name="email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $row['phone'];?>" name="phone">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">City</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $row['city'];?>" name="city">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $row['address'];?>" name="address">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Image</label>
            <input type="file" class="form-control" id="exampleInputEmail1" value="<?= $row['image'];?>" name="image">
        </div>

        <button type="submit" class="btn btn-primary" name="edit">Update</button>
        </form>
</div>


<?php 
include('./dbcon.php');

if(isset($_POST['edit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $city=$_POST['city'];
    $address=$POST['address'];
    
    $image=$POST['image'];

    $query=" UPDATE user SET name='$name', email='$email',phone='$phone',city='$city',address='$address',image='$file_name'
    WHERE id='$update' ";
    $sql=mysqli_query($conn,$query);

    if($sql){
        header('location:student.php');
    }else{
        echo "<script> alert('data not inserted')</script>";
    }
}



?>

 
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>