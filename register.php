<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
     <title>Real-Estate-Landing-Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script>
         function validateRegister() {
      
            
      var name = document.getElementById("name").value;
      var surname = document.getElementById("surname").value;
      var email = document.getElementById("email").value;
      var fjalekalimi = document.getElementById("fjalekalimi").value;


      if (name == "" || surname == "" || email == "" || fjalekalimi == "") {
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
        Register Form:
    </div>
    <form onsubmit="return validateRegister()" method="post" class="form">
        <div class="input_field">
        <?php 
            if(!empty($message)) {
                echo "<p>$message</p>";
            } 
        ?>
            <label for="Name">Name: </label>
            <input type="text" class="input"name="name" id="name">
        </div>
        <div class="input_field">
            <label for="email">Email: </label>
            <input type="email" class="input"name="email" id="email">
        </div>
        <div class="input_field">
            <label for="fjalekalimi">Fjalekalimi: </label>
            <input type="password" class="input" name="fjalekalimi" id="fjalekalimi">
        </div>
            <div class="input_field">
            <label for="Name">Roli: </label>
            <input type="text" class="input"name="roli" id="roli">
        </div> 
        <div class="input_field">
            <input type="submit" class="btn" name="kycu" id="kycu" value="Kycu">                
        </div>
    </form> 
</div>
</div>
<?php
    session_start();

    if( isset($_SESSION['user_id']) ){
        header("Location: register.php");
    }

    require 'dbconnect.php';

    if(isset($_POST['kycu'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['fjalekalimi'], PASSWORD_BCRYPT);
        $roli = $_POST['roli'];
        $message = '';

        $sql = 'INSERT INTO users (name, email, password, roli) VALUES (:name, :email, :password, :roli)';
        $query = $pdo->prepare($sql);
        $query->bindParam('name', $name);
        $query->bindParam('email', $email);
        $query->bindParam('password', $password);
        $query->bindParam('roli', $roli);
        
        header("Location: login.php");

        if($query->execute()) {
            $message = "Successfully created your account";
        } else {
            $message = "A problem occurred creating your account";
        }
    }
?>

</header>
