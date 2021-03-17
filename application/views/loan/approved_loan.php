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
                            <h4 class="card-title mt-0">Approved Clients Table</h4>
                            <p class="card-category"> Below is the list of all approved clients</p>
                        </div>
                        <div class="card-body container-fluid">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm" id="approved_clients_table">
                                    <thead class="text-primary">
                                        <th>Loan No.</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-right">Loan Amount</th>
                                        <th class="text-center">Approved by</th>
                                        <th>Approved Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach($approved as $key => $appr){
                                            if(!empty($appr)){  
                                        ?>
                                        <tr>
                                            <td><a href="<?php echo base_url().'payments/loan-details/'.$appr['loan_no'];?>"><?php echo $appr['loan_no'];?></a></td>
                                            <td class="text-center">
                                                <a href="<?php echo base_url().'borrowers/profile/'.$appr['account_no'];?>" rel="tooltip" title="Go to profile"><?php echo $appr['lastname'].','.$appr['firstname'].' '.$appr['middlename'];?></a>
                                            </td>
                                            <td class="text-right"><?php echo $appr['loan_amount'];?></td>
                                            <td class="text-center"><?php echo $appr['approved'];?></td>
                                            <td class="text-center"><?php $time = $appr['date_approved']; echo date('M. d, Y', strtotime($time));?></td>
                                            <td>
                                                <span class="font-italic text-muted ">
                                                    <?php if($appr['loan_status'] == 'Approved'){?>

                                                    <?php echo $appr['loan_status'].'. Waiting for cash release.';?>
                                                    <?php }else{?> 
                                                    <?php echo 'Loan is '.$appr['loan_status'];?>.
                                                    <?php } ?>        
                                                </span>
                                            </td>
                                            <td class="td-actions text-right">
                                                <?php if($appr['loan_status'] == 'Approved'){?>
                                                    <button type="button" rel="tooltip" title="Release cash for this loan" class="btn btn-primary btn-sm btn-link" data-target="#cash<?php echo $appr['loan_no'];?>" id="cash-release<?php echo $appr['loan_no'];?>" data-toggle="modal">
                                                        <i class="material-icons">monetization_on</i>
                                                    </button>|
                                                <?php }else{?> 
                                                    <button type="button" rel="tooltip" title="Go to Payments" class="btn btn-info btn-sm btn-link" onclick="location.href='<?php echo base_url().'payments/loan-details/'.$appr['loan_no'];?>'">
                                                        <i class="material-icons">payment</i>
                                                    </button>|
                                                <?php } ?>
                                                <button type="button" rel="tooltip" title="View Promissory Note" class="btn btn-danger btn-sm mr-2 btn-link" onclick="location.href='<?php echo base_url().'promissory/'.$appr['loan_no'];?>'">
                                                        <i class="material-icons">featured_play_list</i>
                                                    </button>
                                            </td>
                                        </tr>
                                         <!-- Modal  -->
                                        <div class="modal fade" id="cash<?php echo $appr['loan_no'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <button type="button" class="btn btn-primary cash-release" id="<?php echo $appr['loan_no'];?>">Yes</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of modal -->
                                        <?php }} ?> 
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
    <?php $this->load->view('templates/change_pass') ?>
	<?php $this->load->view('templates/footer') ?>
</body>
  
