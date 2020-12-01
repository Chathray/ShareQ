<?php
if(isset($_POST["id"])) {
	require_once 'config.php';
	session_start();

	$id = $_POST['id'];
	$name = $_POST['name'];
	$pass = $_POST['pass'];
	$email = $_POST['email'];

	$sqlString = "UPDATE users SET username = '$name', password = '$pass', email = '$email' WHERE id = '$id'";

	if ($connection->query($sqlString)) {

		$_SESSION['user_id'] = $id;
		$_SESSION['user_name'] = $name;
		$_SESSION['user_pass'] = $pass;
		$_SESSION['user_email'] = $email;

		echo 'Update successfully!';
	}
	else
		echo 'Invalid';
}
?>