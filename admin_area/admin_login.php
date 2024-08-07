<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
$username_error = "";
$password_error = "";
$login_success = false;

if(isset($_POST['admin_login'])){
   $username = $_POST['username'];
   $password = $_POST['password'];
  
   $select_query = "SELECT * FROM `admin_table` WHERE admin_name='$username'";
   $result = mysqli_query($con, $select_query);
   $row_count = mysqli_num_rows($result);
   $row_data = mysqli_fetch_assoc($result);
   if($row_count > 0){
       if(password_verify($password, $row_data['admin_password'])){
           $_SESSION['admin_name'] = $username;
           $login_success = true;
       } else {
           $password_error = "Wrong Password!";
       }
   } else {
       $username_error = "Check your Username";
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>

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
body {
    overflow: hidden;
}
</style>

</head>
<body>
<div class="container-fluid m-3">
<h2 class="text-center mb-5">Admin Login</h2>
<div class="row d-flex justify-content-center">
<div class="col-lg-6 col-xl-5">
<img src="../images/admin reg.avif" alt="Admin Registration" class="img-fluid"> 
</div>

<div class="col-lg-6 col-xl-4 ">
<form action="" method="post">
<div class="form-outline mb-4">
<label for="username" class="form-label">Username</label>
<?php if ($username_error): ?>
    <span class="text-danger"><?php echo $username_error; ?></span>
<?php endif; ?>
<input type="text" id="username" name="username" placeholder="Enter your username" 
required=required autocomplete="off" class="form-control">
</div>

<div class="form-outline mb-4">
<label for="password" class="form-label">Password</label>
<?php if ($password_error): ?>
    <span class="text-danger"><?php echo $password_error; ?></span>
<?php endif; ?>
<input type="password" id="password" name="password" placeholder="Enter your password" 
required=required class="form-control">
</div>

<div>
<input type="submit" class="bg-primary py-2 px-3 border-0" 
name="admin_login" value="Login">
</div>
<p class="small fw-bold mt-2 pt-1">Do you already have an account? 
<a href="admin_registration.php" class="link-danger">Register</a></p>
</form>
</div>
</div>
</div>

<?php if ($login_success): ?>
<div class="modal" tabindex="-1" id="loginSuccessModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login Successful</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Successfully Logged In</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="redirectToAdmin()">OK</button>
      </div>
    </div>
  </div>
</div>
<script>
function redirectToAdmin() {
    window.location.href = 'index.php';
}

document.addEventListener('DOMContentLoaded', function () {
    var loginModal = new bootstrap.Modal(document.getElementById('loginSuccessModal'));
    loginModal.show();
});
</script>
<?php endif; ?>

<!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>
