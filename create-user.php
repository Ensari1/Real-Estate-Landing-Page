<?php
    require './users/UserController.php';

    $user = new UserController;

    if(isset($_POST['submitted'])) {
        $user->store($_POST);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create User</title>
	<link rel="stylesheet" type="text/css" href="./dashboard1/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="widget" id="add-user">			
				<h2>Add User</h2>
				<form action="" method="POST">
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" required>
					
					<label for="email">Email:</label>
					<input type="email" id="email" name="email" required>
					
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" required>

					<label for="name">Role:</label>
					<input type="checkbox" id="roli" name="roli" required>
					
					<button type="submit" name="submitted"> Add User</button>
					
				</form>
			</div>
</body>
</html>
