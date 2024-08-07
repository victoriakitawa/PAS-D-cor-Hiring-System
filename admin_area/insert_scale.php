<?php
include('../includes/connect.php');
if(isset($_POST['insert_scale'])){
  $scale_title=$_POST['scale_title'];
  //select data from database
  $select_query="Select * from `scale`where scale_title='$scale_title'";
  $result_select=mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
    echo"<script>alert('This scale is present inside the database')</script>";
  }else{
  $insert_query="insert into `scale`  (scale_title)  values('$scale_title')";
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo"<script>alert('Scale has been inserted successfully')</script>";
  }
}
}
?>
<h2 class="text-center">Insert scale</h2>
<form action="" method="post" class="mb-2">
<div class="input-group  w-90 mb-2">
  <span class="input-group-text bg-primary" id="basic-addon1">
    <i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="scale_title" placeholder="Insert scale" 
  aria-label="scale" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
  <input type="submit" class="bg-primary border-0 p-2 my-3" name="insert_scale" 
  value="Insert scale">
</div>
</form>