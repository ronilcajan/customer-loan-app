<body style="background-color:#eeeeee;">
    <div class="contiainer-fluid ">
        <div class="content login-div">
            <form action="" method="POST">
                <div class="card">
                    <div class="card-header card-header-text card-header-primary text-center">
                        <div class="card-text w-50">
                            <h3 class="card-title font-weight-bold">Log in</h3>
                        </div>
                    </div>
                    <div class="card-body mt-4">
                            <div class="form-group">
                            <label class="bmd-label-floating ml-5 pl-2">Enter Username..</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons text-primary usr-error-icon">face</i>
                                </span>
                                </div>
                                
                                <input type="text" name="username" class="form-control username" required='true'>
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
                            <button class="btn btn-primary ml-3 mt-4 d-block login-submit">Submit</button>
                            <label class="ml-3 mt-3 forgot-password text-muted font-italic">Forgot password?<a href="<? echo base_url();?>forgot-password">Recover here</a></p>
                        </div>
                        
                </div>
            </div>
            </form>
        </div>
    </div>