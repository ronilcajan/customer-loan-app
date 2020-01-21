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
                        
                        <button type="submit" class="btn btn-sm btn-outline-primary btn-round pull-right create-loan" data-target="#add_staff" data-toggle="modal">
                             <i class="material-icons">person_add</i>  Add Staff
                        </button>
                        <div class="tab-content tab-space">
                            <div class="tab-pane active">
                                 <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title mt-0">Staff Table</h4>
                            <p class="card-category"> Below is the list of all staffs</p>
                        </div>
                        <div class="card-body container-fluid">
                            <div class="table-responsive ">
                                <table class="display nowrap table table-hover table-sm " id="loan_clients_table">
                                <thead class="text-primary">
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <? if(!empty($stafflist)){  ?>
                                    <? foreach($stafflist as $key => $st){
                                           
                                        ?>
                                        <tr>
                                            <td><? echo $st['lastname'].','.$st['firstname'].' '.$st['middlename'];?></td>
                                            <td class="text-center">
                                                <? echo $st['address'];?>
                                            </td>
                                            <td><? echo $st['number'];?></td>
                                            <td><? echo $st['email'];?></td>
                                            <td><? echo $st['user_type'];?></td>

                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="View loan information" class="btn btn-info btn-sm mr-2" data-toggle="modal">
                                                   <i class="material-icons">eye</i> View Loan
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove loan" class="btn btn-danger btn-sm"  data-toggle="modal">
                                                    <i class="material-icons">cancel</i> Remove
                                                </button>
                                            </td>
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
  
