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
              
                        <?php $this->load->view('navigation/borrowers_navbar');?>

                        <div class="tab-content tab-space">
                            <div class="tab-pane active">
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title">Create Borrowers Profile</h4>
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
                                                                <img class="img-fluid" id="output" src="<?php echo base_url();?>assets/images/person.png" alt="client-img" />
                                                            </div>
                                                            <div class="input-group mt-2">
                                                                <span class="input-group-btn">
                                                                    <button type="button" class="btn btn-fab btn-round btn-primary">
                                                                        <i class="material-icons">attach_file</i>
                                                                    </button>
                                                                </span>
                                                                <input type="text" class="form-control inputFileVisible"  placeholder="Choose client picture..">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Account no.</label>
                                                                <?php if($acc_no == 1000){ ?>
                                                                <input type="number" class="form-control account_no" name="account_no" value="<?php echo $acc_no + 10000;?>" readonly>
                                                                <?php }else{ ?>
                                                                <input type="number" class="form-control account_no" name="account_no" value="<?php echo $acc_no['account_no'] + 1;?>" readonly>
                                                                <?php } ?>
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
                                                    <label>Additional Info(Optional)</label>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Write something about the client.. </label>
                                                        <textarea class="form-control info" name="info" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <button class="btn btn-primary btn-round pull-right client-save"> <i class="material-icons">check_circle</i> Submit</button>
                                        <button class="btn btn-default btn-round pull-right cancel-create"><i class="material-icons">cancel</i> Cancel</button>
                                    <div class="clearfix"></div>
                                </form>
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