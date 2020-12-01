<?php

$sql = "SELECT * FROM docs";
$result = $connection->query($sql);
$arr_docs = [];
if ($result->num_rows > 0)
  $arr_docs = $result->fetch_all(MYSQLI_ASSOC);
?>


<div class="table-responsive-sm">
    <table class="table table-striped border border-top-0 text-dark text-truncate" id="dataGrid" width="100%">
      <thead class="text-center">
        <tr>
          <th>Year</th>
          <th>Title</th>
          <th>Uploader</th>
          <th><i class="fa fa-grip-horizontal"></i></th>
          <th>Extension</th>
          <th>Pages</th>
          <th>Size</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach($arr_docs as $doc)
        {
        if($loged == 'true')
          $star_block = '<a class="d-inline-block ml-2 star-stat" id='.$doc["id"].
          ' href="javascript:ToggleStars('.$doc['id'].')"><i class="far fa-star"></i></a>';
        else 
          $star_block = null;

        echo 
        '<tr>
          <td class="text-center pr-4">
          '.$doc['year'].'
              </td>
          <td>
            <span title="'.$doc['title'].'">
              '.$doc['title'].'
            </span>
              </td>
          <td class="text-center pr-4">
          '.$doc['ownerid'].'
              </td>
          <td class="text-center pr-4">
            <a class="d-inline-block" href="php/download.php?id='.$doc['id'].'">
            <i class="far fa-arrow-alt-circle-down"></i>
            </a>
            '.$star_block.'
          </td>
          <td class="text-uppercase text-center pr-4">
          '.$doc['ext'].'
              </td>
          <td class="text-center pr-4">
          '.$doc['pages'].'
              </td>
          <td class="text-right pr-5">
          '.$doc['size'].'
              </td>
            </tr>';
          }
        ?>
      </tbody>
    </table>
</div>