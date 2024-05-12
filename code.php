<?php
include('security.php');
$connection = mysqli_connect("localhost", "root", "", "adminpanel");
if (isset($_POST['registerbtn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    if ($password === $password2) {
        $query = "INSERT INTO register (username, email, password,usertype) VALUES ('$username','$email','$password','$usertype')";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Admin Profile Added";
            header('Location: register.php');
        } else {
            $_SESSION['status'] = "Admin Profile Not Added";
            header('Location: register.php');
        }
    } else {
        $_SESSION['status'] = "Password and Confirm Password Does Not Match";
        header('Location: register.php');
    }
}



if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $usertype = $_POST['update_usertype'];


    $query = "UPDATE register SET username='$username', email='$email', password='$password' ,usertype =' $usertype' WHERE id ='$id' ";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = 'Your Data is Updated';
        header('Location: register.php');
    } else {
        $_SESSION['status'] = 'Your Data is Not Updated';
        header('Location: register.php');
    }
}




if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM `register` WHERE  id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = 'Your Data is Deleted';
        header('Location: register.php');
    } else {
        $_SESSION['status'] = 'Your Data is NOT DELETED';
        header('Location: register.php');
    }
}





if (isset($_POST['about_save'])) {
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pimg = $_FILES["pimg"]['name'];
    $pquantity = $_POST['pquantity'];


    $query = "INSERT INTO abouts (pname ,pprice, pimg , pquantity) VALUES ('$pname', '$pprice', '$pimg', '$pquantity')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        move_uploaded_file($_FILES["pimg"]["name"], "img/upload/".$_FILES["pimg"]["name"]);
        $_SESSION["success"] = 'Your Product ADD in Database';
        header('Location : product.php');
    } else {
        $_SESSION['status'] = 'Your Product Not ADD in Database';

        header('Location : product.php');

    }
}




if (isset($_POST['prod_update'])) {
    $id = $_POST['edit_id'];
    $pname = $_POST['edit_pname'];
    $pprice = $_POST['edit_pprice'];
    $pimg = $_FILES["edit_pimg"]['name'];
    $pquantity = $_POST['edit_pquantity'];

    $prod = "SELECT * FROM abouts WHERE id='$id' " ;
    $prod_query_run = mysqli_query($connection, $prod);
    foreach ($prod_query_run as $pr_row) 
    {
        //echo $pr_row['pimg'];
        if ($pimg == NULL)
        {
            $img_data = $pr_row['pimg'];
        }
       else
        {
        
        }
        

    }
    $query = "UPDATE abouts SET pname='$pname', pprice='$pprice',pimg='$img_data',pquantity='$pquantity' WHERE id ='$id' ";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) 
    {
        if ($pimg == NULL)
        {
            $_SESSION["success"] = 'Your Product Update with exiting image';
        header('Location :product.php');
        }
       else
        {
            move_uploaded_file($_FILES["pimg"]["name"], "/User/Index/img/uploads".$_FILES["pimg"]["name"]);
            $_SESSION["success"] = 'Your Product Update';
            header('Location :product.php');
           
        }
        
    } else {
        $_SESSION['status'] = 'Your Data is not Updated';
        header('Location: product.php');
    }
}






if (isset($_POST['deletebtn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM abouts WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = 'Your Data is Deleted';
        header('Location: product.php');
    } else {
        $_SESSION['status'] = 'Your Data is NOT DELETED';
        header('Location: product.php');
    }
}




?>