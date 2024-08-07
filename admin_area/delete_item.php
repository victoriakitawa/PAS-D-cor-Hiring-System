<?php
if(isset($_GET['delete_item'])){
    $delete_id=$_GET['delete_item'];
    //echo $delete_id;
    //delete query

    $delete_item="Delete from `items` where item_id=$delete_id";
    $result_item=mysqli_query($con, $delete_item);
    if($result_item){
        echo "<script>alert('Item deleted successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";

    }
}
?>