<?php
include 'include/header.php';
include 'include/navbar.php'
?>
<div class="container-fluid body-area mt-1">

  <div class="row mt-4">

    <div class="col-md-10 col-sm-12 mt-1">
      <h5 class="pt-2 ml-2"><a href="/Mywork/Furniture Website/User/Index/index.php"
          style="text-decoration: none; font-weight: bold;">Home</a>
      </h5>
    </div>

    <div class="col-md-2 col-sm-12">
      <h5 class="pt-2"><a href="/Mywork/Furniture Website/User/Index/vieworder.php" class="btn btn-success">Go to my orders</a>
      </h5>
    </div>

  </div>

  <div class="row">

    <div class="col-md-12 col-sm-12 view-area mt-2 p-4">



      <div class="card">


        <div class="card-header">
          <h4 class="text-center">Items in Cart</h4>

        </div>



        <div class="card-body">
          <table id="dtBasicExample"
            class="table table-responsive table-striped table-bordered  w-100 d-block d-md-table" cellspacing="0"
            width="100%">
            <thead>
              <th class="th-sm">ID
              </th>

              <th class="th-sm">Product Name
              </th>
              <th class="th-sm">Product Price
              </th>
              <th class="th-sm">Product Image
              </th>
              <th class="th-sm text-align: center;">Action
              </th>

            </thead>
            <tbody>
              <?php

            include 'Sql/config.php';
            ?>
              <?php

            $sql = "SELECT * FROM cart";

            $table = mysqli_query($conn, $sql);
            $i = 1;
            if(mysqli_num_rows($table)>0){
                while ($row = mysqli_fetch_array($table)) {
                 ?>


              <tr>

                <td>
                  <?php echo $row['id'];?>
                </td>

                <td>
                  <?php echo $row['product_name'];?>
                </td>
                <td>
                <span>&#8377;</span>
                  <?php echo $row['product_price'];?>
                </td>
                <td style="text-align:center;"><img src="img/uploads/<?php echo $row['product_image'];?>"
                    class="img-thumbnail mr-5 ml-1" height="50px" width="50px" id="pimg"></td>

               
                <td style="text-align: center;">

                  <a href="Sql/delcart.php?id=<?php echo $row['id'];?>" class="badge badge-danger mt-4">Delete</a>
                </td>


              </tr>

              <?php
                         $i++;

                            }
                          }

                          // Close connection
                            mysqli_close($conn);
                          ?>


            </tbody>

          </table>

        </div>
      </div>








    </div>



  </div>

  <div class="row pl-5">

    <div class="col-md-10 col-sm-12 mb-3">

      <h4>Total Price:</h4>
      <p> <b><span>&#8377;</span></b>
        <?php
include 'Sql/config.php';

$fetch = " SELECT SUM(product_price) AS `count_price` FROM cart";

$results = mysqli_query($conn, $fetch);

while($row = mysqli_fetch_array($results)){
     echo $row['count_price'];
}
?>
      </p>
    </div>




    <div class="col-md-2 col-sm-12 mb-3 mt-2">
      <a href="/Mywork/Furniture Website/User/Index/checkout.php" class="btn btn-primary">Proceed to checkout</a>
    </div>

  </div>


</div>


</div>


<?php


include 'include/foot.php';

?>

<!-- View End -->