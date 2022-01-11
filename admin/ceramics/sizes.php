<?php  $sizep = 'active';?>
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
                <h2>Sizes</h2><small>Ceramics</small>
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
                      <li class="breadcrumb-item " aria-current="page">
                      <a href="#">Ceramics</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Sizes
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
        <div class="col-md-6"><h3 class="table-title">Manage Sizes</h3></div>
        <div class="col-md-6">
          <div class="float-end"> <button class="btn btn-success justify-content-end" data-bs-toggle="modal" data-bs-target="#add-new-size">Add New <i class="fa fa-plus"></i></button></div>

        </div>
      </div>



      <div class = "table-responsive">
            <table class="table table-striped table-bordered text-center">
            <thead class="thead-bg">
              <tr>
                    <th class="table-first">
                      <span class="custom-checkbox">
                        <input type="checkbox" id="selectAllchecks">
                        <label for="selectAllchecks"></label>
                      </span>
                    </th>
                  <th scope="col" class="table-first">S.no</th>
                  <th scope="col">Sizes</th>
                  <th scope="col">Category</th>
                  <th scope="col">Status</th>
                  <th scope="col">Created Date</th>
                  <th scope="col">Actions</th>
              
              </tr>
            </thead>
            <tbody>
              <?php
             
                $sno = 1;

                $sql = 'SELECT sizes.id,sizes.created_on as date,sizes.status,categories.id as cat_id, sizes.sizes, categories.type FROM ((sizes
                JOIN sizes_has_categories ON sizes.id = sizes_has_categories.sizes_id)
                JOIN categories ON categories.id = sizes_has_categories.categories_id) order by sizes.sizes ASC';

                $res = $conn->query($sql);

                if($res == TRUE)
                {
                    $count = $res->num_rows;

                    if($count >0)
                    {
                      while($row = $res->fetch_assoc()) 
                      {
                        $id = $row['id'] ;
                        $cat_id = $row['cat_id'] ;
                        $sizes = $row['sizes'] ;
                        $categories = $row['type'] ;
                        $status1 = $row['status'] ;
                        $date_sizes = $row['date'] ;
                       // $date_sizes = date("d-m-Y h:i:sa",$date_sizes);
              ?>

              <tr>
                <td class="table-first">
                        <span class="custom-checkbox">
                          <input type="checkbox" id="checkbox1" name="options[]" value="1">
                          <label for="checkbox1"></label>
                        </span>
                      </td>
                <td><span id="cat-id"></span><?php echo $sno++;?></td>
     
                <td><span id="sizes<?php echo $id?>"><?php echo $sizes;?></span></td>
                <td><span id="cat-sizes<?php echo $id?>"><?php echo $categories;?></span></td>
                <td><span id="sizes-status<?php echo $id?>"><?php if($status1=='Yes'){echo "<div><span class='active-status'></span>Active</div>";}else{echo "<div><span class='inactive-status'></span>InActive</div>";};?></td>
                <td><?php echo $date_sizes;?></td>  
                <td >
                        <button  class="edit-tbl edit-tbl-size" data-catid="<?php echo $cat_id?>"value="<?php echo $id;?>"data-bs-toggle="modal" data-bs-target="#edit2"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></button>
                    
                        <button  class="delete-tbl del-tbl-size" value="<?php echo $id;?>"  data-bs-toggle="modal"  data-bs-target="#delete1"><i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></button>
                  </td>
              </tr>
          

              </script>

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

<!-- ======= Modal Add New size ========= -->
<div class="modal fade" id="add-new-size" tabindex="-1" aria-labelledby="add-new-size" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-new-size">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="POST">
             <div class="mb-3 row">
              <label for="inputsizes" class="col-sm-2 col-form-label">Sizes</label>
              <div class="col-sm-10">
                <input type="text" name="add-sizes" class="form-control" id="inputsizes" value="" placeholder="New Size">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputcategory" class="col-sm-2 col-form-label">Category</label>
           
            
              <div class="col-sm-10">
                  <select class="form-select mb-3" name="add_cat1" aria-label=" example">
                  
                 
                  <?php 
                    $sql_cat_sel = "select * from categories where status='Yes'";
                    $res_cat_sel = $conn->query($sql_cat_sel);
                    if ($res_cat_sel->num_rows>1) {
                        while ($row = $res_cat_sel->fetch_assoc()) {
                  ?>  

                    <option value="<?php echo $row['id'];?>"><?php echo $row['type'];?></option>
                 
                 <?php
                        }
                    }
                    else
                    {
                      echo "NO Categories";
                    }
                  ?>
                  
                  </select>
              </div>
            </div>
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Status</label>
                <div class="col-sm-8">
              
                <input class="form-check-input" id="edit_size_stat" type="radio" name="status1" value="Yes" >
                <label class="form-check-label" >
                  Active
                </label>
                <input class="form-check-input" id="edit_size_stat" type="radio" name="status1" value="No" >
                <label class="form-check-label" >
                  Canceled
                </label>

              </div>           
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="add_sizes_submit" class="btn btn-primary" data-bs-toggle="modal"  data-bs-dismiss="modal">Add</button>
      </div>
      </form>  
    </div>
  </div>
</div>
<?php
if(isset($_REQUEST['add_sizes_submit']))
{
 $add_sizes = $_REQUEST['add-sizes'];
 $add_ref = rand(10,20).rand(21,30).rand(31,40).rand(41,50).rand(51,99);
 $add_cat = $_REQUEST['add_cat1'];
 $status1 = $_REQUEST['status1'];
//  $date = date("Y-m-d h:i:sa");
 


 $sql_size_add = "INSERT INTO sizes Set sizes = '$add_sizes', status ='$status1', created_on=now(), Ref_size='$add_ref'";

 
 $res_add1 = $conn->query($sql_size_add);

 $last_id_in_table1 =  mysqli_insert_id($conn);
 $sql_size_add1 = "INSERT INTO sizes_has_categories SET sizes_id = '$last_id_in_table1',categories_id  = '$add_cat'";

 if($res_add1 == TRUE)
 {
  $res_add2 = $conn->query($sql_size_add1);
  echo $Err_add_cat = "<div class='alert alert-success col-sm-6'>Size Added successfully;</div>";
  echo "<meta http-equiv='refresh' content='1'>";
}
 else
 {
  echo $Err_add_cat = "<div class='alert alert-warning col-sm-6'>Failed To Add</div>";
 }
  
}


?>


<!-- ======= Modal Add New Size ========= -->




<!-- ========== Modal Delete========= -->

<!-- Modal -->
<div class="modal fade" id="delete1" tabindex="-1" aria-labelledby="delet1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete1Label">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are You Sure ? You want to delete selected one.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delete2" data-bs-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="delete2" tabindex="-1" aria-labelledby="delet1Labe2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete1Label">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post">
      <div class="form-group">
        <label for="sizes">Sizes</label>
        <input type="hidden" name="id3" id="id3" value=""/>
        <input type="text" readonly class="form-control" id="del-size" aria-describedby="Category" value="">
      </div>
      <div class="form-group">
        <label for="sizes">Categories</label>
        <input type="text" readonly id="del-size-cat" class="form-control" aria-describedby="Status" value="">
      </div>
      
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit"  id ="del-size-tbl" name ="del_size_cat" class="btn btn-primary" data-bs-toggle="modal"  data-bs-dismiss="modal">Yes</button>
      </div>
    </form>
    </div>
  </div>
</div>

<?php 
if(isset($_REQUEST['del_size_cat']))
{
  $id3 = $_REQUEST['id3'];

  $sql3 = "DELETE FROM sizes WHERE ID ='$id3'";

  $res3 = $conn->query($sql3);

  if($res3 == TRUE)
  {
    echo $Err_add_cat = "<div class='alert alert-success col-sm-6'>Size Added successfully;</div>";
    echo "<meta http-equiv='refresh' content='1'>";
  }
  else
  {
    echo $Err_add_cat = "<div class='alert alert-warning col-sm-6'>Failed To Add</div>";
  }

}

?>



<!-- ========== Modal Delete========= -->
<?php
if(isset($_REQUEST['edit_sub']))
{
 

    $edit_sizes = $_REQUEST['edit_id_sizes'];
    $edit_cat = $_REQUEST['sel_size_cat'];
    $status2 = $_REQUEST['size_status'];
    $sizeid = $_REQUEST['size_id1'];
    $catid1 = $_REQUEST['cat_id1'];
    $catid2 = $_REQUEST['cat_id2'];

    $sql_size_edit = "UPDATE sizes Set sizes = '$edit_sizes', status ='$status2' where id = $sizeid ";

    
    $res_edit1 = $conn->query($sql_size_edit);


    $sql_size_edit1 = "UPDATE sizes_has_categories SET 
    sizes_id = '$sizeid', categories_id  = '$catid2'
    where sizes_id ='$sizeid' and categories_id = '$catid1'";

    if($res_edit1 == TRUE)
    {
      $res_edit2 = $conn->query($sql_size_edit1);
      echo $Err_add_cat = "<div class='alert alert-success col-sm-6'>Size Added successfully;</div>";
      echo "<meta http-equiv='refresh' content='1'>";
    }
    else
    {
      echo $Err_add_cat = "<div class='alert alert-warning col-sm-6'>Failed To Add</div>";
    }


}




?>

<!-- ========== Modal Edit========= -->
<div class="modal fade" id="edit2" tabindex="-1" aria-labelledby="edit1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edi2Label">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post">
             <div class="mb-3 row">
               <input type="hidden" id="size_id1" name="size_id1" value="">
               <input type="hidden" id="cat_id1" name="cat_id1" value="">
               <input type="hidden" id="cat_id2" name="cat_id2" value="">
              <label for="inputsizes" class="col-sm-2 col-form-label">Sizes</label>
              <div class="col-sm-10">                                       
                <input type="text"  class="form-control" id="edit_id_sizes" name="edit_id_sizes"value="size">
              </div>
            </div>
            
            <div class="mb-3 row">
              <label for="inputcategory" class="col-sm-2 col-form-label">Category</label>
              <div class="col-sm-10">
                  <select class="form-select  mb-3" id="sel-size-cat" name="sel_size_cat" aria-label=" example">
                  <option class="dd" value=""></option>
                  <?php


                      $sql_sel= "SELECT * FROM categories ";
                      $res4 = $conn->query($sql_sel);
                      while ($row4 = $res4->fetch_assoc()) {
                        $cid = $row4['id'];
                       ?>
                      <?php


                      ?>
                      <option class="" value="<?php echo $cid;?>"><?php echo $row4['type']?></option>
                      
                      <?php
                        }
                      
                      ?>
                    
                  </select>
              </div>
            </div>

            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-8">
              
                <input class="form-check-input" id="edit_size_stat1" type="radio" name="size_status" value="Yes" >
                <label class="form-check-label" >
                  Active
                </label>
                <input class="form-check-input" id="edit_size_stat2" type="radio" name="size_status" value="No" >
                <label class="form-check-label" >
                  Canceled
                </label>

              </div>           
            </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="edit_sub" data-bs-dismiss="modal" class="btn btn-primary">Yes</button>
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
