<body class="">
	<div class="wrapper ">

		<!-- Top NavBar -->
		<? $this->load->view('navigation/sidebar');?>
		<!-- End of NavBar -->

		<div class="main-panel">

		<!-- Navbar -->
		<? $this->load->view('navigation/topbar');?>
        <!-- End Navbar -->

        <div class="content">
            <div class="container-fluid">
            
                <nav aria-label="breadcrumb" style="margin-top: -40px;" role="navigation">
                  <ol class="breadcrumb" style="background-color: #A057B0">
                    <li class="breadcrumb-item">
                        <a href="<? echo base_url();?>borrowers/create-borrowers" class="text-light font-weight-bold">Borrowers</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-light font-weight-bold">Profile</a></li>
                    <li class="breadcrumb-item active text-light font-weight-bold" aria-current="page" >
                        <? echo $profile['fname'].' '.$profile['mname'].'. '.$profile['lname'];?>
                    </li>
                  </ol>
                </nav>
                        <div class="row" style="margin-top: -40px;">
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-header border-bottom text-primary font-weight-bold">Borrowers Profile</div>
                                    <div class="card-header m-0 ml-auto mr-auto card-profile">
                                        <div class="fileinput-new thumbnail img-raised" style="width: 300px;">
                                            <img class="img-fluid" width="300" id="output" src="<? echo base_url().'uploads/'.$profile['prof-img']; ?>" alt="client-img"  />
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="w-100">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h4 class="card-title font-weight-bold" valign="bottom"><? echo $profile['fname'].' '.$profile['mname'].'. '.$profile['lname'];?> </h4>
                                                    </td>
                                                    <td class="text-right" valign="bottom">
                                                        <h6 class="card-subtitle text-gray">Contact No: <? echo $profile['number1'];?></h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="card-subtitle font-weight-bold" valign="bottom">Account No. <span class="text-primary"><? echo $profile['account_no'];?></span></h6>
                                                    </td>
                                                    <td class="text-right" valign="bottom">
                                                        <h6 class="card-subtitle text-gray">Contact No: <? echo $profile['number2'];?></h6>
                                                    </td>
                                                </tr>
                                                <tr style="height:40px">
                                                    <td class="font-weight-bold">Email:</td>
                                                    <td class="text-right"><? echo $profile['email'];?></td>

                                                </tr>
                                                <tr style="height:40px;">
                                                    <td class="font-weight-bold">Birthdate:</td>
                                                    <td class="text-right">
                                                        <? $time = strtotime($profile['birthdate']); echo date("M d, Y",$time);?>
                                                    </td>
                                                </tr>
                                                <tr style="height:40px;">
                                                    <td class="font-weight-bold">Gender:</td>
                                                    <td class="text-right"><? echo $profile['gender'];?>
                                                    </td>
                                                </tr>
                                            </tbody> 
                                        </table>
                                        <p class="card-description mt-3 font-weight-bold"><? echo $profile['info'];?></p>
                                        <div class="text-center">
                                            <a href="#" class="btn btn-primary btn-round">Update Profile</a>
                                            <a href="<? echo base_url().'loan/apply-loan/'.$profile['account_no'];?>" class="btn btn-primary btn-round">Apply Loan</a>
                                        </div>
                                    </div>
                                </div>

                                 <div class="card">
                                    <div class="card-header border-bottom font-weight-bold text-primary">Address</div>
                                    <div class="card-body">
                                        <h6 class="card-title font-weight-bold">Business Name</h6>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="card-description font-weight-bold">
                                                   <? if(!empty($business['bname'])){ ?>
                                                      <? echo $business['bname'];?>
                                                    <?}else{?>
                                                    No business name
                                                <? } ?>
                                                </p>
                                            </div>
                                        </div>
                                        <h6 class="card-title font-weight-bold">Business Address</h6>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="card-description font-weight-bold">
                                                   <? if(!empty($business['baddress'])){ ?>
                                                      <? echo $business['baddress'];?>
                                                    <?}else{?>
                                                    No business address
                                                    <? } ?>
                                                </p>
                                            </div>
                                        </div>
                                        <h6 class="card-title font-weight-bold">Borrowers Address</h6>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="card-description font-weight-bold">Purok <? echo $profile['purok'].', '.$profile['barangay'].', '.$profile['city'].', '.$profile['province'].', '.$profile['country'].' '.$profile['postal_code'];?>
                                                    
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <a href="<? echo base_url();?>borrowers/create-borrowers" class="btn btn-outline-primary btn-round">
                                    <i class="material-icons">keyboard_arrow_left</i> Back
                                </a>

                            </div>

                            <div class="col-md-7">

                                 


                                <div class="card">
                                     <div class="card-header border-bottom font-weight-bold text-primary">Loan History</div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-sm">
                                                <thead class="text-primary">
                                                    <tr>
                                                        <th>Loan No.</th>
                                                        <th>Loan Amount</th>
                                                        <th>Status</th>
                                                        <th>Date</th>
                                                </thead>
                                                <tbody>
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

                                <div class="card">
                                     <div class="card-header border-bottom font-weight-bold text-primary">Co-Makers</div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-sm">
                                                <thead class="text-primary">
                                                    <tr>
                                                        <th>Loan No.</th>
                                                        <th>Name</th>
                                                        <th>Cedula No</th>
                                                        <th>Address Issued</th>
                                                        <th>Date Issued</th>
                                                </thead>
                                                <tbody>
                                                    <? foreach ($co_maker as $key => $cmaker) { ?>
                                                        <tr>
                                                            <td><? echo $cmaker['loan_no'];?></td>
                                                            <td><? echo $cmaker['name'];?></td>
                                                            <td><? echo $cmaker['cedula_no'];?></td>
                                                            <td><? echo $cmaker['address_issued'];?></td>
                                                            <td><? echo $cmaker['date_issued'];?></td>
                                                    <? } ?>
                                                    
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