<?php include('includes/header-admin.php');?>
<?php include('includes/aside.php');?>
<?php include_once('config/dbconn.php');?>
<?php include_once("config/functions.php");?>
<?php
if(!isset($_SESSION['User-Login']))
{
	header("Location:login.php");
}

?>

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
            <?php
            $sno="1";
                   
                   $sql_users = "SELECT users.id,users.user_name,users.full_name,
                   users.role,users.status,users.contact,users.password,
                   company.co_name,company.description
                   FROM ((users
                   JOIN users_has_company ON users.id = users_has_company.users_id)
                   JOIN company ON company.id = users_has_company.company_id);";

                   $res_users = $conn->query($sql_users);

                   if($res_users == TRUE)
                   {
                       $count1 = $res_users->num_rows;

                       if($count1 >0)
                       {
                         
                         while($row_users = $res_users->fetch_assoc()) 
                         {
                           $users = $row_users['user_name'] ;
                           $users_id = $row_users['id'] ;
                           $full_name = $row_users['full_name'] ;
                           $pass = $row_users['password'];
                           $roles = $row_users['role'] ; 
                           $contact = $row_users['contact'] ; 
                           $access = $row_users['co_name'] ; 
                           $status = $row_users['status'] ; 

                          
                 ?>
              
              <tr>
                <td ><?php echo $sno++;?></td>
                <td ><?php echo $users;?></td>
                <td ><?php echo $full_name;?></td>
                <td ><?php echo '******';?></td>
                <td ><?php echo $contact;?></td>
                <td ><?php echo $roles;?></td>
                <td ><?php echo $access;?></td>
                <td ><?php echo $status;?></td>
           
               
                  <td >
                        <a href="" class="edit-tbl edit-tbl-user" value='<?php echo $users_id;?>' data-bs-toggle="modal" data-bs-target="#edit-user"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                        <a href="#" class="delete-tbl del-tbl-user" value='<?php echo $users_id;?>' del_user='<?php echo $users;?>'data-bs-toggle="modal"  data-bs-target="#delete-user"><i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></a>
                  </td>
              </tr>
              <?php
                      }
                    }
                    else
                    {
                      echo "No Data To Display";

                    }

                }

              ?>
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
      <form action="" method='post'>
             <div class="mb-3 row">
              <label for="username" class="col-sm-4 col-form-label">User Name</label>
              <div class="col-sm-8">
                <input type="text" name='user_name'id='user_name' class="form-control"   placeholder="Enter User Name" required>
              </div>
            </div>
             <div class="mb-3 row">
              <label for="fullname" class="col-sm-4 col-form-label">Full Name</label>
              <div class="col-sm-8">
                <input type="text" name='full_name'id='full_name' class="form-control"   placeholder="Enter Full Name" required>
              </div>
            </div>
             <div class="mb-3 row">
              <label for="password" class="col-sm-4 col-form-label">Password</label>
              <div class="col-sm-8">
                <input type="password" name='password1' id='password1'class="form-control"   placeholder="Password">
              </div>
            </div>
            
             <div class="mb-3 row ">
              <label for="contact" class="col-sm-4 col-form-label">Contact</label>
              <div class="col-sm-8">
              <input type="text" class="form-control"  name='contact1' id='contact1'placeholder="+966-545678900"  required>  

              </div>
            </div>
            <div class="mb-3 row">
              <label for="role" class="col-sm-4 col-form-label">Role</label>
              <div class="col-sm-8">
                  <select class="form-select  mb-3" name='role'id='role' aria-label=" example">
                    <option value="Admin" >Admin</option>
                    <option value="User" selected>User</option>
                  </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="access" class="col-sm-4 col-form-label">Access</label>
              <div class="col-sm-8">
              <select class="form-select  mb-3" aria-label="example" id='access' name='access'>
                <?php
                $sql_user = "SELECT * FROM company";

                $res_user = $conn->query($sql_user);
                  if($res_user == TRUE){
                    while($row1=$res_user->fetch_assoc())
                    {

                   
                 ?>
                    <option value="<?php echo $row1['id'];?>" selected><?php echo $row1['co_name'];?></option>

                <?php   
                  }
                    

                }
                else{
                  echo "No Data";
                }
                              
              ?>

                  </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="status" class="col-sm-4 col-form-label">Status</label>
              <div class="col-sm-8">
              
                <input class="form-check-input" type="radio" id='status1' value='Yes'name="status"  checked>
                <label class="form-check-label" >
                  Active
                </label>
                <input class="form-check-input" type="radio"value='' id='status2' name="status"  >
                <label class="form-check-label" >
                  InActive
                </label>

              </div>                
            </div>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name='user_add' class="btn btn-primary" data-bs-toggle="modal"  data-bs-dismiss="modal">Add</button>
      </div>
    </div>
    </form>  
  </div>
