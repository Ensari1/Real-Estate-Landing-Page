<?php
    require './users/UserController.php';

    $user = new UserController;
   
    if(isset($_GET['id'])) {
        $userId = $_GET['id'];
    }

    $currenUser = $user->edit($userId);

    if(isset($_POST['submitted'])) {
        $user->update($userId, $_POST);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create User</title>

	<link rel="stylesheet" type="text/css" href="./dashboard1/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></head>
<body>
   
    <div class="widget" id="update-user">
	<h2>Update User</h2>
	<form action="" method="POST">
		<label for="name">Name:</label>
		<input type="text" value="<?php echo $currenUser['name']; ?>" id="name" name="name" required>
		
		<label for="email">Email:</label>
		<input type="email" value="<?php echo $currenUser['email']; ?>" id="email" name="email" required>
		
		<label for="password">Password:</label>
		<input type="password" value="<?php echo $currenUser['password']; ?>" id="password" name="password" required>

		<label for="name">Role:</label>
		<input type="checkbox" <?php echo $currenUser['roli'] === '1' ? 'checked' : '' ?> id="roli" name="roli" >
		
		<button type="submit" name="submitted">Update User</button>
	</form>
</div>
</body>
</html>
