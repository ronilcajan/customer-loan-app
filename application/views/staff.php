<body class="">
  
    <? $this->load->view('loading_screen');?>
    
    <div class="wrapper ">

    <!-- Top NavBar -->
    <? $this->load->view('navigation/sidebar');?>
    <!-- End of NavBar -->

    <div class="main-panel">

    <!-- Navbar -->
    <? $this->load->view('navigation/topbar');?>
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
                                    <? if(!empty($stafflist)){  ?>
                                    <? foreach($stafflist as $key => $st){
                                           
                                        ?>
                                        <tr>
                                            <td><a href="<? echo base_url().'staff-profile/'.$st['username'];?>"><? echo $st['lastname'].','.$st['firstname'].' '.$st['middlename'];?></a></td>
                                            <td class="text-center">
                                                <? echo $st['address'];?>
                                            </td>
                                            <td><? echo $st['number'];?></td>
                                            <td><? echo $st['email'];?></td>
                                            <td><? echo $st['user_type'];?></td>

                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="View staff information" class="btn btn-info btn-sm btn-link" data-toggle="modal">
                                                   <i class="material-icons">visibility</i>
                                                </button>|
                                                <button type="button" rel="tooltip" title="Remove staff" class="btn btn-danger btn-sm btn-link"  data-toggle="modal">
                                                    <i class="material-icons">remove_circle</i>
                                                </button>
                                            </td>
                                        </tr>
                                    <? } }?>
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
                                                                    <label class="bmd-label-floating">Enter Username</label>
                                                                    <input type="text" class="form-control username" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Position</label>
                                                                    <select required="" class="position">
                                                                        <option selected disabled="">Select Position</option>
                                                                        <option value="Admin">Admin</option>
                                                                        <option value="Cashier">Cashier</option>
                                                                        <option value="Loan Officer">Loan Officer</option>
                                                                        <option value="Collector">Collector</option>
                                                                        <option value="Guest">Guest</option>
                                                                    </select>
                                                              </div>
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Enter Password</label>
                                                                    <input type="password" class="form-control password" required>
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
</div>
  
