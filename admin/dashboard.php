
<h1> hi admin</h1>
<?php session_start();
if(!isset($_SESSION['id'])){
header('location:index.php'); 
}
?>

<?php
      if (isset($_SESSION['id'])) {
        $name=explode(' ', $_SESSION['isAdmin']);
        echo "<span>hi............:&nbsp".strtoupper($name[0]);
      }
    
      ?>
      
    

<?php

        if (isset($_SESSION['id'])) {?>
        <a href="logout.php" class="nav-link">Logout</a>
        <?php }?>

