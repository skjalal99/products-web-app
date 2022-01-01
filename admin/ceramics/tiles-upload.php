<?php  $addtilesp = 'active';?>
<?php include('../includes/header-admin.php');?>
<?php include('../includes/aside.php');?>
<?php include_once('../config/dbconn.php'); ?>
<?php include('../includes/login-check-admin.php'); ?>
<?php include_once("../config/functions.php");?>
<!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      
    <?php include('../includes/navbar.php');?>

    <div class="container-fluid">

  

          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                <h2>Add Tiles</h2><small>Dashboard</small>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="../admin/index.php">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Add Tiles
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


          <?php
            if(isset($_SESSION['upload-empty']))
            {
              echo $_SESSION['upload-empty'];
              unset($_SESSION['upload-empty']);

            }

        ?>



      <div class="row bg-primary gx-0">
        <div class="col-md-6"><h3 class="table-title">User Access Details</h3></div>
        <div class="col-md-6">
          <div class="float-end"> <button class="btn btn-success justify-content-end" data-bs-toggle="modal" data-bs-target="#add-new-tiles">Add New <i class="fa fa-plus"></i></button></div>

        </div>
      </div>



      <div class = "table-responsive  ">
            <table class="table table-striped table-bordered text-center table-hover nowrap"style="width:100%" id='tbl_tiles'>
            <thead class="thead-bg">
              <tr >
                  <!-- <th scope="col" >
                      <span class="custom-checkbox">
                        <input type="checkbox" id="selectAllchecks">
                        <label for="selectAllchecks"></label>
                      </span>
                  </th> -->
                  <th class="left-2">#</th>
                  <th class="left-2">Size </th>
                  <th class="left-2">Model</th>
                  <th>Picture</th>
                  <th style="width:6%">Thickness</th>
                  <th>Cm</th>
                  <th>Categories</th>
                  <th>Effect</th>
                  <th>Color</th>
                  <th>Usage</th>
                  <th>Surface</th>
                  <th>Material</th>
                  <th>Qty/Box</th>
                  <th>Status</th>
                  <th>Properties</th>
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

              <tr>
                <!-- <td scope="row" >
                        <span class="custom-checkbox">
                          <input type="checkbox" id="checkbox1" name="options[]" value="1">
                          <label for="checkbox1"></label>
                        </span>
                </td> -->
                <td class="left-2"><?php echo $sno++;?></td>
                <td class="left-2"><?php echo $sizes;?></td>
                <td class="left-2"><?php echo $model_no;?></td>
                <td>
                <?php if(!$tile_img==''){
                    echo '<img src="../../assets/images/tiles/'.$tile_img.'"alt="img" width="80"/>';
                  }
                  else
                  {
                    echo 'No Image';
                  } 
                ?>  
                </td>
                <td ><?php echo $thickness;?></td>
                <td><?php echo $cm;?></td>
                <td><?php echo $categories;?></td>
                <td><?php echo $effect;?></td>  
                <td><?php echo $color;?></td>
                <td><?php echo $usage;?></td>
                <td><?php echo $surface;?></td>
                <td><?php echo $material;?></td>
                <td><?php echo $qty_per_box;?></td>
                <td><?php if($status=='Active'){echo "<div><span class='active-status'></span>Active</div>";}else{echo "<div><span class='inactive-status'></span>Cancelled</div>";};?></td>
                <td>   
                  <a href="#" data-id ='<?php echo $tiles_id;?>' data-model="<?php echo $model_no;?>"class="btn-sm table-view-button boxshadow prop"   >View All</a>
                </td>
                
                  <td >
                        <a href="#" data-tile-id ='<?php echo $tiles_id;?>' data-size-id ='<?php echo $size_id;?>' data-cat-id ='<?php echo $cat_id;?>' class="edit-tbl edit-tiles" ><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                        <a href="#" data-id ='<?php echo $tiles_id;?>' value='<?php echo $model_no;?>'class="delete-tbl del-tiles1" data-bs-toggle="modal"  data-bs-target="#delete-tiles"><i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></a>
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


</div>
<!-- ==== Container-fluid Ends ==== -->


<!-- ======= Modal view all properties ========= -->
<div class="modal fade" id="view-prop" data-bs-backdrop="static" tabindex="-1" aria-labelledby="view-prop" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" ><b><i>Properties of <span class="tile-no"></span></i></b></h5>
        <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body prop_modal">
                 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Back</button>
     
      </div>
    </div>
  </div>
</div>
<!-- ======= Modal view all properties ========= -->

