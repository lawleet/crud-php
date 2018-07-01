<!DOCTYPE html>
<html>
<head>
	<title>Add Record</title>
	 <link rel="stylesheet" href="/CRUD/bootstrap/css/bootstrap.css">
</head>
<body>

		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<br>
					<a href="index.php"><h2><i class="glyphicon glyphicon-home"></i> Home</h2></a>
					<h1><i class="glyphicon glyphicon-user"></i> Add Records</h1>
						<hr>

					<form name="form1" action="insert.php" method="post">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" id="name" autofocus class="form-control">
					</div>

					<div class="form-group">
						<label for="age">Age</label>
						<input type="number" name="age" id="age" class="form-control">
					</div>

					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" name="email" id="email" class="form-control">
					</div>

					<div class="form-group">
						<label for="pass">Password</label>
						<input type="password" name="password" id="pass" class="form-control">
					</div>

					<div class="form-group">
						<label for="desc">Description</label>
						<textarea name="description" id="desc" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<button name="submit" class="btn btn-info">Add</button>
					</div>
					</form>

				</div>
			</div>
		</div>
</body>
</html>
