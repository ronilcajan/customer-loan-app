loan_deatils.php
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
                        <a href="<? echo base_url();?>loan/create-loan" class="text-light font-weight-bold">Loan</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-light font-weight-bold">Loan Details</a></li>
                    <li class="breadcrumb-item active text-light font-weight-bold" aria-current="page" >
                        <? echo $loan['firstname'].' '.$loan['middlename'].'. '.$loan['lastname'];?>
                    </li>
                  </ol>
                </nav>
                        <div class="row" style="margin-top: -40px;">
                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-header border-bottom row">
                                        <div class="col-md-10">
                                            <h4 class=" font-weight-bold text-primary">Loan Information</h4>
                                        </div>
                                        <div class="col-md-2 text-right">
                                            <button class="btn btn-outline-primary btn-round pull-right btn-sm">Pay Loan</button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-4 card-loan">
                                                <div class="fileinput-new thumbnail img-raised" style="width: 300px;">
                                                    <img class="img-fluid" width="300" id="output" src="<? echo base_url().'uploads/'.$loan['profile_img']; ?>" alt="client-img"  />
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-8 p-0">
                                                        <div class="form-group p-0">
                                                            <p>Loan No: <span  class="font-weight-bold"><? echo $loan['loan_no'];?></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 p-0">
                                                        <div class="form-group p-0">
                                                            <p>Account No: <span  class="font-weight-bold"><? echo $loan['account_no'];?></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row p-0">
                                                    <div class="col-md-4 p-0">
                                                        <div class="form-group p-0">
                                                            <p>Name: <span  class="font-weight-bold"><? echo $loan['firstname'].' '.$loan['middlename'].'. '.$loan['lastname'];?></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 p-0">
                                                        <div class="form-group p-0">
                                                            <p>Email: <span  class="font-weight-bold"><? echo $loan['email'];?></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 p-0">
                                                        <div class="form-group p-0">
                                                            <p>Birthdate: <span  class="font-weight-bold"><? $time = strtotime($loan['birthdate']); echo date("M d, Y",$time);?></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row p-0">
                                                    <div class="col-md-4 p-0">
                                                        <div class="form-group p-0">
                                                            <p>Contact No: <span  class="font-weight-bold"><? echo $loan['number1'];?></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 p-0">
                                                        <div class="form-group p-0">
                                                            <p>Contact No: <span  class="font-weight-bold"><? echo $loan['number2'];?></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 p-0">
                                                        <div class="form-group p-0">
                                                            <p>Gender: <span  class="font-weight-bold"><? echo $loan['gender'];?></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="row p-0">
                                                    <div class="col-md-12 p-0">
                                                        <p>Current Address: <span class="font-weight-bold">Purok <? echo $loan['purok_no'].', '.$loan['barangay'].', '.$loan['city'].', '.$loan['province'].', '.$loan['country'].' '.$loan['postal_code'];?></span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row p-0">
                                                    <div class="col-md-4 p-0">
                                                        <p>Business Name: <span class="font-weight-bold"><? echo $loan['business_name'];?></span>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 p-0">
                                                        <p>Business Address: <span class="font-weight-bold"><? echo $loan['business_address'];?></span>
                                                        </p>
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
