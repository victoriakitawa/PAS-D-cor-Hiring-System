<?php
//including connect file
//include('./includes/connect.php');
//getting items
function getitems(){
      // Check if user is logged in
      if(!isset($_SESSION['username'])){
        // Redirect to login page if user is not logged in
        header("Location: login.php");
        exit(); // Stop further execution
    }
global $con;
// condition to check isset or not
if(!isset($_GET['products'])){
if(!isset($_GET['categories'])){
if(!isset($_GET['scale'])){
$select_query="SELECT * FROM `items` ORDER BY RAND()";
$result_query=mysqli_query($con,$select_query);
//$row=mysqli_fetch_assoc($result_query);
//echo $row['item_title'];
while($row=mysqli_fetch_assoc($result_query)){
$item_id=$row['item_id'];
$item_title=$row['item_title'];
$item_description=$row['item_description'];
$item_image1=$row['item_image1'];
$item_price=$row['item_price'];
$product_id=$row['product_id'];
$categories_id=$row['categories_id'];
$scale_id=$row['scale_id'];
echo "<div class='col-md-4 mb-2'>
<div class='card'>
<img src='./admin_area/item_images/$item_image1'
class='card-img-top' alt='$item_title'>
<div class='card-body'>
<h5 class='card-title'>$item_title </h5>
<p class='card-text'>$item_description</p>
<p class='card-text'>Price:$item_price/-</p>
 <a href='index.php?add_to_cart=$item_id' class='btn btn-primary'>Add to Cart</a>
<a href='item_details.php?item_id=$item_id'class='btn btn-secondary'> View More</a>
</div>
</div>
</div>";
}
}
}
}
}

  //getting  all items
  function get_all_items(){
   global $con;
  // condition to check isset or not
  if(!isset($_GET['products'])){
  if(!isset($_GET['categories'])){
  if(!isset($_GET['scale'])){
  $select_query="SELECT * from `items` order by rand()";
  $result_query=mysqli_query($con,$select_query);
  //$row=mysqli_fetch_assoc($result_query);
  //echo $row['item_title'];
  while($row=mysqli_fetch_assoc($result_query)){
  $item_id=$row['item_id'];
  $item_title=$row['item_title'];
  $item_description=$row['item_description'];
  $item_image1=$row['item_image1'];
  $item_price=$row['item_price'];
  $product_id=$row['product_id'];
  $categories_id=$row['categories_id'];
  $scale_id=$row['scale_id'];
  echo "<div class='col-md-4 mb-2'>
  <div class='card'>
  <img src='./admin_area/item_images/$item_image1'
  class='card-img-top' alt='$item_title'>
  <div class='card-body'>
  <h5 class='card-title'>$item_title </h5>
   <p class='card-text'>$item_description</p>
   <p class='card-text'>Price:$item_price/-</p>
   <a href='index.php?add_to_cart=$item_id' class='btn btn-primary'>Add to Cart</a>
   <a href='item_details.php?item_id=$item_id'class='btn btn-secondary'> View More</a>
   </div>
   </div>
   </div>";
  }
  }
  }
  }
  }

     //getting unique products
     function get_unique_products(){
     global $con;
     // condition to check isset or not
     if(isset($_GET['products'])){
     $product_id=$_GET['products'];
     $select_query="SELECT * from `items` where product_id=$product_id";
     $result_query=mysqli_query($con,$select_query);
     //$row=mysqli_fetch_assoc($result_query);
     //echo $row['item_title'];
     while($row=mysqli_fetch_assoc($result_query)){
      $item_id=$row['item_id'];
      $item_title=$row['item_title'];
      $item_description=$row['item_description'];
      $item_image1=$row['item_image1'];
      $item_price=$row['item_price'];
      $product_id=$row['product_id'];
      $categories_id=$row['categories_id'];
      $scale_id=$row['scale_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
      <img src='./admin_area/item_images/$item_image1'
      class='card-img-top' alt='$item_title'>
      <div class='card-body'>
      <h5 class='card-title'>$item_title </h5>
      <p class='card-text'>$item_description</p>
      <p class='card-text'>Price:$item_price/-</p>
      <a href='index.php?add_to_cart=$item_id' class='btn btn-primary'>Add to Cart</a>
      <a href='item_details.php?item_id=$item_id'class='btn btn-secondary'> View More</a>
      </div>
      </div>
      </div>";
      }
      }
      }

      //gtting unique categories
      function get_unique_categories(){
      global $con;
      // condition to check isset or not
      if(isset($_GET['categories'])){
      $categories_id=$_GET['categories'];
      $select_query="SELECT * from `items` where categories_id=$categories_id";
      $result_query=mysqli_query($con,$select_query);
      //$row=mysqli_fetch_assoc($result_query);
      //echo $row['item_title'];
      while($row=mysqli_fetch_assoc($result_query)){
      $item_id=$row['item_id'];
      $item_title=$row['item_title'];
      $item_description=$row['item_description'];
      $item_image1=$row['item_image1'];
      $item_price=$row['item_price'];
      $product_id=$row['product_id'];
      $categories_id=$row['categories_id'];
      $scale_id=$row['scale_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
      <img src='./admin_area/item_images/$item_image1'
      class='card-img-top' alt='$item_title'>
      <div class='card-body'>
      <h5 class='card-title'>$item_title </h5>
      <p class='card-text'>$item_description</p>
      <p class='card-text'>Price:$item_price/-</p>
      <a href='index.php?add_to_cart=$item_id' class='btn btn-primary'>Add to Cart</a>
      <a href='item_details.php?item_id=$item_id'class='btn btn-secondary'> View More</a>
      </div>
      </div>
      </div>";
      }
      }
      }

      //getting unique scale
       function get_unique_scale(){
       global $con;
      // condition to check isset or not
      if(isset($_GET['scale'])){
      $scale_id=$_GET['scale'];
      $select_query="SELECT * from `items` where scale_id=$scale_id";
      $result_query=mysqli_query($con,$select_query);
      //$row=mysqli_fetch_assoc($result_query);
      //echo $row['item_title'];
      while($row=mysqli_fetch_assoc($result_query)){
      $item_id=$row['item_id'];
      $item_title=$row['item_title'];
      $item_description=$row['item_description'];
      $item_image1=$row['item_image1'];
      $item_price=$row['item_price'];
      $product_id=$row['product_id'];
      $categories_id=$row['categories_id'];
      $scale_id=$row['scale_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
      <img src='./admin_area/item_images/$item_image1'
      class='card-img-top' alt='$item_title'>
      <div class='card-body'>
      <h5 class='card-title'>$item_title </h5>
      <p class='card-text'>$item_description</p>
      <p class='card-text'>Price:$item_price/-</p>
      <a href='index.php?add_to_cart=$item_id' class='btn btn-primary'>Add to Cart</a>
      <a href='item_details.php?item_id=$item_id'class='btn btn-secondary'> View More</a>
      </div>
      </div>
      </div>";
      }
      }
      }
    
       //displaying products in sidenav
       function getproducts(){
       global $con;
       $select_products="SELECT * from `products`";
       $result_products=mysqli_query($con,$select_products);
       while($row_data=mysqli_fetch_assoc($result_products)){
       $product_title=$row_data['product_title'];
       $product_id=$row_data['product_id'];
       echo "<li class='nav-item'>
       <a href='index.php?products=$product_id' class='nav-link text-light'>$product_title</a>
       </li>";
       }
       }
             
      //displaying categories in sidenav
      function getcategories(){
      global $con;
      $select_categories="SELECT * from `categories`";
      $result_categories=mysqli_query($con,$select_categories);
      while($row_data=mysqli_fetch_assoc($result_categories)){
      $categories_title=$row_data['categories_title'];
      $categories_id=$row_data['categories_id'];
      echo "<li class='nav-item'>
      <a href='index.php?categories=$categories_id' class='nav-link text-light'>$categories_title</a>
      </li>";
      }
      }

      //displaying scale in sidenav
      function getscale(){
      global $con;
      $select_scale="SELECT * from `scale`";
      $result_scale=mysqli_query($con,$select_scale);
      while($row_data=mysqli_fetch_assoc($result_scale)){
      $scale_title=$row_data['scale_title'];
      $scale_id=$row_data['scale_id'];
      echo "<li class='nav-item'>
      <a href='index.php?scale=$scale_id' class='nav-link text-light'>$scale_title</a>
      </li>";
      }
      }


       //searching items function
       function search_item(){
       global $con;
       if(isset($_GET['search_data_items'])){
       $search_data_value=$_GET['search_data'];
       $search_query="SELECT * from `items` where item_title like '%$search_data_value%'";
       $result_query=mysqli_query($con,$search_query);
       $num_of_rows=mysqli_num_rows($result_query);
       if($num_of_rows==0){
       echo"<h2 class='text-center text-danger'>No results match. No items founds on this
       category!</h2>";
       }
       while($row=mysqli_fetch_assoc($result_query)){
       $item_id=$row['item_id'];
       $item_title=$row['item_title'];
       $item_description=$row['item_description'];
       $item_image1=$row['item_image1'];
       $item_price=$row['item_price'];
       $product_id=$row['product_id'];
       $categories_id=$row['categories_id'];
       $scale_id=$row['scale_id'];
       echo "<div class='col-md-4 mb-2'>
       <div class='card'>
       <img src='./admin_area/item_images/$item_image1'
       class='card-img-top' alt='$item_title'>
       <div class='card-body'>
       <h5 class='card-title'>$item_title </h5>
       <p class='card-text'>$item_description</p>
       <p class='card-text'>Price:$item_price/-</p>
       <a href='index.php?add_to_cart=$item_id' class='btn btn-primary'>Add to Cart</a>
       <a href='item_details.php?item_id=$item_id'class='btn btn-secondary'> View More</a>
       </div>
       </div>
       </div>";
       }
       }
       }

      //view details function
      function view_details(){
      global $con;
      // condition to check isset or not
      if(isset($_GET['item_id'])){
      if(!isset($_GET['products'])){
      if(!isset($_GET['categories'])){
      if(!isset($_GET['scale'])){
      $item_id=$_GET['item_id'];
      $select_query="SELECT * from `items` where item_id=$item_id";
      $result_query=mysqli_query($con,$select_query);
      while($row=mysqli_fetch_assoc($result_query)){
      $item_id=$row['item_id'];
      $item_title=$row['item_title'];
      $item_description=$row['item_description'];
      $item_image1=$row['item_image1'];
      $item_image2=$row['item_image2'];
      $item_image3=$row['item_image3'];
      $item_price=$row['item_price'];
      $product_id=$row['product_id'];
      $categories_id=$row['categories_id'];
      $scale_id=$row['scale_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
      <img src='./admin_area/item_images/$item_image1'
      class='card-img-top' alt='$item_title'>
      <div class='card-body'>
      <h5 class='card-title'>$item_title </h5>
      <p class='card-text'>$item_description</p>
      <p class='card-text'>Price:$item_price/-</p>
      <a href='index.php?add_to_cart=$item_id' class='btn btn-primary'>Add to Cart</a>
      <a href='index.php'class='btn btn-secondary'>Go home</a>
      </div>
      </div>
      </div>

      <div class='col-md-8'>
      <div class='row'>
      <div class='col-md-12'>
      <h4 class='text-center text-primary mb-5'>Related Images</h4>
      </div>
      <div class='col-md-6'>
      <img src='./admin_area/item_images/$item_image2'class='card-img-top' alt='$item_title'>
      </div>
      <div class='col-md-6'>
      <img src='./admin_area/item_images/$item_image3'class='card-img-top' alt='$item_title'>
      </div>
      </div>
      </div>";
      }
      }
      }
      }
      }
      }

      //get ip address function
      function getIPAddress() {  
      //whether ip is from the share internet  
      if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
      $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
      //whether ip is from the proxy  
      elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
      }  
      //whether ip is from the remote address  
      else{  
      $ip = $_SERVER['REMOTE_ADDR'];  
      }  
      return $ip;  
      }  
      //$ip = getIPAddress();  
      //echo 'User Real IP Address - '.$ip;  
       
      //cart function 
      function cart(){
      if(isset($_GET['add_to_cart'])){
      global $con;
      $get_ip_address=getIPAddress(); 
      $get_item_id=$_GET['add_to_cart'];
      $select_query="SELECT *from `cart_details` where ip_address='$get_ip_address' and 
      item_id=$get_item_id";
      $result_query=mysqli_query($con,$select_query);
      $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows>0){
      echo"<script>alert('This item is already present inside cart')</script>";
      echo"<script>window.open('index.php','_self')</script>";
      }else{
      $insert_query="Insert into `cart_details` (item_id,ip_address,quantity)
      values( $get_item_id,'$get_ip_address', 0)";
      $result_query=mysqli_query($con,$insert_query);
      echo"<script>alert('Item is added to cart')</script>";
      echo"<script>window.open('index.php','_self')</script>";
      }
      }
      }  
      //function to get cart item number
      function cart_number(){
      if(isset($_GET['add_to_cart'])){
      global $con;
      $get_ip_address=getIPAddress(); 
      $select_query="SELECT *from `cart_details` where ip_address='$get_ip_address'";
      $result_query=mysqli_query($con,$select_query);
      $count_cart_items=mysqli_num_rows($result_query);
      }else{
        global $con;
        $get_ip_address=getIPAddress(); 
        $select_query="SELECT *from `cart_details` where ip_address='$get_ip_address'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
      }
      echo $count_cart_items;
      }

      //total price function
      function total_cart_price(){
        global $con;
        $get_ip_address=getIPAddress();
        $total_price=0;
        $cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
        $result=mysqli_query($con,$cart_query);
        while($row=mysqli_fetch_array($result)){
        $item_id=$row['item_id'];
        $select_items="SELECT * from `items` where item_id='$item_id'";
        $result_items=mysqli_query($con,$select_items);
        while($row_item_price=mysqli_fetch_array($result_items)){
        $item_price=array($row_item_price['item_price']);
        $item_values=array_sum($item_price);
        $total_price+=$item_values;
        }
        }
        echo $total_price;
        }
        // get user order details
        function get_user_order_details(){
          global $con;
          $username=$_SESSION['username'];
          $get_details="SELECT * from `user_table` where user_name='$username'";
          $result_query=mysqli_query($con, $get_details);
          while($row_query=mysqli_fetch_array($result_query)){
          $user_id=$row_query['user_id'];
          if(!isset($_GET['edit_account'])){
          if(!isset($_GET['my_orders'])){
          if(!isset($_GET['delete_account'])){
          $get_orders="SELECT * from `user_orders` where user_id=$user_id and 
          order_status='Pending'";
          $result_orders_query=mysqli_query($con,$get_orders);
          $row_count=mysqli_num_rows( $result_orders_query);
          if($row_count>0){
          echo "<h3 class='text-center text-success my-5'>You have <span 
          class='text-danger'>$row_count</span> pending orders<h3>
          <h4 class='text-center'><a href='profile.php?my_orders' class='text-black'>
          Order Details</a></h4>";
          }else{
            echo "<h3 class='text-center text-success my-5'>You have zero pending orders<h3>
            <h4 class='text-center'><a href='../index.php' class='text-black'>
            Explore Items</a></h4>";
          }
          }
          }
          }
          }
          }
?>