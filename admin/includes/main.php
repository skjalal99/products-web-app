<!-- ========== section start ========== -->
<section class="section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>Front Dashboard</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Home
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->


          <div class="row">
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon success">
                  <i class="lni lni-cart-full"></i>
                </div>
                <?php
                    $sql = "SELECT count(*) as count1 FROM SIZES";
                    $res = $conn->query($sql);
                    $rowcount = $res->fetch_assoc();
                    $count_size = $rowcount['count1'];
                
                ?>
                <div class="content">
                  <h6 class="mb-10">Total No. of Sizes</h6>
                  <h3 class="text-bold mb-10 text-center"><?php echo $count_size;?></h3>
                  <p class="text-sm text-success">
                    <!-- <i class="lni lni-arrow-up"></i> +2.00%
                    <span class="text-gray">(30 days)</span> -->
                  </p>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon primary">
                  <i class="lni lni-dollar"></i>
                </div>
                <div class="content">
                  <?php
                      $sql1 = "SELECT count(*) as count1 FROM tiles";
                      $res1 = $conn->query($sql1);
                      $rowcount1 = $res1->fetch_assoc();
                      $count_Tiles = $rowcount1['count1'];
                  
                  ?>
                  <h6 class="mb-10">Total No. of Tiles</h6>
                  <h3 class="text-bold mb-10 text-center"><?php echo $count_Tiles;?></h3>
                  <p class="text-sm text-success">
                    <!-- <i class="lni lni-arrow-up"></i> +5.45%
                    <span class="text-gray">Increased</span> -->
                  </p>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
         
          </div>
           <!-- End Row -->
          
        
        </div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->