<?php
if(isset($_GET['edit_scale'])){
    $edit_scale=$_GET['edit_scale'];
    
    
    $get_scale="Select * from `scale` where scale_id=$edit_scale";
    $result=mysqli_query($con,$get_scale);
    $row=mysqli_fetch_assoc($result);
    $scale_title=$row['scale_title'];
   
}
if(isset($_POST['edit_sca'])){
    $sca_title=$_POST['scale_title'];
    $update_query="Update `scale` set scale_title='$sca_title' where
    scale_id=$edit_scale";
    $result_sca=mysqli_query($con,$update_query);
    if($result_sca){
        echo "<script>alert('Scale has been updated successfully')</script>";
        echo "<script>window.open('./index.php?view_scale.php','_self')</script>";
    }
}
?>
<div class="container mt-3">
    <h1 class="text-center">Edit Scale</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="scale_title" class="form-label">Scale Title</label>
            <input type="text" name="scale_title" id="scale_title" 
            class="form-control" required=required value='<?php echo $scale_title?>'>
        </div>
        <input type="submit" value="Update Scale" class="btn btn-primary px-3 mb-3" 
        name="edit_sca">
    </form>
</div>