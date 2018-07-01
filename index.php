<?php
// include the databse connection file

require_once('config.php');

// fetching data in descending order
$sql = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" href="/CRUD/bootstrap/css/bootstrap.css">
</head>
<body>
<br>
<a href="add.php" class="btn btn-info"> <i class="glyphicon glyphicon-plus"></i> Add new data</a> <br> <br>


					<?php if (isset($_SESSION['error'])): ?>
						<div class="alert alert-danger">
						<?php
						echo $_SESSION['error'];
						unset($_SESSION['error']);
						?>					
						</div>

					<?php endif; ?>

					<?php if (isset($_SESSION['success'])): ?>
						<div class="alert alert-success">
						<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
						?>					
						</div>

					<?php endif; ?>

	<table class="table">
	<tr bgcolor='#CCCCCC'>
		<td>S.N</td> 
		<td>Name</td>
		<td>Age</td>
		<td>Email</td>
		<td>Update</td>
	</tr>

	<?php
	$sql = "SELECT * FROM users ORDER BY id DESC";
	$result = mysqli_query($conn, $sql);
	?>
	
	<?php foreach ($result as $key => $value) : ?>
		<tr>
			<td><?=++$key?></td>
			<td><?=$value['name']?></td>
			<td><?=$value['age']?></td>
			<td><?=$value['email']?></td>
			<td>
				<a href="edit.php?id=<?=$value['id']?>" class="btn btn-success btn-xs">Edit</a>
				<a href="delete.php?id=<?=$value['id']?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure want to delete?')">Delete</a>
			</td>
		</tr>
	<?php endforeach; ?> 
	</table>

</body>
</html>
