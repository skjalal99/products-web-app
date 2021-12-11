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
          <div class="float-end"> <button class="btn btn-success justify-content-end" data-bs-toggle="modal" data-bs-target="#add-new-prop">Add New <i class="fa fa-plus"></i></button></div>

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
                  <th>Icon</th>
                  <th>Title</th>
                  <th style="width:60%">Description</th>
                  <th style="">Status</th>
                  <th>Action</th>

              </tr>
            </thead>
            <tbody>

              <?php
              
              $sno = 1;

              $sql = select1('properties');

              $res = $conn->query($sql);

              if($res == TRUE)
              {
                  $count = $res->num_rows;

                  if($count >0)
                  {
                    while($row = $res->fetch_assoc()) 
                    {
                      $id1 = $row['id'];
                      $title = $row['title'];
                      $description = $row['description'] ;
                      $status1 = $row['status1'] ;
                      $image = $row['image'] ;
            ?>


              <tr>
                <td scope="row" class="table-first">
                        <span class="custom-checkbox">
                          <input type="checkbox" id="checkbox1" name="options[]" value="1">
                          <label for="checkbox1"></label>
                        </span>
                </td>
                
                <td><img src="../../assets/images/properties/<?php echo $image;?>" width="60"></td>
                <td><?php echo $title;?></td>
                <td><?php echo $description;?></td>
                <td><?php echo $status1;?></td>
           
                
                  <td >
                        <a href="" class="edit-tbl edit_prop" val='<?php echo $id1;?>'data-bs-toggle="modal" data-bs-target="#edit-prop"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                        <a href="#" class="delete-tbl del_prop" data-bs-toggle="modal"  data-bs-target="#delete-prop"><i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></a>
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





</div>
<!-- ==== Container-fluid Ends ==== -->

<!-- ======= Modal Add New Modal ========= -->
<div class="modal fade" id="add-new-prop" tabindex="-1" aria-labelledby="add-new-prop" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-new-prop">Add New Tiles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" enctype= "multipart/form-data">
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Icon</label>
                <div class="col-sm-8">
                      <input type="file" class="form-select" name="Aicon_img">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Title</label>
                <div class="col-sm-8">
                  <input type="text" class="form-select" name="Aicon_title">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Description</label>
                <div class="col-sm-8">
                <textarea class="form-control" name="Aicon_desc"></textarea>
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Status</label>
                <div class="col-sm-8">
              
                <input class="form-check-input" type="radio" value="Yes" name="Astatus"  checked>
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
        <button type="submit" name='add_prop' class="btn btn-primary" data-bs-toggle="modal"  data-bs-dismiss="modal">Add</button>
      </div>
    </div>
    </form> 
  </div>
</div>
<!-- ======= Modal Add New Size ========= -->
  <?php
  if(isset($_POST['add_prop']))
  {
    $Aicon_img = $_FILES['Aicon_img'];
    $Aicon_title = $_REQUEST['Aicon_title'];
    $Aicon_desc = $_REQUEST['Aicon_desc'];
    $Astatus = $_REQUEST['Astatus'];

    if($Astatus == 'Yes')
    {
      $Astatus = 'Active';
    }
    else{
      $Astatus = 'InActive';
    }

    if(empty($Aicon_title) ||empty($Aicon_desc) ||empty($Astatus))
    {
      echo "<div class='alert alert-danger'>Pls fill the required field</div>";
      die();

    }

   // print_r($Aicon_img);

        if(!empty($Aicon_img['name']))
        {

                  // File upload configuration 
                  $targetDir = "../../assets/images/properties/"; 
                  $allowTypes = array('jpg','png','jpeg','gif'); 

                  //auto renaming and getting extension of image
                  $ext = explode('.', $Aicon_img['name']);
                  $ext = end($ext);
                   
                  //Rename image
                  $fileName1 = "Tile_Prop_".rand(00000,99999).'.'.$ext; // eg:tile_12321.jpg
                   
                  //Targeted Files Path to move
                  $targetFilePath = $targetDir . $fileName1; 


                  //
                  if($Aicon_img['size']<='1000000')
                  {

                          // Check whether file type is valid 
                          $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                          if (in_array($fileType, $allowTypes))
                              {
                                      $source_dir = $_FILES["Aicon_img"]["tmp_name"];

                                      // Upload file to server 
                                      $move = move_uploaded_file($source_dir, $targetFilePath);
                                            
                                      if($move == TRUE)
                                      {
                                        echo "<div class='alert alert-primary'>uploaded Successfully</div>";
                                      }


                              }
                                else
                              { 
                                  echo $errorUploadType = $_FILES["Aicon_img"]; 
                              }

                    
                  }



          
        }//Empty ends..
        else
        {
          echo "<div class='alert alert-danger'>Something Went Wrong!:Pls Check Empty Image Field</div>";
        }

          $sql1 = "INSERT INTO properties SET
          title='$Aicon_title',
          description='$Aicon_desc',
          image='$fileName1',
          status1='$Astatus'";


$res1 = $conn->query($sql1) or die(mysqli_error($conn));

if($res1 == TRUE){ echo "<div class='alert alert-primary'>Successfully Added </div>";}
echo "<meta http-equiv='refresh' content='1'>";

  }

  ?>

<!-- ========== Modal Delete========= -->

<!-- Modal -->
<div class="modal fade" id="delete-prop" tabindex="-1" aria-labelledby="delete-prop" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete-prop">Delete Tiles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are You Sure ? You want to delete selected one.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delete-prop2" data-bs-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="delete-prop2" tabindex="-1" aria-labelledby="delete-prop2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete-tiles2">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      2 Are You Sure ? You want to delete selected one.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal"  data-bs-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>

<!-- ========== Modal Delete========= -->

<!-- ========== Modal Edit========= -->
<div class="modal fade" id="edit-prop" tabindex="-1" aria-labelledby="edit-prop" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-prop">Edit Tiles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" id='form2' enctype= "multipart/form-data">
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Icon</label>
                <div class="col-sm-8">
                <img src="" class="img-thumbnail" id='img1' width="80" height="80" alt="icon">
                <input type="file" class="form-select" name="prop_image"  >
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Title</label>
                <div class="col-sm-8">
                <input type="text" class="form-select" id='title1' name="prop_title" value=''>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Description</label>
                <div class="col-sm-8">
                <textarea class="form-control" name='prop_desc' id='desc1'></textarea>
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Description</label>
                <div class="col-sm-8">
              
                <input class="form-check-input" id='status1' type="radio" value='Yes' name="status"  checked>
                <label class="form-check-label" >
                  Active
                </label>
                <input class="form-check-input" id='status2' type="radio" value='No' name="status"  >
                <label class="form-check-label" >
                  Canceled
                </label>

              </div>           
            </div>

             
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" id="propt_sub" val-id=''class="btn btn-primary">Submit</button>
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
