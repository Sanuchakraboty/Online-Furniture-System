<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration Form</title>
    <link rel="stylesheet" href="Login.css">
    <style>
        * {
    margin: 0;
    padding: 0;
  

}

.container {
    width: 100%;
    height: 100vb;
    font-family: sans-serif;
     background-image: url(s6.png);
    background-attachment: fixed;
    color: #ace630;
    display: flex;
    align-items: center;
    justify-content: center;
}
img-src{
    background-repeat: repeat;
    height: 100%;
    width: 100%;
}

.card {
    width: 350px;
    height: 500px;
    box-shadow: 0 0 40px 20px rgba(0, 0, 0, 0.26);
    perspective: auto;
}

.inner-box {
    position: relative;
    width: 100%;
    height: 100%;
    transform-style: preserve-3d;
    transition: transform 1s;
}

.card-front, .card-back {
    position:absolute;
    width: 100%;
    height: 100%;
    background-position: center;
    background-size: cover;
    background-image: url(s3.jpg);
    padding: 30px;
    margin: auto;
    box-sizing: border-box;
    backface-visibility: hidden;
}

.card-back {
    transform: rotateY(180deg);
}

.card h2 {
    font-weight: normal;
    font-size: 24px;
    text-align: center;
    margin-bottom: 20px;

}

.input-box {
    width: 100%;
    background: transparent;
    border: 1px solid rgb(236, 228, 237);
    margin: 6px 0;
    height: 32px;
    border-radius: 20px;
    padding: 0 10px;
    box-sizing: border-box;
    outline: none;
    text-align: center;
    color: #fff;
}

::placeholder {
    color: #fff;
    font-size: 12px;
}

button {
    width: 100%;
    background: transparent;
    border: 1px solid #fff;
    margin: 20px;
    height: 32px;
    padding: 10px;
    font-size: 12px;
    border-radius: 20px;
    padding: 8px;
    box-sizing: border-box;
    outline: none;
    color: #fff;
    cursor: pointer;
    margin-left: 0.04px;
}

.submit-btn {
    position: relative;
    
}

.submit-btn::after {
    content: '\27a4';
    text-align: center;
    color: #333;
    line-height: 32px;
    font-size: 17px;
    height: 32px;
    width: 32px;
    border-radius: 50%;
    background: #fff;
    position: absolute;
    right: -1px;
    top: -1px;
}

span {
    font-size: 13px;
    margin-left: 10px;
    padding: 10px;
}

.card .btn {
    margin-top: 40px;

}

.card a {
    color: #fff;
    text-decoration: none;
    display: block;
    text-align: center;
    font-size: 13px;
    margin-top: 1px;
}

    </style>
</head>

<body >
    <div class="container" img-src="s6.png">
        <div class="card">
       
            <div class="inner-box" id="card">
                <div class="card-front">
                <?php
                    if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                    {
                        echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                        unset($_SESSION['status']);
                    }
                ?>
                    <h2>LOGIN</h2>
                    <form action = "/Mywork/Furniture Website/User/Login/Sql/userlog.php" class="form" method="post">
                        <input type="email" name="customer_email" class="input-box" placeholder="Your Email Id" required>
                        <input type="password"class="input-box" name="password" autocomplete="current-password" required id="id_password" placeholder="Password">
                        <button type="submit" name="submit_btn" class="submit_btn">Submit</button>
                        <input type="checkbox" ><span>Remember Me</span>
                        
                    </form>
                    <button type="button" class="btn" onclick="openRegister()">I'm New Here</button>
                    <a href="">Forgot Password</a>
                </div>
                <div class="card-back">
                <?php
      if (isset($_SESSION['success'])&& $_SESSION['success'] !='')
      {
        echo '<h2 class="bg-info text-white">'. $_SESSION['success'] .'</h2>';
        unset($_SESSION['success']);
      }
      if (isset($_SESSION['status'])&& $_SESSION['status'] !='')
      {
        echo '<h2 class="bg-primary text-white"> '. $_SESSION['status'] .'</h2>';
        unset($_SESSION['status']);
      }
      ?>
                    <h2>REGISTER</h2>
                    <form action = "/Mywork/Furniture Website/User/Login/Sql/userreg.php" class="form" method="post">
                    <input type="text" name="customer_name" class="input-box" placeholder="Your Name" required>
                        <input type="email" name="customer_email" class="input-box" placeholder="Your Email Id" required>
                        <input type="password"  name="password" class="input-box" placeholder="Password" required>
                        <input type="password" name="confirmpassword" class="input-box" placeholder="Renter Password" required>
                        <input type="number"  name="customer_number" class="input-box" placeholder="Mobile No." required>
                        <button type="submit" name="submitbtn" class="submitbtn">Submit</button>
                        <input type="checkbox"><span>Remember Me</span>
                        
                    </form>
                    <button type="button" class="btn" onclick="openLogin()">I've an account</button>
                    <a href="#">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        var card = document.getElementById("card");
        function openRegister(){
            card.style.transform="rotateY(-180deg)";
        }
        function openLogin(){
            card.style.transform="rotateY(0deg)";
        }
    </script>
</body>

</html>