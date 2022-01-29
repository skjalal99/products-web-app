<?php  $modalsp = 'active';?>
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
                <h2>Modals</h2><small>Dashboard</small>
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
                         Modals
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

      <div class="row bg-primary gx-0">
        <div class="col-md-6"><h3 class="table-title">Modals</h3></div>
        <div class="col-md-6">
          <div class="float-end"> <button class="btn btn-success justify-content-end" data-bs-toggle="modal" data-bs-target="#add-new-modal">Add New <i class="fa fa-plus"></i></button></div>

        </div>
      </div>



      <div class = "table-responsive  ">
            <table class="table table-striped table-bordered text-center ">
            <thead class="thead-bg">
              <tr >
                  <th scope="col" class="table-first" >
                      <span class="custom-checkbox">
                        <input type="checkbox" id="selectAllchecks">
                        <label for="selectAllchecks"></label>
                      </span>
                  </th>
                  <th>Model No. </th>
                  <th style="width:60%">Pictures</th>
                  <th>Action</th>

              </tr>
            </thead>
            <tbody>

            <?php
              $sno = 1;

              $sql_modal = "SELECT tiles.id,tiles.tile_model_no,group_concat(tiles_modal.image_thumb) as imgg
              FROM tiles JOIN tiles_modal ON tiles.id = tiles_modal.tiles_id  group by tiles_modal.tiles_id;";

              $res_modal = $conn->query($sql_modal);

              if($res_modal == TRUE)
              {
                  $count_modal = $res_modal->num_rows;
                 
                  if($count_modal >0)
                  {
                    while($row_modal = $res_modal->fetch_assoc()) 
                    {

                      $tiles_id = $row_modal['id'] ;
                      $model_no = $row_modal['tile_model_no'] ;
                    $img_thumb = $row_modal['imgg'] ;
                     
                // =========To display multiple images in single row======
                      $pattern = "/[,\s:]/";
                      $preg=preg_split($pattern, $img_thumb);
 
            ?>

              <tr>
                <td scope="row" class="table-first">
                        <span class="custom-checkbox">
                          <input type="checkbox" id="checkbox1" name="options[]" value="1">
                          <label for="checkbox1"></label>
                        </span>
                </td>
                <td><?php echo $model_no;?></td>
                
                <td>
                    <?php
                      foreach($preg as $arr_val)
                        {
                      
                        ?>
                            <img class="img-thumbnail" src="../../assets/images/modals/<?php echo  $arr_val;?>"  width="80" alt="" srcset="">

                        <?php

                        }
                    ?>
                </td>
           
                  <td >
                        <a href="" class="edit_pro_modal" data-id="<?php echo  $tiles_id;?>"  name="edit_pro_modal"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                        <a href="#" class="del_pro_modal delete-tbl" data-id="<?php echo  $tiles_id;?>" data-bs-toggle="modal"  data-bs-target="#delete-modal"><i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></a>
                  </td>
              </tr>
              
              <?php
                      }
                    }
                    else
                    {
                    echo '<tr >
                      <td colspan="5">
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

<span id='update_res'></span>
<span id='success'></span>



</div>
<!-- ==== Container-fluid Ends ==== -->






<!-- ======= Modal Add New Modal ========= -->
<div class="modal fade" id="add-new-modal" tabindex="-1" aria-labelledby="add-new-modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-new-tiles">Add New Tiles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post" enctype= multipart/form-data>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Model No.</label>
                <div class="col-sm-8">
                  <select class="form-select  mb-3" id="E_mod_no" name="model_no">

                <?php
                
                $sql1 = "SELECT id ,tile_model_no FROM tiles order by tile_model_no ASC ";

                $res1 = $conn->query($sql1);

                if($res1 == TRUE)
              {
                
                  if($res1->num_rows > 0)
                  {
                    while ($row = $res1->fetch_assoc()) 
                    {
                        $tiles_id = $row['id'];
                        $model_no = $row['tile_model_no'];

                      echo  "<option value='$tiles_id' data-val='$tiles_id'>$model_no</option>";
            
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
                <label for="inputsizes" class="col-sm-4 col-form-label">Pictures</label>
                <div class="col-sm-8">
                <input type="file" class="form-select" name="Afiles[]" multiple >
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Status</label>
                <div class="col-sm-8">
              
                  <input class="form-check-input" type="radio"  value="Yes" id="status-modal" name="Astatus_modal"  checked>
                  <label class="form-check-label">
                    Active
                  </label>
                  <input class="form-check-input" type="radio" value="No" id="status-modal" name="Astatus_modal"  >
                  <label class="form-check-label">
                    Canceled
                  </label>

              </div>           
            </div>

          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name='modal_submit' class="btn btn-primary" data-bs-toggle="modal"  data-bs-dismiss="modal">Add</button>
      </div>
    </div>
    </form>
  </div>
</div>
<!-- ======= Modal Add New images ========= -->
<?php
// add new modal php code
if(isset($_REQUEST['modal_submit']))
{
   $Amodel_id = $_REQUEST['model_no'];
  $Afiles = $_FILES['Afiles'];

    //active status
    if($_REQUEST['Astatus_modal'] == 'Yes')
    {
      $Astatus_mod ="Active";
    } 
    else
    {
        $Astatus_mod ="InActive";
    }
 
    // printr($Afiles);

   $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
          //image uploads
          if($Afiles)
          {
          

            $fileNames = array_filter($Afiles['name']); 

            //check filename empty
              if(!empty($fileNames))
              {
                  // File upload configuration 
                  $targetDir = "../../assets/images/modals/"; 
                  $allowTypes = array('jpg','png','jpeg','gif'); 

                  // loop to get each names
                  foreach($fileNames as $key=>$val)
                  {

                     //auto renaming and getting extension of image
                     $ext = explode('.', $fileNames[$key]);
                     $ext = end($ext);
 
                     //Rename image
                      $fileName1 = "Tile_Modals_".rand(00000,99999).'.'.$ext; // eg:tile_12321.jpg
                   
                     // File upload path // no need base name as we are using rand() method.
                    // $fileName = basename($_FILES['files']['name'][$key]); 
                   // $fileName1 = basename($fileNames[$key]); 

                    $targetFilePath = $targetDir . $fileName1; 

                    // Check whether file type is valid 
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                          if (in_array($fileType, $allowTypes))
                          {
                            $source_dir = $_FILES["Afiles"]["tmp_name"][$key];

                              // Upload file to server 
                              if(move_uploaded_file($source_dir, $targetFilePath)){ 
                                // Image db insert sql 
                                $insertValuesSQL .= "('$fileName1','$Amodel_id',now(),'$Astatus_mod'),"; 
                              }else{ 
                                echo $errorUpload .= $_FILES['Afiles']['name'][$key].' | '; 
                              } 
                            
                          }
                          else
                          { 
                           echo $errorUploadType .= $_FILES['Afiles']['name'][$key].' | '; 
                          } 

                         


                  }//for each ends

                    'Insert value:'.$insertValuesSQL.'<br>';

                  // insert images
                  if (!empty($insertValuesSQL))
                  {

                    $insertValuesSQL = trim($insertValuesSQL, ','); 
                    //echo  'Insert value1:'.$insertValuesSQL.'<br>';


                  }




              }//empty ends
              else
              {

                echo $Err_add_tiles = "<div class='alert alert-warning col-sm-6'>Error: Pls select pictures</div>";
                die();
              }

          }//file isset ends
         
          // echo $Amodel_id.'<br>';
          // echo  'Insert value1:'.$insertValuesSQL.'<br>';
          // echo   $Astatus_mod;

          $sql2 = "INSERT INTO `tiles_modal` (`image_thumb`, `tiles_id`,`date`, `status1`)values $insertValuesSQL";

          
          $res2 = $conn->query($sql2) or die(mysqli_error($conn));

          if($res2)
          {
            echo $Err_add_tiles = "<div class='alert alert-warning col-sm-6'>Updated Successfully;</div>";
            echo "<meta http-equiv='refresh' content='1'>";
          }
          else{
            echo $Err_add_tiles = "<div class='alert alert-warning col-sm-6'>Error Adding Pictures;</div>";
          }





}//form isset ends



?>





<!-- ========== Modal Delete========= -->

<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="delete-modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete-modal">Delete Tiles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are You Sure ? You want to delete selected one.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="del_cancel1" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delete-modal2" data-bs-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="delete-modal2" tabindex="-1" aria-labelledby="delete-modal2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete-tiles2">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      


        <span id='del_imgs'></span>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary " id="del_cancel2" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary " id='del-sub'name="del_sub">Yes</button>
      </div>
    </div>
  </div>
</div>

<!-- ========== Modal Delete========= -->

<!-- ========== Modal Edit========= -->
<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="edit-modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-modal">Edit Tiles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="form1" action="" method="">
      <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Model No.</label>
                <div class="col-sm-8">
                  <select class="form-select  mb-3" id="E-modelno" name="E_modelno" disabled>

               <?php
                
                $sql1 = "SELECT id ,tile_model_no FROM tiles order by tile_model_no ASC ";

                $res1 = $conn->query($sql1);

                if ($res1 == true) {
                    if ($res1->num_rows > 0) {
                        while ($row = $res1->fetch_assoc()) {
                            $tiles_id = $row['id'];
                            $model_no = $row['tile_model_no'];

                            echo  "<option value='$tiles_id' data-val='$tiles_id'>$model_no</option>";
                        }
                    } else {
                        echo "No Data";
                    }
                }
                
                ?>

                 </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Pictures </br>
                 <span><small>Select the pictures to show maximum allowed 5*</small></span>
              </br> You have Selected:<span id='limit' class='text-primary'></span>
                </label>
                <div class="col-sm-8">

                  <span id="checka"></span>
                

                </div>
            </div>
            <div class="mb-3 row">
            <label for="inputsizes" class="col-sm-4 col-form-label">Upload More Pictures :</label>
                
                <div class="col-sm-5"><button type="button" tileid='' class="btn btn-sm btn-primary add_more">Add more</button></div>
            </div>
            
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label" name="">Status</label>
                <div class="col-sm-8">
              
                <input class="form-check-input" type="radio" value="Yes" id="Emodal-status0" name="Emodal_status" checked >
                <label class="form-check-label" >
                  Active
                </label>
                <input class="form-check-input" type="radio" value="No" id="Emodal-status1" name="Emodal_status" >
                <label class="form-check-label" >
                  Canceled
                
                  </a>
                </label>

              </div>           
            </div>
        <span id='val_check'></span>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"id='E_model_cancel'>Cancel</button>
        <button type="submit" name="E_model_submit" id='E_model_submit'class="btn btn-primary">Yes</button>
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
