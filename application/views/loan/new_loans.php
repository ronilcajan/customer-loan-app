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
                        
                        <? $this->load->view('navigation/loan_navbar');?>

                        <div class="tab-content tab-space">
                            <div class="tab-pane active">
                                 <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title mt-0">Loan Applicant Table</h4>
                            <p class="card-category"> Below is the list of all new loan applicants</p>
                        </div>
                        <div class="card-body container-fluid">
                            <div class="table-responsive ">
                                <table class="display nowrap table table-hover" id="loan_clients_table">
                                <thead class="text-primary">
                                    <th>Loan No.</th>
                                    <th>Name</th>
                                    <th>Loan Amount</th>
                                    <th>Date Loan</th>
                                    <th>Verified by</th>
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
                                                <a href="<? echo base_url().'borrowers/profile/'.$verified['account_no'];?>" rel="tooltip" title="Go to profile"><? echo $verified['lastname'].','.$verified['firstname'].' '.$verified['middlename'];?></a>
                                            </td>
                                            <td class="text-center" id="amount<? echo $verified['loan_no'];?>" ><? echo $verified['loan_amount'];?></td>
                                            <td class="text-center"><? echo $verified['date_loan'];?></td>
                                            <td class="text-center"><? echo $verified['verified'];?></td>

                                            <td>
                                                <span class="font-italic text-muted "><? echo $verified['status'];?></span>
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Approve this loan" class="btn btn-success btn-sm mr-2 approve approve<? echo $verified['loan_no'];?>" id="<? echo $verified['loan_no'];?>">
                                                    <i class="material-icons">verified_user</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Reject this loan" class="btn btn-warning btn-sm mr-2" data-target="#reject_client<? echo $verified['loan_no'];?>" id="reject-button<? echo $verified['loan_no'];?>" data-toggle="modal">
                                                    <i class="material-icons">warning</i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove this loan" class="btn btn-danger btn-sm" data-target="#remove_loan<? echo $verified['loan_no'];?>" id="remove-loan<? echo $verified['loan_no'];?>" data-toggle="modal">
                                                    <i class="material-icons">remove_circle</i>
                                                </button>
                                            </td>
                                        </tr>
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
  
