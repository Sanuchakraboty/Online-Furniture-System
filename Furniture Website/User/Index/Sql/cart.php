<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shopping Cart</title>
	 
</head>
<body>
	<?php

if(isset($_POST['add_to_cart'])){

include 'config.php';

$pname = $_POST['product_name'];
$pprice = $_POST['product_price'];
$pimg = $_POST['product_image'];

$sql = "SELECT * FROM `cart` WHERE product_name = '$pname'";
$table = mysqli_query($conn, $sql);

if(mysqli_num_rows($table)>0){
	echo"
      <script>
	  
	  alert( 'product already added to cart!');
	  window.location ='/Mywork/Furniture Website/User/Index/viewcart.php';		
	  </script>";
	 
   }

   else{
	$sql = "INSERT INTO cart(product_name ,product_price, product_image)VALUES('$pname', '$pprice', '$pimg')";
   

      

   




// $sql = "ALTER TABLE add_product AUTO_INCREMENT = 1;"

if(mysqli_query($conn ,$sql)){
	echo"
	<script>

	alert('Product Added to Cart');
	

	window.location ='/Mywork/Furniture Website/User/Index/viewcart.php';			

</script>";

}else{
	echo "error" .mysqli_error($conn);
	}
}

}

?>	
</body>
</html>



