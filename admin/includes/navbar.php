  
<!-- ========== header start ========== -->
<header class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
              <div class="header-left d-flex align-items-center">
                <div class="menu-toggle-btn mr-20">
                  <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                  <i class="fa fa-arrow-circle-left" id="toggle-arrow" aria-hidden="true"></i> Menu
                  </button>
                </div>
                <div class="header-search d-none d-md-flex">
                  <form action="#">
                    <input type="text" placeholder="Search..." />
                    <button><i class="lni lni-search-alt"></i></button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
              <div class="header-right">
               <a href="<?php echo SITE_URL1;?>ceramics/index.php" target="_blank" class="btn-sm btn-success mx-2">Visit Ceramics</a>
               <a href="<?php echo SITE_URL1;?>admin/logout.php" class="btn-sm btn-warning mx-2">Logout</a>
               <a href="#" class="btn-sm btn-primary"><?php if(isset($_SESSION['User-Login'])){echo $_SESSION['User-Login'];}?></a>
               
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- ========== header end ========== -->

    