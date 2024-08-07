<?php
if(isset($_GET['edit_products'])){
    $edit_products=$_GET['edit_products'];
    //echo $edit_products;
    
    $get_products="Select * from `products` where product_id=$edit_products";
    $result=mysqli_query($con,$get_products);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
   // echo  $product_title;
}
if(isset($_POST['edit_prod'])){
    $prod_title=$_POST['product_title'];
    $update_query="Update `products` set product_title='$prod_title' where
    product_id=$edit_products";
    $result_prods=mysqli_query($con,$update_query);
    if($result_prods){
        echo "<script>alert('Product has been updated successfully')</script>";
        echo "<script>window.open('./index.php?view_products.php','_self')</script>";
    }
}
?>
<div class="container mt-3">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" 
            class="form-control" required=required value='<?php echo $product_title?>'>
        </div>
        <input type="submit" value="Update Product" class="btn btn-primary px-3 mb-3" 
        name="edit_prod">
    </form>
</div>