<!-- ======= Modal Add New tiles ========= -->
<div class="modal fade" id="add-new-tiles" tabindex="-1" aria-labelledby="add-new-tiles" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-new-tiles">Add New Tiles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" enctype= multipart/form-data>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Sizes</label>
                <div class="col-sm-8">
                  <select class="form-select  mb-3" aria-label=" sizes" name="Asize">
              <?php

              $sql = "SELECT * FROM sizes WHERE STATUS ='Yes' ORDER BY sizes ASC";

              $res = $conn->query($sql);

              if($res == TRUE)
              {
                
                  if($res->num_rows > 0)
                  {
                    while ($row = $res->fetch_assoc()) 
                    {
                        $id1 = $row['id'];
                        $sizes = $row['sizes'];

                      echo  "<option value='$id1'>$sizes</option>";
            
                    }
                  }
                  else
                  {
                    echo "No Data";
                  }

              }

              ?>
                  </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="modelno" class="col-sm-4 col-form-label">Model no:</label>
                <div class="col-sm-8">
                  <input type="text"  class="form-control"name="Amodelno" id="modelno"placeholder="Model No." value="" >
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Picture" class="col-sm-4 col-form-label">Picture</label>
                <div class="col-sm-8">
                   <input type="file" class="form-control" name="Aimage" id="" value="image">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Thickness(mm)</label>
                <div class="col-sm-8">
                  <input type="text"  class="form-control"name="Amm" id="inputsizes" placeholder="MM"value="">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Thickness(Cm)</label>
                <div class="col-sm-8">
                  <input type="text"  class="form-control"name="Acm" id="inputsizes" placeholder="CM" value="">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputcat" class="col-sm-4 col-form-label">Categories</label>
                <div class="col-sm-8">
                  <select class="form-select  mb-3" aria-label=" cat" name="Acat">

                  <?php

                      $sql1 = "SELECT * FROM categories WHERE STATUS='Yes' ORDER BY type ASC ";

                      $res1 = $conn->query($sql1);

                      if($res1 == TRUE)
                      {
                        
                          if($res1->num_rows > 0)
                          {
                            while ($row1 = $res1->fetch_assoc()) 
                            {
                                $id2 = $row1['id'];
                                $types = $row1['type'];
                               
                                
                              echo  "<option value='$id2'>$types</option>";
                            
                            }
                          }
                          else
                          {
                            echo  "<option value=''>No Data</option>";
                          }

                      }

                    ?>



                  </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Effect</label>
                <div class="col-sm-8">
                  <select class="form-select  mb-3" aria-label=" effect" name="Aeffect">
                    <option value="Marble" selected>Marble</option>
                    <option value="Wooden">Wooden</option>
                    <option value="Stone">Stone</option>
                    <option value="Granite">Granite</option>
                  </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Color</label>
                <div class="col-sm-8">
                  <input type="text"  class="form-control" name="Acolor" id="inputsizes" placeholder="Color" value="">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Usage</label>
                <div class="col-sm-8">
                  <select class="form-select  mb-3" aria-label=" usage" name="Ausage">
                    <option value="Indoor" selected>Indoor</option>
                    <option value="Outdoor">Outdoor</option>
                    <option value="Multi-Purpose">Multi-Purpose</option>
                    <option value="Swimming Pool">Swimming Pool</option>
                    <option value="Bathroom">Bathroom</option>
                    <option value="Kitchen">Kitchen</option>
                  </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Finish</label>
                <div class="col-sm-8">
                  <select class="form-select  mb-3" aria-label=" " name="Afinish">
                    <option value="Glossy" selected>Glossy</option>
                    <option value="Matt">Matt</option>
                  </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Material</label>
                <div class="col-sm-8">
                  <select class="form-select  mb-3" aria-label=" example" name="Amaterial">
                    <option value="Ceramics" selected>Ceramics</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Qty/Box</label>
            <div class="col-sm-8">
                  <input type="number"  class="form-control" id="inputsizes" name="Aqty" value="0">
            </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Properties</label>
                <div class="col-sm-8">                  
                  <?php

                          $sql1 = "SELECT * FROM properties  ORDER BY title ASC ";

                          $res1 = $conn->query($sql1);

                          if($res1 == TRUE)
                          {
                            
                              if($res1->num_rows > 0)
                              {
                                while ($row1 = $res1->fetch_assoc()) 
                                {
                                    $id3 = $row1['id'];
                                    $title = $row1['title'];
                                  
                                    
                                  echo  "<input class='form-check-input' type='checkbox' value='$id3' name='Acheckbox[]' checked id='check-box'>
                                  <label class='form-check-label' for='check-box'>
                                  $title
                                  </label> </br>";
                                 
                                
                                }
                              }
                              else
                              {
                                echo  "No Data";
                              }

                          }

                          ?>

                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Status</label>
                <div class="col-sm-8">
              
                <input class="form-check-input" type="radio"  value="Yes" name="Astatus"  checked>
                <label class="form-check-label" >
                  Active
                </label>
                <input class="form-check-input" type="radio" value="No" name="Astatus"  >
                <label class="form-check-label" >
                  Canceled
                </label>

              </div>           
            </div>

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="Asub" class="btn btn-primary" data-bs-toggle="modal"  data-bs-dismiss="modal">Add</button>
      </div>
    </div>
    </form>  
  </div>
