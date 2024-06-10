<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   setcookie('user_id', create_unique_id(), time() + 60*60*24*30);
}

if(isset($_POST['delete_item'])){

   $product_id = $_POST['product_id'];
   $product_id = filter_var($product_id, FILTER_SANITIZE_STRING);
   
   $verify_delete_item = $conn->prepare("SELECT * FROM `product` WHERE id = ?");
   $verify_delete_item->execute([$product_id]);

   if($verify_delete_item->rowCount() > 0){
      $delete_product_id = $conn->prepare("DELETE FROM `product` WHERE id = ?");
      $delete_product_id->execute([$product_id]);
      $success_msg[] = 'item deleted!';
   }else{
      $warning_msg[] = 'Cant be deleted!';
   } 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>View Products</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">


</head>
<body>
   
<?php include 'components/header.php'; ?>


<section class="products">

   <h1 class="heading">all products</h1>

   <div class="search">
      <input type="text" name="" id="find" placeholder="search for key words here...." onkeyup="search()">
   </div>

   <div class="box-container">

   <?php 
      $select_products = $conn->prepare("SELECT * FROM `product`");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="POST" class="box">
      <img src="uploaded_files/<?= $fetch_prodcut['image']; ?>" class="image" alt="">
      <h3 class="name"><?= $fetch_prodcut['name'] ?></h3>
      <input type="hidden" name="product_id" value="<?= $fetch_prodcut['id']; ?>">
      <h1 class="country"><?= $fetch_prodcut['country'] ?></h1>
      <input type="hidden" name="product_id" value="<?= $fetch_prodcut['id']; ?>">
      <div class="flex">
         <p class="price"><i class="a-price-symbol">$</i><?= $fetch_prodcut['price'] ?></p>
         <p class="name"><i class="text">250g</i></p>
      </div>
      <input type="submit" value="delete" name="delete_item" class="delete-btn" onclick="return confirm('delete this item?');">
   </form>

   <?php
      }
   }else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>

   </div>


</section>




<script type="text/javascript">
function search() {
let filter = document.getElementById('find').value.toUpperCase();
let item = document.querySelectorAll('.box');
let l = document.getElementsByTagName('h1');
for(var i = 0;i<=l.length;i++){
let a=item[i].getElementsByTagName('h1')[0];
let value=a.innerHTML || a.innerText || a.textContent;
if(value.toUpperCase().indexOf(filter) > -1) {
item[i].style.display="";
}
else
{
item[i].style.display="none";
}
}
}
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="js/script.js"></script>

<?php include 'components/alert.php'; ?>

</body>
</html>

