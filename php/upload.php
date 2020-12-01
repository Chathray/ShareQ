<?php
require_once 'config.php';
session_start();

if(!empty($_FILES['afile']))
{
  $id = generateID();
  $ownerid = $_POST['ownerid'];

  $fileTmpPath = $_FILES['afile']['tmp_name'];
  $fileName = $_FILES['afile']['name'];
  $fileSize = $_FILES['afile']['size'];

  $info = pathinfo($fileName);
  $fileExtension = strtolower($info['extension']);

  if (in_array($fileExtension, $image) ||
    in_array($fileExtension, $archiver) ||
    in_array($fileExtension, $document)) 
  {
    $url = uniqid().'.'.$fileExtension;

		// directory in which the uploaded file will be moved
    $dest_path = '../data/'.$url;

    if(move_uploaded_file($fileTmpPath, $dest_path))
    {
			// format info
     $fileSize = FormatSizeUnits($fileSize);			
     $fileName =  basename($fileName,'.'.$fileExtension);

     if(in_array($fileExtension, $image) || in_array($fileExtension, $archiver))
      $pageCount = "uncountable";
    else
      $pageCount = "incomplete";

    $year = date("Y");

			// query
    $sql = "INSERT INTO docs (id, ownerid, title, year, url, pages, size, ext)
    VALUES ('$id', '$ownerid', '$fileName', $year, '$url', '$pageCount', '$fileSize', '$fileExtension')";

    if ($connection->query($sql) === TRUE)
      echo 'File is successfully uploaded.';
    else 
     echo false;
 }
 else
 {
   echo false;
 }
}
else echo false;
}

function FormatSizeUnits($bytes)
{
  if ($bytes >= 1073741824)
    $bytes = number_format($bytes / 1073741824, 2) . ' GB';
  elseif ($bytes >= 1048576)
    $bytes = number_format($bytes / 1048576, 2) . ' MB';
  elseif ($bytes >= 1024)
    $bytes = number_format($bytes / 1024, 2) . ' KB';
  elseif ($bytes > 1)
    $bytes = $bytes . ' bytes';
  elseif ($bytes == 1)
    $bytes = $bytes . ' byte';
  else
    $bytes = '0 bytes';
  return $bytes;
}

function humanFilesize($size, $precision = 2)
{
  if ($size > 0) {
    $size = (int) $size;
    $base = log($size) / log(1024);
    $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

    return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
  }
  else {
    return $size;
  }
}

?>