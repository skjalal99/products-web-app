


<!-- ======== sidebar-nav start =========== -->
<aside class="sidebar-nav-wrapper">

<div class="navbar-logo">
  <a href="index.php">
    <img src="../assets/images/ceramic.png" height='50'alt="logo" />
  </a>
</div>

<!-- ======= Ceramic ========= -->
<nav class="sidebar-nav">
  <!-- ===single item=== -->
  <ul>
      <li class="nav-item ">
        <a href="<?php echo SITE_URL1;?>admin/users.php" ><span class="icon"><i class="fas fa-user"></i></span>
          <span class="text">User Control</span>
        </a>
      </li>
    </ul>
  <!-- ===single item ends=== -->
  <!-- ===single item=== -->
    <ul>
      <li class="nav-item ">
        <a href="<?php echo SITE_URL1;?>admin/index.php" ><span class="icon"><i class="fas fa-user"></i> </span>
          <span class="text">Dashboard All</span>
        </a>
      </li>
    </ul>
    <!-- ===single item ends=== -->
    <ul>
      <li class="nav-item nav-item-has-children">
        <a href="#0" data-bs-toggle="collapse" data-bs-target="#d1">
          <span class="icon">
          <i class="fas fa-user"></i>
          </span>
          <span class="text">Ceramic</span>
        </a>
        <ul id="d1" class="collapse show dropdown-nav menu"> 
          <!-- show -->
          
          <li>
            <a href="<?php echo SITE_URL1;?>admin/ceramics/categories.php?page=cat" class="">Categories</a>
          </li>
          <li>
            <a href="<?php echo SITE_URL1;?>admin/ceramics/sizes.php?page=size" class="">Sizes</a>
          </li>
          
          <li>
            <a href="<?php echo SITE_URL1;?>admin/ceramics/tiles-upload.php?page=atiles" class="">Add Tiles</a>
          </li>
          <li>
            <a href="<?php echo SITE_URL1;?>admin/ceramics/product-modal.php?page=modals" class="">Modals</a>
          </li>
          <li>
            <a href="<?php echo SITE_URL1;?>admin/ceramics/properties.php" class="">Properties</a>
          </li>
        </ul>
      </li>
<!-- ======= Ceramic ends========= -->
<!-- ======= PLASTIC ========= -->
    <ul>
      <li class="nav-item nav-item-has-children">
        <a href="#1" data-bs-toggle="collapse" data-bs-target="#d2">
          <span class="icon">
          <i class="fas fa-user"></i>
          </span>
          <span class="text">Plastic</span>
        </a>
        <ul id="d2" class="collapse  dropdown-nav">
          <li>
            <a href="<?php echo SITE_URL1;?>admin/index.php" class="active">page-1</a>
          </li>
          <li>
            <a href="<?php echo SITE_URL1;?>admin/index.php" class=""> page-2 </a>
          </li>
        </ul>
      </li>
<!-- ======= PLASTIC ends========= -->  
<!-- ======= Electric Water Heater ========= -->
<ul>
      <li class="nav-item nav-item-has-children">
        <a href="#1" data-bs-toggle="collapse" data-bs-target="#d3">
          <span class="icon">
          <i class="fas fa-user"></i>
          </span>
          <span class="text">EWH</span>
        </a>
        <ul id="d3" class="collapse  dropdown-nav">
          <li>
            <a href="<?php echo SITE_URL1;?>admin/index.php" class="active"> page-1 </a>
          </li>
          <li>
            <a href="<?php echo SITE_URL1;?>admin/index.php" class=""> Page-2 </a>
          </li>
        </ul>
      </li>
<!-- ======= Electric Water Heater ends ========= -->     
    
 </nav>

</aside>

<div class="overlay"></div>
<!-- ======== sidebar-nav end =========== -->
