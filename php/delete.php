<?php
if (isset($_POST["id"])) {
	
	require_once 'config.php';
	session_start();

	$id = $_POST["id"];

	$sqlString = "SELECT url FROM docs WHERE id = '$id'";
	$result = $connection->query($sqlString);
	$row = mysqli_fetch_array($result);

	$path = '../data/' . $row['url'];

	if(file_exists($path)) unlink($path);
	else 
	{
		echo "File not exists!";
		return;
	}

	$sql = "DELETE FROM `docs` WHERE `id` = '$id'";
	if ($connection->query($sql) !== TRUE)
	{
		echo "Error: " . $sql . "<br>" . $connection->error;
		return;
	}
	$sql = "DELETE FROM `favs` WHERE `docid` = '$id'";
	if ($connection->query($sql) !== TRUE)
	{
		echo "Error: " . $sql . "<br>" . $connection->error;
		return;
	}
	echo "1";
}
else return;
?>