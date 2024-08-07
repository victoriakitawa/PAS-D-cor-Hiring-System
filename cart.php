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
<title>Kilei's PAS and Decor Hiring System-Cart details</title>
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
    .cart_img{
width: 80px; 
height: 80px;
object-fit:contain;
    }
</style>
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
<li class="nav-item">
<a class="nav-link text-light" href="./users_area/user_registration.php">Register</a>
</li>
<li class="nav-item">
<a class="nav-link text-light" href="contact.php">Contact</a>
</li>
<li class="nav-item">
<a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>
<sup><?php cart_number();?></sup></a>
</li>
</ul>
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
 <h4 class="text-center">"Amplify Your Event, Elevate Your Atmosphere"</h4>
</div>

<!--fourth child-->
<div class="container">
<div class="row">
    <form action="" method="post">
<table class="table table-bordered text-center">

    <!--php code to display dynamic data-->
    <?php
     global $con;
     $get_ip_address=getIPAddress();
     $total_price=0;
     $cart_query="SELECT * from `cart_details` where ip_address='$get_ip_address'";
     $result=mysqli_query($con,$cart_query);
     $result_count=mysqli_num_rows($result);
     if($result_count>0){
        echo "<thead>
        <tr>
        <th>Item Title</th>
        <th>Item Image</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Remove</th>
        <th colspan='2'>Operations</th>
        </tr>
        </thead>
        <tbody>";
      
     while($row=mysqli_fetch_array($result)){
     $item_id=$row['item_id'];
     $item_quantity=$row['quantity'];
     $select_items="Select * from `items` where item_id='$item_id'";
     $result_items=mysqli_query($con,$select_items);
     while($row_item_price=mysqli_fetch_array($result_items)){
     $item_price=$row_item_price['item_price'];
     $item_title=$row_item_price['item_title'];
     $item_image1=$row_item_price['item_image1'];
     $item_total_price=$item_price * $item_quantity;
     $total_price += $item_total_price;
?>
<tr>
<td><?php echo $item_title ?></td>
<td><img src="./admin_area/item_images/<?php echo $item_image1?>" alt="" class="cart_img"></td>
<td><input type="text" name="quantity[<?php echo $item_id; ?>]" class="form-input w-50" value="<?php echo $item_quantity; ?>"></td>
<td><?php echo $item_total_price ?>/-</td>
<td><input type="checkbox" name="removeitem[]" value="<?php echo $item_id ?>"></td>
<td>
    <input type="submit" value="Update Cart" class="bg-primary text-light px-3 py-2 border-0 mx-3" name="update_cart">
    <input type="submit" value="Remove Cart" class="bg-primary text-light px-3 py-2 border-0 mx-3" name="remove_cart">
</td>
</tr>
<?php
}
}
}
else{
    echo "<h2 class='text-center text-danger'>Cart is empty </h2>";
}
?>
</tbody>
</table>
<!--subtotal-->
<div class="d-flex mb-5">
    <?php
     $get_ip_address=getIPAddress();
     $cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
     $result=mysqli_query($con,$cart_query);
     $result_count=mysqli_num_rows($result);
     if($result_count>0){
        echo " <h4 class='px-3'>Subtotal:<strong class='text-black'>$total_price/-
        </strong></h4>
        <input type='submit' value='Continue Shopping' 
        class='bg-primary text-light px-3 py-2 border-0 mx-3' name='continue_shopping'>
        <button class='bg-primary px-3 py-2 border-0'>
        <a href='./users_area/checkout.php' class='text-black text-decoration-none'>Checkout<a>
        </button>";
     }else{
        echo "<input type='submit' value='Continue Shopping'
        class='bg-primary text-light px-3 py-2 border-0 mx-3' name='continue_shopping'>";
     }
     if(isset($_POST['continue_shopping'])){
        echo "<script>window.open('index.php','_self')</script>";
     }
    ?>
</div>
</div>
</div>
</form>

<!--function to remove items-->
<?php
function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem'] as $remove_id){
            $delete_query="DELETE FROM `cart_details` WHERE item_id=$remove_id AND ip_address='".getIPAddress()."'";
            $run_delete=mysqli_query($con,$delete_query);
            if($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
}
remove_cart_item();
?>

<!-- update quantities -->
<?php
if(isset($_POST['update_cart'])){
    foreach($_POST['quantity'] as $item_id => $quantity){
        $update_cart="UPDATE `cart_details` SET quantity=$quantity WHERE item_id=$item_id AND ip_address='$get_ip_address'";
        mysqli_query($con, $update_cart);
    }
    echo "<script>window.open('cart.php','_self')</script>";
}
?>

<!--footer-->
<!-- include footer-->


<!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>
