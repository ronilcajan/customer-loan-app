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
                    
                        <!-- Page Here -->

                        <ul class="nav nav-pills nav-pills-primary" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active mr-2 pt-0 pb-0 font-weight-bold shadow" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true" style="border-radius: 20px; border: 1px solid #9E57B1; font-size: 12px;">
                               <i class="material-icons">group</i> BORROWERS
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mr-2 pt-0 pb-0 font-weight-bold" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false" style="border-radius: 20px; border: 1px solid #9E57B1; font-size: 12px;">
                             <i class="material-icons">monetization_on</i> LOANS
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pt-0 pb-0 font-weight-bold" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false" style="border-radius: 20px; border: 1px solid #9E57B1;font-size: 12px;">
                              <i class="material-icons">payment</i> PAYMENTS
                                </a>
                            </li>
                        </ul>


                        <div class="tab-content tab-space">

                            <div class="tab-pane active" id="link1" aria-expanded="true">
                                
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title mt-0">Borrowers</h4>
                                        <p class="card-category"> Below is the list of all borrowers</p>
                                    </div>
                                    <div class="card-body container-fluid">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-sm display" id="all-clients-table">
                                                <thead class="text-primary">
                                                    <th>Account No.</th>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>Email</th>
                                                    <th>Contact Numbers</th>
                                                    <th>Status</th>
                                                </thead>
                                                <tbody>
                                                    <? foreach ($clients as $key => $all) {?>
                                                    <tr>
                                                        <td><? echo $all['account_no'];?></td>
                                                        <td><? echo $all['firstname'].' '.$all['middlename'].' '.$all['lastname'];?></td>
                                                        <td>Purok no. <? echo $all['purok_no'].','.$all['barangay'].','.$all['city'].','.$all['province'].','.$all['country'].','.$all['postal_code'];?></td>
                                                        <td><? echo $all['email'];?></td>
                                                        <td><? echo $all['number1'].' & '.$all['number2'];?></td>
                                                        <td><? echo $all['status'];?></td>
                                                    </tr>
                                                   <? } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="tab-pane" id="link2" aria-expanded="false">
                                
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title mt-0"> Loans</h4>
                                        <p class="card-category"> Below is the list of all loans</p>
                                    </div>
                                    <div class="card-body container-fluid">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-sm display loan_table" id="all-loans-table">
                                                <thead class="text-primary">
                                                    <th>Loan No.</th>
                                                    <th>Name</th>
                                                    <th>Loan Amount</th>
                                                    <th>Terms</th>
                                                    <th>Daily Payment</th>
                                                    <th class="filter-start-date">Date Loan</th>
                                                    <th class="filter-end-date">Due Date</th>
                                                    <th>Status</th>
                                                </thead>
                                                <tbody>
                                                    <? foreach ($loans as $key => $all) {?>
                                                    <tr>
                                                        <td><? echo $all['account_no'];?></td>
                                                        <td><? echo $all['firstname'].' '.$all['middlename'].' '.$all['lastname'];?></td>
                                                        <td><? echo $all['loan_amount'];?></td>
                                                        <td><? echo $all['terms'];?></td>
                                                        <td><? echo $all['daily_payment'];?></td>
                                                        <td><? $time = $all['date_approved']; echo date('M. d, Y', strtotime($time));?></td>
                                                        <td><? $time = $all['due_date']; echo date('M. d, Y', strtotime($time));?></td>
                                                        <td><? echo $all['loan_status'];?></td>
                                                    </tr>
                                                   <? } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                            </div>


                            <div class="tab-pane" id="link3" aria-expanded="false">
                              
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title mt-0"> Payments</h4>
                                        <p class="card-category"> Below is the list of all payments</p>
                                    </div>
                                    <div class="card-body container-fluid">
                                        <div class="table-responsive">
                                            <div class="row mt-2 w-75">
                                                <div class="col-md-4 form-group ml-5">
                                                    <label class="label-control">Minimun Date</label>
                                                    <input type="text" class="min form-control"/>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label class="label-control">Maximum Date</label>
                                                    <input type="text" class="max form-control"/>
                                                </div>
                                            </div>
                                            <table class="table table-hover table-sm display loan_table" id="all-payments-table">
                                                <thead class="text-primary">
                                                    <th>Transaction No.</th>
                                                    <th>Loan No.</th>
                                                    <th>Name</th>
                                                    <th>Amount Collected</th>
                                                    <th>Date</th>
                                                    <th>Collected by</th>
                                                    <th>Notes</th>
                                                </thead>
                                                <tbody>
                                                    <? foreach ($payments as $key => $all) {?>
                                                    <tr>
                                                        <td><? echo $all['transaction_id'];?></td>
                                                        <td><? echo $all['loan_no'];?></td>
                                                        <td><? echo $all['firstname'].' '.$all['middlename'].' '.$all['lastname'];?></td>
                                                        <td><? echo $all['amount'];?></td>
                                                        <td><? echo $all['date'];?></td>
                                                        <td><? echo $all['collected_by'];?></td>
                                                        <td><? echo $all['notes'];?></td>
                                                    </tr>
                                                   <? } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- End Here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
