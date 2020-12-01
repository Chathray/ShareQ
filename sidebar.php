<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion unselectable" id="accordionSidebar">
   <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
      <div class="sidebar-brand-icon rotate-n-15">
         <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">
         <?php echo $appname; ?>
      </div>
    </a>
    <?php
      if($isLoggedIn) echo
      '<!-- Divider -->
      <hr class="sidebar-divider my-0">
      <div class="sidebar-heading mt-3 mngx">Manage</div>
      <!-- Nav Item -->
      <li class="side-content nav-item" id=3>
        <div class="nav-link">
        <i class="fas fa-fw fa-folder"></i>
        <span>Shared</span>
        </div>
      </li>
      <!-- Nav Item -->
      <li class="side-content nav-item" id=4>
        <div class="nav-link">
        <i class="fas fa-fw fa-star"></i>
        <span>Favorites</span>
        </div>
      </li>'
    ?>
   <!-- Divider -->
   <hr class="sidebar-divider">
   <!-- Heading -->
   <div class="sidebar-heading">
      Explore
   </div>
   <!-- Nav Item -->
   <li class="side-content nav-item" id=1>
      <div class="nav-link">
      <i class="fas fa-fw fa-info-circle"></i>
      <span>Details</span>
      </div>
   </li>
   <!-- Nav Item -->
   <li class="side-content nav-item" id=2>
      <div class="nav-link">
      <i class="fas fa-fw fa-border-all"></i>
      <span>Gallery</span>
      </div>
   </li>
   <!-- Divider -->
   <hr class="sidebar-divider d-none d-md-block">
   <!-- Sidebar Toggler -->
   <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
   </div>
</ul>
<!-- End of Sidebar -->