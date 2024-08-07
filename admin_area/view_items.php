<h3 class="text-center text-success">All Items</h3>
<table class="table table-bordered mt-2">
<thead class="bg-primary">
<tr>
<th>Item Id</th>
<th>Item Title</th>
<th>Item Image</th>
<th>item Price</th>
<th>Total Sold</th>
<th>Status</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
<tbody class="bg-secondary text-light">
    <?php
    $get_items="Select * from `items`";
    $result=mysqli_query($con,$get_items);
    $number=0;
    while($row=mysqli_fetch_assoc($result)){
        $item_id=$row['item_id'];
        $item_title=$row['item_title'];
        $item_image1=$row['item_image1'];
        $item_price=$row['item_price'];
        $status=$row['status'];
        $number++;
        ?>
        <tr class='text-center'>
        <td> <?php echo $number;?></td>
        <td><?php echo $item_title;?></td>
        <td><img src='./item_images/<?php echo $item_image1;?>' class='item_img'/></td>
        <td><?php echo $item_price;?></td>
        <td><?php
        $get_count="Select * from `orders_pending` where item_id=$item_id";
        $result_count=mysqli_query($con,$get_count);
        $rows_count=mysqli_num_rows($result_count);
        echo  $rows_count;
        ?></td>
        <td><?php echo $status?></td>
        <td><a href='index.php?edit_items=<?php echo $item_id?>'
        class='text-light'><i class='fa-solid 
        fa-pen-to-square'></i></a></td>
        <td><a href='index.php?delete_item=<?php echo $item_id?>'class='text-light'>
          <i class='fa-solid fa-trash'></i></a></td>
      </tr>
      <?php
    }
    ?>
    
</tbody>
</table>
