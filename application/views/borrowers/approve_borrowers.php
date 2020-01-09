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
              
                        <ul class="nav nav-pills nav-pills-primary">
                            <li class="nav-item">
                                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="Create borrowers profile" href="<? echo base_url();?>borrowers/create-borrowers">Create Borrowers</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="List of all new borrowers" href="<? echo base_url();?>borrowers/new-borrowers">New Borrowers</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="List of borrowers loan" href="<? echo base_url();?>borrowers/loan-applicants">Loan Applicants</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="Approved borrowers loan" href="<? echo base_url();?>borrowers/approved-borrowers">Approved Borrowers</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="Rejected borrowers loan" href="<? echo base_url();?>borrowers/rejected-borrowers">Rejected Borrowers</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="Active borrowers loan" href="<? echo base_url();?>borrowers/active-borrowers">Active Borrowers</a>
                            </li>
                        </ul>

                        <div class="tab-content tab-space">
                            <div class="tab-pane active">
                                  <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title mt-0">Approved Clients Table</h4>
                            <p class="card-category"> Below is the list of all approved clients</p>
                        </div>
                        <div class="card-body container-fluid">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm" id="approved_clients_table">
                                    <thead class="text-primary">
                                        <th>Account No.</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-right">Loan Amount</th>
                                        <th class="text-center">Approve by</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <? foreach($approved as $key => $appr){
                                            if(!empty($appr)){  
                                        ?>
                                        <tr>
                                            <td><? echo $appr['account_no'];?></td>
                                            <td class="text-center">
                                                <a href="<? echo base_url().'borrowers/client-profile/'.$appr['account_no'];?>" rel="tooltip" title="Go to profile"><? echo $appr['lastname'].','.$appr['firstname'].' '.$appr['middlename'];?></a>
                                            </td>
                                            <td class="text-right"><? echo $appr['loan_amount'];?></td>
                                            <td class="text-center"><? echo $appr['approved'];?></td>
                                            <td>
                                                <span class="font-italic text-muted "><? echo $appr['status'].'.Waiting for cash release.';?></span>
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Cash release" class="btn btn-primary btn-sm mr-2" data-target="#cash<? echo $appr['loan_no'];?>" id="cash-release<? echo $appr['loan_no'];?>" data-toggle="modal">
                                                    Done
                                                </button>
                                            </td>
                                        </tr>
                                         <!-- Modal  -->
                                        <div class="modal fade" id="cash<? echo $appr['loan_no'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Cash Release</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Cash has been released?</p>
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-primary cash-release" id="<? echo $appr['loan_no'];?>">Yes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of modal -->
                                        <? }} ?> 
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
  
