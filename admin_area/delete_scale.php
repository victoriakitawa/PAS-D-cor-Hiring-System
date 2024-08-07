<?php
if(isset($_GET['delete_scale'])){
    $delete_scale=$_GET['delete_scale'];
    $delete_query="Delete from `scale` where scale_id=$delete_scale";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Scale has been deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_scale.php','_self')</script>";
    }
}
?>