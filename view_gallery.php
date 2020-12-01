<?php

// Yêu cầu tải trang có tìm kiếm
if(isset($_POST['skey']))
{
  $sql = "SELECT * FROM docs";
}

// Yêu cầu tải trang bình thường
else
{
  require_once('php/pagination.php');

  $per_page = 18;
  $total_tiles = $connection->query('SELECT COUNT(*) FROM docs')->fetch_row()[0];

  $nav = new Pagination($per_page, $total_tiles);

  if($_POST['page'] == 'undefined') $page = 1;
  elseif($_POST['page'] == 'First') $page = 1;
  elseif($_POST['page'] == 'Last') $page = $nav->pages();
  else $page = $_POST['page'];

  $nav->page = $page;
  $offset = $nav->start();

  $sql = "SELECT * FROM docs LIMIT $offset, $per_page";
}

$result = $connection->query($sql);
$arr_docs = [];
if ($result->num_rows > 0)
  $arr_docs = $result->fetch_all(MYSQLI_ASSOC);
else
{
  echo '<div class="h6">No data available in your space!</div>';
  return;
}
?>


<div class="container m-0 p-0 mt-2">
  <div class="row text-center text-lg-left">
    <?php
    foreach($arr_docs as $doc)
    {
      if(isset($_POST['skey'])) { 
      if(stripos($doc['title'], $_POST['skey']) !== false || $_POST['skey'] == '') 

      echo
      '<div class="col-xl-2 col-lg-3 col-sm-4 mb-4 col-6">
          <div class="hvr-scale card card-figure border-0 shadow">
              <figure class="figure">
                  <div class="figure-img">
                      <img class="img-fluid" src="img/gallery.png"/>
                      <div class="figure-tools">
                          <a href="javascript:void(0)" class="tile mr-auto" onclick="CopyLink('.$doc['id'].')">
                              <i class="far fa-copy"></i>
                          </a>
                          <span class="badge badge-lg badge-danger">'.$doc['ext'].'</span>
                      </div>
                  </div>

                  <figcaption class="figure-caption card-body pt-0">
                      <div class="figure-title dwl-doc" onclick="Download('.$doc['id'].')">
                          <a class="mb-0 dwl-doc" title="'.$doc['title'].'" onclick="Download('.$doc['id'].')">'.$doc['title'].'</a>
                      </div>
                      <div class="text-gray-500">
                          <i class="fa fa-genderless mr-1"></i>'.$doc['ownerid'].'
                      </div>
                      <div class="text-gray-500">
                          <i class="fa fa-angle-right mr-1"></i>'.$doc['year'].'
                      </div>
                  </figcaption>
              </figure>
          </div>
      </div>';
    }

      else
      echo
      '<div class="col-xl-2 col-lg-3 col-sm-4 mb-4 col-6">
          <div class="hvr-scale card card-figure">
              <figure class="figure">
                  <div class="figure-img">
                      <img class="img-fluid" src="img/gallery.png"/>
                      <div class="figure-tools">
                          <a href="javascript:void(0)" class="tile mr-auto" onclick="CopyLink('.$doc['id'].')">
                              <i class="far fa-copy"></i>
                          </a>
                          <span class="badge badge-lg badge-danger">'.$doc['ext'].'</span>
                      </div>
                  </div>

                  <figcaption class="figure-caption card-body pt-0">
                      <div class="figure-title dwl-doc" onclick="Download('.$doc['id'].')">
                          <a class="mb-0 dwl-doc" title="'.$doc['title'].'" onclick="Download('.$doc['id'].')">'.$doc['title'].'</a>
                      </div>
                      <div class="text-gray-500">
                          <i class="fa fa-genderless mr-1"></i>'.$doc['ownerid'].'
                      </div>
                      <div class="text-gray-500">
                          <i class="fa fa-angle-right mr-1"></i>'.$doc['year'].'
                      </div>
                  </figcaption>
              </figure>
          </div>
      </div>';
    }
    ?>
  </div>
</div>


<?php if(isset($_POST['skey'])) return; ?>


<div class="row">
  <div class="col-sm-12 col-md-5">
  <?php echo $nav->info('Showing {start} to {end} of {total} entries'); ?>
</div>

<script type="text/javascript">
    //
    $('.page-item').click(function() {
        
        if($(this).hasClass('disabled')) return;

        var owner = $('#user-id').prop('textContent');
        var loged = ($('.mngx').length !== 0);

        var cur = $('.page-item.active').text();
        var txt = $(this).text();

        if(txt == "←") cur = parseInt(cur) - 1;
        else
        if(txt == "→") cur = parseInt(cur) + 1;
        else
        if(txt != "First" && txt != "Last") cur = parseInt(txt);
        else cur = txt;

        var str = "sideid=2"+ "&ownerid=" +owner+ "&loged=" +loged+ "&page=" + cur; 
        LoadDataPage(str);

        var instance = OverlayScrollbars(document.body,
        {});

        instance.scroll(0, 200,
        {
            x: "linear",
            y: "easeOutSine"
        });
    });

</script>

<div class="col-sm-12 col-md-7">
<?php
  $nav->url = '#';
  echo $nav->get_html('themes/bootstrap'); # Load Configuration from Theme File
?>
</div>
</div>