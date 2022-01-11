<?php include('../includes/header-admin.php');?>
<?php include('../includes/aside.php');?>
<?php include_once('../config/dbconn.php'); ?>

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
            <table class="table table-striped table-bordered">
            <thead class="thead-bg">
              <tr>
                    <th class="table-first">
                      <span class="custom-checkbox">
                        <input type="checkbox" id="selectAllchecks">
                        <label for="selectAllchecks"></label>
                      </span>
                    </th>
                  <th scope="col" class="table-first">Sr.No</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Actions</th>
              
              </tr>
            </thead>
            <tbody>
              <tr >
                <td class="table-first">
                        <span class="custom-checkbox">
                          <input type="checkbox" id="checkbox1" name="options[]" value="1">
                          <label for="checkbox1"></label>
                        </span>
                      </td>
                <td>Mark</td>
                <td>Otto</td>
                  <td >
                        <a href="" class="edit-tbl" data-bs-toggle="modal" data-bs-target="#edit-cat"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                        <a href="#" class="delete-tbl" data-bs-toggle="modal"  data-bs-target="#delete-cat"><i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></a>
                  </td>
              </tr>
              <tr>
                <td class="table-first">
                        <span class="custom-checkbox">
                          <input type="checkbox" id="checkbox1" name="options[]" value="1">
                          <label for="checkbox1"></label>
                        </span>
                      </td>
                <td>Mark</td>
                <td>Otto</td>
                <td>
                        <a href="" class="edit-tbl" data-bs-toggle="modal" data-bs-target="#edit-cat"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                        <a href="#" class="delete-tbl" data-bs-toggle="modal"  data-bs-target="#delete-cat"><i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></a>
                        
                </td>
              </tr>
            </tbody>
            </table>
      </div>



</div>
<!-- ==== Container-fluid Ends ==== -->

<!-- ======= Modal Add New Modal ========= -->
<div class="modal fade" id="add-new-cat" tabindex="-1" aria-labelledby="add-new-cat" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-new-tiles">Add New Tiles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="">
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Categories</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name=""> 
                </div>
            </div>
            
            
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Status</label>
                <div class="col-sm-8">
              
                <input class="form-check-input" type="checkbox" name="status"  checked>
                <label class="form-check-label" >
                  Active
                </label>
                <input class="form-check-input" type="checkbox" name="status"  >
                <label class="form-check-label" >
                  Canceled
                </label>

              </div>           
            </div>

        </form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal"  data-bs-dismiss="modal">Add</button>
      </div>
    </div>
  </div>
</div>
<!-- ======= Modal Add New Size ========= -->


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
<div class="modal fade" id="edit-cat" tabindex="-1" aria-labelledby="edit-cat" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-cat">Edit Tiles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="">
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Categories</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name=""> 
                </div>
            </div>
            
            
            <div class="mb-3 row">
                <label for="inputsizes" class="col-sm-4 col-form-label">Status</label>
                <div class="col-sm-8">
              
                <input class="form-check-input" type="checkbox" name="status"  checked>
                <label class="form-check-label" >
                  Active
                </label>
                <input class="form-check-input" type="checkbox" name="status"  >
                <label class="form-check-label" >
                  Canceled
                </label>

              </div>           
            </div>

        </form>        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- ========== Modal Edit========= -->





 <?php include('../includes/footer-admin.php');?>
 
    </main>
<!-- ======== main-wrapper end =========== -->


<?php include('../includes/footer1.php');?>



$.ajax(url,settings);
url : string containing url,
method:post/get or type:Post/get,
data :data to be sent to server data:{"name":"sonam", "Roll":101} or json.stringfy(variable)
timeout :
success:
dataType: expecting data from the server; xml, html, script, json, jsonp, text;

$.ajax({
url:"data.php"

})

$.ajax({
  url:"diplay.php",
  type:'post',
  data:{
      dispsend:dispdata,
      dispsend:dispdata,
  },
    success:function(data1,status)
    {
      console.log(status);
      $('#'displaytble').html(data);
    }

});

