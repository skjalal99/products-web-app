<?php include('../includes/header-admin.php');?>
<?php include('../includes/aside.php');?>
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
            <table class="table table-striped table-bordered">
            <thead class="thead-bg">
              <tr>
                    <th class="table-first">
                      <span class="custom-checkbox">
                        <input type="checkbox" id="selectAllchecks">
                        <label for="selectAllchecks"></label>
                      </span>
                    </th>
                  <th scope="col">Sizes</th>
                  <th scope="col">Category</th>
                  <th scope="col">Actions</th>
              
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="table-first">
                        <span class="custom-checkbox">
                          <input type="checkbox" id="checkbox1" name="options[]" value="1">
                          <label for="checkbox1"></label>
                        </span>
                      </td>
                <td>Mark</td>
                <td>Otto</td>
                  <td >
                        <a href=""  class="edit-tbl" data-bs-toggle="modal" data-bs-target="#edit2"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                        <a href="#" class="delete-tbl" data-bs-toggle="modal"  data-bs-target="#delete1"><i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></a>
                  </td>
              </tr>
              <tr>
                <td>
                        <span class="custom-checkbox">
                          <input type="checkbox" id="checkbox1" name="options[]" value="1">
                          <label for="checkbox1"></label>
                        </span>
                      </td>
                <td>Mark</td>
                <td>Otto</td>
                <td>
                        <a href=""  class="edit-tbl" data-bs-toggle="modal" data-bs-target="#edit2"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                        <a href="#" class="delete-tbl" data-bs-toggle="modal"  data-bs-target="#delete1"><i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></a>
                        
                </td>
              </tr>
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
      <form action="">
             <div class="mb-3 row">
              <label for="inputsizes" class="col-sm-2 col-form-label">Sizes</label>
              <div class="col-sm-10">
                <input type="text"  class="form-control" id="inputsizes" value="size">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputcategory" class="col-sm-2 col-form-label">Category</label>
              <div class="col-sm-10">
                  <select class="form-select  mb-3" aria-label=" example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
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
<div class="modal fade" id="edit2" tabindex="-1" aria-labelledby="edit1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edi2Label">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="">
             <div class="mb-3 row">
              <label for="inputsizes" class="col-sm-2 col-form-label">Sizes</label>
              <div class="col-sm-10">
                <input type="text"  class="form-control" id="inputsizes" value="size">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputcategory" class="col-sm-2 col-form-label">Category</label>
              <div class="col-sm-10">
                  <select class="form-select  mb-3" aria-label=" example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
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
