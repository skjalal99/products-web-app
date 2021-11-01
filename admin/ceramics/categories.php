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
                <h2>Categories</h2><small>Dashboard</small>
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
                      Categories
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
        <div class="col-md-6"><h3 class="table-title">Categories</h3></div>
        <div class="col-md-6">
          <div class="float-end"> <button class="btn btn-success justify-content-end" data-bs-toggle="modal" data-bs-target="#add-new-cat">Add New <i class="fa fa-plus"></i></button></div>

        </div>
      </div>


   
      <div class = "table-responsive">
            <table class="table table-striped table-bordered text-center">
            <thead class="thead-bg">
              <tr>
                    <th class="table-first">
                      <span class="custom-checkbox">
                        <input type="checkbox" id="selectAllchecks" value="">
                        <label for="selectAllchecks"></label>
                      </span>
                    </th>
                  <th scope="col" class="table-first">Sr.No</th>
                  <th scope="col ">Category Name</th>
                  <th scope="col ">Status</th>
                  <th scope="col">Actions</th>
              
              </tr>
            </thead>
            <tbody>
            <?php
              $sno = 1;

              $sql = "SELECT * FROM categories ";

              $res = $conn->query($sql);

              if($res == TRUE)
              {
                  $count = $res->num_rows;

                  if($count >0)
                  {
                    while($row = $res->fetch_assoc()) 
                    {
                      $id = $row['id'];
                      $type = $row['type'];
                      $status = $row['status'];
            ?>
              <tr >
                <td class="table-first">
                        <span class="custom-checkbox">
                          <input type="checkbox" id="checkbox1"  class="check-box" name="options[]" value="<?php echo $id;?>">
                          <label for="checkbox1"></label>
                        </span>
                      </td>
                <td ><span class="cat-id<?php echo $id;?>"></span><?php echo $sno++;?></td>
                <td><span id="type-cat<?php echo $id;?>"><?php echo $type;?></span></td>
                <td>
                  <span id="stat-cat<?php echo $id;?>">
                    <?php if($status=='Yes'){echo "<div><span class='active-status'></span>Active</div>";}else{echo "<div><span class='inactive-status'></span>InActive</div>";};?></td>
                  </span>
                <td>
                        <button class="edit-tbl"  value="<?php echo $id;?>" data-bs-toggle="modal" data-bs-target="#edit-cat"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></button>
                        <button class="delete-tbl" value="<?php echo $id;?>" data-bs-toggle="modal"  data-bs-target="#delete-cat"><i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></button>
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

<!-- ======= Modal Add New Categories ========= -->
<div class="modal fade" id="add-new-cat" tabindex="-1" aria-labelledby="add-new-cat" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-new-tiles">Add New Tiles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="" method="POST">
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Categories</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="cat_name"> 
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Status</label>
                <div class="col-sm-8">
             
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="cat_status" value="Yes" checked> Yes
                            </label>
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="cat_status" value="No"> No
                            </label>                

              </div>           
            </div>
     

      </div>
      <div class="modal-footer">
        <button type="cancel" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="add-cat"class="btn btn-primary" data-bs-toggle="modal"  data-bs-dismiss="modal">Add</button>
      </div>
      </form>  
    </div>
  </div>
</div>
<?php
if(isset($_REQUEST['add-cat']))
{
  if(($_REQUEST['cat_name']=="") || ($_REQUEST['cat_status']==""))
  {
    echo $Err_add_cat = "<div class='alert alert-warning col-sm-6'>Error: Fill all details</div>";
     
  }
  else
   {
    $cat_name = $_REQUEST['cat_name'];
    $cat_status = $_REQUEST['cat_status'];
      
      $sql_cat = "insert into categories 
      set type ='$cat_name', status = '$cat_status'";

      $res_cat = $conn->query($sql_cat);

        if($res_cat == TRUE)
        {
          echo $Err_add_cat = "<div class='alert alert-success col-sm-6'>Successfully Added</div>";
          echo "<meta http-equiv='refresh' content='1'>";
        }
        else
        {
          echo $Err_add_cat = "<div class='alert alert-warning col-sm-6'>Error : Pls check and add again!</div>";
        }
    }
   
  }




?>




<!-- ======= Modal Add New categories ========= -->


<!-- ========== Modal Delete========= -->

<!-- Modal -->
<div class="modal fade" id="delete-cat" tabindex="-1" aria-labelledby="delete-cat" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete-cat">Delete Tiles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are You Sure ? You want to delete selected one.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delete-cat2" data-bs-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="delete-cat2" tabindex="-1" aria-labelledby="delete-cat2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete-tiles2">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


      <form action="" method="post">
      <div class="form-group">
        <label for="category">Category</label>
        <input type="hidden" name="id1" id="id1" value=""/>
        <input type="text" readonly class="form-control" id="type-cat" aria-describedby="Category" value="">
      </div>
      <div class="form-group">
        <label for="category">Status</label>
        <input type="text" readonly id="stat-del" class="form-control" aria-describedby="Status" value="">
      </div>
      
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="submit" name="final_del_cat" class="btn btn-primary"   data-bs-dismiss="modal">Yes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php
if(isset($_REQUEST['final_del_cat']))
{
  $id_cat = $_REQUEST['id1'];
  $sql_cat_del = "DELETE FROM categories WHERE ID ='$id_cat'";
  echo $sql_cat_del;
  $res_cat_del = $conn->query($sql_cat_del);
 

  if($res_cat_del)
    {
        
      echo $Err_add_cat = "<div class='alert alert-success col-sm-6'>Successfully Deleted</div>";
      echo "<meta http-equiv='refresh' content='1'>";
    }
    else
    {
      echo $Err_add_cat = "<div class='alert alert-warning col-sm-6'>Error : Pls check and add again!</div>";
    }
  
 

}


?>


<!-- ========== Modal Delete========= -->



<!-- ========== Modal Edit========= -->


<?php
if(isset($_REQUEST['edit_submit1']))
{

   $edit_id = $_REQUEST['edit_id'];
   $edit_cat = $_REQUEST['edit_cat'];
  
   //  status

   if(isset($_REQUEST['status']))
   {
      
       $edit_status = $_POST['status'];
       
   }
   else
   {
     $edit_status = "No";
   }

   $sql_update="UPDATE categories
                SET type = '$edit_cat',
                status = '$edit_status'
                WHERE ID = $edit_id";

   $res21 =  $conn->query($sql_update);

   if( $res21 == TRUE)
   {
    
      echo $Err_add_cat = "<div class='alert alert-success col-sm-6'>Successfully Updated</div>";
      echo "<meta http-equiv='refresh' content='1'>";

     }
     else
    {
      echo $Err_add_cat = "<div class='alert alert-warning col-sm-6'>Error : Pls check and add again!</div>";
    }

 

}


?>


<div class="modal fade" id="edit-cat" tabindex="-1" aria-labelledby="edit-cat" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-cat">Edit Tiles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="POST">
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Categories</label>
                <div class="col-sm-8">
                  <input type="hidden" id="edit_id"  name="edit_id" value="">
                  <input type="text" id="edit_cat"class="form-control" name="edit_cat" value=""> 
                </div>
            </div>
            
            
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Status</label>
                <div class="col-sm-8">
              
                <input class="form-check-input" id="edit_cat_stat1" type="radio" name="status" value="Yes" >
                <label class="form-check-label" >
                  Active
                </label>
                <input class="form-check-input" id="edit_cat_stat2" type="radio" name="status" value="No" >
                <label class="form-check-label" >
                  Canceled
                </label>

              </div>           
            </div>

          
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button  type="submit" name="edit_submit1" class="btn btn-primary" data-bs-dismiss="modal">Yes</button>
       
      </div>
      </form>     
    </div>
  </div>
</div>
<!-- ========== Modal Edit========= -->




 <?php include('../includes/footer-admin.php');?>
 
    </main>
<!-- ======== main-wrapper end =========== -->


<?php include('../includes/footer1.php');?>
