<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_name'])) {
    header('Location: admin_login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
     <style>
        .admin_image {
            width: 100px;
            object-fit: contain;
        }
        .footer {
            padding: 20px;
            width: 100%;
            position: fixed;
            bottom: 0;
        }
        .item_img {
            width: 100px;
            object-fit: contain;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .content {
            margin-top: 80px;
            margin-left: 250px;
            padding: 20px;
        }

        #sidebar {
        margin-top: 105px;
        }

        .sidebar a {
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
            color: #333;
            display: block;
        }
        .sidebar a:hover {
            background-color: #ddd;
        }
     </style>
</head>
<body>
<div class="container-fluid p-0">
<!--firstchild-->
<nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
    <div class="container-fluid">
        <button class="btn btn-primary" type="button" id="toggleSidebar">
            <i class="fas fa-bars"></i>
        </button>
        
        <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav">
                <?php
                if (!isset($_SESSION['admin_name'])) {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome Guest</a>
                  </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link text-light' href='#'>Welcome " . $_SESSION['admin_name'] . "</a>
                  <li>";
                }
                ?>
                <li class='nav-item'>
                    <a class='nav-link text-light' href="log_out.php">Logout</a>
                </li>
            </ul>
        </nav>
    </div>
</nav>

<!-- Sidebar -->
<div class="sidebar" id="sidebar" mt>
    <div class="list-group">
        <!-- Dropdown for Products -->
        <div class="dropdown">
            <a class="list-group-item list-group-item-action dropdown-toggle" href="#" id="productsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Products
            </a>
            <ul class="dropdown-menu" aria-labelledby="productsDropdown">
                <li><a class="dropdown-item" href="index.php?insert_products">Insert Products</a></li>
                <li><a class="dropdown-item" href="index.php?view_products">View Products</a></li>
            </ul>
        </div>

        <!-- Dropdown for items -->
        <div class="dropdown">
            <a class="list-group-item list-group-item-action dropdown-toggle" href="#" id="productsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Items
            </a>
            <ul class="dropdown-menu" aria-labelledby="productsDropdown">
                <li><a class="dropdown-item" href="index.php?insert_items">Insert Items</a></li>
                <li><a class="dropdown-item" href="index.php?view_items">View Items</a></li>
            </ul>
        </div>

        <!-- Dropdown for Categories -->
        <div class="dropdown">
            <a class="list-group-item list-group-item-action dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categories
            </a>
            <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                <li><a class="dropdown-item" href="index.php?insert_categories">Insert Categories</a></li>
                <li><a class="dropdown-item" href="index.php?view_categories">View Categories</a></li>
            </ul>
        </div>

        <!-- Dropdown for Scale -->
        <div class="dropdown">
            <a class="list-group-item list-group-item-action dropdown-toggle" href="#" id="scaleDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Scale
            </a>
            <ul class="dropdown-menu" aria-labelledby="scaleDropdown">
                <li><a class="dropdown-item" href="index.php?insert_scale">Insert Scale</a></li>
                <li><a class="dropdown-item" href="index.php?view_scale">View Scale</a></li>
            </ul>
        </div>

        <a class="list-group-item list-group-item-action" href="index.php?list_orders">All Orders</a>
        <a class="list-group-item list-group-item-action" href="index.php?list_payments">All Payments</a>
        <a class="list-group-item list-group-item-action" href="index.php?list_users">List Users</a>
    </div>
</div>

<!-- Content -->
<div class="content">
    <!-- secondchild
    <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div> -->

    <!--fourth child-->
    <div class="container my-3">
        <?php
        if (isset($_GET['insert_products'])) {
            include('insert_products.php');
        } elseif (isset($_GET['insert_items'])) {
            include('insert_items.php');
        } elseif (isset($_GET['insert_categories'])) {
            include('insert_categories.php');
        } elseif (isset($_GET['insert_scale'])) {
            include('insert_scale.php');
        } elseif (isset($_GET['view_items'])) {
            include('view_items.php');
        } elseif (isset($_GET['edit_items'])) {
            include('edit_items.php');
        } elseif (isset($_GET['delete_item'])) {
            include('delete_item.php');
        } elseif (isset($_GET['view_products'])) {
            include('view_products.php');
        } elseif (isset($_GET['view_categories'])) {
            include('view_categories.php');
        } elseif (isset($_GET['view_scale'])) {
            include('view_scale.php');
        } elseif (isset($_GET['edit_products'])) {
            include('edit_products.php');
        } elseif (isset($_GET['edit_categories'])) {
            include('edit_categories.php');
        } elseif (isset($_GET['edit_scale'])) {
            include('edit_scale.php');
        } elseif (isset($_GET['delete_products'])) {
            include('delete_products.php');
        } elseif (isset($_GET['delete_categories'])) {
            include('delete_categories.php');
        } elseif (isset($_GET['delete_scale'])) {
            include('delete_scale.php');
        } elseif (isset($_GET['list_orders'])) {
            include('list_orders.php');
        } elseif (isset($_GET['delete_orders'])) {
            include('delete_orders.php');
        } elseif (isset($_GET['list_payments'])) {
            include('list_payments.php');
        } elseif (isset($_GET['delete_payments'])) {
            include('delete_payments.php');
        } elseif (isset($_GET['list_users'])) {
            include('list_users.php');
        } elseif (isset($_GET['delete_users'])) {
            include('delete_users.php');
        } else {
            include('view_items.php'); // Default page
        }
        ?>
    </div>

    <!--footer-->
    <?php
    include("../includes/footer.php")
    ?>
</div> 

<!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>

<script>
document.getElementById('toggleSidebar').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('d-none');
});
</script>
</body>
</html>
