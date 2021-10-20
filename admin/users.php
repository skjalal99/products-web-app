<?php include('includes/header-admin.php');?>
<?php include('includes/aside.php');?>
<!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      
    <?php include('includes/navbar.php');?>

    <div class="container-fluid">

  

          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                <h2>User control</h2><small>Dashboard</small>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="admin/index.php">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Users Controls
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
        <div class="col-md-6"><h3 class="table-title">User Access Details</h3></div>
        <div class="col-md-6">
          <div class="float-end"> <button class="btn btn-success justify-content-end" data-bs-toggle="modal" data-bs-target="#add-new-user">Add New <i class="fa fa-plus"></i></button></div>

        </div>
      </div>



      <div class = "table-responsive">
            <table class="table table-striped table-bordered text-center">
            <thead class="thead-bg">
              <tr>
                  <th scope="col" >#</th>
                  <th>User Name</th>
                  <th>Full Name</th>
                  <th>Password</th>
                  <th>Contact</th>
                  <th>Role</th>
                  <th>Access</th>
                  <th>Status</th>
                  <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row" >1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>*******</td>
                <td>+966-55xxxxxxx</td>
                <td>Admin</td>
                <td>All </td>
                <td>Active</td>
                  <td >
                        <a href="" class="edit-tbl" data-bs-toggle="modal" data-bs-target="#edit-user"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                        <a href="#" class="delete-tbl" data-bs-toggle="modal"  data-bs-target="#delete-user"><i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></a>
                  </td>
              </tr>
              <tr>
                <td scope="row" >2</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>*******</td>
                <td>+966-55xxxxxxx</td>
                <td>User</td>
                <td>Cer </td>
                <td>InActive</td>
                  <td >
                        <a href="" class="edit-tbl" data-bs-toggle="modal" data-bs-target="#edit2"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                        <a href="#" class="delete-tbl" data-bs-toggle="modal"  data-bs-target="#delete1"><i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></a>
                  </td>
              </tr>
           
            </tbody>
            </table>
      </div>





</div>
<!-- ==== Container-fluid Ends ==== -->

<!-- ======= Modal Add New  ========= -->
<div class="modal fade" id="add-new-user" tabindex="-1" aria-labelledby="add-new-user" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-new-size">Add New Users</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="">
             <div class="mb-3 row">
              <label for="username" class="col-sm-4 col-form-label">User Name</label>
              <div class="col-sm-8">
                <input type="text"  class="form-control"   value="User Name">
              </div>
            </div>
             <div class="mb-3 row">
              <label for="fullname" class="col-sm-4 col-form-label">Full Name</label>
              <div class="col-sm-8">
                <input type="text"  class="form-control"   value="Full Name">
              </div>
            </div>
             <div class="mb-3 row">
              <label for="password" class="col-sm-4 col-form-label">Password</label>
              <div class="col-sm-8">
                <input type="password"  class="form-control"   value="Password">
              </div>
            </div>
             <div class="mb-3 row">
              <label for="contact" class="col-sm-4 col-form-label">Contact</label>
              <div class="col-sm-8">
                <input type="text"  class="form-control"   value="Contact">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="role" class="col-sm-4 col-form-label">Role</label>
              <div class="col-sm-8">
                  <select class="form-select  mb-3" aria-label=" example">
                    <option value="1" >Admin</option>
                    <option value="2" selected>User</option>
                  </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="access" class="col-sm-4 col-form-label">Access</label>
              <div class="col-sm-8">
                  <select class="form-select  mb-3" aria-label=" example">
                    <option selected>Select</option>
                    <option value="1">Cer</option>
                    <option value="2">Plast</option>
                    <option value="3">EWH</option>
                  </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="status" class="col-sm-4 col-form-label">Status</label>
              <div class="col-sm-8">
              
                <input class="form-check-input" type="checkbox" name="status"  checked>
                <label class="form-check-label" >
                  Active
                </label>
                <input class="form-check-input" type="checkbox" name="status"  >
                <label class="form-check-label" >
                  InActive
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
<!-- ======= Modal Add New  ========= -->




<!-- ========== Modal Delete========= -->

<!-- Modal -->
<div class="modal fade" id="delete-user" tabindex="-1" aria-labelledby="delete-userLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete-userLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are You Sure ? You want to delete selected one.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delete-user-ok" data-bs-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="delete-user-ok" tabindex="-1" aria-labelledby="delete-user-okLabe2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete-user-okLabel">Modal title</h5>
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
<div class="modal fade" id="edit-user" tabindex="-1" aria-labelledby="edit-userLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-userLabel">Edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="">
             <div class="mb-3 row">
              <label for="inputsizes" class="col-sm-4 col-form-label">User Name</label>
              <div class="col-sm-8">
                <input type="text"  class="form-control"   value="User Name">
              </div>
            </div>
             <div class="mb-3 row">
              <label for="inputsizes" class="col-sm-4 col-form-label">Full Name</label>
              <div class="col-sm-8">
                <input type="text"  class="form-control"   value="Full Name">
              </div>
            </div>
             <div class="mb-3 row">
              <label for="inputsizes" class="col-sm-4 col-form-label">Password</label>
              <div class="col-sm-8">
                <input type="text"  class="form-control"   value="Password">
              </div>
            </div>
             <div class="mb-3 row">
              <label for="inputsizes" class="col-sm-4 col-form-label">Contact</label>
              <div class="col-sm-8">
                <input type="text"  class="form-control"   value="Contact">
              </div>
            </div>
             <div class="mb-3 row">
              <label for="inputsizes" class="col-sm-4 col-form-label">Role</label>
              <div class="col-sm-8">
                <input type="text"  class="form-control"   value="Role">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputcategory" class="col-sm-4 col-form-label">Access</label>
              <div class="col-sm-8">
                  <select class="form-select  mb-3" aria-label=" example">
                    <option selected>Open this select menu</option>
                    <option value="1">Cer</option>
                    <option value="2">Plast</option>
                    <option value="3">EWH</option>
                  </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputcategory" class="col-sm-4 col-form-label">Status</label>
              <div class="col-sm-8">
              
                <input class="form-check-input" type="checkbox" name="status"  checked>
                <label class="form-check-label" >
                  Active
                </label>
                <input class="form-check-input" type="checkbox" name="status"  >
                <label class="form-check-label" >
                  InActive
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





 <?php include('includes/footer-admin.php');?>
 
    </main>
<!-- ======== main-wrapper end =========== -->


<?php include('includes/footer1.php');?>
