
<?php

$sql = "SELECT * FROM favs WHERE userid ='$ownerid'";
$result = $connection->query($sql);
$arr_docs = [];
if ($result->num_rows > 0)
{
  $arr_docs = $result->fetch_all(MYSQLI_ASSOC);
}
else
{
  echo '<div class="h6">No data available in your space!</div>';
  return;
}
?>


<div class="container m-0 p-0">
  <div class="row">
    <?php
    foreach($arr_docs as $doc)
    {
      $di = $doc['docid'];
      $ui = $connection->query("SELECT ownerid FROM docs WHERE `id` = '$di'")->fetch_object()->ownerid;
      $name = $connection->query("SELECT title FROM docs WHERE `id` = '$di'")->fetch_object()->title;
      $ext = $connection->query("SELECT ext FROM docs WHERE `id` = '$di'")->fetch_object()->ext;

      $auth = $connection->query("SELECT username FROM users WHERE `id` = '$ui'")->fetch_object()->username;

      if(isset($_POST['skey'])) {
      if (stripos($name, $_POST['skey']) !== false || $_POST['skey'] == '') 

      echo
      '<div class="col-xl-2 col-md-6 mb-4 col-6 card-figure">
      <div class="hvr-scale card border-0 shadow figure">
      <div class="figure-img">
      <img src="img/favorites.png" class="card-img-top cpy-link" title="Copy link" onclick="CopyLink('.$di.')">
      <div class="figure-tools">
      <a href="javascript:void(0)" class="tile mr-auto" onclick="ToggleStars('.$di.', true)">
      <i class="fa fa-star"></i>
      </a>
      <span class="badge badge-lg badge-danger">'.$ext.'</span>
      </div>

      </div>
      <div class="text-truncate card-body">
      <i class="fas fa-xs fa-arrow-down mr-1"></i>
      <a class="mb-0 dwl-doc" title="'.$name.'" onclick="Download('.$di.')">'.$name.'</a>
      <div class="text-gray-500 text-xs">
      <i class="fas fa-user fa-xs mr-1"></i>'.$auth.'
      </div>
      </div>
      </div>
      </div>';
      }

      else
      echo
      '<div class="col-xl-2 col-md-6 mb-4 col-6 card-figure">
      <div class="hvr-scale card card-figure m-0 p-0">
      <div class="figure-img">
      <img src="img/favorites.png" class="card-img-top cpy-link" title="Copy link" onclick="CopyLink('.$di.')">
      <div class="figure-tools">
      <a href="javascript:void(0)" class="tile mr-auto" onclick="ToggleStars('.$di.', true)">
      <i class="fa fa-star"></i>
      </a>
      <span class="badge badge-lg badge-danger">'.$ext.'</span>
      </div>

      </div>
      <div class="text-truncate card-body">
      <i class="fas fa-xs fa-arrow-down mr-1"></i>
      <a class="mb-0 dwl-doc" title="'.$name.'" onclick="Download('.$di.')">'.$name.'</a>
      <div class="text-gray-500 text-xs">
      <i class="fas fa-user fa-xs mr-1"></i>'.$auth.'
      </div>
      </div>
      </div>
      </div>';
    }
    ?>
  </div>
</div>