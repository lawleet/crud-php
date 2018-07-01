 <!DOCTYPE html>
 <html>
 <head>
 	<title>Add Data</title>
 </head>
 <body>
 
 <?php

 require_once('config.php');

 if (isset($_POST['submit'])) {
 	$name = $_POST['name'];
 	$age = $_POST['age'];
 	$email = $_POST['email'];
 	$password = md5($_POST['password']);
 	$description = $_POST['description'];

 	// check empty fields
 	if (empty($name) || empty($age) || empty($email) || empty($password) || empty($description)) {
 		if (empty($name)) {
 			echo "<font color = 'red'> Name* field is empty.</font> </br>";
 		}
 		if (empty($age)) {
 			echo "<font color = 'red'> Age* field is empty.</font> </br>";
 		}
 		if (empty($email)) {
 			echo "<font color = 'red'> Email* field is empty.</font>";
 		}
 		if (empty($password)) {
 			echo "<font color = 'red'> Password* field is empty. </font>";
 		}
 		if (empty($description)) {
 			echo "<font color = 'red'> Description* field is empty. </font>";
 		}

 		// link to the previous page

 		echo "</br> </br> <a href='javascript:self.history.back();'>Go Back </a>";
 		
 	}else{
 		// if all the fields are filled (not empty)
 		// insert data to database
 		$sql = "INSERT INTO users(name, age, email, password, description)
 				VALUES('$name', '$age', '$email', '$password', '$description')";
 		$result = mysqli_query($conn, $sql);
		if ($result==true) {
			$_SESSION['success']='User added successfully';
			// redirect to the display page
			header('location:index.php');
			exit();
		}else{
			$_SESSION['error']='Not added';
			header('location:index.php');
			exit();
		}

		 //display success message (in the same page )
        // echo "<font color='green'>User added successfully.";
        // echo "<br/><a href='index.php'>View Result</a>";
 	}
 }

 ?>
 </body>
 </html>
