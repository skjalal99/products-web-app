<?php include('../includes/header.php');?>

<?php include('includes/ceramic_menu.php');?>


<div class="container-fluid">
<h1 class="main-title">All Tiles specifcation</h1>
        <div class="table-wrapper">
             <div class="row">
      
                    <div class="col-sm-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" ><span class="input-group-addon"><i class="fas fa-filter"></i></span></div>
                            </div>
                            <select class="form-select"  name="" id="search-size" >
                                <option selected>Select Size</option>
                                <option value="10x10">10x10</option>
                                <option value="10x20">10x20</option>
                                <option value="10x30">10x30</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                        <div class="input-group-prepend">
                                <div class="input-group-text" ><span class="input-group-addon"><i class="fas fa-filter"></i></span></div>
                            </div>
                             <input type="text" class="form-control" id="search-model" placeholder="Model" aria-label="Model" aria-describedby="Model">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <select class="form-select"  name="" id="search-type" >
                                <option selected>Select Category</option>
                                <option value="wall">Wall</option>
                                <option value="floor">Floor</option>
                                <option value="roof">Roof</option>
                            </select>
                            
                             <div class="input-group-prepend">
                                <div class="input-group-text" ><span class="input-group-addon"><i class="fa fa-search"></i></span></div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 d-flex flex-row justify-content-end ">
                    
                        <div class="btn-group btn-search-radio" data-toggle="buttons">
                            <label class="btn btn-info active">
                                <input type="radio" name="status" value="all" checked="checked"> All
                            </label>
                            <label class="btn btn-success">
                                <input type="radio" name="status" value="active"> Active
                            </label>
                            <label class="btn btn-warning">
                                <input type="radio" name="status" value="inactive"> Inactive
                            </label>
                            <label class="btn btn-danger">
                                <input type="radio" name="status" value="expired"> Expired
                            </label>							
                        </div>

                    </div>
                </div>
                <!-- ====Row Ends==== -->

            <div class="table-responsive table-spec">
            <table class="table table-dark table-striped table-hover ">
                <thead class="thead-spec">
                    <tr>
                        <th>#</th>
                        <th>Size</th>
                        <th>Model</th>
                        <th>Pictures</th>
                        <th>Thickness</th>
                        <th>Cm</th>
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
                    <tr data-status="inactive">
                        <td>1</td>
                        <td>10x10</td>
                        <td>DG-36701</td>
                        <td><img src="../assets/images/2-a.jpg" width="50" alt="img"></td>
                        <td>7.5</td>
                        <td><span class="label label-success">0.75</span></td>
                        <td>Wall</td>
                        <td>Glossy</td>
                        <td>Gray</td>
                        <td>Indoor</td>
                        <td>erwerwe</td>
                        <td>Material</td>
                        <td>000</td>
                        <td>Canceled</td>
                        <td>
                             <a href="#" data-toggle="tooltip class="btn-sm table-view-button boxshadow " data-bs-toggle="modal" data-bs-target="#WallModal"><i class="fa fa-eye text-alert" aria-hidden="true"></i> View</a>
                        </td>
                        
                    </tr>
                    <tr data-status="inactive">
                    <td>2</td>
                        <td>10X20</td>
                        <td>DG-36702</td>
                        <td><img src="../assets/images/2-a.jpg" width="50" alt="img"></td>
                        <td>7.5</td>
                        <td><span class="label label-success">0.75</span></td>
                        <td>Wall</td>
                        <td>Glossy</td>
                        <td>Gray</td>
                        <td>Indoor</td>
                        <td>erwerwe</td>
                        <td>Material</td>
                        <td>000</td>
                        <td>Canceled</td>
                        <td>
                                 <a href="#" data-toggle="tooltip class="btn-sm table-view-button boxshadow " data-bs-toggle="modal" data-bs-target="#WallModal"><i class="fa fa-eye text-alert" aria-hidden="true"></i> View</a> 
                        </td>
                    </tr>
                    <tr data-status="active">
                        <td>3</td>
                        <td>10X20</td>
                        <td>DG-36703</td>
                        <td><img src="../assets/images/2-a.jpg" width="50" alt="img"></td>
                        <td>7.5</td>
                        <td><span class="label label-success">0.75</span></td>
                        <td>Wall</td>
                        <td>Glossy</td>
                        <td>Gray</td>
                        <td>Indoor</td>
                        <td>erwerwe</td>
                        <td>Material</td>
                        <td>000</td>
                        <td>Canceled</td>
                        <td>
                                 <a href="#" data-toggle="tooltip class="btn-sm table-view-button boxshadow " data-bs-toggle="modal" data-bs-target="#WallModal"><i class="fa fa-eye text-alert" aria-hidden="true"></i> View</a> 
                        </td>
                    </tr>
                    <tr data-status="expired">
                    <td>4</td>
                        <td>10X20</td>
                        <td>DG-36704</td>
                        <td><img src="../assets/images/2-a.jpg" width="50" alt="img"></td>
                        <td>7.5</td>
                        <td><span class="label label-success">0.75</span></td>
                        <td>Floor</td>
                        <td>Glossy</td>
                        <td>Gray</td>
                        <td>Indoor</td>
                        <td>erwerwe</td>
                        <td>Material</td>
                        <td>000</td>
                        <td>Canceled</td>
                        <td>
                                 <a href="#" data-toggle="tooltip class="btn-sm table-view-button boxshadow " data-bs-toggle="modal" data-bs-target="#WallModal"><i class="fa fa-eye text-alert" aria-hidden="true"></i> View</a> 
                        </td>
                    </tr>
                    <tr data-status="inactive">
                    <td>5</td>
                        <td>10X20</td>
                        <td>DG-36705</td>
                        <td><img src="../assets/images/2-a.jpg" width="50" alt="img"></td>
                        <td>7.5</td>
                        <td><span class="label label-success">0.75</span></td>
                        <td>Wall</td>
                        <td>Glossy</td>
                        <td>Gray</td>
                        <td>Indoor</td>
                        <td>erwerwe</td>
                        <td>Material</td>
                        <td>000</td>
                        <td>Canceled</td>
                        <td>
                                 <a href="#" data-toggle="tooltip class="btn-sm table-view-button boxshadow " data-bs-toggle="modal" data-bs-target="#WallModal"><i class="fa fa-eye text-alert" aria-hidden="true"></i> View</a> 
                        </td>
                    </tr>
                    <tr data-status="inactive">
                    <td>6</td>
                        <td>10X30</td>
                        <td>DG-36706</td>
                        <td><img src="../assets/images/2-a.jpg" width="50" alt="img"></td>
                        <td>7.5</td>
                        <td><span class="label label-success">0.75</span></td>
                        <td>Wall</td>
                        <td>Glossy</td>
                        <td>Gray</td>
                        <td>Indoor</td>
                        <td>erwerwe</td>
                        <td>Material</td>
                        <td>000</td>
                        <td>Canceled</td>
                        <td>
                                <a href="#" class="edit " title="View" data-toggle="tooltip">
                                    <span><i class="fa fa-eye text-warning" aria-hidden="true"> View</i></span>
                                </a>   
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> 
        <!-- ========table-wrapper ends========= -->
    </div>  
    <!-- ======Table Responsive ends=========  -->
</div> 
<!-- ======container fluid ends========= -->








<?php include('includes/ceramic_footer.php');?>

<?php include('../includes/footer.php');?>

