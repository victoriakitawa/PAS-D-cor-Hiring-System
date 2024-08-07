<?php
include('../includes/connect.php');
if(isset($_POST['insert_products'])){
  $product_title=$_POST['product_title'];
  //select data from database
  $select_query="Select * from `products`where product_title='$product_title'";
  $result_select=mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
    echo"<script>alert('This product is present inside the database')</script>";
  }else{
  $insert_query="insert into `products`  (product_title)  values('$product_title')";
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo"<script>alert('Product has been inserted successfully')</script>";
  }
}
}
?>
<h2 class="text-center">Insert Products</h2>
<form action="" method="post" class="mb-2">
<div class="input-group  w-90 mb-2">
  <span class="input-group-text bg-primary" id="basic-addon1">
    <i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="product_title" placeholder="Insert products" 
  aria-label="products" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
  <input type="submit" class="bg-primary border-0 p-2 my-3" name="insert_products" 
  value="Insert products" >
</div>
</form>
</html>  