</div>
   <?php
    if(isset($_REQUEST['Asub']))
    {
         $Asize = ivalidate($_REQUEST['Asize']);
         $Amodelno =  strtoupper(ivalidate($_REQUEST['Amodelno']));
         $Aimage = ivalidate($_FILES['Aimage']);
         $Amm = ivalidate($_REQUEST['Amm']);
         $Acm = ivalidate($_REQUEST['Acm']);
         $Acat = ivalidate($_REQUEST['Acat']);
         $Aeffect = ivalidate($_REQUEST['Aeffect']);
         $Acolor = ivalidate($_REQUEST['Acolor']);
         $Ausage = ivalidate($_REQUEST['Ausage']);
         $Afinish = ivalidate($_REQUEST['Afinish']);
         $Amaterial = ivalidate($_REQUEST['Amaterial']);
         $Aqty = ivalidate($_REQUEST['Aqty']);
         $Acheckbox = ivalidate($_REQUEST['Acheckbox']);

         $uploadOk = TRUE;
         //$date = date("Y-m-d h:i:sa");
          //active status
          if($_REQUEST['Astatus'] == 'Yes')
          {
            $Astatus ="Active";
          } 
          else
          {
              $Astatus ="InActive";
          }

     // upload image// upload image
      if (isset($Aimage))
      {
           
            //Get the image name
            $Aimage_name=$Aimage['name']; 
            $Aimage_tmp=$Aimage['tmp_name']; 
            $Aimage_size=$Aimage['size']; 

                if($Aimage_name !='')
                {
                  
                        // Check file size
                        if ($Aimage_size > 1024000)
                        {
                          $_SESSION['upload-empty'] = "<div class='alert alert-warning col-sm-6'>Sorry, File should be less than 1mb.</div>";
                          header('location:'.SITE_URL1.'admin/ceramics/tiles-upload.php');

                          $uploadOk = FALSE;
                          die();
                        }


                        //auto renaming and getting extension of image
                        $ext = explode('.', $Aimage_name);
                        $ext = end($ext);

                        //Rename image
                        $Aimage = "Tile_".rand(00000,99999).'.'.$ext; // eg:tile_12321.jpg

                        // Get from source path
                        $source_path = $Aimage_tmp;

                        // set the destination path
                        $destination_path = "../../assets/images/tiles/".$Aimage;

                        if($uploadOk!== FALSE)
                        {
                            // move the uploaded file to destination
                            $upload = move_uploaded_file($source_path, $destination_path);
                            echo "<meta http-equiv='refresh' content='1'>";

                            //if upload file failed
                            if($upload == FALSE)
                            {

                              echo $Err_add_tiles = "<div class='alert alert-warning col-sm-6'>Something Went Wrong;</div>";
                            

                                die();

                            }

                          
                        }



                }
                else
                {
                  
                  $_SESSION['upload-empty'] = "<div class='alert alert-warning text-center' role='alert'>Error: Image Field empty!</div>";

                  header('location:'.SITE_URL1.'admin/ceramics/tiles-upload.php');
                  
                  die();
                }

              //sql query starts

              $sql_tiles ="INSERT INTO `tiles` (`tile_model_no`, `tile_img`, `thickness`, `cm`, `effect`, `color`, `usage`, `surface`, `material`, `qty_per_box`, `status1`, `sizes_id`, `categories_id`, `created_on`)VALUES ( '$Amodelno','$Aimage','$Amm','$Acm','$Aeffect','$Acolor','$Ausage','$Afinish','$Amaterial','$Aqty','$Astatus','$Asize', '$Acat',now())";

              $conn->query($sql_tiles) or die(mysqli_error($conn));

              $last_id_in_tiles =  mysqli_insert_id($conn);

              
                        $sql_in = 'INSERT INTO `tiles_has_properties` (`tiles_id`, `properties_id`) values';
                      
                        foreach($Acheckbox as $checked)
                        {
                          $insert = $checked;
                          $sql_in .="('$last_id_in_tiles',$insert),";
                        
                        }
                      $sql_in=rtrim($sql_in,",");
                      $conn->query($sql_in);


      } //isset image ends
     



  } // form ends
  


        ?>



