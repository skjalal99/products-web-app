<?php include('../includes/header.php');?>

<?php include('includes/ceramic_menu.php');?>

<div class="container">



<?php
          $sql01 =  "SELECT * FROM CATEGORIES where type='Roof'";
          $res01 =  $conn->query($sql01);
          if($res01 == TRUE){
           $row01 = $res01->fetch_assoc();
          }
          
          ?>
    <h1 class="main-title">All <?php echo $row01['type'];?> Tiles</h1>
    <div class="row">

<?php

 $sql04 =  "SELECT sizes.sizes, categories.type FROM ((sizes
 JOIN sizes_has_categories ON sizes.id = sizes_has_categories.sizes_id)
 JOIN categories ON categories.id = sizes_has_categories.categories_id) where sizes.status = 'Yes'
 AND categories.type = 'Roof' ORDER BY SIZES ASC";
$res04 =  $conn->query($sql04) or die(mysqli_error());
if ($res04 == true) {
    while ($row04 = $res04->fetch_assoc()) {
        $size_s = $row04['sizes']; ?>
       <div class="row">
    <div class="col-md-12 ml-2 " id="w10"><h3 class="sub-title text-left"><?php echo $size_s; ?> </h3><div class="sub-title-border"></div>
    
    <?php
                $sql02 = "SELECT tiles.tile_model_no as tile_model,tiles.tile_img as tile_img,
                sizes.sizes as sizes, categories.type as type FROM ((tiles JOIN sizes ON tiles.sizes_id = sizes.id)
                JOIN categories ON categories.id = tiles.categories_id) WHERE categories.type='ROOF'
                AND sizes.sizes = '$size_s'";
        $res02 =  $conn->query($sql02);
        if ($res02 == true) {
            while ($row02 = $res02->fetch_assoc()) {
                $tiles2 = $row02['tile_model'];
                $tile_img2 = $row02['tile_img'];
                $type2 = $row02['type'];
                $tile_sizes2 = $row02['sizes']; ?>
  
                <div class="col-md-2">  
                            <div class="content">
                              
                                    <div class="content-overlay"></div>
                                    <img class="content-image" src="../assets/images/tiles/<?php echo $tile_img2; ?>">
                                    <div class="content-details fadeIn-left">
                                        <h4><?php echo $tiles2; ?></h4>
                                        <!-- <a href="<?php echo SITE_URL; ?>ceramics/wall.php" target="_blank" class="boxshadow card-button">View  <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a> -->
                                         <a href="#" class="btn card-button boxshadow " data-bs-toggle="modal" data-bs-target="#WallModal">View  <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                    </div>
                             
                            </div>
                </div>
                <?php
            }
        } ?> 

      
</div>
   <?php
    }
   echo" </div>";
    // <!-- Row end -->
}
   ?>       
 
   <!-- // ===tiles ends=== -->
 
</div>
<!-- container end -->

    <?php include('model-cat.php');?>  

</div>
<!-- container end -->
 


<?php include('includes/ceramic_footer.php');?>

<?php include('../includes/footer.php');?>