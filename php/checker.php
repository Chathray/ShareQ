<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{	
	if(!empty($_POST['ajax']))
	{
		require_once 'config.php';
		session_start();
	}

	// Check Login
	if (!empty($_POST['lgnID']))
	{
		$id = mysqli_real_escape_string($connection, $_POST['lgnID']);
		$pass = mysqli_real_escape_string($connection, $_POST['lgnPass']);

		$sqlString = "SELECT * FROM users WHERE id = '$id'";

		$result = $connection->query($sqlString);

		$row = mysqli_fetch_array($result);
		if (!$row || ($row['password'] != $pass))
		{
			$error = "Login failed.";
			$_SESSION['user_name'] = "Guest";
		}
		else
		{
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['user_name'] = $row['username'];
			$_SESSION['user_pass'] = $row['password'];
			$_SESSION['user_email'] = $row['email'];
		}
	}

    // Check Signup
	else if(!empty($_POST['rgtID']))
	{
		$id = $_POST['rgtID'];
		$password = $_POST['rgtPass'];
		$rePassword = $_POST['rgtRePass'];

		if ($password != $rePassword) {
			$error = "Password incorrect.";
		}
		else
		{
			$sqlString = "SELECT * FROM users WHERE id = '$id'";

			$result = $connection->query($sqlString);

			if (mysqli_num_rows($result) > 0) {
				$error = "ID already exists.";
			}

			$sqlString = "INSERT INTO users (id, password, username) VALUES ('$id', '$password', 'Fresher')";
			if (!$connection->query($sqlString)) {
				$error = "Uncomplete!";
			}     
		}
	}
	else $error = "Empty data submission!";
}

if (isset($_SESSION['user_name']) && ($_SESSION['user_name'] != "Guest"))
	$isLoggedIn = true;
else
{
	$isLoggedIn = false;
	$_SESSION['user_name'] = "Guest";
}    

// Xử lí lỗi gọi từ ajax
if(!empty($_POST['ajax']) && !empty($error)) echo "0";
?>