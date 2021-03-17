<body class="">
  
    <?php $this->load->view('loading_screen');?>
    
    <div class="wrapper ">

    <!-- Top NavBar -->
    <?php $this->load->view('navigation/sidebar');?>
    <!-- End of NavBar -->

    <div class="main-panel">

    <!-- Navbar -->
    <?php $this->load->view('navigation/topbar');?>
    <!-- End Navbar -->

        <div class="content" style="margin-top:50px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        
                        <button type="submit" class="btn btn-sm btn-outline-primary btn-round pull-right" data-target="#add_staff" data-toggle="modal">
                             <i class="material-icons">person_add</i>  Add Staff
                        </button>
                        <div class="tab-content tab-space">
                            <div class="tab-pane active">
                                 <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title mt-0">Staff Table</h4>
                            <p class="card-category"> Below is the list of all staffs</p>
                        </div>
                        <div class="card-body container-fluid">
                            <div class="table-responsive ">
                                <table class="display nowrap table table-hover table-sm " id="loan_clients_table">
                                <thead class="text-primary">
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php if(!empty($stafflist)){  ?>
                                    <?php foreach($stafflist as $key => $st){
                                           
                                        ?>
                                        <tr>
                                            <td><b><?php echo $st['firstname'].' '.$st['middlename'].'. '.$st['lastname'];?></b></td>
                                            <td class="text-center">
                                                <?php echo $st['address'];?>
                                            </td>
                                            <td><?php echo $st['number'];?></td>
                                            <td><?php echo $st['email'];?></td>
                                            <td><?php echo $st['position'];?></td>

                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Remove staff" class="btn btn-danger btn-sm btn-link" data-toggle="modal" data-target="#remove_staff<?php echo $st['username'];?>" id="remove-staff<?php echo $st['username'];?>">
                                                    <i class="material-icons">remove_circle</i>
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal for remove clients -->
                                        <div class="modal fade" id="remove_staff<?php echo $st['username'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Removing Staffs</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to remove this staff?</p>
                                                        <small class="text-danger font-italic">Note:This process cannot be undoned!</small>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-danger remove-staff" id="<?php echo $st['username'];?>">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of modal -->
                                    <?php } }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- Modal for add clients -->
                    <div class="modal fade" id="add_staff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Add Staff</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label class="text-danger error" style="display: none;">Username already exist</label>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Position</label>
                                            <select required="" class="position form-control">
                                                <option selected disabled="">Select Position</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Manager">Manager</option>
                                                <option value="Cashier">Cashier</option>
                                                <option value="Loan Officer">Loan Officer</option>
                                                <option value="Collector">Collector</option>
                                                <option value="Guest">Guest</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Enter Username</label>
                                            <input type="text" class="form-control username" required>
                                        </div>
                                        <div class="form-group main-staff">
                                            <label class="bmd-label-floating">Enter Password</label>
                                            <input type="password" class="form-control password" required>
                                        </div>
                                        <div class="form-group staff">
                                            <label class="bmd-label-floating">Enter Name</label>
                                            <input type="text" class="form-control name" required>
                                        </div>
                                        <div class="form-group staff">
                                            <label class="bmd-label-floating">Enter Address</label>
                                            <input type="text" class="form-control address" required>
                                        </div>

                                        <div class="form-group staff">
                                            <label class="bmd-label-floating">Enter Contact No.</label>
                                            <input type="number" class="form-control number" required>

                                        </div>
                                        <div class="form-group staff">
                                            <label class="bmd-label-floating">Enter Email</label>
                                            <input type="email" class="form-control email" required>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary add_staff">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of modal -->
    
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('templates/change_pass') ?>
	<?php $this->load->view('templates/footer') ?>
</body>
  
