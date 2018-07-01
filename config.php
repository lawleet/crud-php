<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'test');
if ($conn == false) {
	echo "Database not connected";
}else
// check if database is connected, if yes, omit this code {
	echo "Database connected";
	?
?>
