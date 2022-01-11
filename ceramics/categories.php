<?php include('../includes/header.php');?>
<?php include('includes/ceramic_menu.php');?>


<div class="container mt-4">
    <div class="row   ">
        <div class=" col-md-4 d-flex flex-row justify-content-around">
          <?php
          $sql01 =  "SELECT * FROM CATEGORIES where type='wall'";
          $res01 =  $conn->query($sql01);
          if($res01 == TRUE){
           $row01 = $res01->fetch_assoc();
          }
          
          ?>

              <div class="square-flip">
                  <div class='square' data-image="../assets/images/2-a.jpg">
                    <div class="square-container">
                      <div class="align-center"></div>
                      <h2 class="textshadow"><?php echo $row01['type'];?></h2>
                      <h3 class="textshadow">All <?php echo $row01['type'];?> Tiles</h3>
                    </div>
                    <div class="flip-overlay"></div>
                  </div>
                  <div class='square2' data-image="../assets/images/2-b.jpg">
                    <div class="square-container2">
                      <div class="align-center"></div>
                      <a href="<?php echo SITE_URL;?>ceramics/wall.php" target="_self" class="boxshadow card-button">View All <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                    <div class="flip-overlay"></div>
                  </div>
                </div>

        </div>
        <div class="col-md-4 d-flex flex-row justify-content-around">
        <?php
          $sql02 =  "SELECT * FROM CATEGORIES where type='floor'";
          $res02 =  $conn->query($sql02);
          if($res02 == TRUE){
           $row02 = $res02->fetch_assoc();
          }
          
          ?>

              <div class="square-flip">
                  <div class='square' data-image="../assets/images/2-a.jpg">
                    <div class="square-container">
                      <div class="align-center"></div>
                      <h2 class="textshadow"><?php echo $row02['type'];?></h2>
                      <h3 class="textshadow">All Floor Tiles</h3>
                    </div>
                    <div class="flip-overlay"></div>
                  </div>
                  <div class='square2' data-image="../assets/images/2-b.jpg">
                    <div class="square-container2">
                      <div class="align-center"></div>
                      <a href="<?php echo SITE_URL;?>ceramics/floor.php" target="_self" class="boxshadow card-button">View All <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                    <div class="flip-overlay"></div>
                  </div>
                </div>

        </div>
        <div class="col-md-4 d-flex flex-row justify-content-around">
        <?php
          $sql03 =  "SELECT * FROM CATEGORIES where type='roof'";
          $res03 =  $conn->query($sql03);
          if($res03 == TRUE){
           $row03 = $res03->fetch_assoc();
          }
          
          ?>
<div class="square-flip">
    <div class='square' data-image="../assets/images/2-a.jpg">
      <div class="square-container">
        <div class="align-center"></div>
        <h2 class="textshadow"><?php echo $row03['type'];?></h2>
        <h3 class="textshadow">All <?php echo $row03['type'];?> Tiles</h3>
      </div>
      <div class="flip-overlay"></div>
    </div>
    <div class='square2' data-image="../assets/images/2-b.jpg">
      <div class="square-container2">
        <div class="align-center"></div>
        <a href="<?php echo SITE_URL;?>ceramics/roof.php" target="_self" class="boxshadow card-button">View All <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
      </div>
      <div class="flip-overlay"></div>
    </div>
  </div>

</div>
 
            
      </div>
      <!-- row ends -->
    </div>
    <!-- container ends -->




<?php include('includes/ceramic_footer.php');?>

<?php include('../includes/footer.php');?>