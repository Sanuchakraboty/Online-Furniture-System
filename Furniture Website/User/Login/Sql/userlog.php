<?php   
 session_start();
 include('config.php'); 

if(isset($_POST['submit_btn']))
{
     
    $username = $_POST['customer_email'];  
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "SELECT * from registerlogin where customer_email = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){ 
            $_SESSION['login_admin'] = $username; 
            echo "<script> alert('Login successful');
             window.location = '/Mywork/Furniture Website/User/Index/index.php';
            </script>";
           	  
        }  
        else{  
            echo "<script> alert('Login failed. Invalid username or password.');
            window.location ='/Mywork/Furniture Website/User/Index/index.php';
            
            </script>";  
        } 
}
?>  