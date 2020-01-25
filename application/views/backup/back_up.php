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
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            
                                <div class="w-100 text-center">
                                    <h3 class="font-weight-bold">Back Up Database</h3>
                                    
                                    <div class="input-group no-border mt-5">
                                        <div class="ml-auto mr-auto">

                                        <button class="btn btn-primary btn-sm" onclick="location.href='<? echo base_url();?>local-backup'"><i class="fas fa-download"></i> Local</button>
                                        <a href='<? echo base_url();?>dropbox' class="btn btn-primary btn-sm" onclick="window.open('<? echo base_url();?>dropbox', 'newwindow', 'width=600,height=600'); return false;"><i class="fab fa-dropbox"></i> DropBox</a>
                                        <a href='<? echo base_url();?>googledrive' class="btn btn-primary btn-sm" onclick="window.open('<? echo base_url();?>googledrive', 'newwindow', 'width=600,height=600'); return false;">Google Drive</a>
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
