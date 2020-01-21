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
                        <div class="row"> 
                            <div class="col-md-4">
                                <div class="card card-profile">
                                    <div class="card-avatar" style="height: 150px">
                                        <? if(empty($profile['prof_img'])){?>
                                            <img class="img img-fluid" style="height:130px" src="<? echo base_url().'assets/images/person.png' ?>" alt="client-img"/>
                                    <? }else{ ?>
                                        <img class="img img-fluid" style="height:130px" src="<? echo base_url().'uploads/'.$profile['prof-img']; ?>" alt="client-img"/>
                                    <? }?>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title font-weight-bold"><? echo $profile['fname'].' '.$profile['mname'].'. '.$profile['lname'];?></h4>
                                        <h6 class="card-category text-gray">Account No. <span class="text-primary"><? echo $profile['account_no'];?></span></h6>
                                        <p class="card-description mt-3 font-weight-bold"><? echo $profile['info'];?></p>
                                        <table class="w-100">
                                            <tbody>
                                                <tr style="height:40px">
                                                    <td class="font-weight-bold text-left">Contact No:</td>
                                                    <td class="text-right"><? echo $profile['number1'];?></td>
                                                </tr>
                                                <tr style="height:40px">
                                                    <td class="font-weight-bold text-left">Contact No:</td>
                                                    <td class="text-right"><? echo $profile['number2'];?></td>
                                                </tr>
                                                <tr style="height:40px">
                                                    <td class="font-weight-bold text-left">Email:</td>
                                                    <td class="text-right"><? echo $profile['email'];?></td>
                                                </tr>
                                                <tr style="height:40px;">
                                                    <td class="font-weight-bold text-left">Birthdate:</td>
                                                    <td class="text-right">
                                                        <? $time = strtotime($profile['birthdate']); echo date("M d, Y",$time);?>
                                                    </td>
                                                </tr>
                                                <tr style="height:40px;">
                                                    <td class="font-weight-bold text-left ">Gender:</td>
                                                    <td class="text-right"><? echo $profile['gender'];?>
                                                    </td>
                                                </tr>
                                            </tbody> 
                                        </table>
                                        
                                        <div class="text-center">
                                            <button class="btn btn-outline-primary btn-sm btn-round" data-target="#edit_profile" data-toggle="modal" rel="tooltip" title="Edit Profile">
                                                <i class="material-icons">edit</i> Update
                                            </button>
                                            <button onclick='location.href="<? echo base_url().'loan/create-loan/'.$profile['account_no'];?>"' class="btn btn-primary btn-sm btn-round" rel="tooltip" title="Apply Loan">
                                                <i class="material-icons">monetization_on</i> Apply Loan
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                 <div class="card">
                                    <div class="card-header border-bottom font-weight-bold text-primary">
                                            Address
                                    </div>

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



                                <a href="<? echo base_url();?>borrowers/create-borrowers" rel="tooltip" title="Back to create borrowers" class="btn btn-outline-primary btn-round">
                                    <i class="material-icons">keyboard_arrow_left</i> Back
                                </a>

                            </div>

                            <div class="col-md-8">

                                 


                                <div class="card">
                                     <div class="card-header border-bottom font-weight-bold text-primary">Loan History</div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-sm" id="loan_history">
                                                <thead class="text-primary">
                                                    <tr>
                                                        <th>Loan No.</th>
                                                        <th>Loan Amount</th>
                                                        <th>Status</th>
                                                        <th>Date</th>
                                                </thead>
                                                <tbody>
                                                    <? if(!empty($loan)){?>
                                                    <? foreach ($loan as $key => $value) {?>
                                                        <tr>
                                                            <td><? echo $value['loan_no'];?></td>
                                                            <td><? echo $value['loan_amount'];?></td>
                                                            <td><? echo $value['status'];?></td>
                                                            <td><? echo $value['date_approved'];?></td>
                                                        </tr>
                                                    <?}}?>
                                                    
                                                </tbody>
                                                
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                     <div class="card-header border-bottom font-weight-bold text-primary">Co-Makers</div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-sm" id="my_comaker">
                                                <thead class="text-primary">
                                                    <tr>
                                                        <th>Loan No.</th>
                                                        <th>Name</th>
                                                        <th>Cedula No</th>
                                                        <th>Address Issued</th>
                                                        <th>Date Issued</th>
                                                </thead>
                                                <tbody>
                                                    <? if(!empty($co_maker)){?>
                                                    <? foreach ($co_maker as $key => $cmaker) { ?>
                                                        <tr>
                                                            <td><? echo $cmaker['loan_no'];?></td>
                                                            <td><? echo $cmaker['name'];?></td>
                                                            <td><? echo $cmaker['cedula_no'];?></td>
                                                            <td><? echo $cmaker['address_issued'];?></td>
                                                            <td><? echo $cmaker['date_issued'];?></td>
                                                    <? } }?>
                                                    
                                                </tbody>
                                                
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal for edit profile-->
                                        <div class="modal fade" id="edit_profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-bold text-primary" >Update Profile</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="update_form" enctype="mutlipart/form-data" method="POST">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <div class="form-group form-file-upload form-file-multiple ">
                                                                            <input type="file" accept="image/*" onchange="loadFile(event)" name="img" class="inputFileHidden"s required>
                                                                            <div class="fileinput-new thumbnail img-raised text-center">
                                                                                <img class="img-fluid" id="output" src="<? echo base_url().'uploads/'.$profile['prof-img']; ?>" alt="client-img" />
                                                                            </div>
                                                                            <div class="input-group mt-2">
                                                                                <span class="input-group-btn">
                                                                                    <button type="button" class="btn btn-fab btn-round btn-primary">
                                                                                        <i class="material-icons">attach_file</i>
                                                                                    </button>
                                                                                </span>
                                                                                <input type="text" class="form-control inputFileVisible" placeholder="Choose client picture..">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-8">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <input type="hidden" class="form-control" name="account_no" value="<? echo $profile['account_no'];?>">
                                                                                <label class="bmd-label-floating">First Name</label>
                                                                                <input type="text" class="form-control" name="fname" value="<? echo $profile['fname'];?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating">Middle Name</label>
                                                                                <input type="text" class="form-control" name=
                                                                                "mname" value="<? echo $profile['mname'];?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating">Last Name</label>
                                                                                <input type="text" class="form-control" name="lname" value="<? echo $profile['lname'];?>"  required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating">Contact Number</label>
                                                                                <input type="number" class="form-control" name="num1" value="<? echo $profile['number1'];?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating">Contact Number</label>
                                                                                <input type="number" class="form-control" name="num2" value="<? echo $profile['number2'];?>" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating">Email Address</label>
                                                                                <input type="email" class="form-control" name=
                                                                                "email" value="<? echo $profile['email'];?>" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating">Birthday</label>
                                                                                <input type="date" class="form-control" name=
                                                                                "bday" value="<? echo $profile['birthdate'];?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating">Gender</label>
                                                                                <input type="text" class="form-control" name="gender" value="<? echo $profile['gender'];?>" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                             <div class="row mt-1">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Additional Info(Optional)</label>
                                                                        <div class="form-group">
                                                                            <label class="bmd-label-floating">Write something about the client.. </label>
                                                                            <textarea class="form-control" name="info" rows="5"><? echo $profile['info'];?></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal"><i class="material-icons">cancel</i> Cancel</button>
                                                        <button type="submit" class="btn btn-primary btn-round" id="update_profile">
                                                          <i class="material-icons">check_circle</i> Save
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of modal -->
                            </div>
                        </div>

            </div>
        </div>
    </div>