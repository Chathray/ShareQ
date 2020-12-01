<?php
require_once 'config.php';
session_start();
if (isset($_POST["togg"])) {
	$docid = $_POST["togg"];
	$userid = $_POST["userid"];

	$result = $connection->query("SELECT * FROM favs WHERE userid='$userid' AND docid = '$docid'");

	if (!$result) {
		die('Invalid query: '.$connection->error);
	}
	// Ưa thích
	elseif (mysqli_num_rows($result) == 0) {
		if ($connection->query("INSERT INTO favs (docid, userid) VALUES ('$docid', '$userid')")) 
			echo "Add Complete!";
		else
			echo "0";     	
	}
	// Bỏ ưa thích
	else {
		if ($connection->query("DELETE FROM favs WHERE docid = '$docid' AND userid = '$userid'")) 
			echo "Remove Complete!";
		else
			echo "0";     	
	}
}
elseif (isset($_POST["check"])) {
	$docid = $_POST["check"];
	$userid = $_POST["userid"];

	$result = $connection->query("SELECT * FROM favs WHERE userid='$userid' AND docid = '$docid'");
	if (!$result) {
		die('Invalid query: '.$connection->error);
	}
	elseif (mysqli_num_rows($result) == 0) 
		echo "0";
	else echo "1";
}

else echo "0";
?>