</div>
<!-- ======= Modal Add New  ========= -->
<?php
if (isset($_REQUEST['user_add'])) {
    $user_name  = $conn-> real_escape_string($_REQUEST['user_name']);
    $full_name  = $conn-> real_escape_string($_REQUEST['full_name']);
    $password1  = $conn-> real_escape_string(md5($_REQUEST['password1']));
    $contact1   = $conn-> real_escape_string($_REQUEST['contact1']);
    $role       = $conn-> real_escape_string($_REQUEST[ 'role']);
    $access     = $conn-> real_escape_string($_REQUEST[ 'access']);
    $status     = $conn-> real_escape_string($_REQUEST['status']);

    $sql_user_ins = "INSERT INTO USERS SET
    user_name ='$user_name',
    full_name ='$full_name',
    password  ='$password1',
    role      ='$role',
    status    ='$status',
    contact   ='$contact1'";

   $res12 = $conn->query($sql_user_ins);

    if ($res12 == true) {
        $last_insert_id =  mysqli_insert_id($conn);

       echo  $sql_user_ins1 = "INSERT INTO users_has_company SET
        users_id = '$last_insert_id',company_id='$access'";

        $res13 = $conn->query($sql_user_ins1) or die(mysqli_error());
        echo "<meta http-equiv='refresh' content='1'>";
        echo $Err_add_tiles = "<div class='alert alert-primary col-sm-6'>Updated Successfully;</div>";
    }
}
?>


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
        Are You Sure ? You want to delete <span id='del_user' class='text-danger'></span>.
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
      <form method='post'>
      <div class="modal-body">
      Are You Sure ? You want to delete selected one.
      <input type='hidden' value='' id='del_user_t' name='del_user_id'>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="user_del"class="btn btn-primary" data-bs-toggle="modal"  data-bs-dismiss="modal">Yes</button>
      </div>
    </div>
</form>
  </div>
</div>
        <?php
        if (isset($_REQUEST['user_del'])) {
            $del_id = $_REQUEST['del_user_id'];
            $sql_del_user = "DELETE FROM USERS WHERE ID = '$del_id'";

            $res_del_user = $conn ->query($sql_del_user);
            if ($res_del_user == true) {
                echo "<meta http-equiv='refresh' content='1'>";
                echo $Err_add_tiles1 = "<div class='alert alert-primary col-sm-6'>Deleted Successfully;</div>";
            } else {
              echo "<meta http-equiv='refresh' content='1'>";
                echo $Err_add_tiles1 = "<div class='alert alert-warning col-sm-6'>Error: Something went wrong, Try again later;</div>";
            }
        }
        ?>
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
      <form action="" method='post'>
             <div class="mb-3 row">
              <label for="username" class="col-sm-4 col-form-label">User Name</label>
              <div class="col-sm-8">
                <input type='hidden' value='' name='change_2' id='change_2'>
                <input type="text" name='user_name2'id='user_name2' value='' class="form-control"   placeholder="Enter User Name" required>
              </div>
            </div>
             <div class="mb-3 row">
              <label for="fullname" class="col-sm-4 col-form-label">Full Name</label>
              <div class="col-sm-8">
                <input type="text" name='full_name2'id='full_name1' value='' class="form-control"   placeholder="Enter Full Name" required>
              </div>
            </div>
            <div class="mb-3 row" >
            <label for="contact" class="col-sm-12 col-form-label">To change the current password click link:</label>
          
                  <a href='#' class='' id="change_pass">Change Password?</a>
             
              </div>
             <div class="mb-3 row" style="display:none;"id='cpass-show'>
              <label for="password" class="col-sm-4 col-form-label">Password</label>
              <div class="col-sm-8">
                <input type="password" name='password2' id='password2' value=''class="form-control"   placeholder="Password">
              </div>
            </div>
          
             <div class="mb-3 row " >
              <label for="contact" class="col-sm-4 col-form-label">Contact</label>
              <div class="col-sm-8">
              <input type="text" class="form-control"  name='contact2'value='' id='contact2'placeholder="+966-545678900"  required>  

              </div>
            </div>
            <div class="mb-3 row">
              <label for="role" class="col-sm-4 col-form-label">Role</label>
              <div class="col-sm-8">
                  <select class="form-select  mb-3" name='role2'id='role1' aria-label=" example">
                    <option value="Admin" >Admin</option>
                    <option value="User" selected>User</option>
                  </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="access" class="col-sm-4 col-form-label">Access</label>
              <div class="col-sm-8">
              <select class="form-select  mb-3" aria-label="example" id='access1' name='access2'>
                <?php
                $sql_user1 = "SELECT * FROM company";

                $res_user1 = $conn->query($sql_user1);
                  if($res_user1 == TRUE){
                    while($row11=$res_user1->fetch_assoc())
                    {

                   
                 ?>
                    <option value="<?php echo $row11['id'];?>" selected><?php echo $row11['co_name'];?></option>

                <?php   
                  }
                    

                }
                else{
                  echo "No Data";
                }
                              
              ?>

                  </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="status" class="col-sm-4 col-form-label">Status</label>
              <div class="col-sm-8">
              
                <input class="form-check-input" type="radio" id='status12' value='Yes'name="status2"  checked>
                <label class="form-check-label" >
                  Active
                </label>
                <input class="form-check-input" type="radio" value='No' id='status13' name="status2"  >
                <label class="form-check-label" >
                  InActive
                </label>

              </div>                
            </div>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close1" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name='edit_user' class="btn btn-primary" data-bs-toggle="modal"  data-bs-dismiss="modal">Edit</button>
      </div>
    </div>
    </form> 
  </div>
