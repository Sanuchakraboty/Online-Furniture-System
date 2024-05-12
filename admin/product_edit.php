<?php
include('security.php');
include('include/header.php');
include('include/navbar.php');
require('database/dbconfig.php');
?>

<div class="container-fulid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Product Edit</h6>
        </div>
    </div>
    <div class="card-body">
        <?php
        if(isset($_POST['edit_btn_pd']))
        {
            $id = $_POST['edit_id'];
            $query = "SELECT * FROM abouts WHERE ID= '$id'";
            $query_run = mysqli_query($connection, $query);

            foreach($query_run as $row)
            {
?>



        <form action="code.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">

            <div class="form-group">
                <label> Product Name </label>
                <input type="text" name="edit_pname"  value="<?php echo $row['pname']?>"class="form-control" placeholder="Enter Product Name" required>
            </div>
            <div class="form-group">
                <label>Product Price</label>
                <input type="number" name="edit_pprice"  value="Rs.<?php echo $row['pprice']?>"class="form-control" placeholder="Enter Product Price " required>
            </div>
            <div class="form-group">
                <label>Upload Product Image</label>
                <input type="file" name="edit_pimg" value="<?php echo $row['pimg']?>" class="form-control-file">
            </div>
            <div class="form-group">
                <label>Product Quantity</label>
                <input type="number" name="edit_pquantity"value="<?php echo $row['pquantity']?>" class="form-control" placeholder=" Enter the Product Quantity" required>
            </div>
            
            <div class="modal-footer">
                <a href="product.php" class="btn btn-secondary" data-dismiss="modal">Close</a>
                <button type="submit" name="prod_update" class="btn btn-primary">Update</button>
            </div>


        </form>
        <?php
            }

        }
        ?>
    </div>
</div>





<?php
include('include/script.php');
include('include/footer.php');
?>