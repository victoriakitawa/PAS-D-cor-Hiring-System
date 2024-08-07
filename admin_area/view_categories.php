<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-2">
    <thead class="bg-primary">
        <tr class="text-center">
            <th>SLno</th>
            <th>Categories Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_cat="Select * from `categories`";
        $result=mysqli_query($con,$select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $categories_id=$row['categories_id'];
            $categories_title=$row['categories_title'];
            $number++;
?>
        <tr class="text-center">
            <td><?php echo $number;?></td>
            <td><?php echo $categories_title;?></td>
            <td><a href='index.php?edit_categories=<?php echo $categories_id ?>'
            class='text-light'>
            <i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='index.php?delete_categories=<?php echo $categories_id ?>'
        type="button" class="text-light" data-bs-toggle="modal" 
        data-bs-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
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
<a href="./index.php?view_categories" class='text-light text-decoration-none'>No</a></button>
<button type="button" class="btn btn-primary">
<a href='index.php?delete_categories=<?php echo $categories_id?>'
class="text-light text-decoration-none">
Yes</a></button>
</div>
</div>
</div>
</div>