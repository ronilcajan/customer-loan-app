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
                       <div class="card"> 
                            <div class="card-body mr-5 ml-5">
                                <div class="text-center">
                                    <h3 class="mb-0 font-weight-bold">REYNALDO FINANCE SERVICES CORPORATION</h3>
                                </div>
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4 text-center">
                                        <p class="mb-0 l-font"> P-6, Mobod, Oroquieta City, Misamis Occidental</p>
                                        <p class="l-font">Cell No.: 09213213213</p>
                                        <h4 class="font-weight-bold"><u>PROMISSORY NOTE</u></h4>
                                    </div>
                                    <div class="col-4 text-right mt-4">
                                        <input class="text-center font-weight-bold" style="border:1px solid black; font-size: 12px" type="text" value="INSURANCE:   40.00">
                                        <input class="text-center font-weight-bold" style="border:1px solid black; font-size: 12px" type="text" value="SERVICE FEE:   80.00">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <div class="form-inline ml-5 pl-3">
                                            <label class="text-dark l-font">PN NO:</label>
                                            <input class="text-p text-center font-weight-bold" value="">
                                        </div>               
                                        <div class="form-inline ml-5 pl-3">
                                            <label class="text-dark l-font">DATE:</label>
                                            <input class="text-p text-center font-weight-bold" value="<?php $time=strtotime($loan['date_loan']); echo date('M. d, Y', $time);?>">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-inline">
                                        <label class="text-dark l-font">Amount P</label>
                                        <input class="text-p text-center font-weight-bold" value="<?php echo $loan['loan_amount'];?>">
                                    </div>
                                </div>
                                <div class="form-inline">
                                    <p class="l-font"><span style="margin-left: 50px; margin-bottom: 10px">FOR</span> VALUE RECEIVE I / WE, <input class="text-center font-weight-bold text-p" value="<?php echo $loan['firstname'].' '.$loan['middlename'].'. '.$loan['lastname'];?>">, of legal age, Filipino married/single and with residence and postal address at <input class="text-p text-center font-weight-bold" style="width: 600px" value="Purok <?php echo $loan['purok_no'].','.$loan['barangay'].','.$loan['city'].','.$loan['province'];?>">, Philippines do hereby promise to pay REYNALDO FINANCE SERVICES CORPORATION or its order with business address at P-6, Mobod, Oroquieta City, Misamis Occidental the sum of (P<input class="text-p text-center font-weight-bold" value="<?php echo $loan['loan_amount'];?>">) Philippines currency subject to the following terms, amortization and installment due to will.</p>

                                    <div style="margin-left: 20px;">
                                        <ol class="l-font">
                                            <li style="margin-bottom: 20px">The above amount shall be payable within two (2) months from date of this note or until the whole amount is fully paid with interest at the rate of ten percent (10%) per month to be paid on daily installment at <input class="text-p text-center font-weight-bold" value="<?php echo $loan['terms'];?> DAYS"> (P<input class="text-p text-center font-weight-bold" value="<?php echo $loan['daily_payment'];?>">) per day.</li>
                                            <li  style="margin-bottom: 20px">I / we further agree and obligate ourselves that in case of failure to pay / any daily installment due as above stated said daily installment shall earn an interest of one (1 percent) per day, by way of liquidation damages until said daily installment is fully paid.</li>
                                            <li  style="margin-bottom: 20px">That further in the event of principal, above stated or any portion thereof, is not fully paid on its due date, the remaining balance shall earn additional charge of one (1 percent) for each and everyday, after such date, untill fully paid.</li>
                                            <li  style="margin-bottom: 20px">That I / We further bind ourselves to pay additional amount of ten percent(10%). In case of extra judicial collection on twenty five percent (25%) in case of judicial collection, based on the remaining principal obligation, by way of attorney's fee.</li>
                                            <li  style="margin-bottom: 20px">That in case of illigation arising from or in connection with this note the venue of any be filed shall be at decision of the creditors, the proper court in the City of Oroquieta to the exclusion of other courts.</li>
                                        </ol>
                                    </div>
                                    <div>
                                        <p class="l-font"><span style="margin-left: 50px; margin-bottom: 10px">IN </span>WITNESS WHEREOF, I / WE have here unto set my hand this <input class="text-p text-center font-weight-bold" value="<?php echo date('d');?>">th day of <input class="text-p text-center font-weight-bold" value="<?php echo date('M');?>"> <input class="text-p text-center font-weight-bold" value="<?php echo date('Y');?>">, at Oroquieta City, Philippines.</p>
                                    </div>
                                <div class="col-12 mt-3">
                                    <div class="row">
                                        <div class="col-5 border border-dark">
                                            <h5 class="font-weight-bold mt-1 text-center" style="font-size: 15px">REYNALDO FINANCE SERVICES CORPORATION</h5>
                                            <div class="form-inline">
                                                <label class="text-dark l-font">DATE:</label>
                                                <input class="text-p font-weight-bold text-center" style="width: 280px" value="<?php echo date('M. d, Y');?>">
                                            </div>
                                            <div class="form-inline">
                                                <label class="text-dark l-font">RELEASE BY:</label>
                                                <input class="text-p font-weight-bold text-center" style="width: 255px">
                                            </div>
                                            <div class="form-inline">
                                                <label class="text-dark l-font">SIGNATURE:</label>
                                                <input class="text-p font-weight-bold text-center" style="width: 260px">
                                            </div>

                                        </div>
                                        <div class="col-2"></div>
                                        <div class="col-5">
                                            <div class="text-center">
                                                <input class="text-p text-center font-weight-bold" style="width: 340px" value="<?php echo $loan['firstname'].' '.$loan['middlename'].'. '.$loan['lastname'];?>">
                                                <label class="text-dark l-font">Promissor/Debtor</label>
                                            </div>
                                            <div class="form-inline">
                                                <label class="text-dark l-font">Res. Cert. No</label>
                                                <input class="text-p font-weight-bold text-center" style="width: 240px">
                                            </div>
                                            <div class="form-inline">
                                                <label class="text-dark l-font">Issued on</label>
                                                <input class="text-p font-weight-bold text-center" style="width: 260px">
                                            </div>
                                            <div class="form-inline mb-3">
                                                <label class="text-dark l-font">at</label>
                                                <input class="text-p font-weight-bold text-center" style="width: 310px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2 mb-1">
                                        <div class="col-5">
                                            <div class="text-center">
                                                <input class="text-p font-weight-bold text-center" style="width: 340px" value="<?php echo $cmaker[0]['name']; ?>">
                                                <label class="text-dark l-font">Co-Maker</label>
                                            </div>
                                            <div class="form-inline">
                                                <label class="text-dark l-font">Res. Cert. No</label>
                                                <input class="text-p font-weight-bold text-center" style="width: 240px" value="<?php echo $cmaker[0]['co_maker_no']; ?>">
                                            </div>
                                            <div class="form-inline">
                                                <label class="text-dark l-font">Issued on</label>
                                                <input class="text-p font-weight-bold text-center" style="width: 260px" value="<?php echo $cmaker[0]['date_issued']; ?>">
                                            </div>
                                            <div class="form-inline mb-3">
                                                <label class="text-dark l-font">at</label>
                                                <input class="text-p font-weight-bold text-center" style="width: 310px" value="<?php echo $cmaker[0]['address_issued']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-2"></div>
                                        <div class="col-5">
                                            <div class="text-center">
                                                <input class="text-p font-weight-bold text-center" style="width: 340px" value="<?php if(!empty($cmaker)){ echo $cmaker[0]['name'];} ?>">
                                                <label class="text-dark l-font">Co-Maker</label>
                                            </div>
                                            <div class="form-inline">
                                                <label class="text-dark l-font">Res. Cert. No</label>
                                                <input class="text-p font-weight-bold text-center" style="width: 240px" value="<?php if(!empty($cmaker)){ echo $cmaker[0]['co_maker_no']; } ?>">
                                            </div>
                                            <div class="form-inline">
                                                <label class="text-dark l-font">Issued on</label>
                                                <input class="text-p font-weight-bold text-center" style="width: 260px" value="<?php if(!empty($cmaker)){ echo $cmaker[0]['date_issued'];} ?>">
                                            </div>
                                            <div class="form-inline mb-3">
                                                <label class="text-dark l-font">at</label>
                                                <input class="text-p text-center font-weight-bold" style="width: 310px" value="<?php if(!empty($cmaker)){ echo $cmaker[0]['address_issued']; } ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center w-100 mb-0 pb-0">
                                    <p class="font-weight-bold l-font">Signed in the presence of</p>
                                </div>
                                <div class="text-center w-100 mt-0 pt-0">
                                    <input class="text-p" style="width: 400px;" type="" name=""> and <input style="width: 400px; border: 1px solid black; border-top: none; border-left: none;border-right: none;" type="" name="">
                                    <h5 class="mt-2" style="font-size: 14px"><strong>ACKNOWLEDGEMENT</strong></h5>
                                </div>

                                <div>
                                    <p class="mb-0 l-font">REPUBLIC OF THE PHILIPPINES............)</p>
                                    <p class="l-font">CITY OF OROQUIETA......................)S.S</p>
                                </div>
        

                                <p class="l-font"><span style="margin-left: 50px; margin-bottom: 10px">BEFORE ME,</span> a notary for and in the City of Oroquieta, Philippines this <input class="text-p" style="width: 50px;" type="" name=""> day of <input style="width: 200px;" class="text-p"> 20<input class="text-p" style="width: 50px;">. Personally appeared <input class="text-p" style="width: 500px;" type="text" name="">with respective Res. Cert. Above stated, known to me and to me know to be the same person who executed the foregoing instrument and the acknowledged to me the same their own and voluntary act and deed.</p>
                                <div style="width: 500px; margin-top: 20px; margin-bottom: 50px;">
                                    <p class="l-font" style="margin-left: 10px">Doc No. <input class="text-p" style="width: 290px;" type="" name=""></p>
                                    <p class="l-font" style="margin-left: 10px">Page No. <input class="text-p" style="width: 285px;" type="" name=""></p>
                                    <p class="l-font" style="margin-left: 10px">Book No. <input class="text-p" style="width: 280px;" type="" name=""></p>
                                    <p class="l-font" style="margin-left: 10px">Series No. <input class="text-p" style="width: 275px;" type="" name=""></p>
                                </div>

                                </div>
                                <div class="text-right">
                                    <button type="button" class="btn btn-primary no-print" onclick="jQuery('.card-body').print()">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
    <?php $this->load->view('templates/change_pass') ?>
	<?php $this->load->view('templates/footer') ?>
</body>
=======
</div>
>>>>>>> c68494c93961339b669e874124410c2290e2a0b8
  
