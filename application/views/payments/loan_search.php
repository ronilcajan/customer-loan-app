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

        <div class="content">
            <div class="container-fluid">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-text card-header-primary">
                            <div class="card-text w-100">
                                <h4 class="card-title font-weight-bold">Loan Search</h4>
                                <p class="card-category"> Here you can search for an active loans</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row w-75 ml-auto mr-auto mt-5 mb-5">
                                <div class="w-100">
                                    <div class="input-group no-border">
                                        <input class="form-control text-center loan-search" type="text" name="search" placeholder="Please enter loan no here..." style="font-size: 30px; height: 50%">
                                        <button type="button" class="btn btn-primary btn-round btn-just-icon search_loan">
                                            <i class="material-icons">search</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card table-result" style="display: none">
                        <div class="card-header border-bottom">
                            <div class="card-text w-100">
                                <h5 class="card-title font-weight-bold text-primary">Results</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>Loan No</th>
                                            <th>Name</th>
                                            <th>Loan Amount</th>
                                            <th>Date Loan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="search_result">

                                    </tbody>
                                </table>
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
