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
                        
                        <button type="submit" class="btn btn-sm btn-primary btn-round pull-right create-loan" data-target="#add_staff" data-toggle="modal">
                            Add Staff
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
                                    <th>Position</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <? if(!empty($staff)){  ?>
                                    <? foreach($staff as $key => $st){
                                           
                                        ?>
                                        <tr>
                                            <td><? echo $st['username'];?></td>
                                            <td class="text-center">
                                                <a href="<? echo base_url().'borrowers/profile/'.$st['account_no'];?>" rel="tooltip" title="Go to profile"><? echo $st['lastname'].','.$st['firstname'].' '.$st['middlename'];?></a>
                                            </td>
                                            <td><? echo $st['address'];?></td>
                                            <td><? echo $st['number'];?></td>
                                            <td><? echo $st['position'];?></td>

                                            <td>
                                                <span class="font-italic text-muted "><? echo $st['status'];?></span>
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="View loan information" class="btn btn-info btn-sm mr-2" data-target="#clients-<? echo $st['account_no'];?>" data-toggle="modal">
                                                    View Loan
                                                </button>
                                                <button type="button" rel="tooltip" title="Approve loan" class="btn btn-primary btn-sm mr-2 approve approve<? echo $st['loan_no'];?>" id="<? echo $st['loan_no'];?>">
                                                    Approve
                                                </button>
                                                <button type="button" rel="tooltip" title="Reject loan" class="btn btn-warning btn-sm mr-2" data-target="#reject_client<? echo $st['loan_no'];?>" id="reject-button<? echo $st['loan_no'];?>" data-toggle="modal">
                                                    Reject
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove loan" class="btn btn-danger btn-sm" data-target="#remove_loan<? echo $st['loan_no'];?>" id="remove-loan<? echo $st['loan_no'];?>" data-toggle="modal">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal to view client data -->
                                        <div class="modal fade" id="clients-<? echo $st['account_no'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Loan Information</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img class="border-round" src="<? echo base_url().'uploads/'.$st['profile_img'];?>" width="150" height="150"/>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <p><strong>Name:</strong> 
                                                                    <? echo $st['firstname'].' '.$st['middlename'].' '.$st['lastname'];?>    
                                                                </p>
                                                                <p><strong>Business Name:</strong> 
                                                                    <? echo $st['business_name']; ?>
                                                                </p>
                                                                <p><strong>Business Address:</strong>
                                                                    <? echo $st['business_address']; ?>
                                                                </p>
                                                                <p><strong>Loan Amount:</strong>
                                                                    <? echo $st['loan_amount']; ?>
                                                                </p>

                                                            </div>
                                                      </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" onclick="location.href='<? echo base_url().'borrowers/client-profile/'.$st['account_no'];?>'" class="btn btn-primary">Go to profile</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of modal -->
                                         <!-- Modal for reject clients -->
                                        <div class="modal fade" id="reject_client<? echo $st['loan_no'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Rejecting Borrowers Loan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to reject this loan?</p>
                                                        <p>Please provide any reason:</p>
                                                        <form method="POST">
                                                        <textarea class="form-control reason" placeholder="Write something here(Optional)"></textarea>
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-warning reject" id="<? echo $st['loan_no'];?>">Reject</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of modal -->
                                        <!-- Modal for remove clients -->
                                        <div class="modal fade" id="remove_loan<? echo $st['loan_no'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Removing Borrowers Loan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to remove this loan?</p>
                                                        <small class="text-danger font-italic">Note:This process cannot be undoned!</small>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-danger remove" id="<? echo $st['loan_no'];?>">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of modal -->

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
        </div>
    </div>
</div>
  
