<?php 
include('./dbcon.php');
$delete=$_GET['delete'];

$query="DELETE FROM user WHERE id='$delete'";
$sql=mysqli_query($conn,$query);

if($sql){
    header('location:student.php');
}else{
    echo "<script> alert('failed')</script>";
}







?>