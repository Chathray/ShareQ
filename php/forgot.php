<?php
if(isset($_POST["frgEmail"])) {

	require_once 'config.php';
	session_start();

	$to = $_POST['frgEmail'];

	$sql = "SELECT * FROM `users` WHERE email = '$to'";	
	$res = mysqli_query($connection, $sql);
	$row = mysqli_fetch_array($res);

	if($row)
	{		
		// Cần có mấy chủ mail để điều này hoạt động
		$subject = 'Forgot password';
		$message = "Please use this password to login: " . $row['password'];
		mail($to, $subject, $message);

		echo 1;
	}
	else
		echo 0;
}
?>