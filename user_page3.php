<?php

@include 'config.php';
include('components/question_header.php');



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


</head>
<body>

<section class="products">
   <h1 class="heading">Lets get to know what you like & dislike</h1>

   <div class="Card1">
   <h1 class="CardText">Are You The Social Drinker?
    "Someone who enjoy coffee primarily in social settings."
   </h1>
   <a href="product_page_3.php" class="Cardbtn1">Chose</a>
   </div>

   <div class="Card2">
   <h1 class="CardText">Are You The Stress Reliever?
    "Someone who finds drinking coffee to be a relaxing and stress-relieving activity."
   </h1>
   <a href="product_page_3_3.php" class="Cardbtn">Chose</a>
   </div>

</section>







<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="js/script.js"></script>

<?php include 'components/alert.php'; ?>

</body>
</html>