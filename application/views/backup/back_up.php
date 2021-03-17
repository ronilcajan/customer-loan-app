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
                        <div class="card-body">
                            
                                <div class="w-100 text-center">
                                    <h3 class="font-weight-bold">Back Up Database</h3>
                                    
                                    <div class="input-group no-border mt-5">
                                        <div class="ml-auto mr-auto">

                                        <button class="btn btn-outline-primary btn-lg font-weight-bold" rel="tooltip" title="Download SQL File" onclick="location.href='<?php echo base_url();?>local-backup'"><i class="fas fa-download"></i> Local</button>
                                        <a href='<?php echo base_url();?>dropbox' class="btn btn-lg font-weight-bold" style="background-color: #18357D" rel="tooltip" title="Upload SQL File to DropBox " onclick="window.open('<?php echo base_url();?>dropbox', 'newwindow', 'width=600,height=600'); return false;"><i class="fab fa-dropbox"></i> DropBox</a>
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
    <?php $this->load->view('templates/change_pass') ?>
	<?php $this->load->view('templates/footer') ?>
</body>
