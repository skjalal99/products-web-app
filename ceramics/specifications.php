<?php include('../includes/header.php');?>

<?php include('includes/ceramic_menu.php');?>



<div class="container-fluid">
<h1 class="main-title">All Tiles specifcation</h1>
<!-- ==========Advanced Filter============= -->
<!-- <a href="advance-filter.php" class="btn-sm btn-outline-primary ">Advanced Filters</a> -->

        <div class="table-wrapper">
          <div class="table-responsive table-spec">
            <table class="table table-dark table-striped table-hover text-center" id="specification_tbl">
                <thead class="thead-spec">
                    <tr>
                        <th>#</th>
                        <th>Size</th>
                        <th>Model</th>
                        <th>Pictures</th>
                        <th>Thickness </br>[mm] / [cm]</th>
                        <!-- <th>Cm</th> -->
                        <th>Categories</th>
                        <th>Effect</th>
                        <th>Color</th>
                        <th>Usage</th>
                        <th>Surface</th>
                        <th>Material</th>
                        <th>Qty/Box</br>(Pcs)</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                <?php
                    
                    $sno = 1;

                    $sql = 'SELECT tiles.id as tilesid, categories.id as catid,sizes.id as sizeid,sizes.sizes,categories.type,tiles.tile_model_no,
                    tiles.tile_img,tiles.thickness,tiles.cm,tiles.effect, tiles.color,
                    tiles.usage,tiles.surface,tiles.material, tiles.qty_per_box,tiles.status1
                    FROM ((tiles JOIN sizes ON tiles.sizes_id = sizes.id)
                    JOIN categories ON categories.id = tiles.categories_id)
                    ORDER BY sizes.sizes ASC' ;

                    $res = $conn->query($sql);

                    if($res == TRUE)
                    {
                        $count = $res->num_rows;

                        if($count >0)
                        {
                          while($row = $res->fetch_assoc()) 
                          {
                            $tiles_id = $row['tilesid'] ;
                            $cat_id = $row['catid'] ;
                            $size_id = $row['sizeid'] ;
                            $sizes = $row['sizes'] ;
                            $categories = $row['type'] ;
                            $model_no = $row['tile_model_no'] ; 
                            $tile_img = $row['tile_img'] ; 
                            $thickness = $row['thickness'] ; 
                            $cm = $row['cm'] ;
                            $effect = $row['effect'] ;
                            $color = $row['color'] ;
                            $usage = $row['usage'] ;
                            $surface = $row['surface'] ;
                            $material = $row['material'] ;
                            $qty_per_box = $row['qty_per_box'] ;
                            $status = $row['status1'] ;
                  ?>
                <tr data-status="<?php echo $status;?>">
                <td class="left-2"><?php echo $sno++;?></td>
                <td class="left-2"><?php echo $sizes;?></td>
                <td class="left-2"><?php echo $model_no;?></td>
                <td>
                <?php if(!$tile_img==''){
                    echo '<img src="../assets/images/tiles/'.$tile_img.'"alt="img" width="80"/>';
                  }
                  else
                  {
                    echo 'No Image';
                  } 
                ?>  
                </td>
                <td class="text-center"><?php echo $thickness;?> | <?php echo $cm;?></td>
             
                <td><?php echo $categories;?></td>
                <td><?php echo $effect;?></td>  
                <td><?php echo $color;?></td>
                <td><?php echo $usage;?></td>
                <td><?php echo $surface;?></td>
                <td><?php echo $material;?></td>
                <td><?php echo $qty_per_box;?></td>
                <td><?php if($status=='Active'){echo "<div><span class='active-status'></span>Active</div>";}else{echo "<div><span class='inactive-status'></span>InActive</div>";}?></td>
                <td>
                 <!-- <a href="#" data-id ='<?php echo $tiles_id;?>' data-model="<?php echo $model_no;?>"
                  data-toggle="tooltip" class="btn-sm table-view-button boxshadow modal_tiles_c1"
                   data-bs-toggle="modal" data-bs-target="#WallModal<?php echo $model_no;?>">
                   <i class="fa fa-eye text-alert" aria-hidden="true"></i> View</a>  -->
                 <a href="#" data-id ='<?php echo $tiles_id;?>' data-model="<?php echo $model_no;?>"
                  class="btn-sm table-view-button boxshadow modalc1">
                   <i class="fa fa-eye text-alert" aria-hidden="true"></i> View</a> 
                  
                </td>
                        
                </tr>
                <?php
                      }
                    }
                    else
                    {
                   echo '<tr >
                      <td colspan="17">
                              No Data to display!
                              </span>
                            </td>
                      </tr >';
                    }

                }

              ?>
                </tbody>
            </table>
        </div> 
     
        <!-- ========table-wrapper ends========= -->
    </div>  
    <!-- ======Table Responsive ends=========  -->
    
    <script> 


</script>
</div> 
<!-- ======container fluid ends========= -->


<?php include('includes/ceramic_footer.php');?>

<?php include('../includes/footer.php');?>

<?php include('model-cat.php');?>  








