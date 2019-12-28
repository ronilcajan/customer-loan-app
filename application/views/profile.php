<body class="">
	<div class="wrapper ">

		<!-- Top NavBar -->
		<? $this->load->view('navigation/sidebar');?>
		<!-- End of NavBar -->

		<div class="main-panel">

		<!-- Navbar -->
		<? $this->load->view('navigation/topbar');?>
        <!-- End Navbar -->

        <div class="content" style="margin-top:20px">
            <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-header m-0 ml-auto mr-auto card-profile">
                                        <div class="fileinput-new thumbnail img-raised" style="width: 300px;">
                                            <img class="img-fluid" width="300" id="output" src="<? echo base_url().'uploads/'.$profile['prof-img']; ?>" alt="client-img"  />
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="w-100">
                                            <tbody>
                                                <tr>
                                                    <td><h4 class="card-title font-weight-bold" valign="bottom"><? echo $profile['fname'].' '.$profile['mname'].'. '.$profile['lname'];?></h4></td>
                                                    <td class="text-right" valign="bottom"><h6 class="card-subtitle text-gray">SIM1: <? echo $profile['number1'];?></h6></td>
                                                </tr>
                                                <tr>
                                                    <td><h6 class="card-subtitle font-weight-bold" valign="bottom">Account No. <? echo $profile['account_no'];?></h6></td>
                                                    <td class="text-right" valign="bottom"><h6 class="card-subtitle text-gray">SIM2: <? echo $profile['number2'];?></h6></td>
                                                </tr>
                                                <tr style="height:40px; border-bottom:1px solid black;"><td colspan="2" valign="bottom"><? echo $profile['email'];?></td></tr>
                                                <tr style="height:40px; border-bottom:1px solid black;"><td colspan="2" valign="bottom"><? $time = strtotime($profile['birthdate']); echo date("M d, Y",$time);?></td></tr>
                                                <tr style="height:40px; border-bottom:1px solid black;"><td colspan="2" valign="bottom"><? echo $profile['gender'];?></td></tr>
                                            </tbody> 
                                        </table>
                                        <p class="card-description mt-3 font-weight-bold"><? echo $profile['info'];?></p>
                                        <div class="text-center">
                                            <a href="#" class="btn btn-primary btn-round">Update Profile</a>
                                            <a href="<? echo base_url().'loan/apply-loan/'.$profile['account_no'];?>" class="btn btn-primary btn-round">Apply Loan</a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<? echo base_url();?>borrowers" class="btn btn-outline-primary btn-round">
                                    <i class="material-icons">keyboard_arrow_left</i> Back
                                </a>
                            </div>

                            <div class="col-md-7">

                                <div class="card">
                                    <div class="card-header border-bottom">
                                        <h5 class="card-title font-weight-bold ">Address</h5>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title font-weight-bold text-primary">Business Name</h6>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="card-description font-weight-bold">
                                                   <? if(!empty($business['bname'])){ ?>
                                                      <? echo $business['bnae'];?>
                                                    <?}?>
                                                    No business name
                                                </p>
                                                </p>
                                            </div>
                                        </div>
                                        <h6 class="card-title font-weight-bold text-primary">Business Address</h6>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="card-description font-weight-bold">
                                                   <? if(!empty($business['baddress'])){ ?>
                                                      <? echo $business['baddress'];?>
                                                    <?}?>
                                                    No business address
                                                </p>
                                            </div>
                                        </div>
                                        <h6 class="card-title font-weight-bold text-primary">Borrowers Address</h6>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="card-description font-weight-bold">Purok <? echo $profile['purok'].', '.$profile['barangay'].', '.$profile['city'].', '.$profile['province'].', '.$profile['country'].' '.$profile['postal_code'];?>
                                                    
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header border-bottom">
                                        <h5 class="card-title font-weight-bold">Loan History</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-sm">
                                                <thead class="text-primary">
                                                    <tr>
                                                        <th>Loan No.</th>
                                                        <th>Loan Amount</th>
                                                        <th>Status</th>
                                                        <th>Notes</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>10001</td>
                                                        <td>P 3,000</td>
                                                        <td><span class="font-italic text-muted">Active</span></td>
                                                        <td>None</td>
                                                    </tr>
                                                    <tr>
                                                        <td>10001</td>
                                                        <td>P 3,000</td>
                                                        <td><span class="font-italic text-muted">Active</span></td>
                                                        <td>None</td>
                                                    </tr>
                                                    <tr>
                                                        <td>10001</td>
                                                        <td>P 3,000</td>
                                                        <td><span class="font-italic text-muted">Active</span></td>
                                                        <td>None</td>
                                                    </tr>
                                                    <tr>
                                                        <td>10001</td>
                                                        <td>P 3,000</td>
                                                        <td><span class="font-italic text-muted">Active</span></td>
                                                        <td>None</td>
                                                    </tr>
                                                    
                                                </tbody>
                                                
                                            </table>
                                        </div>
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>

                            </div>
                        </div>

            </div>
        </div>
    </div>