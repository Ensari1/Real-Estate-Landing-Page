<?php
    require './users/AuthController.php';

    $user = new AuthController;

    if(isset($_POST['submitted'])) {
        $user->login($_POST);
    }
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Real-Estate-Landing-Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script>
        function validateLogin() {
          var email = document.getElementById("email").value;
          var fjalekalimi= document.getElementById("fjalekalimi").value;
      
          if (email == "" || fjalekalimi == "") {
            alert("All fields are required!");
            return false;
          }
      
          if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
            alert("Invalid email address!");
            return false;
          }
      
          return true;
        }

        
      </script>
</head>
<body>

<?php if(!empty($message)): ?>
        <p><?php echo $message ?></p>
    <?php endif; ?>

<header>      
    <div class="header-content">
        <div class="logo">
            <a href="index.php">
                <h1><span class="logo-title">Home Z</span></h1>
            </a>
        </div>
        <div class="navbar">
        <ul class="nav-items">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <?php if(isset($_SESSION['name'])): ?>
               <?php echo $_SESSION['name']; ?>
               <li><a href="aboutus.php">About Us</a></li>
                 <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    
<div class="wraper">
    <div class="title">
        Login Form:
    </div>

    <form onsubmit="return validateLogin()" method="post" class="form">
    <form action="login.php" method="POST">
        <div class="input_field">
            <label for="email">Email: </label>
            <input type="email" class="input"name="email" id="email">
        </div>

        <div class="input_field">
            <label for="fjalekalimi">Fjalekalimi: </label>
            <input type="password" class="input" name="fjalekalimi" id="fjalekalimi">
        </div>

        <div class="input_field">
            <input type="submit" class="btn" name="kycu" id="kycu" value="Kycu">                
        </div>
    </form>
    </form> 
</div>
</div>
<?php

if( isset($_SESSION['user_id']) ){
    header("Location: /");
}

require 'dbconnect.php';


if(isset($_POST['kycu'])):
    $email = $_POST['email'];
    $password = $_POST['fjalekalimi'];
    $message = '';

    $query = $pdo->prepare('SELECT id,name,email,password FROM users WHERE email = :email');
    $query->bindParam(':email', $email);
    $query->execute();

    $user = $query->fetch();

    if(count($user) > 0 && password_verify($password, $user['password']) ){

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];

        header("Location: index.php");

    } else {
        $message = 'Sorry, those credentials do not match';
    }

endif;

?>
</header>
