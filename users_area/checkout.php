<!--connect file-->
<?php
include('../includes/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kilei's PAS and Decor Hiring System-Checkout page</title>
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
     <style>
      .logo{
        width:7%;
        height:7%;
      }
      body{
        overflow-x:hidden;
      }
      </style>
</head>
<body>
   <!--navbar-->
   <div class="container-fluid p-0">
   <nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container-fluid">
    <img src="../images/Speaker Logo design_ Sound Systems Logo design.jfif" alt="" class="logo">
    <button class="navbar-toggler" type="button" 
    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
    aria-controls="navbarSupportedContent" aria-expanded="false" 
    aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-black" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-black" href="../display_all.php">Items</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-black" href="user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-black" href="#">Contact</a>
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

<!-- second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
<?php
if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='#'>Welcome Client</a>
</li>";
}else{
  echo "<li class='nav-item'>
  <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
<li>";
}
if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='./user_login.php'>Login</a>
<li>";
}else{
  echo "<li class='nav-item'>
  <a class='nav-link' href='logout.php'>Logout</a>
<li>";
}
?>
    </ul>
</nav>

<!-- third child-->
<div class="bg-light">
    <h4 class="text-center">"Amplify Your Event,Elevate Your Atmosphere"</h4>
</div>

<!-- fourth child-->
<div class="row px-3">
  <div class="col-md-12">
    <!--items-->
    <div class="row">
        <?php
        if(!isset($_SESSION['username'])){
            include('user_login.php');
        }else{
            include('payment.php');
        }
        ?>

<!--column end-->
</div>
</div>

<!--footer-->
<!-- include footer-->
<?php
include("../includes/footer.php")
?>
</div>

<!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>