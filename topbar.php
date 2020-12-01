<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top">
   <!-- Sidebar Toggle (Topbar) -->
   <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
   <i class="fa fa-bars"></i>
   </button>
   <!-- Topbar Search -->
   <form class="d-none d-sm-inline-block form-inline ml-md-3 my-2 my-md-0 mw-100 navbar-search">
      <div class="input-group input-group-sm">
         <input type="search" class="form-control rounded-pill-left border-0 bg-light" id="sdfCM" placeholder="Search for..." aria-controls="dataGrid">
         <span class="input-group-append">
            <button class="btn-search btn btn-primary rounded-pill-right" type="button">
            <i class="fas fa-search fa-sm"></i>
            </button>
         </span>
      </div>
   </form>
   <!-- Topbar Navbar -->
   <ul class="navbar-nav ml-auto">
      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
      <li class="nav-item dropdown no-arrow d-sm-none">
         <div class="nav-link dropdown-toggle" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-search fa-fw"></i>
         </div>
         <!-- Dropdown - Messages -->
         <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
               <div class="input-group">
                  <input type="search" class="form-control bg-light border-0 small" id="sdfXS" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                     <button class="btn-search btn btn-primary" type="button">
                     <i class="fas fa-search fa-sm"></i>
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </li>
      <?php
      if($isLoggedIn)
         echo
         '<!-- Nav Item - Add -->
         <li class="nav-item no-arrow mx-1" data-toggle="tooltip" title="Upload from local">
            <i class="fas fa-upload import-cmd nav-link"></i>
            <input id="afile" type="file" multiple style="display: none;" onchange="Upload(this.files)"/>
         </li>
         <!-- Nav Item - Add -->
         <li class="nav-item no-arrow mx-1" data-toggle="tooltip" title="Upload from link">
            <i class="fa fa-globe import-url nav-link"></i>
         </li>';
      ?>
      <!-- Nav Item - Alerts -->
      <li class="nav-item dropdown no-arrow mx-1">
         <div class="nav-link dropdown-toggle" data-toggle="dropdown">
            <i class="fas fa-rss fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter">1+</span>
         </div>
         <!-- Dropdown - Alerts -->
         <div class="dropdown-list dropdown-menu dropdown-menu-right shadow-sm animated--fade-in" aria-labelledby="alertsDropdown">
            <?php
               $sqlString = "SELECT * FROM news";
               $news = $connection->query($sqlString);

               while($row_news = mysqli_fetch_array($news))
               {
                  if($row_news['state'] == 1)
                  $state = 'bg-gradient-success';
                  else if($row_news['state'] == 0)
                  $state = 'bg-gradient-danger';
                  else
                  $state = 'bg-gradient-alert';

                  echo
                  '<div stt="'.$row_news['id'].'" class="top-rss dropdown-item d-flex align-items-center">
                     <div class="dropdown-list-image mr-3">
                        <div class="icon-circle '.$state.'">
                           <i class="fas fa-wave-square text-white"></i>
                        </div>
                     </div>
                     <div class="font-weight-nomal">
                        <div class="text-truncate">'.$row_news['header'].'</div>
                        <div class="small text-gray-500">'.$row_news['time'].'</div>
                     </div>     
                  </div>';
               }

               if($isLoggedIn)
                  $ava = $_SESSION['user_name'];
               else
                  $ava = "Guest ";
            ?>
         </div>
      </li>
      <div class="topbar-divider d-none d-sm-block"></div>
      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
         <div class="nav-link dropdown-toggle" data-toggle="dropdown">
         <span class="mr-2 d-none d-lg-inline text-gray-800" id="user-naming"><?php echo $ava; ?></span>
            <div class="avatar-initials" width="32" height="32" data-name="<?php echo $ava; ?>"></div>
         </div>
         <!-- Dropdown - User Information -->
         <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
            <?php
               if($isLoggedIn) echo
               '<div class="dropdown-item" data-toggle="modal" data-target="#accountModal">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Account
               </div>';
               ?>
            <div class="dropdown-item" data-toggle="modal" data-target="#settingModal">
            <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i> Settings
            </div>
            <div class="dropdown-divider"></div>
            <div class="dropdown-item" onclick="ShowGuide()">
            <i class="fas fa-seedling fa-sm fa-fw mr-2 text-gray-400"></i> Guide
            </div>
            <div class="dropdown-item" onclick="About()">
            <i class="fas fa-question fa-sm fa-fw mr-2 text-gray-400"></i> About
            </div>
            <div class="dropdown-divider"></div>
            <?php
               if($isLoggedIn) echo
               '<div class="signout-cmd dropdown-item">
                  <i class="fas fa-power-off fa-sm fa-fw mr-2 text-gray-400"></i>
                  Sign out
               </div>';
               else echo
               '<div class="dropdown-item" data-toggle="modal" data-target="#loginModal">
                  <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Sign in
               </div>';
               ?>
         </div>
      </li>
   </ul>
</nav>