<!-- ======= Modal Add New Size ========= -->




<!-- ========== Modal Delete========= -->

<!-- Modal -->
<div class="modal fade" id="delete-tiles" tabindex="-1" aria-labelledby="delete-tiles" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete-tiles">Delete Tiles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are You Sure ? You want to delete : <span id='del-title1' class='text-danger'></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delete-tiles2" data-bs-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="delete-tiles2" tabindex="-1" aria-labelledby="delete-tiles2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete-tiles2">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method='post'>
      <div class="modal-body">
      2 Are You Sure ? You want to delete selected one.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name='del_sub_tiles'id="del_tiles_up" class="btn btn-primary" data-bs-toggle="modal"  data-bs-dismiss="modal">Yes</button>
      </div>
    </div>
</form>
  </div>
</div>
<!-- ============Delete Set============== -->

<?php
if (isset($_REQUEST['del_sub_tiles'])) {
    $sql21 = "DELETE FROM tiles WHERE id= '{$_REQUEST['del_sub_tiles']}'";

    $result12 = $conn->query($sql21);
    echo $Err_add_tiles = "<div class='alert alert-primary col-sm-6'>Successfully Deleted</div>";
    echo "<meta http-equiv='refresh' content='1'>";
}



?>



<!-- ========== Modal Delete ends========= -->

<!-- ========== Modal Delete Ends========= -->

<?php
if(isset($_REQUEST['edit_sub']))
{
 
         $Utileid = ivalidate($_REQUEST['utiles-id']);
         $Usize = ivalidate($_REQUEST['Usize']);
         $Umodelno =  strtoupper(ivalidate($_REQUEST['Umodelno']));
         $AUimage = $_REQUEST['AUimage'];
         $Uimage = $_FILES['Uimage'];

         $Umm = ivalidate($_REQUEST['Umm']);
         $Ucm = ivalidate($_REQUEST['Ucm']);
         $Ucat = ivalidate($_REQUEST['Ucat']);
         $Ueffect = ivalidate($_REQUEST['Ueffect']);
         $Ucolor = ivalidate($_REQUEST['Ucolor']);
         $Uusage = ivalidate($_REQUEST['Uusage']);
         $Ufinish = ivalidate($_REQUEST['Ufinish']);
         $Umaterial = ivalidate($_REQUEST['Umaterial']);
         $Uqty = ivalidate($_REQUEST['Uqty']);
         $Ucheckbox = '';
         if (!empty($_REQUEST['Ucheckbox']))
         {
              $Ucheckbox = ivalidate($_REQUEST['Ucheckbox']);
          }
          else
          {
           
            echo $Err_add_tiles = "<div class='alert alert-danger col-sm-6'>Error: Pls check atleast one property of tile!</div>";
          
            die();
          }
        // printr($Ucheckbox);
         $uploadOk1 = TRUE;
         //$date = date("Y-m-d h:i:sa");
          //active status
          if($_REQUEST['Ustatus'] == 'Yes')
          {
            $Ustatus ="Active";
          } 
          else
          {
              $Ustatus ="InActive";
          }

     // upload image// upload image
        if (isset($Uimage)) {

            //Get the image name
            $Uimage_name=$Uimage['name'];
            $Uimage_tmp=$Uimage['tmp_name'];
            $Uimage_size=$Uimage['size'];


            if ($Uimage_name !='') {
              
                    // Check file size
                if ($Uimage_size > 1024000) {
                    $_SESSION['upload-empty'] = "<div class='alert alert-warning col-sm-6'>Sorry, File should be less than 1mb.</div>";
                    header('location:'.SITE_URL1.'admin/ceramics/tiles-upload.php');

                    $uploadOk1 = false;
                    die();
                }


                //auto renaming and getting extension of image
                $ext = explode('.', $Uimage_name);
                $ext = end($ext);

                //Rename image
                    $Uimage_name = "Tile_U".rand(00000, 99999).'.'.$ext; // eg:tile_12321.jpg

                // Get from source path
                $source_path1 = $Uimage_tmp;

                // set the destination path
                $destination_path1 = "../../assets/images/tiles/".$Uimage_name;

                if ($uploadOk1!== false) {
                    // move the uploaded file to destination
                    $upload1 = move_uploaded_file($source_path1, $destination_path1);
                   
                  //if upload file failed
                    if ($upload1 == false) {
                       // echo $Err_add_tiles = "<div class='alert alert-warning col-sm-6'>Something Went Wrong;</div>";
                        

                        die();
                    }
                }


              //remove the current image

              $current_img_path1 = "../../assets/images/tiles/".$AUimage;

              $current_img_remove1 =  unlink($current_img_path1);    


            }//upload image ends

            else
            {
              // set current image
              $Uimage_name = $AUimage;


            }


        
          }//image isset ends

          // else
          // {
          //  // set current image
          //  $Uimage = $AUimage;


          // }//image isset else 



          //sql query starts

          $sql_tiles1 ="UPDATE `tiles`
          SET `tile_model_no`='$Umodelno',
              `tile_img`='$Uimage_name',
              `thickness`='$Umm',
              `cm`='$Ucm',
              `effect`='$Ueffect',
              `color`='$Ucolor',
              `usage`='$Uusage',
              `surface`='$Ufinish',
              `material`='$Umaterial',
              `qty_per_box`='$Uqty',
              `status1`='$Ustatus',
              `sizes_id`='$Usize',
              `categories_id`= '$Ucat'
               WHERE id ='$Utileid' ";
         

         $conn->query($sql_tiles1) or die(mysqli_error($conn));

          // $last_id_in_tiles =  mysqli_insert_id($conn);


                    // $sql_in1 = "UPDATE `tiles_has_properties` 
                    // SET `tiles_id`='$Utileid',
                    //     `properties_id`='$Utileid'
                    //    " ;
             $sql_del_all_prop = "DELETE FROM tiles_has_properties
              WHERE tiles_id = '$Utileid'";
               
           $conn->query($sql_del_all_prop);  

           

     
            $sql_in1 = 'INSERT INTO `tiles_has_properties` (`tiles_id`, `properties_id`) values';
          
            foreach ($Ucheckbox as $checkedU) {
                $insertU = $checkedU;
                $sql_in1 .="('$Utileid',$insertU),";
            }
              $sql_in1=rtrim($sql_in1, ",");
         $conn->query($sql_in1);
           
        echo "<meta http-equiv='refresh' content='1'>";
        echo $Err_add_tiles = "<div class='alert alert-primary col-sm-6'>Updated Successfully;</div>";
                   




}




