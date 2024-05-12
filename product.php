<?php
include('security.php');
include('include/header.php');
include('include/navbar.php');
require('database/dbconfig.php');
?>


<div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

          <div class="form-group">
            <label> Product Name </label>
            <input type="text" name="pname" class="form-control" placeholder="Enter Product Name" required>
          </div>
          <div class="form-group">
            <label>Product Price</label>
            <input type="number" name="pprice" class="form-control" placeholder="Enter Product Price " required>
          </div>
          <div class="form-group">
            <label>Upload Product Image</label>
            <input type="file" name="pimg" class="form-control-file" required>
          </div>
          <div class="form-group">
            <label>Product Quantity</label>
            <input type="number" name="pquantity" class="form-control" placeholder=" Enter the Product Quantity" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="about_save" class="btn btn-primary">Save</button>
        </div>

      </form>

    </div>
  </div>
</div>

<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Product
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addproduct">
          Add Item
        </button>
      </h6>
    </div>

    <div class="card-body">
      <?php
      if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
        echo '<h2 class="bg-primary text-white">' . $_SESSION['success'] . '</h2>';
        unset($_SESSION['success']);
      }

      if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        echo '<h2 class="bg-info text-white">' . $_SESSION['status'] . '</h2>';
        unset($_SESSION['status']);
      }
      ?>

      <div class="table-responsive">
        <?php
        $query = "SELECT * FROM `abouts`";
        $query_run = mysqli_query($connection, $query);
        ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> ID </th>
              <th>Product Name</th>
              <th>Product Price</th>
              <th>Upload Product Image</th>
              <th>Product Quantity</th>
              <th>EDIT </th>
              <th>DELETE </th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_assoc($query_run)) {
            ?>

                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['pname']; ?></td>
                  <td><span>&#8377;</span> <?php echo $row['pprice']; ?></td>
                  <td><?php echo '<img src="/User/Index/img/uploads' . $row['pimg'] . '"height="50px;"width="100px;" id="pimg">' ?></td>
                  <td><?php echo $row['pquantity']; ?></td>
                  <td>
                    <form action="product_edit.php" method="post">
                      <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="edit_btn_pd" class="btn btn-success">EDIT</button>
                    </form>
                  </td>
                  <td>

                    <form action="code.php" method="post">
                      <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="deletebtn" class="btn btn-danger"> DELETE</button>
                    </form>
                  </td>
                </tr>
            <?php
              }
            } else {
              echo "No Record Found";
            }
            ?>

          </tbody>
        </table>

      </div>
    </div>
  </div>
  <?php
  include('include/script.php');
  include('include/footer.php');
  ?>
</div>
<!-- /.container-fluid -->