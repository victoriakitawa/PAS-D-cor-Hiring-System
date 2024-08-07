<?php
include('../includes/connect.php');
include('../functions/common_function.php');

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
    echo $user_id;
}


//getting total items and total price of all items
$get_ip_address=getIPAddress();
$total_price=0;
$cart_query_price="Select * from `cart_details` where ip_address='$get_ip_address'";
$result_cart_price=mysqli_query($con,$cart_query_price);
$invoice_number=mt_rand();
$status='Pending';
$count_items=mysqli_num_rows($result_cart_price);
while($row_price=mysqli_fetch_array($result_cart_price)){
    $item_id=$row_price['item_id'];
    $select_items="Select * from `items` where item_id=$item_id";
    $run_price=mysqli_query($con,$select_items);
    while($row_item_price=mysqli_fetch_array($run_price)){
        $item_price=array($row_item_price['item_price']);
        $item_values=array_sum($item_price);
        $total_price+=$item_values;
    }
}


//getting  quantity from cart
$get_cart="Select * from  `cart_details`";
$run_cart=mysqli_query($con,$get_cart);
$get_item_quantity=mysqli_fetch_array($run_cart);
$quantity=$get_item_quantity['quantity'];
if($quantity==0){
    $quantity=1;
    $subtotal=$total_price;
}else{
    $quantity=$quantity;
    $subtotal=$total_price*$quantity;
}
$insert_orders="Insert into `user_orders` (user_id,amount_due,invoice_number,total_items,
order_date,order_status) values ($user_id,$subtotal,$invoice_number,$count_items,
NOW(),'$status')";
$result_query=mysqli_query($con,$insert_orders);
if($result_query){
    echo "<script>alert('Orders are submitted successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}

//orders pending
$insert_pending_orders="Insert into `orders_pending` (user_id,invoice_number,item_id,
quantity,order_status) values ($user_id,$invoice_number,$item_id, $quantity,'$status')";
$result_pending_orders=mysqli_query($con,$insert_pending_orders);

// delete items from cart
$empty_cart="Delete from `cart_details` where ip_address='$get_ip_address'";
$result_delete=mysqli_query($con,$empty_cart);
?>

