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
            <div class="col-md-12">
              
              <ul class="nav nav-pills nav-pills-primary" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
                  Add New Clients
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false">
                  New Clients
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false">
                  Loan Applicants
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link4" role="tablist" aria-expanded="false">
                  Approved Clients
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link5" role="tablist" aria-expanded="false">
                  Rejected Clients
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link6" role="tablist" aria-expanded="false">
                  Clients
                    </a>
                </li>
              </ul>

              <div class="tab-content tab-space">
              <div class="tab-pane active" id="link1" aria-expanded="true">
                <div class="card">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title">Create Client Profile</h4>
                      <p class="card-category">Complete your client information</p>
                    </div>
                    <div class="card-body">
                      <form id="form-register" enctype="mutlipart/form-data" action="" method="POST">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="form-group form-file-upload form-file-multiple ">
                                <input type="file" accept="image/*" onchange="loadFile(event)" class="inputFileHidden"  name="client_img" id="client_img" required>
                                <div class="fileinput-new thumbnail img-raised text-center">
                                  <img class="img-fluid" id="output" src="<? echo base_url();?>assets/img/person.png" alt="client-img" />
                                </div>
                                <div class="input-group mt-2">
                                  <span class="input-group-btn">
                                    <button type="button" class="btn btn-fab btn-round btn-primary">
                                      <i class="material-icons">attach_file</i>
                                      </button>
                                  </span>
                                  <input type="text" class="form-control inputFileVisible"  placeholder="Choose client picture.." required>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-8">
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Account no.</label>
                                  <? if($acc_no == 1000){?>
                                    <input type="text" class="form-control account_no" name="account_no" value="<? echo $acc_no['account_no'] + 10000;?>" readonly>
                                  <? }else{ ?>
                                    <input type="text" class="form-control account_no" name="account_no" value="<? echo $acc_no['account_no'] + 1;?>" readonly>
                                  <? } ?>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Last Name</label>
                                  <input type="text" class="form-control lname" name="lname" required>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Given Name</label>
                                  <input type="text" class="form-control gname" name="gname" required>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Middle Name</label>
                                  <input type="text" class="form-control mname" name="mname" required>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Email Address</label>
                                  <input type="email" class="form-control email" name="email" required>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Contact Number</label>
                                  <input type="number" class="form-control number1" name="number1" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Contact Number (Optional)</label>
                                  <input type="number" class="form-control number2" name="number2">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-2">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Purok No.</label>
                                  <input type="number" class="form-control purok_no" name="purok_no" required>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Barangay</label>
                                  <input type="text" class="form-control barangay" name="barangay" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="bmd-label-floating">City</label>
                                  <input type="text" class="form-control city" name="city" required>
                                </div>
                              </div>
                            </div>
                            
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Province</label>
                                  <input type="text" class="form-control province" name="province" required>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Country</label>
                                  <input type="text" class="form-control" disabled value="Philippines">
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Postal Code</label>
                                  <input type="number" class="form-control postal_code" name="postal_code" required>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Birthdate</label>
                                  <input type="text" class="form-control birthdate" name="birthdate" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="bmd-label-floating mr-3">Gender</label>
                                  <div class="form-check form-check-radio form-check-inline">
                                    <label class="form-check-label">
                                      <input class="form-check-input gender" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Male" required> Male
                                      <span class="circle">
                                          <span class="check"></span>
                                      </span>
                                    </label>
                                  </div>
                                  <div class="form-check form-check-radio form-check-inline">
                                    <label class="form-check-label">
                                      <input class="form-check-input gender" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Female" required> Female
                                      <span class="circle">
                                          <span class="check"></span>
                                      </span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                            
                        </div>
                        <div class="row mt-1">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Additional Info</label>
                                  <div class="form-group">
                                    <label class="bmd-label-floating">Write something about the client.. </label>
                                    <textarea class="form-control info" name="info" rows="5" required></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                        
                        <button class="btn btn-primary btn-round pull-right client-save">Create Profile</button>
                        <button class="btn btn-default btn-round pull-right cancel-create">Cancel</button>
                        <div class="clearfix"></div>
                      </form>
                    </div>
                  </div>
                </div>
                
                <div class="tab-pane" id="link2" aria-expanded="false">
                  <div class="card">
                    <div class="card-header card-header-primary">
                          <h4 class="card-title mt-0">New Clients Table</h4>
                          <p class="card-category"> Below is the list of all new clients</p>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-hover" id="new_client_table">
                              <thead class="text-primary">
                                <th>Account No.</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                              </thead>
                              <tbody>
                              <? foreach($new_clients as $key => $newC){
                                    if(!empty($newC)){  
                              ?>
                                <tr>
                                  <td><? echo $newC['account_no'];?></td>
                                  <td><a href="<? echo base_url().'borrowers/client-profile/'.$newC['account_no'];?>" ><? echo $newC['firstname'].' '.$newC['middlename'].' '.$newC['lastname'];?></a></td>
                                  <td><? echo $newC['purok_no'].', '.$newC['barangay'].', '.$newC['city'].', '.$newC['postal_code'];?></td>
                                  <td>
                                    <span class="font-italic text-muted "><? echo $newC['status'];?></span>
                                  </td>
                                  <td>
                                    <a href="#" class="badge badge-info p-2" title="View clients information">Review</a>
                                    <a href="<? echo base_url().'apply-loan/'.$newC['account_no'];?>" class="badge badge-primary p-2" title="Approve this client application">Apply Loan</a>
                                    <a href="#" class="badge badge-danger p-2" title="Delete clients profile">Delete</a>
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
                  
                <div class="tab-pane" id="link3" aria-expanded="false">
                  <div class="card">
                    <div class="card-header card-header-primary">
                          <h4 class="card-title mt-0">New Loan Applicant Table</h4>
                          <p class="card-category"> Below is the list of all new loan applicants</p>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive ">
                            <table class="table table-hover table-sm" id="loan_clients_table">
                              <thead class="text-primary">
                                <th>Account No.</th>
                                <th>Name</th>
                                <th class="text-right">Desired Loan Amount</th>
                                <th class="text-center">Verified by</th>
                                <th>Status</th>
                                <th>Action</th>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>10003</td>
                                  <td>Dakota Bigas</td>
                                  <td class="text-right">P 3,000</td>
                                  <td class="text-center">Ron</td>
                                  <td>
                                    <span class="font-italic text-muted">Waiting for approval..</span>
                                  </td>
                                  <td>
                                    <a href="#" class="badge badge-info p-2" title="View applicant loan">Review</a>
                                    <a href="#" class="badge badge-primary p-2" title="Approved applicant loan">Approve</a>
                                    <a href="#" class="badge badge-danger p-2" title="Reject applicant loan">Reject</a>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                </div>

                <div class="tab-pane" id="link4" aria-expanded="false">
                  <div class="card">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title mt-0">Approved Clients Table</h4>
                      <p class="card-category"> Below is the list of all approved clients</p>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-hover" id="approved_clients_table">
                          <thead class="text-primary">
                            <th>Account No.</th>
                            <th>Name</th>
                            <th class="text-right">Loan Amount</th>
                            <th class="text-center">Approve by</th>
                            <th>Status</th>
                            <th>Action</th>
                          </thead>
                          <tbody>
                            <tr>
                              <td>10003</td>
                              <td>Dakota Bigas</td>
                              <td class="text-right">P 4,000</td>
                              <td class="text-center">Ron</td>
                              <td>
                                <span class="font-italic text-muted">Waiting for cash release..</span>
                              </td>
                              <td>
                                <a href="#" class="badge badge-info p-2" title="Review client">Review</a>
                                <a href="#" class="badge badge-primary p-2" title="Release cash">Release</a>
                                <a href="#" class="badge badge-danger p-2" title="Reject client">Reject</a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>    
                </div>

                <div class="tab-pane" id="link5" aria-expanded="false">
                  <div class="card">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title mt-0"> Rejected Clients Table</h4>
                      <p class="card-category"> Below is the list of all rejected clients</p>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-hover" id="rejected_clients_table">
                          <thead class="text-primary">
                            <th>Account No.</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Reason</th>
                            <th>Rejected by</th>
                            <th>Status</th>
                            <th>Action</th>
                          </thead>
                          <tbody>
                            <tr>
                              <td>10001</td>
                              <td>Dakota Rice</td>
                              <td>Mobod,Oroqueita City</td>
                              <td>Lack of documents</td>
                              <td>Ron</td>
                              <td>
                                <span class="font-italic text-muted">Rejected..</span>
                              </td>
                              <td>
                                <a href="#" class="badge badge-info p-2" title="View client information">Review</a>
                                <a href="#" class="badge badge-primary p-2" title="Re-apply client loan">Re-Apply</a>
                                <a href="#" class="badge badge-danger p-2" disabled>Delete</a>
                              </td>
                            </tr>                          
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="link6" aria-expanded="false">
                <div class="card">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title mt-0">Clients Table</h4>
                      <p class="card-category"> Below is the list of all clients</p>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-hover" id="clients_table">
                          <thead class="text-primary">
                            <th>Account No.</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact Info</th>
                            <th class="text-right">Amount Loan</th>
                            <th class="text-center">Status</th>
                            <th>Action</th>
                          </thead>
                          <tbody>
                            <tr>
                              <td>10001</td>
                              <td>Dakota Rice</td>
                              <td>Mobod,Oroqueita City</td>
                              <td>09123456789</td>
                              <td class="text-right">P 3,000</td>
                              <td class="text-center">
                                <span class="font-italic text-muted">Active..</span>
                              </td>
                              <td>
                                <a href="#" class="badge badge-primary p-2" title="View client information">View</a>
                                <a href="#" class="badge badge-info p-2" title="Edit client information">Update</a>
                                <a href="#" class="badge badge-danger p-2" disabled>Delete</a>
                              </td>
                            </tr>                          
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
</div>
  
