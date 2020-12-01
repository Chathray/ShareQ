<?php
  $appname =  'Share<sup>2Q</sup>';

  $dbhost  = 'localhost';    // Unlikely to require changing
  $dbname  = 'share2q';   // Modify these...
  $dbuser  = 'root';   // ...variables according
  $dbpass  = '';   // ...to your installation

  $image = array ( 'jpg', 'jpeg', 'png', 'gif', 'ico', 'svg');
  $archiver = array( 'zip', 'rar', '7z', 'gz', 'tar');
  $document = array ( 'ppt', 'xls', 'doc', 'pptx', 'xlsx', 'docx', 'pdf', 'epub');

  $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  mysqli_set_charset($connection,"utf8");

  if ($connection->connect_error) die("Fatal Error");


  /**
 * @return string Generated ID.
 */
function generateID() {

  // Generate id based on the current microtime
  $id = str_replace('.', '', sprintf("%015.4f", microtime(true)));

  // Return id as a string. Don't convert the id to an integer
  // as 14 digits are too big for 32bit PHP versions.
  return $id;
}
?>