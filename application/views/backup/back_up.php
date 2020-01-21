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

                                        <button onclick="location.href='<? echo base_url();?>local-backup'">Local</button>
                                        <button onclick="location.href='<? echo base_url();?>google-drive'">Cloud</button>
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
