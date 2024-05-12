<?php
session_start();
include('config.php');

if (isset($_POST['submitbtn'])) {
    $name = $_POST['customer_name'];
    $email = $_POST['customer_email'];
    $password = $_POST['password'];
    
    $phone = $_POST['customer_number'];

    $sql = "SELECT * from registerlogin where customer_email = '$username' and password = '$password'";
    $table = mysqli_query($conn, $sql);
    if (mysqli_num_rows($table) > 0) {

        echo "<script> alert('User already Exists');
            window.location = '/Mywork/Furniture Website/User/Index/index.php';
           </script>";
    } else {

        $sql = "INSERT INTO registerlogin (customer_name ,customer_email,password,customer_number)VALUES('$name', '$email','$password','$phone')";



        if (mysqli_query($conn, $sql)) {

            echo "<script> alert('Registration successful');
             window.location = '/Mywork/Furniture Website/User/Login/Login.php';
            </script>";
        } else {
            echo "error" . mysqli_error($conn);
        }
    }
}
