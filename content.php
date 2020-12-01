<?php 

// Điều hướng danh mục trong sidebar
require_once 'php/config.php';

if(isset($_POST["sideid"]))
  $state = $_POST["sideid"];
else
  $state = null;

if(isset($_POST["ownerid"]))
  $ownerid = $_POST["ownerid"];
else
  $ownerid = null;

if(isset($_POST["loged"]))
  $loged = $_POST["loged"];
else
  $loged = null;


// Duyệt danh mục từ sidebar
if($state != null)
{
  switch ($state)
  {
    case '1':
      require_once('view_details.php');
      break;
      
    case '2':
      require_once('view_gallery.php');
      break;

    case '3':
      require_once('view_shared.php');
      break;

    case '4':
      require_once('view_favorites.php');
      break;
    
    default:
      require_once('view_details.php');
      break;
  }
}

// Duyệt thông báo từ topbar
elseif (isset($_POST["rss-id"])) {
  require_once('view_rss.php');
}

?>
