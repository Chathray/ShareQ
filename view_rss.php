<?php

$h = $_POST['rss-id'];

$sqlString = "SELECT `content` FROM `news` WHERE `id` = '$h'";
$result = $connection->query($sqlString);
$row = mysqli_fetch_array($result);


echo $row["content"];
?>

