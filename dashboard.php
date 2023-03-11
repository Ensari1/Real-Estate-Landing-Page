<?php
    require './users/ContactController.php';

    $contact = new ContactController;
    $contacts = $contact->all();
?>
<?php
    require './users/UserController.php';

    $user = new UserController;
    $users = $user->all();
?>
<?php
    require './users/PronatController.php';

    $prona = new PronatController;
    $pronat = $prona->all();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./dashboard1/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="sidebar">
		<div class="logo">
			<i class="fa fa-user-circle-o fa-2x"></i>
		</div>
		<ul>
			<li><a href="#user"><i class="fa fa-user"></i>User</a></li>
			<li><a href="create-user.php"><i class="fa fa-plus"></i>Add User</a></li>
			<li><a href="#properties"><i class="fa fa-home"></i>Properties</a></li>
			<li><a href="index.php"><i></i>Faqja Kryesore</a></li>
		</ul>
	</div>
	<div class="dashboard">
		<h1>Dashboard</h1>
		<div class="widgets">
			<div class="widget" id="user">
				<h2>Contact Us</h2>
				<div class="table-container">
					<table>
						<thead>				
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>City</th>
								<th>Comments</th>
							</tr>
						</thead>
						<?php foreach($contacts as $name): ?>
						<tbody>
							<tr>
								<td><?php echo $name['name']; ?></td>
								<td><?php echo $name['email']; ?></td>
								<td><?php echo $name['city']; ?></td>
								<td><?php echo $name['comment']; ?></td>
							</tr>
						</tbody>
						<?php endforeach; ?>
					</table>
	
				</div>
				<br>
				<br>
				<h2>User</h2>
				<div class="table-container">
					<table>
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Password</th>
								<th>Role</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<?php foreach($users as $user): ?>
					<tbody>
				<tr>
					<td><?php echo $user['name']; ?></td>
					<td><?php echo $user['email']; ?></td>
					<td><?php echo $user['password']; ?></td>
					<td><?php echo $user['roli']; ?></td>
					<td><a href="edit-user.php?id=<?php echo $user['id']; ?>">Edit</a></td>
					<td><a href="delete-user.php?id=<?php echo $user['id']; ?>">Delete</a></td>
				</tr>
			</tbody>
			<?php endforeach; ?>
					</table>
				</div>
			</div>
			<div class="widget" id="properties">
				<h2>Properties</h2>
				<div class="table-container">
					<table>
						<thead>
							<tr>
								<th>Prona</th>
								<th>Description</th>
								<th>Cmimi</th>
							</tr>
						</thead>
						<?php foreach($pronat as $prona): ?>
            
						<tbody>
							<tr>
								<td><?php echo $prona['prona']; ?></td>
								<td><?php echo $prona['description']; ?></td>
								<td><?php echo $prona['cmimi']; ?></td>
							</tr>			
						</tbody>
											<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script src="dashboard1/script.js"></script>

</body>
</html>