</div>
<!-- ========== Modal Edit========= -->
<?php
if (isset($_REQUEST['edit_user'])) {
    $user_name2 =$_REQUEST['user_name2'];
    $full_name2 =$_REQUEST['full_name2'];
    $contact2 =$_REQUEST['contact2'];
    $role2 = $_REQUEST['role2'];
    $access2 = $_REQUEST['access2'];
    $status2 = $_REQUEST['status2'];
    if ($status2 == 'Yes') {
        $status2 = 'Active';
    } else {
        $status2 = 'Inactive';
    }
    $change_2 = $_REQUEST['change_2'];
     $password2 = md5($_REQUEST['password2']);


    if (!empty($password2)) {
              $sql_upd = "UPDATE USERS 
                SET user_name = '$user_name2',
                full_name = '$full_name2',
                password ='$password2',
                role ='$role2',
                status ='$status2',
                contact ='$contact2' where id='$change_2'";

       $res_upd = $conn->query($sql_upd) or die(mysqli_error());

        if ($res_upd == true) {
            $sql_upd1 = "UPDATE users_has_company
    SET company_id = '$access2' where users_id='$change_2'";

            $res_upd1 = $conn->query($sql_upd1) or die(mysqli_error());

            if ($res_upd1 == true) {
                echo   "<meta http-equiv='refresh' content='1'>";
                echo $Err_add_tiles = "<div class='alert alert-primary col-sm-6'>Updated Successfully;</div>";
            }
        } else {
             echo "<meta http-equiv='refresh' content='1'>";
            echo $Err_add_tiles = "<div class='alert alert-primary col-sm-6'>Error:something went wrong!;</div>";
        }
    }

else{

              $sql_upd = "UPDATE USERS 
              SET user_name = '$user_name2',
              full_name = '$full_name2',
              role ='$role2',
              status ='$status2',
              contact ='$contact2' where id='$change_2'";

            $res_upd = $conn->query($sql_upd) or die(mysqli_error());

            if ($res_upd == true) {
            $sql_upd1 = "UPDATE users_has_company
            SET company_id = '$access2' where users_id='$change_2'";

                   $res_upd1 = $conn->query($sql_upd1) or die(mysqli_error());

                    if ($res_upd1 == true) {
                     echo   "<meta http-equiv='refresh' content='1'>";
                      echo $Err_add_tiles = "<div class='alert alert-primary col-sm-6'>Updated Successfully;</div>";

                    } else {
                    // echo "<meta http-equiv='refresh' content='1'>";
                    echo $Err_add_tiles = "<div class='alert alert-primary col-sm-6'>Error:something went wrong!;</div>";
                    }
            }






}
}

?>


 <?php include('includes/footer-admin.php');?>
 
    </main>
<!-- ======== main-wrapper end =========== -->


<?php include('includes/footer1.php');?>
