<?php include('../includes/header.php');?>
<?php include('includes/ceramic_menu.php');?>



<div class="container size-container">
    <div class="row">
        <?php
            $sql_size = "SELECT * FROM categories where type='wall'";
            $res0 = $conn->query($sql_size);
            if ($res0 == true) {
                $row0 = $res0->fetch_assoc();

                $title1 = $row0['type'];
            }
  
        ?>
        <div class="col-md-4">
        <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                      <?php echo $title1;?> Tiles
                    </h3>
                </div>
           


                <ul class="list-group">

                <?php
              
                $sql1 = "SELECT sizes.sizes,sizes.Ref_size,categories.type FROM ((sizes
                JOIN sizes_has_categories ON sizes.id = sizes_has_categories.sizes_id)
                JOIN categories ON categories.id = sizes_has_categories.categories_id) WHERE categories.type='WALL'order by sizes.sizes asc";
                $res = $conn->query($sql1);
                if ($res == true) {
                    $count = $res->num_rows;

                    if ($count >0) {
                        while ($row = $res->fetch_assoc()) {
                            ?>
                            <a href="../ceramics/wall.php#<?php echo $row['Ref_size'];?>" class="list-group-item list-group-item-action"><?php echo $row['sizes'];?> <i class="fas fa-chevron-right size-icon"></i></a>

                        <?php
                                    }
                                } else {
                                    echo "No Data";
                                }
                            }
                        ?>

                   
                </ul>
            </div>


        </div>
        <!-- col-md-6 ends -->


        <?php
            $sql_size = "SELECT * FROM categories where type='floor'";
            $res0 = $conn->query($sql_size);
            if ($res0 == true) {
                $row0 = $res0->fetch_assoc();

                $title2 = $row0['type'];
            }
  
        ?>

        <div class="col-md-4">
        <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    <?php echo $title2;?> Tiles
                    </h3>
                </div>
                <ul class="list-group">
                <?php
              
              $sql2 = "SELECT sizes.sizes, categories.type FROM ((sizes
              JOIN sizes_has_categories ON sizes.id = sizes_has_categories.sizes_id)
              JOIN categories ON categories.id = sizes_has_categories.categories_id) WHERE categories.type='FLOOR'order by sizes.sizes asc";
              $res2 = $conn->query($sql2);
              if ($res2 == true) {
                  $count2 = $res2->num_rows;

                  if ($count2 >0) {
                      while ($row2 = $res2->fetch_assoc()) {
                          ?>
                          <a href="../ceramics/floor.php" class="list-group-item list-group-item-action"><?php echo $row2['sizes'];?> <i class="fas fa-chevron-right size-icon"></i></a>

                      <?php
                                  }
                              } else {
                                  echo "No Data";
                              }
                          }
                      ?>
                </ul>
            </div>


        </div>
        <!-- col-md-6 ends -->
        <?php
            $sql_size = "SELECT * FROM categories where type='roof' ";
            $res0 = $conn->query($sql_size);
            if ($res0 == true) {
                $row0 = $res0->fetch_assoc();

                $title3 = $row0['type'];
            }
  
        ?>

        <div class="col-md-4">
        <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    <?php echo $title3;?> Tiles
                    </h3>
                </div>
                <ul class="list-group">
                <?php
              
              $sql2 = "SELECT sizes.sizes, categories.type FROM ((sizes
              JOIN sizes_has_categories ON sizes.id = sizes_has_categories.sizes_id)
              JOIN categories ON categories.id = sizes_has_categories.categories_id) WHERE categories.type='roof' order by sizes.sizes asc";
              $res2 = $conn->query($sql2);
              if ($res2 == true) {
                  $count2 = $res2->num_rows;

                  if ($count2 >0) {
                      while ($row2 = $res2->fetch_assoc()) {
                          ?>
                          <a href="../ceramics/roof.php" class="list-group-item list-group-item-action"><?php echo $row2['sizes'];?> <i class="fas fa-chevron-right size-icon"></i></a>

                      <?php
                                  }
                              } else {
                                  echo '<div class="text-center"> No Data </div>';
                              }
                          }
                      ?>
                </ul>
            </div>


        </div>
        <!-- col-md-6 ends -->

    </div>
    <!-- Row ends -->

</div>
<!-- Container ends -->

<?php include('includes/ceramic_footer.php');?>

<?php include('../includes/footer.php');?>