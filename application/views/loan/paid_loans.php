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
                            <h4 class="card-title mt-0"> Paid Loan Table</h4>
                            <p class="card-category"> Below is the list of all paid loans</p>
                        </div>
                        <div class="card-body container-fluid">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm" id="rejected_clients_table">
                                    <thead class="text-primary">
                                        <th>Account No.</th>
                                        <th>Name</th>
                                        <th>Loan No</th>
                                        <th>Loan Amount</th>
                                        <th>Approve By</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        <? foreach($paid as $key => $actv){
                                            if(!empty($actv)){  
                                        ?>
                                        <tr>
                                            <td><? echo $actv['account_no'];?></td>
                                            <td>
                                                <a href="<? echo base_url().'borrowers/profile/'.$actv['account_no'];?>" rel="tooltip" title="Go to profile"><? echo $actv['lastname'].','.$actv['firstname'].' '.$actv['middlename'];?></a>
                                            </td>
                                            <td><a href="<? echo base_url().'payments/loan-details/'.$actv['loan_no'];?>"><? echo $actv['loan_no'];?></td>
                                            <td><? echo $actv['loan_amount'];?></td>
                                            <td><? echo $actv['approved'];?></td>
                                            <td>
                                                <span class="font-italic text-muted "><? echo $actv['status'];?></span>
                                            </td>
                                        </tr>
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
  