?>
<!-- ========== Modal Edit========= -->
<div class="modal fade" id="edit-tiles" tabindex="-1" aria-labelledby="edit-tiles" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-tiles">Edit Tiles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body edit-tiles-modal-body">

      <form action="" method="POST" enctype= multipart/form-data>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Sizes</label>
                <div class="col-sm-8">
                  <input type="hidden" id="tilesid-edit" name="utiles-id">
                  <select class="form-select  mb-3" aria-label="sizes" id="sizes-edit"name="Usize">
              <?php

              $sql = "SELECT * FROM sizes ORDER BY sizes ASC";

              $res = $conn->query($sql);

              if($res == TRUE)
              {
                
                  if($res->num_rows > 0)
                  {
                    while ($row = $res->fetch_assoc()) 
                    {
                        $id1 = $row['id'];
                        $sizes = $row['sizes'];

                      echo  "<option value='$id1'data-val='$id1'>$sizes</option>";
            
                    }
                  }
                  else
                  {
                    echo "No Data";
                  }

              }

              ?>
                  </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="modelno" class="col-sm-4 col-form-label">Model no:</label>
                <div class="col-sm-8">
                  <input type="text"  class="form-control" id="modelno-edit" name = "Umodelno" placeholder="Model No." value="" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Picture" class="col-sm-4 col-form-label">Picture</label>
                <div class="col-sm-8">
                    <img src="" alt="sdfsdf" id='img-edit' >
                    <input type="hidden" value='' id='img-edit1' name="AUimage" >
                    <input type="file" class="form-control" name="Uimage" id="" value="image">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Thikness in MM</label>
                <div class="col-sm-8">
                  <input type="number"  class="form-control" step="0.01" id="mm-edit" name="Umm" value="" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Cm</label>
                <div class="col-sm-8">
                  <input type="number"  class="form-control" step="0.01" id="cm-edit" name="Ucm" value="" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputcat" class="col-sm-4 col-form-label">Categories</label>
                <div class="col-sm-8">
                  <select class="form-select  mb-3" aria-label=" cat" id="cat-edit" name="Ucat">

                  <?php

                      $sql1 = "SELECT * FROM categories WHERE STATUS='Yes' ORDER BY type ASC ";

                      $res1 = $conn->query($sql1);

                      if($res1 == TRUE)
                      {
                        
                          if($res1->num_rows > 0)
                          {
                            while ($row1 = $res1->fetch_assoc()) 
                            {
                                $id2 = $row1['id'];
                                $types = $row1['type'];
                               
                                
                              echo  "<option value='$id2'>$types</option>";
                            
                            }
                          }
                          else
                          {
                            echo  "<option value=''>No Data</option>";
                          }

                      }

                    ?>



                  </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Effect</label>
                <div class="col-sm-8">
                  <select class="form-select  mb-3" aria-label=" effect" id="effect-edit" name="Ueffect" >
                    <option value="Marble" selected>Marble</option>
                    <option value="Wooden">Wooden</option>
                    <option value="Stone">Stone</option>
                    <option value="Granite">Granite</option>
                  </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Color</label>
                <div class="col-sm-8">
                  <!-- <input type="text"  class="form-control" name="Ucolor" id="color-edit" value="Color" required> -->
                  <select class="form-select  mb-3" aria-label=" effect" id="color-edit" name="Ucolor" >
                    <option value="Biege" selected>Biege</option>
                    <option value="Gray">Gray</option>
                    <option value="Brown">Brown</option>
                    <option value="Green">Green</option>
                    <option value="Pink">Pink</option>
                    <option value="Plain">Plain</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Usage</label>
                <div class="col-sm-8">
                  <select class="form-select  mb-3" id="usage-edit" aria-label=" usage" name="Uusage" >
                    <option value="Indoor" selected>Indoor</option>
                    <option value="Outdoor">Outdoor</option>
                    <option value="Multi-Purpose">Multi-Purpose</option>
                    <option value="Swimming Pool">Swimming Pool</option>
                    <option value="Bathroom">Bathroom</option>
                    <option value="Kitchen">Kitchen</option>
                  </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Finish</label>
                <div class="col-sm-8">
                  <select class="form-select  mb-3" id="finish-edit" aria-label=" " name="Ufinish">
                    <option value="Glossy" selected>Glossy</option>
                    <option value="Matt">Matt</option>
                  </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Material</label>
                <div class="col-sm-8">
                  <select class="form-select  mb-3" aria-label=" example" id="material-edit" name="Umaterial">
                    <option value="Ceramics" selected>Ceramics</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Qty/Box</label>
            <div class="col-sm-8">
                  <input type="number"  class="form-control" id="qty-edit" name="Uqty"placeholder="qty" value="" required>
            </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Properties</label>
                <div class="col-sm-8">                  
                  <?php

                          $sql1 = "SELECT * FROM properties  ORDER BY title ASC ";

                          $res1 = $conn->query($sql1);

                          if($res1 == TRUE)
                          {
                            
                              if($res1->num_rows > 0)
                              {
                                while ($row1 = $res1->fetch_assoc()) 
                                {
                                    $id3 = $row1['id'];
                                    $title = $row1['title'];
                                  
                                    
                                  echo  "<input class='form-check-input check-box check-box-edit$id3' type='checkbox' name='Ucheckbox[]'value='$id3' name='Acheckbox[]'  id='check-box'>
                                  <label class='form-check-label' for='check-box'>
                                  $title
                                  </label> </br>";
                                 
                                
                                }
                              }
                              else
                              {
                                echo  "No Data";
                              }

                          }

                          ?>

                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Status</label>
                <div class="col-sm-8">
              
                  <input class="form-check-input" type="radio"  value="Yes" id="status1-edit0" name="Ustatus"  checked>
                  <label class="form-check-label">
                    Active
                  </label>
                  <input class="form-check-input" type="radio" value="No" id="status1-edit1" name="Ustatus"  >
                  <label class="form-check-label">
                    Canceled
                  </label>

              </div>           
            </div>

       

      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name='edit_sub' class="btn btn-primary" data-bs-dismiss="modal">Yes</button>
      </div>
    </div>
    </form>  
  </div>
</div>
<!-- ========== Modal Edit========= -->





 <?php include('../includes/footer-admin.php');?>
 
    </main>
<!-- ======== main-wrapper end =========== -->


<?php include('../includes/footer1.php');?>
