<?php

require_once 'config.php';
session_start();

// lấy file từ link và lưu vào server
if (isset($_POST["url-server"])) {    
    $file_name = '../data/' . basename($_POST["url-server"]);

    $info = pathinfo($file_name);
    $exts = strtolower($info['extension']);

    if (in_array($exts, $image) || in_array($exts, $archiver) || in_array($exts, $document)) 
    {
     if(!@copy($_POST["url-server"], $file_name))
     {
         $errors= error_get_last();
         echo "COPY ERROR: ".$errors['type'];
         echo "<br/>\n".$errors['message'];
     }
     else
     {
        $id = generateID();
        $ownerid = $_POST['ownerid'];
        $url = uniqid().'.'.$exts;
        $year = date("Y");
        $fileSize = FormatSizeUnits(filesize($file_name));
        $title = $info["filename"];

        if(in_array($exts, $image) || in_array($exts, $archiver))
            $pageCount = "uncountable";
        else
            $pageCount = "incomplete";

        rename($file_name, $info["dirname"]."/".$url);


        $sql = "INSERT INTO docs (id, ownerid, title, year, url, pages, size, ext)
        VALUES ('$id', '$ownerid', '$title', $year, '$url', '$pageCount', '$fileSize', '$exts')";

        if ($connection->query($sql) === TRUE)
            echo 'File is successfully uploaded.';
        else 
            echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
else echo "Error";
}

// lấy file từ server và đưa về client
elseif (isset($_GET["id"])) {
    $id = $_GET["id"];
    $qr = mysqli_query($connection, "SELECT title, url, ext FROM docs WHERE id = '$id'");
    $re = mysqli_fetch_array($qr);

    $path = '../data/' . $re['url'];
    $title = '../data/' . $re['title'] . '.' . $re['ext'];

    // File Exists?
    if(file_exists($path)) {

    // Parse Info 
        $fsize = filesize($path);

    // Determine Content Type
        switch ($re["ext"]) {
          case "pdf": $ctype="application/pdf"; break;
          case "exe": $ctype="application/octet-stream"; break;
          case "zip": $ctype="application/zip"; break;
          case "doc": $ctype="application/msword"; break;
          case "xls": $ctype="application/vnd.ms-excel"; break;
          case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
          case "gif": $ctype="image/gif"; break;
          case "png": $ctype="image/png"; break;
          case "jpeg":
          case "jpg": $ctype="image/jpg"; break;
          default: $ctype="application/force-download";
      }

    header("Pragma: public"); // required
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false); // required for certain browsers
    header("Content-Type: $ctype");
    header("Content-Disposition: attachment; filename=\"".basename($title)."\";" );
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".$fsize);
    ob_clean();
    flush();
    readfile($path);
} 
else header('Location: ../404.html');
}

function grab_file_content($rawurl, $response = false) {
    $url = htmlspecialchars($rawurl, ENT_QUOTES | ENT_HTML5, 'UTF-8', false);
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        $file_headers = @get_headers($url);
        if (!$file_headers || $file_headers[0] === 'HTTP/1.1 404 Not Found') {
            return $response;
        }
    }
    if (is_callable('curl_init')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);
        curl_close($ch);
    }
    if (empty($response) || !is_callable('curl_init')) {
        $opts = array('http' => array('header' => 'Connection: close'));
        $context = stream_context_create($opts);
        $headers = get_headers($url);
        $httprequest = substr($headers[0], 9, 3);
        if ($httprequest == '200') {
            $response = @file_get_contents($url, false, $context);
        }
    }
    return $response;
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

?>