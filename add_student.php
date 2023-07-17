<?php

if($_SERVER['REQUEST_METHOD']=="post"){


if(empty($_POST['name'])){
    $name_error ="please enter the name ";
}

if(empty($_POST['email'])){
    $email_error ="please enter the email ";
}

if(empty($_POST['phone'])){
    $phone_error ="please enter the phone ";
}

if(empty($_POST['city'])){
    $city_error ="please enter the city";
}

if(empty($_POST['address'])){
    $address_error ="please enter the address";
}

if(empty($_POST['image'])){
    $image_error ="please enter the image";
}
}
?>




<!doctype html>
<html lang="en">
<body class="bg-secondary">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello</title>
  </head>
  <body>
   
<div class="container mt-5">
    <h1>Add User</h1>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Full name">
            <span><?php if(isset($name_error)) echo $name_error;?></span>

            
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" name="email" class="form-control" placeholder="example@">
            <span><?php if(isset($email_error)) echo $email_error;?></span>


        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="text" name="phone" class="form-control" placeholder="+9133333">
            <span><?php if(isset($phone_error)) echo $phone_error;?></span>

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">City</label>
            <input type="text" name="city" class="form-control" placeholder="select city">
            <span><?php if(isset($city_error)) echo $city_error;?></span>

        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" name="address" class="form-control" placeholder="1234 Main St">
            <span><?php if(isset($address_error)) echo $address_error;?></span>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Image</label>
            <input type="file" class="form-control" id="exampleInputEmail1" name="image">
            <span><?php if(isset($image_error)) echo $image_error;?></span>
        </div>

        <!-- <div class="form-group">
            <label for="exampleInputEmail1">Resume</label>
            <input type="file" class="form-control" id="exampleInputEmail1" name="resume">
        </div> -->

        <button type="submit" class="btn btn-primary" name="Add">Add User</button>
        </form>
</div>

 
<?php   
include('./dbcon.php');

if(isset($_POST['Add'])){
    $name=$_POST['name'];   
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $city=$_POST['city'];
    $address=$_POST['address'];
    $file_name=$_FILES['image']['name'];
	//print_r($file_name); exit();
    $file_type=$_FILES['image']['type'];
	$file_size=$_FILES['image']['size'];
	$file_temp_loc=$_FILES['image']['tmp_name'];
	$file_store="upload/".$file_name;
	move_uploaded_file($file_temp_loc, $file_store);


    //resume session
    // $file_name=$_FILES['resume']['name'];
    // //print_r($file_name); exit();
    // $file_type=$_FILES['resume']['type'];
	// $file_size=$_FILES['resume']['size'];
	// $file_temp_loc=$_FILES['resume']['tmp_name'];
	// $file_store="upload/".$file_name;
	// move_uploaded_file($file_temp_loc, $file_store);

    if($error==0){
    $query ="INSERT INTO user (name, email, phone, city, address, image) VALUES ('$name', '$email', '$phone', '$city', '$address','$file_name')";
	$sql=mysqli_query($conn,$query);

    if($sql){
       
        header('location:student.php');
    }else{
        echo "<script> alert('data not inserted')</script>";
    }

} 
else{
    $msg="please fill all field";
}

}

?>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>