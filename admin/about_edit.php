<?php
include('security.php');
include('include/header.php');
include('include/navbar.php');
?>


<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Product

            </h6>
        </div>

        <div class="card-body">


            <?php
            $connection = mysqli_connect("localhost", "root", "", "adminpanel");
            if (isset($_POST['edit_btn'])) {
                $id = $_POST['edit_id'];
                $query = "SELECT * FROM abouts WHERE  id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach ($query_run as $row) {
            ?>
                <form action="code.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                    <div class="form-group">
                        <label> Product Name</label>
                        <input type="text" name="edit_pname" value="<?php echo $row['pname'] ?>" class="form-control" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="number" name="edit_pprice" value="<?php echo $row['pprice'] ?>" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label>Upload Product Image</label>
                        <input type="file" name="edit_pimg" value="<?php echo $row['pimg'] ?>" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label>Product Quantity</label>
                        <input type="number" name="edit_pquantity" value="<?php echo $row['pquantity'] ?>" class="form-control" placeholder="Enter Password">
                    </div>

                    <a href="aboutus.php" class="btn btn-danger"> CANCEL</a>
                    <button type="submit" name="update_btn" class="btn btn-primary">Update</button>
                </form>
            <?php
                }
            }
            ?>

        </div>
    </div>
</div>





<?php
include('include/footer.php');
include('include/script.php');
?>