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
              
                        <?php $this->load->view('navigation/loan_navbar');?>

                        <div class="tab-content tab-space">
                            <div class="tab-pane active">
                                   <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title mt-0"> Rejected Clients Table</h4>
                            <p class="card-category"> Below is the list of all rejected clients</p>
                        </div>
                        <div class="card-body container-fluid">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm" id="rejected_clients_table">
                                    <thead class="text-primary">
                                        <th>Loan No.</th>
                                        <th>Name</th>
                                        <th>Reason</th>
                                        <th>Rejected by</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach($rejected as $key => $reject){
                                            if(!empty($reject)){  
                                        ?>
                                        <tr>
                                            <td><?php echo $reject['loan_no'];?></td>
                                            <td>
                                                <a href="<?php echo base_url().'borrowers/profile/'.$reject['account_no'];?>" rel="tooltip" title="Go to profile"><?php echo $reject['lastname'].','.$reject['firstname'].' '.$reject['middlename'];?></a>
                                            </td>
                                            <td>
                                                    <?php echo $reject['reason'];?>
                                            </td>
                                            <td><?php echo $reject['approved'];?></td>
                                            <td>
                                                <span class="font-italic text-muted "><?php echo $reject['status'];?></span>
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="View loan information" class="btn btn-info btn-sm btn-link" data-target="#clients-<?php echo $reject['account_no'];?>" data-toggle="modal">
                                                    <i class="material-icons">visibility</i>
                                                </button>|
                                                <button type="button" rel="tooltip" title="Re-apply loan" class="btn btn-primary btn-sm btn-link" data-target="#reapply_loan<?php echo $reject['loan_no'];?>" id="reapply-loan<?php echo $reject['loan_no'];?>"  data-toggle="modal">
                                                    <i class="material-icons">monetization_on</i>
                                                </button>|
                                                <button type="button" rel="tooltip" title="Remove loan" class="btn btn-danger btn-sm btn-link" data-target="#remove_loan<?php echo $reject['loan_no'];?>" id="remove-rejected-loan<?php echo $reject['loan_no'];?>" data-toggle="modal">
                                                    <i class="material-icons">remove_circle</i>
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal to view client data -->
                                        <div class="modal fade" id="clients-<?php echo $reject['account_no'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                 <?php if(empty($reject['profile_img'])){ ?>
                                                                <img class="border-round" src="<?php echo base_url().'assets/images/person.png' ?>" width="150" height="150"/>
                                                            <?php }else{?>
                                                                <img class="border-round" src="<?php echo base_url().'uploads/'.$reject['profile_img'];?>" width="150" height="150"/>
                                                            <?php }?>
                                                            </div>
                                                            <div class="col-md-8">
                                                               <p><strong>Name:</strong> 
                                                                    <?php echo $reject['firstname'].' '.$reject['middlename'].' '.$reject['lastname'];?>    
                                                                </p>
                                                                <p><strong>Business Name:</strong> 
                                                                    <?php echo $reject['business_name']; ?>
                                                                </p>
                                                                <p><strong>Business Address:</strong>
                                                                    <?php echo $reject['business_address']; ?>
                                                                </p>
                                                                <p><strong>Loan Amount:</strong>
                                                                    <?php echo $reject['loan_amount']; ?>
                                                                </p>


                                                            </div>
                                                      </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" onclick="location.href='<?php echo base_url().'borrowers/client-profile/'.$reject['account_no'];?>'" class="btn btn-primary">Go to profile</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of modal -->
                                         <!-- Modal for reject clients -->
                                        <div class="modal fade" id="reapply_loan<?php echo $reject['loan_no'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Re-Apply Borrowers Loan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to re-apply this loan?</p>
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-primary re-apply" id="<?php echo $reject['loan_no'];?>">Re-Apply</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of modal -->
                                        <!-- Modal for remove clients -->
                                        <div class="modal fade" id="remove_loan<?php echo $reject['loan_no'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <button type="button" class="btn btn-danger remove-rejected" id="<?php echo $reject['loan_no'];?>">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of modal -->

                                        <?php } else { ?>

                                        <tr>
                                            <td colspan="5">No data available..</td>
                                        </tr>
                                        <?php } }?>                  
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
  
