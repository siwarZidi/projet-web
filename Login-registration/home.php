<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1 class="hi">Hello  <?php echo $_SESSION['name']; ?></h1>
     <div class="button-container">
         <a href="../shop.php" class="button">Start Shopping</a>
         <a href="../index.html" class="button">Logout</a>
     </div>

</body>
</html>

<?php 
}else{
    header("Location: index.php");
     exit();
}
 ?>
