<?php
include('../includes/connect.php');
if(isset($_POST['insert_item'])){

    $item_title=$_POST['item_title'];
    $item_description=$_POST['item_description'];
    $item_products=$_POST['item_products'];
    $item_categories=$_POST['item_categories'];
    $item_scale=$_POST['item_scale'];
    $item_price=$_POST['item_price'];
    $item_status='true';

    //accessing images
    $item_image1=$_FILES['item_image1']['name'];
    $item_image2=$_FILES['item_image2']['name'];
    $item_image3=$_FILES['item_image3']['name'];

    //accessing  image tmp name
    $temp_image1=$_FILES['item_image1']['tmp_name'];
    $temp_image2=$_FILES['item_image2']['tmp_name'];
    $temp_image3=$_FILES['item_image3']['tmp_name'];
    
    //checking empty condition
    if($item_title=='' or $item_description=='' or $item_products=='' or  $item_categories==''
    or $item_scale=='' or $item_price=='' or $item_image1=='' or $item_image2=='' 
    or $item_image3==''){
        echo"<script>alert('please fill all the available fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./item_images/$item_image1");
        move_uploaded_file($temp_image2,"./item_images/$item_image2");
        move_uploaded_file($temp_image3,"./item_images/$item_image3");

        $insert_item="insert into `items`(item_title,item_description,product_id,categories_id,
        scale_id,item_image1,item_image2,item_image3,item_price,date,status) values('$item_title',
        '$item_description','$item_products',' $item_categories',' $item_scale','$item_image1',
        '$item_image2','$item_image3','$item_price',NOW(),'$item_status')";
        $result_query=mysqli_query($con,$insert_item);
        if($result_query){
            echo "<script>alert('successfully inserted the item')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Items-Admin Dashboard</title>
     <!-- bootstrap css link-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
     crossorigin="anonymous">
     <!--font awesome link-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />

     <!--css file-->
     <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
    <h1 class="text-center"> Insert items</h1>
    <!--form-->
    <form action="" method="post" enctype="multipart/form-data">
        <!--title-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="item_title" class="form-label">Item title</label>
            <input type="text" name="item_title" id="item_title" class="form-control"
            placeholder="enter item title" autocomplete="off" required="required">
        </div>
        <!--description-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="item_description" class="form-label">Item description</label>
            <input type="text" name="item_description" id="item_description" class="form-control"
            placeholder="enter item description" autocomplete="off" required="required">
        </div>
        <!--products-->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="item_products" id="" class="form-select">
                <option value="">Select a Product</option>
                <?php 
                $select_query="Select * from `products`";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_title=$row['product_title'];
                    $product_id=$row['product_id'];
                    echo "<option value='$product_id'>$product_title</option>";
                }
                ?>
            </select>
        </div>
         <!--categories-->
         <div class="form-outline mb-4 w-50 m-auto">
            <select name="item_categories" id="" class="form-select">
                <option value="">Select a Category</option>
                <?php
                 $select_query="Select * from `categories`";
                 $result_query=mysqli_query($con,$select_query);
                 while($row=mysqli_fetch_assoc($result_query)){
                     $categories_title=$row['categories_title'];
                     $categories_id=$row['categories_id'];
                     echo "<option value='$categories_id'>$categories_title</option>";
                 }
                ?>
            </select>
        </div>
        <!--scale-->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="item_scale" id="" class="form-select">
                <option value="">Select a Scale</option>
                <?php
                 $select_query="Select * from `scale`";
                 $result_query=mysqli_query($con,$select_query);
                 while($row=mysqli_fetch_assoc($result_query)){
                     $scale_title=$row['scale_title'];
                     $scale_id=$row['scale_id'];
                     echo "<option value='$scale_id'>$scale_title</option>";
                 }
                 ?>
            </select>
        </div>
        <!--image1-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="item_image1" class="form-label">Item image1</label>
            <input type="file" name="item_image1" id="item_image1" class="form-control"
             required="required">
        </div>
         <!--image2-->
         <div class="form-outline mb-4 w-50 m-auto">
            <label for="item_image2" class="form-label">Item image2</label>
            <input type="file" name="item_image2" id="item_image2" class="form-control"
             required="required">
        </div>
        <!--image 3-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="item_image3" class="form-label">Item image3</label>
            <input type="file" name="item_image3" id="item_image3" class="form-control"
             required="required">
        </div>
         <!--price-->
         <div class="form-outline mb-4 w-50 m-auto">
            <label for="item_price" class="form-label">Item price</label>
            <input type="text" name="item_price" id="item_price" class="form-control"
            placeholder="enter item price" autocomplete="off" required="required">
        </div>
        <!--price-->
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_item" class="btn btn-primary mb-3 px-3"
            value="Insert Item">
        </div>


    </form>
    </div>
    
</body>
</html>