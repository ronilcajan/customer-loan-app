<body class="">
  
    <div id="loading-screen" style="display: none;">
            <div class="loading-gif">
                 <img class="mb-5" src="<? echo base_url();?>assets/img/CLAIMS.png" alt="logo" /><br>
                <p>Loading Please Wait....</p>
                <img class="" width="400" src="<? echo base_url();?>assets/img/loading.gif" alt="Redirecting" />
            </div>
        </div>
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
              
                        <? $this->load->view('navigation/borrowers_navbar');?>

                        <div class="tab-content tab-space">
                            <div class="tab-pane active">
                                 <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title mt-0">Loan Applicant Table</h4>
                            <p class="card-category"> Below is the list of all new loan applicants</p>
                        </div>
                        <div class="card-body container-fluid">
                            <div class="table-responsive ">
                                <table class="display nowrap table table-hover table-sm " id="loan_clients_table">
                                <thead class="text-primary">
                                    <th>Loan No.</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-right">Loan Amount</th>
                                    <th class="text-center">Verified by</th>
                                    <th>Status</th>
                                    <th >Action</th>
                                </thead>
                                <tbody>
                                    <? foreach($verify as $key => $verified){
                                            if(!empty($verified)){  
                                        ?>
                                        <tr>
                                            <td><? echo $verified['loan_no'];?></td>
                                            <td class="text-center">
                                                <a href="<? echo base_url().'borrowers/client-profile/'.$verified['account_no'];?>" rel="tooltip" title="Go to profile"><? echo $verified['lastname'].','.$verified['firstname'].' '.$verified['middlename'];?></a>
                                            </td>
                                            <td class="text-right"><? echo $verified['loan_amount'];?></td>
                                            <td class="text-center"><? echo $verified['verified'];?></td>
                                            <td>
                                                <span class="font-italic text-muted "><? echo $verified['status'];?></span>
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="View loan information" class="btn btn-info btn-sm mr-2" data-target="#clients-<? echo $verified['account_no'];?>" data-toggle="modal">
                                                    View Loan
                                                </button>
                                                <button type="button" rel="tooltip" title="Approve loan" class="btn btn-primary btn-sm mr-2 approve approve<? echo $verified['loan_no'];?>" id="<? echo $verified['loan_no'];?>">
                                                    Approve
                                                </button>
                                                <button type="button" rel="tooltip" title="Reject loan" class="btn btn-warning btn-sm mr-2" data-target="#reject_client<? echo $verified['loan_no'];?>" id="reject-button<? echo $verified['loan_no'];?>" data-toggle="modal">
                                                    Reject
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove loan" class="btn btn-danger btn-sm" data-target="#remove_loan<? echo $verified['loan_no'];?>" id="remove-loan<? echo $verified['loan_no'];?>" data-toggle="modal">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal to view client data -->
                                        <div class="modal fade" id="clients-<? echo $verified['account_no'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                <img class="border-round" src="<? echo base_url().'uploads/'.$verified['profile_img'];?>" width="150" height="150"/>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <p><strong>Name:</strong> 
                                                                    <? echo $verified['firstname'].' '.$verified['middlename'].' '.$verified['lastname'];?>    
                                                                </p>
                                                                <p><strong>Business Name:</strong> 
                                                                    <? echo $verified['business_name']; ?>
                                                                </p>
                                                                <p><strong>Business Address:</strong>
                                                                    <? echo $verified['business_address']; ?>
                                                                </p>
                                                                <p><strong>Loan Amount:</strong>
                                                                    <? echo $verified['loan_amount']; ?>
                                                                </p>

                                                            </div>
                                                      </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" onclick="location.href='<? echo base_url().'borrowers/client-profile/'.$verified['account_no'];?>'" class="btn btn-primary">Go to profile</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of modal -->
                                         <!-- Modal for reject clients -->
                                        <div class="modal fade" id="reject_client<? echo $verified['loan_no'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <button type="button" class="btn btn-warning reject" id="<? echo $verified['loan_no'];?>">Reject</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of modal -->
                                        <!-- Modal for remove clients -->
                                        <div class="modal fade" id="remove_loan<? echo $verified['loan_no'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <button type="button" class="btn btn-danger remove" id="<? echo $verified['loan_no'];?>">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of modal -->

                                        <? } else { ?>

                                        <tr>
                                            <td colspan="5">No data available..</td>
                                        </tr>
                                        <? } }?> 
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
</div>
  
