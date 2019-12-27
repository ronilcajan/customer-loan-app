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
                            <ul class="nav nav-pills nav-pills-primary" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
                                Create Loan
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false">
                                All Loans
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content tab-space">

                                <div class="tab-pane active" id="link1" aria-expanded="true">
                                    <div class="card">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title">Loan Application Form</h4>
                                            <p class="card-category">Complete the loan application form</p>
                                        </div>
                                        <div class="card-body form-body">
                                            <form id="loan-form" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Loan No</label>
                                                                    <? if($loan_no==100){?> 
                                                                    <input type="text" class="form-control loan_no" name="loan" value="L<? echo 1000;?>" readonly>
                                                                    <? }else{ ?>
                                                                    <input type="text" class="form-control loan_no" name="loan" value="L<? echo $loan_no+1;?>" readonly>
                                                                    <? } ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Area</label>
                                                                    <input type="text" class="form-control area" name="area" >
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Date</label>
                                                                    <input type="date" class="form-control date" name="date" value="<?php echo date('Y-m-d');?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                    <div class="input-group-prepend form-group label-floating acc_no">
                                                                        <label class="bmd-label-floating">Enter account no</label>
                                                                        <? if(isset($account_no)){?>
                                                                        <input type="number" class="form-control accnt_no" name="account_no" value="<? echo $account_no?>" autofocus required>
                                                                        <?}else{?>
                                                                        <input type="number" class="form-control accnt_no" autofocus name="account_no" required>
                                                                        <?}?>
                                                                        <span class="input-group-text">
                                                                            <i class="fa fa-search"></i>
                                                                        </span>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group input-group-prepend">
                                                                    <span class="input-group-text">
                                                                            ₱
                                                                    </span>
                                                                    <label class="bmd-label-floating pl-3">Loan Amount</label>
                                                                    <input type="number" class="form-control text-right amount" name="amount" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select id="inputState" class="form-control collector">
                                                                        <option disabled>Choose collector...</option>
                                                                        <option value="1">John</option>
                                                                        <option value="2">Cena</option>
                                                                        <option value="3">Rock</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3 mb-2">
                                                            <h6 class="card-title">Client Information</h6>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Full Name</label>
                                                                    <input type="text" class="form-control full_name" name="fullname" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Current Address</label>
                                                                    <input type="text" class="form-control address" name="address" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Email</label>
                                                                    <input type="email" class="form-control email" name="email" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">SIM1-Contact No</label>
                                                                    <input type="text" class="form-control sim1" name="sim1" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">SIM2-Contact No</label>
                                                                    <input type="text" class="form-control sim2" name="sim2" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="row ml-1">
                                                                    <i class="fas fa-toggle-off mr-2" rel="tooltip" id="email-toggle" title="Send Email Notification" onclick="email(this)"></i>
                                                                    Send Email Notification
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row ml-1">
                                                                    <i class="fas fa-toggle-off mr-2" onclick="sim1(this)" id="sim1-toggle" rel="tooltip" title="Send SMS Notification"></i>
                                                                    Send SIM1 Notification
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row ml-1">
                                                                    <i class="fas fa-toggle-off mr-2" onclick="sim2(this)" id="sim2-toggle" rel="tooltip" title="Send SMS Notification"></i>
                                                                    Send SIM2 Notification
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mt-3 mb-2">
                                                            <h6 class="card-title">Business Info</h6>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Business Name</label>
                                                                    <input type="text" class="form-control b_name" name="b_name" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row bs">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Purok No</label>
                                                                    <input type="number" class="form-control purok_no" name="purok_no" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Barangay</label>
                                                                    <input type="text" class="form-control barangay" name="barangay" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">City</label>
                                                                    <input type="text" class="form-control city" name="city" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row bs">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Province</label>
                                                                    <input type="text" class="form-control province" name="province" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Postal Code</label>
                                                                    <input type="number" class="form-control postal" name="postal" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row c-add" style="display: none" >
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Current Address</label>
                                                                    <input type="text" class="form-control address" id="c_address" name="address" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="row ml-1">
                                                                    <i class="fas fa-toggle-off mr-2" rel="tooltip" title="Select current address" onclick="business_add(this)" id="c-add"></i>
                                                                        Same as the current address
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3 mb-2">
                                                    <h6 class="card-title">Co-Maker Info</h6>
                                                </div>
                                                <div class="co-maker-section">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Fullname</label>
                                                                <input type="text" id="c-name1" class="form-control comaker-name" name="comaker-name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button type="button" class="btn btn-social btn-just-icon btn-round btn-primary" id="add_co-maker" rel="tooltip" title="Add another co-maker">
                                                            <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Residence Certificate No</label>
                                                                <input type="text" class="form-control cedula" name="cedula" id="cedula1" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Date issued</label>
                                                                <input type="date" class="form-control date_issued" name="date_issued" id="c-date1" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Where issued</label>
                                                                <input type="text" class="form-control where_issued" name="where_issued" id="c-place1" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <button class="btn btn-primary btn-round pull-right create-loan">Create Loan</button>
                                                    <button class="btn btn-default btn-round pull-right cancel-create-loan">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="link2" aria-expanded="true">
                                wqwqwq
                                </div>
                                
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
