<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-2">
    <thead class="bg-primary">
<?php
$get_payments="Select * from `user_payments`";
$result=mysqli_query($con,$get_payments);
$row_count=mysqli_num_rows($result);


if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'>No Payments yet</h2>";
}else{
    echo "
    <tr class='text-center'>
    <th>Slno</th>
    <th>Invoice Number</th>
    <th>Amount</th>
    <th>Payment Mode</th>
    <th>Order Date</th>
    <th>User Delivery</th>
    <th>User Info</th>
    <th>Delete</th>
    </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $order_id=$row_data['order_id'];
        $payment_id=$row_data['payment_id'];
        $invoice_number=$row_data['invoice_number'];
        $amount=$row_data['amount'];
        $payment_mode=$row_data['payment_mode'];
        $date=$row_data['date'];
        $user_delivery=$row_data['user_delivery'];
        $user_info=$row_data['user_info'];
        $number++;
        ?>
        <tr>
        <td><?php echo $number;?></td>
        <td><?php echo $invoice_number;?></td>
        <td><?php echo $amount;?></td>
        <td><?php echo $payment_mode;?></td>
        <td><?php echo $date;?></td>
        <td><?php echo $user_delivery;?></td>
        <td><?php echo $user_info;?></td>
    
        <td><a href='index.php?delete_payments=<?php echo $payment_id?>'
        type="button" class="text-light" data-bs-toggle="modal" 
        data-bs-target="#exampleModal">
        <i class='fa-solid fa-trash'></i></a></td>
    </tr>
     <?php
    }
}
?>
</tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" 
aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-body">
    <h4>Are you sure you want to delete this?</h4>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
<a href="./index.php?list_payments" class='text-light text-decoration-none'>No</a></button>
<button type="button" class="btn btn-primary">
<a href='index.php?delete_payments=<?php echo $payment_id?>'
class="text-light text-decoration-none">Yes</a></button>
</div>
</div>
</div>
</div>