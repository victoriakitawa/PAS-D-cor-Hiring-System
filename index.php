<!--connect file-->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kilei's PAS and Decor Hiring System</title>
    <!-- bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
     crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- css file-->
     <link rel="stylesheet" href="style.css">
</head>
<body>
   <!--navbar-->
   <div class="container-fluid p-0">
   <nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container-fluid">
    <img src="./images/Speakerlogo-removebg-preview.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" 
    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
    aria-controls="navbarSupportedContent" aria-expanded="false" 
    aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <ul class="navbar-nav me-auto">
<?php
if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link text-light' href='#'>Welcome Client</a>
</li>";
}else{
  echo "<li class='nav-item'>
  <a class='nav-link text-light' href='#'>Welcome ".$_SESSION['username']."</a>
<li>";
}
if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link text-light' href='./users_area/user_login.php'>Login</a>
<li>";
}else{
  echo "<li class='nav-item'>
  <a class='nav-link text-light' href='./users_area/logout.php'>Logout</a>
<li>";
}
?>
    </ul>
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="display_all.php">Items</a>
        </li>
        <?php
        if(isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link text-light' href='./users_area/profile.php'>My Account</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link text-light' href='./users_area/user_registration.php'>Register</a>
        </li>";
        }
        ?>
        <li class="nav-item">
          <a class="nav-link text-light" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>
          <sup><?php cart_number();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Total Price:<?php total_cart_price();?>/-</a>
        </li>
      </ul>
      <form class="d-flex" action="search_items.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" 
        aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light" 
        name="search_data_items">
        </form>
        </div>
        </div>
        </nav>
<!--calling  cart function-->
<?php
cart();
?>
<!-- second child-->

<!-- third child-->
<div class="bg-light">
    <h4 class="text-center">"Amplify Your Event,Elevate Your Atmosphere"</h4>
</div>

<!-- fourth child-->
<div class="row px-3">
  <div class="col-md-10">
    <!--items-->
    <div class="row">
      <!--fetching items-->
      <?php
      //calling function
      get_all_items();
      get_unique_products();
      get_unique_categories();
      get_unique_scale();
      //$ip = getIPAddress();  
     //echo 'User Real IP Address - '.$ip;  
      ?>
<!--row end-->
</div>
<!--column end-->
</div>
  <div class="col-md-2 bg-secondary p-0">
  <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-primary">
      <a href="#" class="nav-link text-black"><h4>Products</h4></a>
    </li>
    <?php
    getproducts();
    ?>
  </ul>

  <!--categories-->
  <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-primary">
      <a href="#" class="nav-link text-black"><h4>Categories</h4></a>
    </li>
    <?php
    getcategories();
    ?>
</ul>
<!--scale-->
<ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-primary">
      <a href="#" class="nav-link text-black"><h4>Scale</h4></a>
    </li>
    <?php
    getscale();
    ?>
</ul>
  </div>
</div>

<!--footer-->
<!-- include footer-->
<?php
include("./includes/footer.php")
?>
</div>

<!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>