<body style="background-color:#eeeeee;">
<?php $this->load->view('loading_screen');?>
    <div class="container">    
        <div class="row">
            <div class="login-div w-50">
                <form action="" method="POST">
                    <div class="card">
                        <div class="card-header card-header-text card-header-primary text-center">
                            <div class="card-text">
                                <h4 class="card-title font-weight-bold login-text">Please Login Here</h4>
                            </div>
                        </div>
                        <div class="card-body mt-4">
                            <div class="form-group mt-4">
                                <label class="bmd-label-floating ml-5 pl-2">Enter Username..</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons text-primary usr-error-icon">face</i>
                                    </span>
                                    </div>
                                    
                                    <input type="text" autofocus name="username" class="form-control username" required='true'>
                                </div> 
                            </div>

                            <div class="form-group mt-4">  
                                <label class="bmd-label-floating ml-5 pl-2">Enter Password..</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons text-primary psw-error-icon">lock_outline</i>
                                    </span>
                                    </div>
                                    <input type="password" name="password" id="registerPassword" class="form-control password" required='true'>
                                </div>
                            </div>
                            <div class="text-center mt-5 mb-5">
                                <button class="btn btn-primary btn-round ml-3 login-submit">Submit</button>
                            </div>    
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="text-center col-12">
            <small>
                Powered by:<img class="img img-fluid" width="30" src="<?php echo base_url();?>assets/images/claims-logo.png">CLAIMS
            </small>
        </div> 
    </div> 
    
    <?php  $this->load->view('templates/footer') ?>
</body>
