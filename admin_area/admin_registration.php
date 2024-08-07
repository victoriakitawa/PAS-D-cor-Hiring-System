<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Registration</title>

<!-- bootstrap css link-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
rel="stylesheet" 
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
crossorigin="anonymous">

<!--font awesome link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
body{
 overflow:hidden;
}
</style>

</head>
<body>
<div class="container-fluid m-3">
<h2 class="text-center mb-5">Admin Registration</h2>
<div class="row d-flex justify-content-center">
<div class="col-lg-6 col-xl-5">
<img src="../images/admin login.avif" alt="Admin Registration" class="img-fluid"> 
</div>

<div class="col-lg-6 col-xl-4 ">
<form action="" method="post">
<div class="form-outline mb-4">
<label for="username" class="form-label">Username</label>
<input type="text" id="username" name="username" placeholder="Enter your username" 
required=required autocomplete="off" class="form-control">
</div>

<div class="form-outline mb-4">
<label for="email" class="form-label">Email</label>
<input type="text" id="email" name="email" placeholder="Enter your email" 
required=required  autocomplete="off" class="form-control">
</div>

<div class="form-outline mb-4">
<label for="password" class="form-label">Password</label>
<input type="password" id="password" name="password" placeholder="Enter your password" 
required=required class="form-control">
</div>

<div class="form-outline mb-4">
<label for="confirm_password" class="form-label">Confirm Password</label>
<input type="password" id="confirm_password" name="confirm_password" 
placeholder="Confirm password" required=required class="form-control">
</div>

<div>
<input type="submit" class="bg-primary py-2 px-3 border-0" 
name="admin_registration" value="Register">
</div>
<p class="small fw-bold mt-2 pt-1">Don't have an account? 
<a href="admin_login.php" class="link-danger">Login</a></p>
</form>
</div>
</div>
</div>
</body>
</html>

<?php
if(isset($_POST['admin_registration'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $hash_password=password_hash($password,PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];

    $select_query="Select * from `admin_table` where admin_name ='$username' or
    admin_email='$email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username and Email already exist')</script>";  
    }else if($password!=$confirm_password){
        echo "<script>alert('Passwords do not match')</script>";
    } else{
       
    $insert_query="insert into `admin_table`(admin_name,admin_email,admin_password) 
    values('$username','$email','$hash_password')";
    $sql_execute=mysqli_query($con,$insert_query);
    if($sql_execute){
        echo "<script>alert('Data inserted successfully')</script>";
    }else{
        die(mysqli_error($con));
    }
    }
}
?>