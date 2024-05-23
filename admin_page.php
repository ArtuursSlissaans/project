<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <header class="header">

   <section class="flex">
      <a href="#" class="logo">Rece Coffe Shop</a>

      <h6> Welcome <span><?php echo $_SESSION['admin_name'] ?></span> To Admin Page</h6>


      <nav class="navbar">
      <a href="add_product.php">add product</a>
      <a href="admin_view_products.php">view products</a>
      <a href="logout.php">logout</a>
      </nav>
   
      <div id="menu-btn" class="fas fa-bars"></div>
   </section>

   </header>

</head>

<body>

   


</body>
</html>