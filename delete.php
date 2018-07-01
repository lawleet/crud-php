<?php
//include database connection file
require_once('config.php');

// getting id of the data from url

$id = $_GET['id'];

// deleting the row from table

$sql = "DELETE FROM users WHERE id=". $id;
$result = mysqli_query($conn, $sql);
if($result==true){

	$_SESSION['success']='User deleted';
	header('location:index.php');
	exit();
			
	}else{
	$_SESSION['error']='User not deleted';
	header('location:index.php');
	exit();
	}
?>
