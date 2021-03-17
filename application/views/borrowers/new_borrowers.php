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
              
                        <?php $this->load->view('navigation/borrowers_navbar');?>

                        <div class="tab-content tab-space">
                            <div class="tab-pane active">
                                <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title mt-0">New Borrowers Table</h4>
                            <p class="card-category"> Below is the list of all new borrowers</p>
                        </div>
                        <div class="card-body container-fluid">
                            <div class="table-responsive">
                                <table class="table table-hover" id="new_client_table">
                                    <thead class="text-primary">
                                        <th>Account No.</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach($new_clients as $key => $newC){ ?>
                                        <tr>
                                            <td><?php echo $newC['account_no'];?></td>
                                            <td>
                                                <a href="<?php echo base_url().'borrowers/profile/'.$newC['account_no'];?>" rel="tooltip" title="Go to profile"><?php echo $newC['lastname'].','.$newC['firstname'].' '.$newC['middlename'];?></a>
                                            </td>
                                            <td>
                                                Purok <?php echo $newC['purok_no'].', '.$newC['barangay'].', '.$newC['city'].', '.$newC['postal_code'];?></td>
                                            <td>
                                                <span class="font-italic text-muted "><?php echo $newC['status'];?></span>
                                            </td>

                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="View borrowers" class="btn btn-info btn-sm btn-link" data-target="#clients-<?php echo $newC['account_no'];?>" data-toggle="modal">
                                                    <i class="material-icons">visibility</i> 
                                                </button>|
                                                <button type="button" rel="tooltip" title="Apply Loan" class="btn btn-primary btn-sm btn-link" onclick="location.href='<?php echo base_url().'loan/create-loan/'.$newC['account_no'];?>'">
                                                    <i class="material-icons">monetization_on</i>
                                                </button>|
                                                <button type="button" rel="tooltip" title="Remove borrowers" class="btn btn-danger btn-sm btn-link" data-target="#delete_client<?php echo $newC['account_no'];?>" id="remove-loan<?php echo $newC['account_no'];?>" data-toggle="modal">
                                                    <i class="material-icons">remove_circle</i>
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal to view client data -->
                                        <div class="modal fade" id="clients-<?php echo $newC['account_no'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Borrowers Information</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                             <?php   if(empty($newC['profile_img'])){ ?>
                                                                <img class="border-round" src="<?php echo base_url().'assets/images/person.png' ?>" width="150" height="150"/>
                                                            <?php }else{ ?>
                                                                <img class="border-round" src="<?php echo base_url().'uploads/'.$newC['profile_img'];?>" width="150" height="150"/>
                                                            <?php } ?>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <p><strong>Name:</strong> 
                                                                    <?php echo $newC['firstname'].' '.$newC['middlename'].' '.$newC['lastname'];?>    
                                                                </p>
                                                                <p><strong>Email:</strong> 
                                                                    <?php echo $newC['email']; ?>
                                                                </p>
                                                                <p><strong>Contact No:</strong>
                                                                    <?php echo $newC['number1']; ?>,<?php echo $newC['number2']; ?>
                                                                </p>
                                                                <p><strong>Info:</strong>
                                                                    <?php echo $newC['added_info']; ?>
                                                                </p>
                                                            </div>
                                                      </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" onclick="location.href='<?php echo base_url().'borrowers/profile/'.$newC['account_no'];?>'" class="btn btn-primary">Go to profile</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of modal -->
                                        <!-- Modal for remove clients -->
                                        <div class="modal fade" id="delete_client<?php echo $newC['account_no'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Remove Borrowers Permanently</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to remove this client?</p>
                                                        <small class="text-danger font-italic">Note:This process cannot be undoned!</small>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-danger delete" id="<?php echo $newC['account_no'];?>">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of modal -->
                                        <?php }?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
    <?php $this->load->view('templates/change_pass') ?>
	<?php $this->load->view('templates/footer') ?>
</body>
=======
</div>
>>>>>>> c68494c93961339b669e874124410c2290e2a0b8
  
