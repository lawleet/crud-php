<?php

// including database connection file
require_once('config.php');

if (isset($_POST['update'])) {
	$id = $_POST['id'];

	$name = $_POST['name'];
	$age = $_POST['age'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$description = $_POST['description'];

	// checking the empty fileds
	if (empty($name) || empty($age) || empty($email) || empty($password) || empty($description)) {
		if (empty($name)) {
			echo "<font color = 'red'> Name field is empty. </font>";
		}
		if (empty($age)) {
			echo "<font color = 'red'> Age field is empty. </font>";
		}
		if (empty($email)) {
			echo "<font color ='red'> Email field is empty. </font>";
		}
		if (empty($password)) {
 			echo "< font color = 'red'> Password* field is empty. </font>";
 		}
 		if (empty($description)) {
 			echo "< font color = 'red'> Description* field is empty. </font>";
 		}

	} else {
		// update the table
		$sql = "UPDATE users SET name='$name', age='$age', email= '$email', password='$password', description='$description' WHERE id=" . $id;
		$result = mysqli_query($conn, $sql);
		if ($result==true) {
			$_SESSION['success']='Updated successfully';
			// redirect to the display page
		header('location:index.php');
		exit();
		}else{
			$_SESSION['error']='Not updated';
			header('location:index.php');
			exit();
		}
	}
// }else{
// 	$_SESSION['error'] = "Invalid access";
// 	header('location:index.php');
// 	exit();
// }
}

?>

<?php
// getting the id from url
$id = $_GET['id'];

// select data acssociated with this particular id 

$sql = "SELECT * FROM users WHERE id=" . $id;
$result = mysqli_query($conn, $sql);

while ($res = mysqli_fetch_array($result)) {
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data</title>
	<link rel="stylesheet" href="/CRUD/bootstrap/css/bootstrap.css">
</head>
<body>

<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<br>
					<a href="index.php"><h2><i class="glyphicon glyphicon-home"></i> Home</h2></a>
					<h1><i class="glyphicon glyphicon-edit"></i> Edit Records</h1>
						<hr>

					<form name="form1" action="edit.php" method="post">
					<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">	

					<div class="form-group">
						<label for="nam">Name</label>
						<input type="text" name="name" value="<?php echo $name;?>" autofocus class="form-control">
					</div>

					<div class="form-group">
						<label for="ag">Age</label>
						<input type="number" name="age" value="<?php echo $age;?>" class="form-control">
					</div>

					<div class="form-group">
						<label for="ema">Email</label>
						<input type="text" name="email" value="<?php echo $email;?>" class="form-control">
					</div>

					<div class="form-group">
						<label for="pass">Password</label>
						<input type="password" name="password" value="<?php echo $password;?>" class="form-control">
					</div>

					<div class="form-group">
						<label for="desc">Description</label>
						<textarea name="description" value="<?php echo $description;?>" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<button name="update" class="btn btn-info">Update</button>
					</div>
					</form>

				</div>
			</div>
		</div>

</body>
</html>
