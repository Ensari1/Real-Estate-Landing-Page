<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Real-Estate-Landing-Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script>
        function validateForm() {
          var name = document.getElementById("name").value;
          var email = document.getElementById("email").value;
          var city = document.getElementById("city").value;
          var comments = document.getElementById("comments").value;
          if (name == "" ||  email == "" || city == "" || comments == "") {
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
            <a href="indexphp">
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
<div class="wraper1">
    <div class="title">
       Contact Us:
    </div>
    <form onsubmit="return validateForm()" method="post" class="form">
        <div class="input_field">
            <label for="name">Name:</label><br>
           <input type="text" id="name" name="name"><br>
        </div>
        <div class="input_field">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br>
        </div>
        <div class="input_field">
            <label for="city">City:</label><br>
            <select id="city" name="city">
              <option value="">Please select a city</option>
              <option value="PR">Prishtine</option>
              <option value="PZ">Mitrovice</option>
              <option value="PD">Peja</option>
              <option value="PZ">Prizren</option>
              <option value="PZ">Ferizaj</option>
            </select>
        </div>
    <label for="comment">Comment:</label><br>
    <textarea id="comment" name="comment" rows="5" cols="50"></textarea><br>
        <div class="input_field">
            <input type="submit" class="btn" name="Submit" id="Submit" value="Submit">                
        </div>
    </form> 
</div>
<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: /");
    exit();
}
require 'dbconnect.php';

$message = '';

if (isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $comment = $_POST['comment'];
   $sql = 'INSERT INTO contact (name, email, city, comment) VALUES (:name, :email, :city, :comment)';
    $query = $pdo->prepare($sql);
    $query->bindParam(':name', $name);
    $query->bindParam(':email', $email);
    $query->bindParam(':city', $city);
    $query->bindParam(':comment', $comment);
    if ($query->execute()) {
        $message = 'Your message has been sent successfully!';
    } else {
        $message = 'Sorry, there was an error processing your request.';
    }
}
?>
</header>


