<?php
if(isset($_GET['edit_items'])){
    $edit_id = $_GET['edit_items'];
    $get_data = "SELECT * FROM `items` WHERE item_id = $edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
    $item_title = $row['item_title'];
    $item_description = $row['item_description'];
    $product_id = $row['product_id'];
    $categories_id = $row['categories_id'];
    $scale_id = $row['scale_id'];
    $item_image1 = $row['item_image1'];
    $item_image2 = $row['item_image2'];
    $item_image3 = $row['item_image3'];
    $item_price = $row['item_price'];

    // Fetching product name
    $select_product = "SELECT * FROM `products` WHERE product_id = $product_id";
    $result_product = mysqli_query($con, $select_product);
    $row_product = mysqli_fetch_assoc($result_product);
    $product_title = $row_product['product_title'];

    $select_category = "SELECT * FROM `categories` WHERE categories_id = $categories_id";
    $result_category = mysqli_query($con, $select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    $categories_title = $row_category['categories_title'];

    $select_scale = "SELECT * FROM `scale` WHERE scale_id = $scale_id";
    $result_scale = mysqli_query($con, $select_scale);
    $row_scale = mysqli_fetch_assoc($result_scale);
    $scale_title = $row_scale['scale_title'];
}
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Item</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="item_title" class="form-label">Item Title</label>
            <input type="text" id="item_title" name="item_title" class="form-control" required="required" value="<?php echo $item_title ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="item_desc" class="form-label">Item Description</label>
            <input type="text" id="item_desc" name="item_desc" class="form-control" required="required" value="<?php echo $item_description ?>">
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="item_products" class="form-label">Item Products</label>
            <select name="item_products" class="form-select">
                <option value="<?php echo $product_id ?>"><?php echo $product_title ?></option>
                <?php
                $select_product_all = "SELECT * FROM `products`";
                $result_product_all = mysqli_query($con, $select_product_all);
                while($row_product_all = mysqli_fetch_assoc($result_product_all)){
                    echo "<option value='".$row_product_all['product_id']."'>".$row_product_all['product_title']."</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="item_categories" class="form-label">Item Categories</label>
            <select name="item_categories" class="form-select">
                <option value="<?php echo $categories_id ?>"><?php echo $categories_title ?></option>
                <?php
                $select_category_all = "SELECT * FROM `categories`";
                $result_category_all = mysqli_query($con, $select_category_all);
                while($row_category_all = mysqli_fetch_assoc($result_category_all)){
                    echo "<option value='".$row_category_all['categories_id']."'>".$row_category_all['categories_title']."</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="item_scale" class="form-label">Item Scale</label>
            <select name="item_scale" class="form-select">
                <option value="<?php echo $scale_id ?>"><?php echo $scale_title ?></option>
                <?php
                $select_scale_all = "SELECT * FROM `scale`";
                $result_scale_all = mysqli_query($con, $select_scale_all);
                while($row_scale_all = mysqli_fetch_assoc($result_scale_all)){
                    echo "<option value='".$row_scale_all['scale_id']."'>".$row_scale_all['scale_title']."</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="item_image1" class="form-label">Item Image1</label>
            <div class="d-flex">
                <input type="file" id="item_image1" name="item_image1" class="form-control w-90 m-auto">
                <img src="./item_images/<?php echo $item_image1 ?>" alt="" class="item_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="item_image2" class="form-label">Item Image2</label>
            <div class="d-flex">
                <input type="file" id="item_image2" name="item_image2" class="form-control w-90 m-auto">
                <img src="./item_images/<?php echo $item_image2 ?>" alt="" class="item_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="item_image3" class="form-label">Item Image3</label>
            <div class="d-flex">
                <input type="file" id="item_image3" name="item_image3" class="form-control w-90 m-auto">
                <img src="./item_images/<?php echo $item_image3 ?>" alt="" class="item_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="item_price" class="form-label">Item Price</label>
            <input type="text" id="item_price" name="item_price" class="form-control" required="required" value="<?php echo $item_price ?>">
        </div>
        <div class="w-50 m-auto">
            <input type="submit" name="edit_item" value="Update Item" class="btn btn-primary px-3 mb-3">
        </div>
    </form>
</div>

<?php
if(isset($_POST['edit_item'])){
    $item_title = $_POST['item_title'];
    $item_desc = $_POST['item_desc'];
    $item_products = $_POST['item_products'];
    $item_categories = $_POST['item_categories'];
    $item_scale = $_POST['item_scale'];
    $item_price = $_POST['item_price'];

    // Initialize an empty array to store update statements
    $updates = array();

    // Check each field if it's changed and add it to the update array
    if($item_title != $row['item_title']){
        $updates[] = "item_title='$item_title'";
    }
    if($item_desc != $row['item_description']){
        $updates[] = "item_description='$item_desc'";
    }
    if($item_products != $row['product_id']){
        $updates[] = "product_id='$item_products'";
    }
    if($item_categories != $row['categories_id']){
        $updates[] = "categories_id='$item_categories'";
    }
    if($item_scale != $row['scale_id']){
        $updates[] = "scale_id='$item_scale'";
    }
    if($item_price != $row['item_price']){
        $updates[] = "item_price='$item_price'";
    }

    // File upload logic for images
    if(!empty($_FILES['item_image1']['name'])){
        $item_image1 = $_FILES['item_image1']['name'];
        $temp_image1 = $_FILES['item_image1']['tmp_name'];
        move_uploaded_file($temp_image1, "./item_images/$item_image1");
        $updates[] = "item_image1='$item_image1'";
    }

    if(!empty($_FILES['item_image2']['name'])){
        $item_image2 = $_FILES['item_image2']['name'];
        $temp_image2 = $_FILES['item_image2']['tmp_name'];
        move_uploaded_file($temp_image2, "./item_images/$item_image2");
        $updates[] = "item_image2='$item_image2'";
    }

    if(!empty($_FILES['item_image3']['name'])){
        $item_image3 = $_FILES['item_image3']['name'];
        $temp_image3 = $_FILES['item_image3']['tmp_name'];
        move_uploaded_file($temp_image3, "./item_images/$item_image3");
        $updates[] = "item_image3='$item_image3'";
    }

    // Build the update query with dynamically changed fields
    $update_items = "UPDATE `items` SET ";
    $update_items .= implode(", ", $updates); // Combine all update statements
    $update_items .= " WHERE item_id=$edit_id";

    $result_update = mysqli_query($con, $update_items);

    if($result_update){
        echo "<script>alert('Item updated successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    } else {
        echo "<script>alert('Failed to update item')</script>";
    }
}
?>
